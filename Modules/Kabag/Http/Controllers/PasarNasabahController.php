<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarSlik;

class PasarNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('kabag::pasar.nasabah.index',[
            'title'=>'Nasabah',
            'proposals'=>PasarNasabahh::select()->get(),]);
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
    public function show($id) {
    $data=PasarPembiayaan::select()->where('nasabah_id',$id)->get()->first();
    $nasabah=PasarNasabahh::select()->where('id', $id)->get()->first();
   
    $jaminanlain=PasarJaminan::select()->where('pasar_pembiayaan_id',$id)->get()->first();
    $tenor=$data->tenor;
    $harga=$data->harga;
    $rate=$data->rate;
    $margin=($rate*$tenor)/100;

    $harga1=$harga*$margin;
    $harga_jual=$harga1+$harga;

    $angsuran1=(int)($harga_jual/$tenor);

    return view('kabag::pasar.nasabah.lihat',[
        'title'=>'Nasabah',
        'pembiayaan'=>PasarPembiayaan::select()->where('nasabah_id',$id)->get()->first(),
        'nasabah'=>$nasabah,
        'datas'=>PasarPembiayaan::select()->where('nasabah_id',$id)->get(),
        // 'history'=PasarNasabahh::select()->where('no_ktp'),
        'idebs'=>PasarSlik::select()->where('pasar_pembiayaan_id',$id)->get(),
        'fotodiri'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
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
