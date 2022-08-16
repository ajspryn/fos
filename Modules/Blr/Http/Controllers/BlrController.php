<?php

namespace Modules\Blr\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blr\Entities\Blr;
use Modules\Blr\Entities\BlrAktivaProduktif;
use Modules\Blr\Entities\BlrTotalAktivaProduktif;

class BlrController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('blr::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blr::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $hitung = Blr::select()->get()->count();
        $id = $hitung + 1;

        Blr::create([
            'id' => $id,

            'tahun' => request('tahun'),
            'blr_aktiva_produktif_id' => $id,
            'blr_total_aktiva_produktif_id' => $id,

        ]);

        BlrAktivaProduktif::create([
            'blr_id' => $id,
        ]);

        BlrTotalAktivaProduktif::create([
            'blr_id' => $id,
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blr::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blr::edit');
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
