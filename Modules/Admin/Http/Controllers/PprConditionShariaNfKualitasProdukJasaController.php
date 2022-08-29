<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\PprConditionShariaNfKualitasProdukJasa;

class PprConditionShariaNfKualitasProdukJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::ppr.non_fixed_income.condition_sharia.kualitas_produk_jasa.index', [
            'title' => 'Pengaturan Condition & Sharia Non Fixed Income Kualitas Produk dan Jasa',
            'condition_sharia_nf_kualitas_produk_jasas' => PprConditionShariaNfKualitasProdukJasa::all(),
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
        $request->validate([
            'kode' => 'required',
            'keterangan' => 'required',
            'rating' => 'required',
            'bobot' => 'required',
        ]);

        $input = $request->all();

        PprConditionShariaNfKualitasProdukJasa::create($input);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan!');
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
