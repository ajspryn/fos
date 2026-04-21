<?php

namespace Modules\Dirbis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UmkmNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dirbis::umkm.nasabah.index', [
            'title' => 'Nasabah',
            'proposals' => UmkmNasabah::select()->get(),
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
        $data = UmkmPembiayaan::select()->where('nasabah_id', $id)->first();
        $nasabah = UmkmNasabah::select()->where('id', $id)->first();

        $jaminanlain = UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->first();
        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = (int)($harga_jual / $tenor);

        return view('dirbis::umkm.nasabah.lihat', [
            'title' => 'Nasabah',
            'pembiayaan' => UmkmPembiayaan::select()->where('nasabah_id', $id)->first(),
            'nasabah' => $nasabah,
            'datas' => UmkmPembiayaan::select()->where('nasabah_id', $id)->get(),
            // 'history'=PasarNasabahh::select()->where('no_ktp'),
            'fotodiri' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'angsuran' => $angsuran1,
            // 'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->first(),
        ]);
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
