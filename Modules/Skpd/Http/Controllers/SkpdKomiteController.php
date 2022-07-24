<?php

namespace Modules\Skpd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Admin\Entities\SkpdScoreDsr;
use Modules\Admin\Entities\SkpdBendahara;
use Modules\Admin\Entities\SkpdScoreSlik;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdJenisJaminan;

class SkpdKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('skpd::komite.index',[
            'title'=>'Komite',
            'proposals'=>SkpdPembiayaan::select()->where('user_id',Auth::user()->id)->whereNotNull('skpd_sektor_ekonomi_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('skpd::create');
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
        $nasabah=SkpdNasabah::select()->where('id',$id)->get()->first();
        $data=SkpdPembiayaan::select()->where('id',$id)->get()->first();
        $jaminan=SkpdJaminan::select()->where('skpd_pembiayaan_id',$id)->get()->first();
        $nominal_pembiayaan=$data->nominal_pembiayaan;
        $tenor=$data->tenor;

        //angsuran
        $harga_jual=$nominal_pembiayaan*0.016*$tenor+$nominal_pembiayaan;
        $angsuran=$harga_jual/$tenor;

        //pengeluaran
        $biaya_anak=$nasabah->tanggungan->biaya;
        $biaya_istri=$nasabah->status_perkawinan->biaya;
        $cicilan=SkpdSlik::select()->where('skpd_pembiayaan_id',$id)->sum('angsuran');
        $pengeluaran_lainnya=SkpdPembiayaan::select()->where('id',$id)->sum('pengeluaran_lainnya');
        $total_pengeluaran=$biaya_anak+$biaya_istri+$cicilan+$pengeluaran_lainnya;

        //pemasukan
        $gaji_pokok=$data->gaji_pokok;
        $pendapatan_lainnya=$data->pendapatan_lainnya;
        $gaji_tpp=$data->gaji_tpp;
        $total_pemasukan=$gaji_pokok+$gaji_tpp+$pendapatan_lainnya;

        //pendapatan Bersih
        $pendapatan_bersih=$total_pemasukan-$total_pengeluaran;

        //DSR(rasio total angsuran terhadap pendapatan bersih)
        $dsr=$angsuran/$pendapatan_bersih;

        //mencari slik dengan kol tertinggi
        $data_slik=SkpdSlik::select()->where('skpd_pembiayaan_id',$id)->orderBy('kol_tertinggi', 'desc')->get()->first();
        $slik=$data_slik->kol_tertinggi;

        //proses menentukan rating
        $proses_bendahara=SkpdBendahara::select()->where('skpd_instansi_id',$data->skpd_instansi_id)->get()->first();
        $proses_dsr=SkpdScoreDsr::select()->where('score_terendah','<=',$dsr)->where('score_tertinggi','>=',$dsr)->get()->first();
        $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->get()->first();
        $proses_jaminan=SkpdJenisJaminan::select()->where('id',$jaminan->skpd_jenis_jaminan_id)->get()->first();
        $proses_nasabah='Nasabah Baru';
        $proses_instansi=SkpdInstansi::select()->where('id',$data->skpd_instansi_id)->get()->first();

        //mengambil rating
        $rating_dsr=$proses_dsr->rating;
        $rating_slik=$proses_slik->rating;
        $rating_bendahara=$proses_bendahara->rating;
        $rating_jaminan=$proses_jaminan->rating;
        $rating_nasabah=1;
        $rating_instansi=$proses_instansi->rating;


        // return $rating_bendahara;
        return view('skpd::komite.lihat',[
            'title'=>'Detail Proposal',
            'bendahara'=>$proses_bendahara,
            'dsr'=>$proses_dsr,
            'slik'=>$proses_slik,
            'jaminan'=>$proses_jaminan,
            'nasabah'=>$proses_nasabah,
            'instansi'=>$proses_instansi,
            'rating_bendahara'=>$rating_bendahara,
            'rating_dsr'=>$rating_dsr,
            'rating_slik'=>$rating_slik,
            'rating_jaminan'=>$rating_jaminan,
            'rating_nasabah'=>$rating_nasabah,
            'rating_instansi'=>$rating_instansi,
            'nilai_bendahara'=>$rating_bendahara*$proses_bendahara->bobot,
            'nilai_dsr'=>$rating_dsr*$proses_dsr->bobot,
            'nilai_slik'=>$rating_slik*$proses_slik->bobot,
            'nilai_jaminan'=>$rating_jaminan*$proses_jaminan->bobot,
            'nilai_nasabah'=>$rating_jaminan*0.10,
            'nilai_instansi'=>$rating_instansi*$proses_instansi->bobot,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('skpd::edit');
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
