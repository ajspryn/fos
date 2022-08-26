<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;

class SkpdNasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('kabag::skpd.nasabah.index',[
            'title'=>'Data Nasabah',
            'proposals'=>SkpdNasabah::select()->get(),
            // 'nasabah'=>SkpdNasabah::select()->where('skpd_pembiayaan_id',$proposal->id)
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
        $data=SkpdPembiayaan::select()->where('skpd_nasabah_id',$id)->get()->first();
        
        $nasabah=SkpdNasabah::select()->where('id',$id)->get()->first();

        $tenor=$data->tenor;
        $harga=$data->nominal_pembiayaan;
        $rate=$data->rate;
        $margin=($rate*$tenor)/100;

        $harga1=$harga*$margin;
        $harga_jual=$harga1+$harga;

        $angsuran1=(int)($harga_jual/$tenor);
        $jaminanlain=SkpdJaminan::select()->where('skpd_pembiayaan_id',$data->id)->get()->first();
        return view('kabag::skpd.nasabah.lihat',[
        'title'=>'Nasabah',
        'pembiayaan'=>SkpdPembiayaan::select()->where('skpd_nasabah_id',$id)->get()->first(),
        'nasabah'=>$nasabah,
        'datas'=>SkpdPembiayaan::select()->where('skpd_nasabah_id',$id)->get(),
        'historys'=>SkpdPembiayaan::select()->where('skpd_nasabah_id',$id)->get(),
        'fotodiri'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
        'angsuran'=>$angsuran1,
        'jaminans'=>SkpdJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first(),
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
