<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Illuminate\Support\Facades\DB;
use Modules\Ppr\Entities\PprPembiayaanHistory;

class PprProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $latestSub = PprPembiayaanHistory::selectRaw('form_ppr_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('form_ppr_pembiayaan_id');

        $latestHistories = PprPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ppr_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get(['ppr_pembiayaan_histories.form_ppr_pembiayaan_id', 'status_id', 'jabatan_id', 'user_id']);

        $proposalIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 11 && $history->jabatan_id == 3)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->pluck('form_ppr_pembiayaan_id')->unique();

        $proposals = FormPprPembiayaan::with(['pemohon', 'user'])
            ->whereIn('id', $proposalIds)
            ->orderBy('created_at', 'desc')
            ->get();

        $histories = $latestHistories->keyBy('form_ppr_pembiayaan_id');

        return view('kabag::ppr.proposal.index', [
            'title' => 'Proposal PPR',
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
        $proposalPerBulan = FormPprPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Plafond Per Bulan
        $plafondPerBulan = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select(DB::raw("MONTHNAME(form_ppr_pembiayaans.created_at) as nama_bulan, sum(form_permohonan_nilai_ppr_dimohon) as jml_plafond"))
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('form_ppr_pembiayaans.id', 'ASC')
            ->pluck('jml_plafond', 'nama_bulan');

        $labelPlafond = $plafondPerBulan->keys();
        $dataPlafond = $plafondPerBulan->values();

        //Query Chart Jenis Nasabah
        $jenisNasabah = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select('jenis_nasabah', DB::raw("COUNT('id') as count"))
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->groupBy('jenis_nasabah')
            ->pluck('count', 'jenis_nasabah');

        $labelJenisNasabah = $jenisNasabah->keys();
        $dataJenisNasabah = $jenisNasabah->values();

        //Query Chart NOA Proyek Perumahan
        $noaProyekPerumahan = FormPprPembiayaan::join('form_ppr_data_agunans', 'form_ppr_pembiayaans.id', '=', 'form_ppr_data_agunans.form_ppr_pembiayaan_id')
            ->join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select(DB::raw('COUNT(form_agunan_1_nama_proyek_perumahan) as proyek_perumahan, form_agunan_1_nama_proyek_perumahan, COUNT(form_ppr_data_pribadi_id) as noa'))
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->groupBy('form_agunan_1_nama_proyek_perumahan')
            ->pluck('proyek_perumahan', 'form_agunan_1_nama_proyek_perumahan');

        $labelNoaProyekPerumahan = $noaProyekPerumahan->keys();
        $dataNoaProyekPerumahan = $noaProyekPerumahan->values();

        //Proposal Berhasil Akad
        $proposalSelesais = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select()
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->get();

        $jmlDisburse = $proposalSelesais->sum('form_permohonan_nilai_ppr_dimohon');
        $jmlMargin = $proposalSelesais->sum('form_permohonan_jml_margin');

        $latestSub = PprPembiayaanHistory::selectRaw('form_ppr_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('form_ppr_pembiayaan_id');

        $latestHistories = PprPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ppr_pembiayaan_histories.id', '=', 'lh.latest_id');
        })->get(['ppr_pembiayaan_histories.form_ppr_pembiayaan_id', 'status_id', 'jabatan_id']);

        $proposalppr = $latestHistories->filter(function ($history) {
            return ($history->status_id == 11 && $history->jabatan_id == 3)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->count();

        $pipeline = $latestHistories->filter(function ($history) {
            return $history->status_id < 9 && !($history->status_id == 5 && $history->jabatan_id == 3);
        })->count();

        $reviewIds = FormPprPembiayaan::where('user_id', Auth::id())
            ->whereNotNull('dilengkapi_ao')
            ->pluck('id');

        $review = $latestHistories
            ->whereIn('form_ppr_pembiayaan_id', $reviewIds)
            ->where('status_id', 7)
            ->count();

        $diterima = Pembiayaan::where('segmen', 'PPR')
            ->where('status', 'Selesai Akad')
            ->count();

        $ditolak = PprPembiayaanHistory::where('status_id', 6)->count();

        $batalAkad = Pembiayaan::where('segmen', 'PPR')
            ->where('status', 'Akad Batal')
            ->count();

        return view('kabag::ppr.index', [
            'title' => 'Dashboard Kabag',
            'proposalSelesais' => $proposalSelesais,
            'jmlDisburse' => $jmlDisburse,
            'jmlMargin' => $jmlMargin,
            'proposalppr' => $proposalppr,
            'pipeline' => $pipeline,
            'review' => $review,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'batalAkad' => $batalAkad,
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelPlafond',
            'dataPlafond',
            'labelJenisNasabah',
            'dataJenisNasabah',
            'labelNoaProyekPerumahan',
            'dataNoaProyekPerumahan'
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
        $proposal = FormPprPembiayaan::with(['pemohon', 'user'])->findOrFail($id);

        $history = PprPembiayaanHistory::with(['statushistory', 'jabatan'])
            ->where('form_ppr_pembiayaan_id', $id)
            ->latest('id')
            ->first();

        $pemohon = $proposal->pemohon;

        return view('kabag::proposal.show', [
            'title' => 'Detail Proposal PPR',
            'segmentLabel' => 'PPR',
            'indexUrl' => '/kabag/ppr/proposal',
            'history' => $history,
            'detailsNasabah' => [
                'Jenis Nasabah' => $proposal->jenis_nasabah,
                'Nama Pemohon' => optional($pemohon)->form_pribadi_pemohon_nama_lengkap,
                'NIK' => optional($pemohon)->form_pribadi_pemohon_no_ktp,
            ],
            'detailsPembiayaan' => [
                'Tanggal Pengajuan' => optional($proposal->created_at)->format('d-m-Y'),
                'Nilai yang Dimohon' => $proposal->form_permohonan_nilai_ppr_dimohon ? 'Rp. ' . number_format($proposal->form_permohonan_nilai_ppr_dimohon, 0, ',', '.') : null,
                'Jangka Waktu' => $proposal->form_permohonan_jangka_waktu_ppr ? $proposal->form_permohonan_jangka_waktu_ppr . ' Tahun' : null,
                'Jangka Waktu (Bulan)' => $proposal->form_permohonan_jml_bulan ? $proposal->form_permohonan_jml_bulan . ' Bulan' : null,
                'AO Yang Menangani' => optional($proposal->user)->name,
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
