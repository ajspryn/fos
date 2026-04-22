<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;

class PasarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $latestSub = PasarPembiayaanHistory::selectRaw('pasar_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('pasar_pembiayaan_id');

        $latestHistories = PasarPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('pasar_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->get(['pasar_pembiayaan_histories.pasar_pembiayaan_id', 'status_id', 'jabatan_id']);

        $proposalIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 3 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->pluck('pasar_pembiayaan_id')->unique();

        $proposal = PasarPembiayaan::with(['nasabahh', 'keteranganusaha.jenispasar', 'user'])
            ->whereIn('id', $proposalIds)
            ->when($search, fn($q) => $q->whereHas('nasabahh', fn($q2) => $q2->where('nama_nasabah', 'like', "%{$search}%")))
            ->orderBy('tgl_pembiayaan', 'desc')
            ->paginate(10)->withQueryString();

        $histories = $latestHistories->keyBy('pasar_pembiayaan_id');
        return view('kabag::pasar.proposal.index', [
            'title' => 'Data Nasabah',
            'proposals' => $proposal,
            'histories' => $histories,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = PasarPembiayaan::select('id', 'tgl_pembiayaan')->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_pembiayaan)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        $pasars = PasarPembiayaan::selectRaw('count(id) as total, created_at')->groupBy('created_at')->get();

        $labels = [];
        $datapasar = [];
        foreach ($pasars as $pasar) {
            $labels[] = $pasar['created_at'];
            $datapasar[] = $pasar['total'];
        }


        //piechart 
        $rttotals = DB::table('pasar_jenis_pasars as jp')
            ->join('pasar_keterangan_usahas as pk', 'pk.jenispasar_id', '=', 'jp.id')
            ->join('pasar_pembiayaans as pp', 'pp.id', '=', 'pk.pasar_pembiayaan_id')
            ->select('jp.*', 'pk.*', 'pp.*', DB::raw('count(*) as total_noa'))
            ->groupBy('pk.jenispasar_id')
            ->get();

        $plabel = [];
        $pdatapasar = [];
        foreach ($rttotals as $rttotal) {
            $plabel[] = $rttotal->nama_pasar;
            $pdatapasar[] = $rttotal->total_noa;
        }
        $plafonds = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(pasar_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(harga) as jml_plafond"))
            ->where('pasar_pembiayaan_histories.status_id', 9)
            ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('pasar_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');


        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();


        $target1 = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select()
            ->where('pasar_pembiayaan_histories.status_id', 9)
            ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();

        $cair = $target1->sum('harga');

        $latestSub = PasarPembiayaanHistory::selectRaw('pasar_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('pasar_pembiayaan_id');

        $latestHistories = PasarPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('pasar_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get(['pasar_pembiayaan_histories.pasar_pembiayaan_id', 'status_id', 'jabatan_id']);

        $proposal = $latestHistories->filter(function ($history) {
            return ($history->status_id == 3 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->count();

        $reviewIds = PasarPembiayaan::whereNotNull('sektor_id')->pluck('id');

        $review = $latestHistories
            ->whereIn('pasar_pembiayaan_id', $reviewIds)
            ->where('status_id', 7)
            ->count();

        $pipeline1 = $latestHistories->filter(function ($history) {
            return $history->status_id != 9 && !($history->status_id == 5 && $history->jabatan_id == 4);
        })->count();

        $diterima = PasarPembiayaanHistory::where('status_id', 5)
            ->where('jabatan_id', 4)
            ->count();

        $ditolak = PasarPembiayaanHistory::where('status_id', 6)->count();

        $pipeline = PasarPembiayaan::whereYear('tgl_pembiayaan', date('Y'))
            ->count();

        // $pasars = PasarPembiayaanHistory::select()->whereNotIn('jabatan_id' == 4)->whereNotIn('status_id' == 5)->orderby('created_at','desc')->get();
        // return (  $pasars);
        return view('kabag::pasar.index', [
            'title' => 'Dashboard Pasar',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'labels' => $labels,
            'datapasar' => $datapasar,
            'plabels' => $plabel,
            'pdatapasars' => $pdatapasar,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
            'target1' => $target1,
            'cair' => $cair,
            'proposal' => $proposal,
            'review' => $review,
            'pipeline1' => $pipeline1,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'pipeline' => $pipeline,

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
        $pembiayaan = PasarPembiayaan::with(['nasabahh', 'keteranganusaha.jenispasar', 'user'])->findOrFail($id);
        $nasabah = $pembiayaan->nasabahh;

        $history = PasarPembiayaanHistory::with(['statushistory', 'jabatan'])
            ->where('pasar_pembiayaan_id', $id)
            ->latest('id')
            ->first();

        return view('kabag::proposal.show', [
            'title' => 'Detail Proposal Pasar',
            'segmentLabel' => 'Pasar',
            'indexUrl' => '/kabag/pasar/proposal',
            'history' => $history,
            'detailsNasabah' => [
                'Nama Nasabah' => optional($nasabah)->nama_nasabah,
                'NIK' => optional($nasabah)->nik,
                'Alamat' => optional($nasabah)->alamat,
            ],
            'detailsPembiayaan' => [
                'Nama Kios / Los' => optional($pembiayaan->keteranganusaha)->nama_usaha,
                'Alamat Pasar' => optional(optional($pembiayaan->keteranganusaha)->jenispasar)->nama_pasar,
                'Nominal Pembiayaan' => $pembiayaan->harga ? 'Rp. ' . number_format($pembiayaan->harga, 0, ',', '.') : null,
                'Tanggal Pengajuan' => $pembiayaan->tgl_pembiayaan,
                'AO Yang Menangani' => optional($pembiayaan->user)->name,
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('kabag::edit');
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
