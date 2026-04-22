<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UmkmProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $latestSub = UmkmPembiayaanHistory::selectRaw('umkm_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('umkm_pembiayaan_id');

        $latestHistories = UmkmPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('umkm_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->get(['umkm_pembiayaan_histories.umkm_pembiayaan_id', 'status_id', 'jabatan_id']);

        $proposalIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 11 && $history->jabatan_id == 3)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->pluck('umkm_pembiayaan_id')->unique();

        $proposal = UmkmPembiayaan::with(['nasabahh', 'keteranganusaha', 'user'])
            ->whereIn('id', $proposalIds)
            ->when($search, fn($q) => $q->whereHas('nasabahh', fn($q2) => $q2->where('nama_nasabah', 'like', "%{$search}%")))
            ->orderBy('tgl_pembiayaan', 'desc')
            ->paginate(10)->withQueryString();

        $histories = $latestHistories->keyBy('umkm_pembiayaan_id');
        return view('kabag::umkm.proposal.index', [
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


        $data = UmkmPembiayaan::select('id', 'tgl_pembiayaan')->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_pembiayaan)->format('M');
        });

        $bulans = [];
        $hitungBulan = [];
        foreach ($data as $bulan => $values) {
            $bulans[] = $bulan;
            $hitungBulan[] = count($values);
        }

        $plafonds = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
            ->where('umkm_pembiayaan_histories.status_id', 9)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('umkm_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');


        $bulanplafonds = $plafonds->keys();
        $hitungPerBulan = $plafonds->values();

        $noas = UmkmPembiayaan::select(DB::raw("MONTHNAME(umkm_pembiayaans.tgl_pembiayaan) as nama_bulan, count(nasabah_id) as noa"))
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('umkm_pembiayaans.id', 'ASC')
            ->pluck('noa', 'nama_bulan');

        $bulannoas = $noas->keys();
        $noaPerBulan = $noas->values();


        $target1 = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select()
            ->where('umkm_pembiayaan_histories.status_id', 9)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();

        $cair = $target1->sum('nominal_pembiayaan');

        $latestSub = UmkmPembiayaanHistory::selectRaw('umkm_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('umkm_pembiayaan_id');

        $latestHistories = UmkmPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('umkm_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get(['umkm_pembiayaan_histories.umkm_pembiayaan_id', 'status_id', 'jabatan_id']);

        $proposal = $latestHistories->filter(function ($history) {
            return $history->status_id == 3 && $history->jabatan_id == 1;
        })->count();

        $reviewIds = UmkmPembiayaan::whereNotNull('sektor_id')->pluck('id');

        $review = $latestHistories
            ->whereIn('umkm_pembiayaan_id', $reviewIds)
            ->where('status_id', 7)
            ->count();

        $pipeline1 = $latestHistories->filter(function ($history) {
            return $history->status_id != 9 && !($history->status_id == 5 && $history->jabatan_id == 4);
        })->count();

        $diterima = $latestHistories->filter(function ($history) {
            return $history->status_id == 5 && $history->jabatan_id == 4;
        })->count();

        $ditolak = UmkmPembiayaanHistory::where('status_id', 6)->count();


        //   return $hitungPerBulan;
        return view('kabag::umkm.index', [
            'title' => 'Dashboard UMKM',
            'data' => $data,
            'bulans' => $bulans,
            'hitungBulan' => $hitungBulan,
            'plafond' => $hitungBulan,
            'labelplafonds' => $bulanplafonds,
            'dataplafonds' => $hitungPerBulan,
            'labelnoas' => $bulannoas,
            'datanoas' => $noaPerBulan,
            'target1' => $target1,
            'cair' => $cair,
            'proposal' => $proposal,
            'review' => $review,
            'pipeline1' => $pipeline1,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
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
        $pembiayaan = UmkmPembiayaan::with(['nasabahh', 'keteranganusaha', 'user'])->findOrFail($id);
        $nasabah = $pembiayaan->nasabahh;

        $history = UmkmPembiayaanHistory::with(['statushistory', 'jabatan'])
            ->where('umkm_pembiayaan_id', $id)
            ->latest('id')
            ->first();

        return view('kabag::proposal.show', [
            'title' => 'Detail Proposal UMKM',
            'segmentLabel' => 'UMKM',
            'indexUrl' => '/kabag/umkm/proposal',
            'history' => $history,
            'detailsNasabah' => [
                'Nama Nasabah' => optional($nasabah)->nama_nasabah,
                'NIK' => optional($nasabah)->nik,
                'Alamat' => optional($nasabah)->alamat,
            ],
            'detailsPembiayaan' => [
                'Nama Usaha' => optional($pembiayaan->keteranganusaha)->nama_usaha,
                'Nominal Pembiayaan' => $pembiayaan->nominal_pembiayaan ? 'Rp. ' . number_format($pembiayaan->nominal_pembiayaan, 0, ',', '.') : null,
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
