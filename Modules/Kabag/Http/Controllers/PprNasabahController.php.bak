<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Form\Entities\FormPprDataPekerjaan;
use Modules\Form\Entities\FormPprDataPribadi;
use Modules\Form\Entities\FormPprPembiayaan;

class PprNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('kabag::ppr.nasabah.index', [
            'title' => 'Data Nasabah PPR',
            'proposals' => FormPprDataPribadi::select()->get(),
        ]);
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
        $data = FormPprPembiayaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first();

        $nasabah = FormPprDataPribadi::select()->where('id', $id)->get()->first();
        $pekerjaan_nasabah = FormPprDataPekerjaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first();

        return view('kabag::ppr.nasabah.lihat', [
            'title' => 'Nasabah',
            'pembiayaan' => FormPprPembiayaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first(),
            'nasabah' => $nasabah,
            'pekerjaan_nasabah' => $pekerjaan_nasabah,
            'datas' => FormPprPembiayaan::select()->where('form_ppr_data_pribadi_id', $id)->get(),
            'histories' => FormPprPembiayaan::select()->where('form_ppr_data_pribadi_id', $id)->get(),
        ]);
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
