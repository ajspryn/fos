<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class KabagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //Proposal
        $pasarproposal = PasarPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $skpdproposal = SkpdPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $umkmproposal = UmkmPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pprproposal = PprPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();

        //Diterima (Selesai Akad)
        $pasarditerima = Pembiayaan::select()->where('segmen', 'Pasar')->where('status', 'Selesai Akad')->get()->count();
        $skpdditerima = Pembiayaan::select()->where('segmen', 'SKPD')->where('status', 'Selesai Akad')->get()->count();
        $umkmditerima = Pembiayaan::select()->where('segmen', 'UMKM')->where('status', 'Selesai Akad')->get()->count();
        $pprditerima = Pembiayaan::select()->where('segmen', 'PPR')->where('status', 'Selesai Akad')->get()->count();

        //Ditolak
        $pasarditolak = PasarPembiayaanHistory::select()->latest()->where('status_id', 6)->get()->count();
        $skpdditolak = SkpdPembiayaanHistory::select()->latest()->where('status_id', 6)->get()->count();
        $umkmditolak = UmkmPembiayaanHistory::select()->latest()->where('status_id', 6)->get()->count();
        $pprditolak = PprPembiayaanHistory::select()->latest()->where('status_id', 6)->get()->count();

        //Batal Akad
        $pasarBatal = Pembiayaan::select()->where('segmen', 'Pasar')->where('status', 'Akad Batal')->get()->count();
        $skpdBatal = Pembiayaan::select()->where('segmen', 'SKPD')->where('status', 'Akad Batal')->get()->count();
        $umkmBatal = Pembiayaan::select()->where('segmen', 'UMKM')->where('status', 'Akad Batal')->get()->count();
        $pprBatal = Pembiayaan::select()->where('segmen', 'PPR')->where('status', 'Akad Batal')->get()->count();

        //Review
        $komites = UmkmPembiayaan::select()
            ->whereNotNull('sektor_id')
            ->orderby('updated_at', 'desc')
            ->get();

        $umkmreview = 0;
        foreach ($komites as $komite) {
            $history = UmkmPembiayaanHistory::select()
                ->where('umkm_pembiayaan_id', $komite->id)
                ->orderby('created_at', 'desc')
                ->get()
                ->first();
            $proposal_pasar = UmkmPembiayaan::select()
                ->where('id', $history->umkm_pembiayaan_id)
                ->get()
                ->first();
            if ($history->status_id == 7) {
                $umkmreview++;
            }
        }

        $pasars = PasarPembiayaan::select()
            ->whereNotNull('sektor_id')
            ->orderby('updated_at', 'desc')
            ->get();

        $pasarreview = 0;
        foreach ($pasars as $pasar) {
            $history = PasarPembiayaanHistory::select()
                ->where('pasar_pembiayaan_id', $pasar->id)
                ->orderby('created_at', 'desc')
                ->get()
                ->first();
            $proposal_pasar = PasarPembiayaan::select()
                ->where('id', $history->pasar_pembiayaan_id)
                ->get()
                ->first();
            if ($history->status_id == 7) {
                $pasarreview++;
            }
        }

        $skpds = SkpdPembiayaan::select()
            ->whereNotNull('skpd_sektor_ekonomi_id')
            ->orderby('updated_at', 'desc')
            ->get();

        $skpdreview = 0;
        foreach ($skpds as $skpd) {
            $history = SkpdPembiayaanHistory::select()
                ->where('skpd_pembiayaan_id', $skpd->id)
                ->orderby('created_at', 'desc')
                ->get()
                ->first();
            $proposal_pasar = SkpdPembiayaan::select()
                ->where('id', $history->skpd_pembiayaan_id)
                ->get()
                ->first();
            if ($history->status_id == 7) {
                $skpdreview++;
            }
        }

        $pprs = FormPprPembiayaan::select()
            ->get();

        $pprreview = 0;
        foreach ($pprs as $ppr) {
            $history = PprPembiayaanHistory::select()
                ->where('form_ppr_pembiayaan_id', $ppr->id)
                ->latest()
                ->get()
                ->first();

            $proposal_ppr = FormPprPembiayaan::select()
                ->where('id', $history->form_ppr_pembiayaan_id)
                ->get()
                ->first();

            if ($history->status_id == 7) {
                $pprreview++;
            }
        }

        $cairpasar = PasarPembiayaan::join('pasar_pembiayaan_histories', 'pasar_pembiayaans.id', '=', 'pasar_pembiayaan_histories.pasar_pembiayaan_id')
            ->select()
            ->where('pasar_pembiayaan_histories.status_id', 9)
            ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();


        $cairumkm = UmkmPembiayaan::join('umkm_pembiayaan_histories', 'umkm_pembiayaans.id', '=', 'umkm_pembiayaan_histories.umkm_pembiayaan_id')
            ->select()
            ->where('umkm_pembiayaan_histories.status_id', 9)
            ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
            ->get();

        $cairskpd = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select()
            ->where('skpd_pembiayaan_histories.jabatan_id', 4)
            ->where('skpd_pembiayaan_histories.status_id', 5)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->get();

        $cairskpd = SkpdPembiayaan::join('skpd_pembiayaan_histories', 'skpd_pembiayaans.id', '=', 'skpd_pembiayaan_histories.skpd_pembiayaan_id')
            ->select()
            ->where('skpd_pembiayaan_histories.status_id', 9)
            ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
            ->get();

        $cairppr = FormPprPembiayaan::join('ppr_pembiayaan_histories', 'form_ppr_pembiayaans.id', '=', 'ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
            ->select()
            ->where('ppr_pembiayaan_histories.status_id', 9)
            ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
            ->get();

        //Query Chart Proposal Per Bulan
        $proposalPerBulan = Pembiayaan::where('status', 'Selesai Akad')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'nama_bulan');

        $bulans = $proposalPerBulan->keys();
        $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Proposal Per Segmen
        $proposalPerSegmen = Pembiayaan::where('status', 'Selesai Akad')
            ->select('segmen', DB::raw("COUNT('id') as count"))
            ->groupBy('segmen')
            ->pluck('count', 'segmen');

        $labelSegmen = $proposalPerSegmen->keys();
        $dataSegmen = $proposalPerSegmen->values();

        //Query Chart Disburse Per Bulan
        $disbursePerBulan = Pembiayaan::where('status', 'Selesai Akad')
            ->select(DB::raw("MONTHNAME(created_at) as nama_bulan, sum(plafond) as jml_disburse"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_bulan"))
            ->orderBy('id', 'ASC')
            ->pluck('jml_disburse', 'nama_bulan');

        //Query Chart Disburse Per Bulan
        // $disbursePerBulan = Pembiayaan::where('status', 'Selesai Akad')
        // ->select(DB::raw("MONTHNAME(created_at) as nama_bulan, sum(plafond) as jml_disburse"))
        // ->whereYear('created_at', date('Y'))
        // ->groupBy(DB::raw("nama_bulan"))
        // ->orderBy('id', 'ASC')
        // ->pluck('jml_disburse', 'nama_bulan');

        $labelDisburse = $disbursePerBulan->keys();
        $dataDisburse = $disbursePerBulan->values();

        return view('kabag::index', [
            'title' => 'Dashboard Kabag',
            'proposal' => $pasarproposal + $skpdproposal + $umkmproposal + $pprproposal,
            'diterima' => $pasarditerima + $skpdditerima + $umkmditerima + $pprditerima,
            'ditolak' => $pasarditolak + $skpdditolak + $umkmditolak + $pprditolak,
            'batalAkad' => $pasarBatal + $skpdBatal + $umkmBatal + $pprBatal,
            'review' => $pasarreview + $skpdreview + $umkmreview + $pprreview,
            'cairpasars' => $cairpasar,
            'cairumkms' => $cairumkm,
            'cairskpds' => $cairskpd,
            'cairpprs' => $cairppr,
        ], compact(
            'bulans',
            'hitungPerBulan',
            'labelSegmen',
            'dataSegmen',
            'labelDisburse',
            'dataDisburse'
        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('kabag::create');
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
        return view('kabag::show');
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
