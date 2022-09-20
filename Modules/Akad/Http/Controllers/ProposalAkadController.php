<?php

namespace Modules\Akad\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class ProposalAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {   
        $proposalpasar=PasarPembiayaanHistory::select()->where('status_id',5)->where('jabatan_id',4)->get();
        $proposalppr = PprPembiayaanHistory::select()->where('status_id',5)->where('jabatan_id',4)->get();
        $proposalskpd=SkpdPembiayaanHistory::select()->where('status_id',5)->where('jabatan_id',4)->get();
        $proposalumkm=UmkmPembiayaanHistory::select()->where('status_id',5)->where('jabatan_id',4)->get();
        // return $pasar;
        return view('akad::proposal.index',[
            'title'=>'Dashboard Staff',
            'proposalpasars'=>$proposalpasar,
            'proposalskpds'=>$proposalskpd,
            'proposalumkms'=>$proposalumkm,
            'proposalpprs'=>$proposalppr,
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
