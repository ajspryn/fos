<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class KabagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pasarproposal = PasarPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $skpdproposal = SkpdPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $umkmproposal = UmkmPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pprproposal = PprPembiayaanHistory::select()->where('status_id', 3)->orderby('created_at', 'desc')->get()->count();
        $pasarditerima = PasarPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $skpdditerima = SkpdPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $umkmditerima = UmkmPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $pprditerima = PprPembiayaanHistory::select()->where('status_id', 5)->where('jabatan_id', 4)->get()->count();
        $pasarditolak = PasarPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $skpdditolak = SkpdPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $umkmditolak = UmkmPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $pprditolak = PprPembiayaanHistory::select()->where('status_id', 6)->get()->count();
        $review = PasarPembiayaanHistory::select()->where('status_id', 7)->orderby('created_at', 'desc')->get()->count();
        return view('kabag::index', [
            'title' => 'Dashboard Kabag',
            'diterima' => $pasarditerima + $skpdditerima + $umkmditerima + $pprditerima,
            'tolak' => $pasarditolak + $skpdditolak + $umkmditolak + $pprditolak,
            'proposal' => $pasarproposal + $skpdproposal + $umkmproposal + $pprproposal,
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
        return view('kabag::show');
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
