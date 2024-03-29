<?php

namespace Modules\Dirbis\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
        $proposal = PprPembiayaanHistory::select()
            ->latest()
            ->groupBy('form_ppr_pembiayaan_id')
            ->where(function ($query) {
                $query
                    ->where('status_id', '<', 5)
                    ->where('jabatan_id', '<', 4);
            })
            ->get();
        return view('dirbis::ppr.proposal.index', [
            'title' => 'Proposal PPR',
            'proposals' => $proposal,
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

        return view('dirbis::ppr.index', [
            'title' => 'Dashboard Direktur Bisnis',
            'proposalSelesais' => $proposalSelesais,
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
        return view('dirbis::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirbis::edit');
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
