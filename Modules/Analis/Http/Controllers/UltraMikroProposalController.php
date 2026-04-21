<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;
use Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory;

class UltraMikroProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $latestSub = UltraMikroPembiayaanHistory::selectRaw('ultra_mikro_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('ultra_mikro_pembiayaan_id');

        $latestHistories = UltraMikroPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ultra_mikro_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->get([
                'ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id',
                'status_id',
                'jabatan_id',
                'user_id',
            ]);

        $proposalIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 3 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->pluck('ultra_mikro_pembiayaan_id')->unique();

        $proposals = UltraMikroPembiayaan::with(['nasabah', 'user'])
            ->whereIn('id', $proposalIds)
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        $histories = $latestHistories->keyBy('ultra_mikro_pembiayaan_id');

        return view('analis::ultra_mikro.proposal.index', [
            'title' => 'Proposal Ultra Mikro',
            'proposals' => $proposals,
            'histories' => $histories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //Query Chart Proposal Per Bulan
        $proposalPerBulan = UltraMikroPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Plafond Per Bulan
        $plafondPerBulan = UltraMikroPembiayaan::join('ultra_mikro_pembiayaan_histories', 'ultra_mikro_pembiayaans.id', '=', 'ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(ultra_mikro_pembiayaans.created_at) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('ultra_mikro_pembiayaan_histories.status_id', 9)
            ->whereYear('ultra_mikro_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('ultra_mikro_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $labelPlafond = $plafondPerBulan->keys();
        $dataPlafond = $plafondPerBulan->values();

        //Proposal Berhasil Akad
        $proposalSelesais = UltraMikroPembiayaan::join('ultra_mikro_pembiayaan_histories', 'ultra_mikro_pembiayaans.id', '=', 'ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id')
            ->select()
            ->where('ultra_mikro_pembiayaan_histories.status_id', 9)
            ->get();

        $latestSub = UltraMikroPembiayaanHistory::selectRaw('ultra_mikro_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('ultra_mikro_pembiayaan_id');

        $latestHistories = UltraMikroPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ultra_mikro_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get([
            'ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id',
            'status_id',
            'jabatan_id',
            'user_id',
        ]);

        $diterima = DB::table('pembiayaans')
            ->where('segmen', 'Ultra Mikro')
            ->where('status', 'Selesai Akad')
            ->count();

        $proposalUltraMikro = $latestHistories->filter(function ($history) {
            return ($history->status_id == 3 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->count();

        $reviewIds = UltraMikroPembiayaan::where('user_id', Auth::user()->id)
            ->whereNotNull('dokumen_ideb')
            ->pluck('id');

        $review = $latestHistories->whereIn('ultra_mikro_pembiayaan_id', $reviewIds)
            ->filter(function ($history) {
                return $history->status_id == 7;
            })->count();

        $pipeline = $latestHistories->filter(function ($history) {
            return $history->status_id < 9
                && !($history->status_id == 5 && $history->jabatan_id == 2);
        })->count();

        $ditolak = UltraMikroPembiayaanHistory::where('status_id', 6)->count();

        $batalAkad = DB::table('pembiayaans')
            ->where('segmen', 'Ultra Mikro')
            ->where('status', 'Akad Batal')
            ->count();

        $jmlDisburse = $proposalSelesais->sum('nominal_pembiayaan');

        return view('analis::ultra_mikro.index', [
            'title' => 'Dashboard Analis',
            'proposalSelesais' => $proposalSelesais,
            'diterima' => $diterima,
            'proposalUltraMikro' => $proposalUltraMikro,
            'ditolak' => $ditolak,
            'review' => $review,
            'pipeline' => $pipeline,
            'batalAkad' => $batalAkad,
            'jmlDisburse' => $jmlDisburse,
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelPlafond',
            'dataPlafond',
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('analis::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('analis::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
