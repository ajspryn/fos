<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Admin\Entities\PasarJaminanRumahh;

class PasarJaminanRumahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::pasar.Jaminan_rumah.index',[
            'title'=>'Pengaturan Jaminan Rumah Pasar',
            'rumahs'=>PasarJaminanRumahh::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request -> validate([
            'kode_jaminan'=> 'required',
            'nama_jaminan'=> 'required',
            'rating'=> 'required',
            'bobot'=> 'required',
        ]);

        $input=$request->all();

        PasarJaminanRumahh::create($input);
        return redirect()->back()->with('success', 'Data Akad Berhasil Ditambahkan');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
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