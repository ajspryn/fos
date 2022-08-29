<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;

class UmkmNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('analis::umkm.nasabah.index',[
            'title'=>'Nasabah',
            'proposals'=>UmkmNasabah::select()->get(),]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('analis::create');
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
        $data=UmkmPembiayaan::select()->where('nasabah_id',$id)->get()->first();
        $nasabah=UmkmNasabah::select()->where('id', $id)->get()->first();
       
        $jaminanlain=UmkmJaminan::select()->where('umkm_pembiayaan_id',$id)->get()->first();
        $tenor=$data->tenor;
        $harga=$data->harga;
        $rate=$data->rate;
        $margin=($rate*$tenor)/100;

        $harga1=$harga*$margin;
        $harga_jual=$harga1+$harga;

        $angsuran1=(int)($harga_jual/$tenor);

        return view('analis::umkm.nasabah.lihat',[
            'title'=>'Nasabah',
            'pembiayaan'=>UmkmPembiayaan::select()->where('nasabah_id',$id)->get()->first(),
            'nasabah'=>$nasabah,
            'datas'=>UmkmPembiayaan::select()->where('nasabah_id',$id)->get(),
            // 'history'=PasarNasabahh::select()->where('no_ktp'),
            'fotodiri'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'angsuran'=>$angsuran1,
            'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first(),
        ]);
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
