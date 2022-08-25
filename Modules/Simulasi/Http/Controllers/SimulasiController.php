<?php

namespace Modules\Simulasi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
<<<<<<< Updated upstream:Modules/Form/Http/Controllers/KprController.php
=======
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmSlik;
>>>>>>> Stashed changes:Modules/Umkm/Http/Controllers/UmkmNasabahController.php

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('simulasi::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('simulasi::create');
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
<<<<<<< Updated upstream:Modules/Form/Http/Controllers/KprController.php
    {
<<<<<<< Updated upstream:Modules/Simulasi/Http/Controllers/SimulasiController.php
        return view('simulasi::show');
=======
        return view('form::show');
=======
    { 
        $data=UmkmPembiayaan::select()->where('nasabah_id',$id)->get()->first();
        $nasabah=UmkmNasabah::select()->where('id', $id)->get()->first();
       
        $jaminanlain=UmkmJaminan::select()->where('pasar_pembiayaan_id',$id)->get()->first();
        $tenor=$data->tenor;
        $harga=$data->harga;
        $rate=$data->rate;
        $margin=($rate*$tenor)/100;

        $harga1=$harga*$margin;
        $harga_jual=$harga1+$harga;

        $angsuran1=(int)($harga_jual/$tenor);
        return view('umkm::nasabah.lihat',[
            'title'=>'Nasabah',
            'pembiayaan'=>UmkmPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>UmkmNasabah::select()->where('id',$id)->get()->first(),
            'idebs'=>UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->get(),
            'fotodiri'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
        ]);
>>>>>>> Stashed changes:Modules/Umkm/Http/Controllers/UmkmNasabahController.php
>>>>>>> Stashed changes:Modules/Form/Http/Controllers/KprController.php
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('simulasi::edit');
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
