<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        DB::enableQueryLog();

        // $proposal = P3kPembiayaanHistory::select()
        //     ->latest()
        //     ->groupBy('p3k_pembiayaan_id')
        //     ->where(function ($query) {
        //         $query
        //             ->where('status_id', 3)
        //             ->where('jabatan_id', 1);
        //     })
        //     ->orWhere(function ($query) {
        //         $query
        //             ->where('status_id', 4)
        //             ->where('jabatan_id', 3)
        //             ->where('user_id', Auth::user()->id);
        //     })
        //     ->get();

        // $proposals = P3kPembiayaanHistory::with(['p3kPembiayaan.nasabah.pekerjaan'])
        //     ->where(function ($query) {
        //         $query->where('status_id', 3)
        //             ->where('jabatan_id', 1);
        //     })
        //     ->orWhere(function ($query) {
        //         $query->where('status_id', 4)
        //             ->where('jabatan_id', 3)
        //             ->where('user_id', Auth::user()->id);
        //     })
        //     ->latest()
        //     ->groupBy('p3k_pembiayaan_id')
        //     ->get();

        //optimize?
        $latestHistories = P3kPembiayaanHistory::select('id', 'p3k_pembiayaan_id')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MAX(id)'))
                    ->from('p3k_pembiayaan_histories')
                    ->groupBy('p3k_pembiayaan_id');
            });

        $proposals = P3kPembiayaanHistory::with(['p3kPembiayaan.nasabah.pekerjaan'])
            ->joinSub($latestHistories, 'latest_histories', function ($join) {
                $join->on('p3k_pembiayaan_histories.id', '=', 'latest_histories.id');
            })
            ->where(function ($query) {
                $query->where('status_id', 3)
                    ->where('jabatan_id', 1);
            })
            ->orWhere(function ($query) {
                $query->where('status_id', 4)
                    ->where('jabatan_id', 3);
            })
            ->latest('p3k_pembiayaan_histories.updated_at')
            ->get();

        // dd(DB::getQueryLog());
        // Log::info(DB::getQueryLog());

        // $proposal = P3kPembiayaanHistory::select()
        // ->latest()
        // ->groupBy('p3k_pembiayaan_id')
        // ->where(function ($query) {
        //     $query
        //         ->where('status_id', 5)
        //         ->where('jabatan_id', 2);
        // })
        // ->orWhere(function ($query) {
        //     $query
        //         ->where('status_id', 4)
        //         ->where('jabatan_id', 3)
        //         ->where('user_id', Auth::user()->id);
        // })
        // ->get();

        return view('analis::p3k.proposal.index', [
            'title' => 'Proposal P3K',
            'proposals' => $proposals,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        //Query Chart Proposal Per Bulan
        $proposalPerBulan = P3kPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Plafond Per Bulan
        $plafondPerBulan = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(p3k_pembiayaans.created_at) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->whereYear('p3k_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('p3k_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $labelPlafond = $plafondPerBulan->keys();
        $dataPlafond = $plafondPerBulan->values();

        //Proposal Berhasil Akad
        $proposalSelesais = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select()
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->get();

        $latestSub = P3kPembiayaanHistory::selectRaw('p3k_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('p3k_pembiayaan_id');

        $latestHistories = P3kPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('p3k_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get([
            'p3k_pembiayaan_histories.p3k_pembiayaan_id',
            'status_id',
            'jabatan_id',
            'user_id',
        ]);

        $diterima = DB::table('pembiayaans')
            ->where('segmen', 'P3K')
            ->where('status', 'Selesai Akad')
            ->count();

        $batalAkad = DB::table('pembiayaans')
            ->where('segmen', 'P3K')
            ->where('status', 'Akad Batal')
            ->count();

        $proposalP3k = $latestHistories->filter(function ($history) {
            return ($history->status_id == 3 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->count();

        $reviewIds = P3kPembiayaan::where('user_id', Auth::user()->id)
            ->whereNotNull('dokumen_ideb')
            ->pluck('id');

        $review = $latestHistories->whereIn('p3k_pembiayaan_id', $reviewIds)
            ->filter(function ($history) {
                return $history->status_id == 7;
            })->count();

        $pipeline = $latestHistories->filter(function ($history) {
            return $history->status_id < 9
                && !($history->status_id == 5 && $history->jabatan_id == 2);
        })->count();

        $ditolak = P3kPembiayaanHistory::where('status_id', 6)->count();

        $jmlDisburse = $proposalSelesais->sum('nominal_pembiayaan');
        $jmlMargin = $proposalSelesais->sum('harga_margin');

        return view('analis::p3k.index', [
            'title' => 'Dashboard Analis',
            'proposalSelesais' => $proposalSelesais,
            'diterima' => $diterima,
            'proposalP3k' => $proposalP3k,
            'ditolak' => $ditolak,
            'review' => $review,
            'pipeline' => $pipeline,
            'batalAkad' => $batalAkad,
            'jmlDisburse' => $jmlDisburse,
            'jmlMargin' => $jmlMargin,
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
