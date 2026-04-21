<?php

namespace Modules\Analis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class SkpdProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $latestSub = SkpdPembiayaanHistory::selectRaw('skpd_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('skpd_pembiayaan_id');

        $latestHistories = SkpdPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('skpd_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->get([
                'skpd_pembiayaan_histories.skpd_pembiayaan_id',
                'status_id',
                'jabatan_id',
                'user_id',
            ]);

        $proposalIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 11 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->pluck('skpd_pembiayaan_id')->unique();

        $proposals = SkpdPembiayaan::with(['nasabah', 'instansi', 'golongan'])
            ->whereIn('id', $proposalIds)
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        $histories = $latestHistories->keyBy('skpd_pembiayaan_id');

        return view('analis::skpd.proposal.index', [
            'title' => 'Proposal SKPD',
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
        $pasars = SkpdPembiayaan::selectRaw('count(id) as total, created_at')->groupBy('created_at')->get();

        $labels = [];
        $datapasar = [];
        foreach ($pasars as $pasar) {
            $labels[] = $pasar['created_at'];
            $datapasar[] = $pasar['total'];
        }


        //piechart
        $rttotals = DB::table('skpd_instansis as jp')
            ->join('skpd_pembiayaans as pp', 'pp.skpd_instansi_id', '=', 'jp.id')
            ->select('jp.*', 'pp.*', DB::raw('count(*) as total_noa'))
            ->groupBy('pp.skpd_instansi_id')
            ->orderByDesc('total_noa')->limit(5)
            ->get();

        $plabel = [];
        $pdatainstansi = [];
        foreach ($rttotals as $rttotal) {
            $plabel[] = $rttotal->nama_instansi;
            $pdatainstansi[] = $rttotal->total_noa;
        }

        $plafonds = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(skpd_pembiayaans.tanggal_pengajuan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('skpd_pembiayaan_histories.jabatan_id', 4)
            ->where('skpd_pembiayaan_histories.status_id', 5)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('skpd_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');


        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();


        $data = SkpdPembiayaan::select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        $target1 = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select()
            ->where('skpd_pembiayaan_histories.jabatan_id', 4)
            ->where('skpd_pembiayaan_histories.status_id', 5)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->get();

        $latestSub = SkpdPembiayaanHistory::selectRaw('skpd_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('skpd_pembiayaan_id');

        $latestHistories = SkpdPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('skpd_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get([
            'skpd_pembiayaan_histories.skpd_pembiayaan_id',
            'status_id',
            'jabatan_id',
        ]);

        $proposalskpd = $latestHistories->filter(function ($history) {
            return ($history->status_id == 5 && $history->jabatan_id == 2)
                || ($history->status_id == 4 && $history->jabatan_id == 3);
        })->count();

        $diterima = SkpdPembiayaanHistory::where('status_id', 5)
            ->where('jabatan_id', 4)
            ->count();

        $ditolak = SkpdPembiayaanHistory::where('status_id', 6)->count();

        $revisi = SkpdPembiayaanHistory::where('status_id', 7)->count();

        $pipeline1 = $latestHistories->filter(function ($history) {
            return $history->status_id != 9
                && !($history->status_id == 5 && $history->jabatan_id == 4);
        })->count();

        $cair = $target1->sum('nominal_pembiayaan');

        $pipeline = SkpdPembiayaan::select()
            ->whereYear('tanggal_pengajuan', date('Y'))
            ->count();

        return view('analis::skpd.index', [
            'title' => 'Dasboard Analis SKPD',
            'labels' => $labels,
            'datainstansi' => $datapasar,
            'plabels' => $plabel,
            'pdatainstansis' => $pdatainstansi,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'target1' => $target1,
            'pipeline' => $pipeline,
            'proposalskpd' => $proposalskpd,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'revisi' => $revisi,
            'pipeline1' => $pipeline1,
            'cair' => $cair

        ]);
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
