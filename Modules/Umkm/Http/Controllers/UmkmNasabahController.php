<?php

namespace Modules\Umkm\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmSlik;

class UmkmNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('umkm::nasabah.index',[
            'title'=>'Nasabah',
            'proposals'=>UmkmPembiayaan::select()->get(),]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('umkm::create');
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
        return view('umkm::nasabah.lihat',[
            'title'=>'Nasabah',
            'pembiayaan'=>UmkmPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>UmkmNasabah::select()->where('id',$id)->get()->first(),
            'idebs'=>UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->get(),
            'fotodiri'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('umkm::edit');
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
