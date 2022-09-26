<?php

namespace Modules\Akad\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;

class CetakAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
    }

    public function showPasar($id)
    {
        $pembiayaan = PasarPembiayaan::select()->where('id', $id)->get()->first();
        $akad = $pembiayaan->akad_id;

        $data = PasarPembiayaan::select()->where('id', $id)->get()->first();

        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;
        $angsuran1 = (int)($harga_jual / $tenor);

        $nasabah = PasarNasabahh::select()->where('id', $data->nasabah_id)->get()->first();
        $usaha = PasarKeteranganUsaha::select()->where('pasar_pembiayaan_id', $id)->get()->first();
        $pasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->get()->first();
        $jaminanrumah = PasarLegalitasRumah::select()->where('pasar_pembiayaan_id', $id)->get()->first();
        $jaminan = PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->get()->first();
        $jenisjaminan = PasarJenisJaminan::select()->where('kode_jaminan', $jaminan->jaminanlain)->get()->first();
        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Akad_.doc',
        );

        if($akad==1)
        return Response::make(view('akad::murabahah.pasar', [
            'title' => 'Proposal Pasar',
            'segmen' => 'Pasar',
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->get()->first(),
            // 'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'nasabah' => $nasabah,
            'angsuran1' => $angsuran1,
            'jaminan' => $jenisjaminan,
            'no_ktb' => $jaminan->no_ktb,
            'now' => Carbon::now()->isoFormat('D MMMM Y'),
        ]), 200, $headers);

        else
        return Response::make(view('akad::ijarah.pasar', [
            'title' => 'Proposal Pasar',
            'segmen' => 'Pasar',
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->get()->first(),
            // 'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'nasabah' => $nasabah,
            'angsuran1' => $angsuran1,
            'jaminan' => $jenisjaminan,
            'no_ktb' => $jaminan->no_ktb,
            'now' => Carbon::now()->isoFormat('D MMMM Y'),
        ]), 200, $headers);
    }
    public function showUmkm($id)
    {
        $pembiayaan = UmkmPembiayaan::select()->where('id', $id)->get()->first();
        $akad = $pembiayaan->akad_id;

        $data = UmkmPembiayaan::select()->where('id', $id)->get()->first();

        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;
        $angsuran1 = (int)($harga_jual / $tenor);

        $nasabah = UmkmNasabah::select()->where('id', $data->nasabah_id)->get()->first();
        $usaha = UmkmKeteranganUsaha::select()->where('umkm_pembiayaan_id', $id)->get()->first();
        $jaminanrumah = UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id', $id)->get()->first();
        $jaminan = UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->get()->first();
        $jenisjaminan = PasarJenisJaminan::select()->where('kode_jaminan', $jaminan->jaminanlain)->get()->first();
        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Akad_.doc',
        );

        return Response::make(view('akad::murabahah.umkm', [
            'title' => 'Proposal UMKM',
            'segmen' => 'Umkm',
            'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->get()->first(),
            // 'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'nasabah' => $nasabah,
            'angsuran1' => $angsuran1,
            'jaminan' => $jenisjaminan,
            'no_ktb' => $jaminan->no_ktb,
            'now' => Carbon::now()->isoFormat('D MMMM Y'),
        ]), 200, $headers);


        // else
        //     return view('akad::ijarah.pasar', [
        //         'title' => 'Proposal Pasar',
        //         'segmen' => 'Pasar',
        //         'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->get()->first(),
        //         'usiaNasabah' => $usiaNasabah,
        //         'hargaJual' => $harga_jual,
        //         'nasabah' => $nasabah,
        //         'jaminan' => $jenisjaminan,
        //         'now' => Carbon::now()->isoFormat('D MMMM Y'),
        //         'angsuran1' => $angsuran1,
        //         'ktb' => $jaminan->no_ktb

        //     ]);
    }

    public function showSkpd($id)
    {
        $pembiayaan = SkpdPembiayaan::select()->where('id', $id)->get()->first();
        $akad = $pembiayaan->skpd_akad_id;

        $data = SkpdPembiayaan::select()->where('id', $id)->get()->first();

        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;
        $angsuran1 = (int)($harga_jual / $tenor);

        $nasabah = SkpdNasabah::select()->where('id', $data->nasabah_id)->get()->first();
        //Usia Nasabah
        // $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Skpd_Akad.doc',
        );


        // if($akad==1)
        return Response::make(view('akad::ijarah.skpd', [
            'title' => 'Proposal Skpd',
            'segmen' => 'Skpd',
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->get()->first(),
            // 'usiaNasabah' => $usiaNasabah,
            'hargaJual' => $harga_jual,
            'nasabah' => $nasabah,
            'angsuran1' => $angsuran1,
            'now' => Carbon::now()->isoFormat('D MMMM Y'),
        ]), 200, $headers);

    //    else
    //     return Response::make(view('akad::ijarah.skpd', [
    //         'title' => 'Proposal Skpd',
    //         'segmen' => 'Skpd',
    //         'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->get()->first(),
    //         // 'usiaNasabah' => $usiaNasabah,
    //         'hargaJual' => $harga_jual,
    //         'nasabah' => $nasabah,
    //         'angsuran1' => $angsuran1,
    //         'now' => Carbon::now()->isoFormat('D MMMM Y'),
    //     ]), 200, $headers);

    }
    public function showPpr($id)
    {

        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();
        // //Angsuran & Plafond
        // $plafond = $pembiayaan->form_permohonan_nilai_ppr_dimohon;
        // // $margin = $pembiayaan->form_permohonan_jml_margin / 100;
        // $margin = 0.9 / 100;
        // $tenor = $pembiayaan->form_permohonan_jml_bulan;

        // //Angsuran
        // $angsuran = ($plafond * $margin) / (1 - (1 / (1 + $margin)) ** $tenor);

        // //Plafond
        // $plafondMaks = ($angsuran / $margin) * (1 - (1 / (1 + $margin)) ** $tenor);

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir)->age;
        return view('akad::proposal.lihat', [
            'title' => 'Proposal PPR',
            'segmen' => 'PPR',
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            // 'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            // 'angsuran' => $angsuran,
            // 'plafondMaks' => $plafondMaks,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('akad::create');
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
        return view('akad::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('akad::edit');
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
