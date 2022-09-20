<?php

namespace Modules\Dirbis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Form\Entities\SkpdPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaan;

class DirbisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pasarproposal = PasarPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $skpdproposal = SkpdPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $umkmproposal = UmkmPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pprproposal = PprPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pasarditerima = PasarPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $skpdditerima = SkpdPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $umkmditerima = UmkmPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $pprditerima = PprPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $pasarditolak = PasarPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $skpdditolak = SkpdPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $umkmditolak = UmkmPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $pprditolak = PprPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $pasarreview = PasarPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        $skpdreview = SkpdPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        $umkmreview = UmkmPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        $pprreview = PprPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();

        $cairpasar = PasarPembiayaan::join('pasar_pembiayaan_histories','pasar_pembiayaans.id','=','pasar_pembiayaan_histories.pasar_pembiayaan_id')
        ->select()
        ->where('pasar_pembiayaan_histories.jabatan_id', 4)
        ->where('pasar_pembiayaan_histories.status_id', 5)
        ->whereYear('pasar_pembiayaans.tgl_pembiayaan', date('Y'))
        ->get();

        
        $cairumkm = UmkmPembiayaan::join('umkm_pembiayaan_histories','umkm_pembiayaans.id','=','umkm_pembiayaan_histories.umkm_pembiayaan_id')
        ->select()
        ->where('umkm_pembiayaan_histories.jabatan_id', 4)
        ->where('umkm_pembiayaan_histories.status_id', 5)
        ->whereYear('umkm_pembiayaans.tgl_pembiayaan', date('Y'))
        ->get();


        
        $cairskpd = SkpdPembiayaan::join('skpd_pembiayaan_histories','skpd_pembiayaans.id','=','skpd_pembiayaan_histories.skpd_pembiayaan_id')
        ->select()
        ->where('skpd_pembiayaan_histories.jabatan_id', 4)
        ->where('skpd_pembiayaan_histories.status_id', 5)
        ->whereYear('skpd_pembiayaans.tanggal_pengajuan', date('Y'))
        ->get();

        $cairppr = FormPprPembiayaan::join('ppr_pembiayaan_histories','form_ppr_pembiayaans.id','=','ppr_pembiayaan_histories.form_ppr_pembiayaan_id')
        ->select()
        ->where('ppr_pembiayaan_histories.jabatan_id', 4)
        ->where('ppr_pembiayaan_histories.status_id', 5)
        ->whereYear('form_ppr_pembiayaans.created_at', date('Y'))
        ->get();
        return view('dirbis::index', [
            'title' => 'Dasboard Direksi',
            'proposal' => $pasarproposal + $skpdproposal + $umkmproposal + $pprproposal,
            'diterima' => $pasarditerima + $skpdditerima + $umkmditerima + $pprditerima,
            'tolak' => $pasarditolak + $skpdditolak + $umkmditolak + $pprditolak,
            'review' => $pasarreview + $skpdreview + $umkmreview + $pprreview,
            'cairpasars'=>$cairpasar,
            'cairumkms'=>$cairumkm,
            'cairskpds'=>$cairskpd,
            'cairpprs'=>$cairppr,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dirbis::create');
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
