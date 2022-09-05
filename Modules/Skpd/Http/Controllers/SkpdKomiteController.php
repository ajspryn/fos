<?php

namespace Modules\Skpd\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdScoreDsr;
use Modules\Admin\Entities\SkpdBendahara;
use Modules\Admin\Entities\SkpdScoreSlik;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Skpd\Entities\SkpdDeviasi;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;

class SkpdKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $history=SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $proposal->id)->orderby('created_at', 'desc')->get();
        $proposal=SkpdPembiayaan::select()->where('user_id',Auth::user()->id)->whereNotNull('skpd_sektor_ekonomi_id')->orderBy('id', 'desc')->get();
        return view('skpd::komite.index',[
            'title'=>'Komite',
            'proposals'=>$proposal,
        ]);

        return redirect('/skpd/komite/')->with('success', 'Pengajuan Anda Di Teruskan Ke Komite');
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
       $role=role::select()->where('user_id', Auth::user()->id)->get()->first();

    //    dd($request);
        SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id'=> $request->skpd_pembiayaan_id,
            'status_id'=> $request->status_id,
            'catatan'=>$request->catatan,
            'jabatan_id'=>$role->jabatan_id,
            'divisi_id'=>$role->divisi_id,
            'user_id'=> Auth::user()->id,
        ]);

        if($request->file('dokumen_deviasi')){
            $dokumen_deviasi=$request->file('dokumen_deviasi')->store('skpd-dokumen_deviasi');
            SkpdDeviasi::create([
                'skpd_pembiayaan_id'=> $request->skpd_pembiayaan_id,
                'dokumen_deviasi'=> $dokumen_deviasi,
            ]);
        }

          return redirect('/skpd/komite');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
         $cek=SkpdPembiayaanHistory::select()
        ->where('skpd_pembiayaan_id', $id)
        ->where('user_id',Auth::user()->id)
        ->get()
        ->count();

        if ($cek==0){
            SkpdPembiayaanHistory::create([
                'skpd_pembiayaan_id'=>$id,
                'status_id'=>2,
                'jabatan_id'=>1,
                'divisi_id'=>0,
                'user_id'=>Auth::user()->$id,
            ]);
        }

        $data=SkpdPembiayaan::select()->where('id',$id)->get()->first();
        $nasabah=SkpdNasabah::select()->where('id',$data->skpd_nasabah_id)->get()->first();
        $jaminan=SkpdJaminan::select()->where('skpd_pembiayaan_id',$id)->get()->first();
        $nominal_pembiayaan=$data->nominal_pembiayaan;
        $tenor=$data->tenor;
        $rate=$data->rate/100;

        //angsuran
        $harga_jual=$nominal_pembiayaan*$rate*$tenor+$nominal_pembiayaan;
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
        $dsr=number_format($angsuran/$pendapatan_bersih*100);
        if($data->skpd_golongan_id==18){
            $dsr=number_format($angsuran/$total_pemasukan*100);
        }

        //mencari slik dengan kol tertinggi
        $data_slik=SkpdSlik::select()->where('skpd_pembiayaan_id',$id)->orderBy('kol_tertinggi', 'desc')->get()->first();
        if($data_slik){
            $slik=$data_slik->kol_tertinggi;
        }

        //proses menentukan rating
        $proses_bendahara=SkpdBendahara::select()->where('skpd_instansi_id',$data->skpd_instansi_id)->get()->first();
        if($dsr>29){
            $proses_dsr=SkpdScoreDsr::select()->where('rating',1)->get()->first();
        }
        if($dsr<=29 && $dsr>=20){
            $proses_dsr=SkpdScoreDsr::select()->where('rating',2)->get()->first();
        }
        if($dsr<=19 && $dsr>=11){
            $proses_dsr=SkpdScoreDsr::select()->where('rating',3)->get()->first();
        }
        if($dsr<11){
            $proses_dsr=SkpdScoreDsr::select()->where('rating',4)->get()->first();
        }

        // return $proses_dsr;
        $proses_slik=0;
        if($data_slik){
            $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->get()->first();
        }
        // $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->get()->first();
        $proses_jaminan=SkpdJenisJaminan::select()->where('id',$jaminan->skpd_jenis_jaminan_id)->get()->first();
        $proses_nasabah='Nasabah Baru';
        $proses_instansi=SkpdInstansi::select()->where('id',$data->skpd_instansi_id)->get()->first();

        // return $dsr;
        //mengambil rating
        $rating_dsr=$proses_dsr->rating;
        $rating_slik=0;
        if($data_slik){
            $rating_slik=$proses_slik->rating;
        }
        // $rating_slik=$proses_slik->rating;
        $rating_bendahara=$proses_bendahara->rating;
        $rating_jaminan=$proses_jaminan->rating;
        $rating_nasabah=2;
        $rating_instansi=$proses_instansi->rating;

        // $angsuran1=$angsuran;
        // $dsr1=$angsuran1/$total_pemasukan*100;
        // $dsr1=$angsuran1/$pendapatan_bersih*100;

        $nilai_slik=0;
        if($rating_slik){
                $nilai_slik = $rating_slik*$proses_slik->bobot;
        }

        $waktuawal=SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id',$id)->orderby('created_at','asc')->get()->first();
        $waktuakhir=SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai=Carbon::parse($waktuawal->created_at);
        $waktuberakhir=Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu=$waktumulai->diffAsCarbonInterval($waktuberakhir);
        // return $proses_dsr;
        return view('skpd::komite.lihat',[
            'title'=>'Detail Proposal',
            'arr'=>-2,
            'banyak_history'=>SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id',$id)->count(),
            'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->get()->first(),
            'pembiayaan'=>SkpdPembiayaan::select()->where('id',$id)->get()->first(),
            'timelines'=>SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id',$id)->get(),
            'cicilan'=>$cicilan,
            'biayakeluarga'=>$biaya_anak+$biaya_istri,
            'pendapatan_bersih'=>$pendapatan_bersih,
            'ideps'=>SkpdSlik::select()->where('skpd_pembiayaan_id',$id)->get(),
            'harga_jual'=>$harga_jual,
            'tenor'=>$tenor,
            'angsuran1'=>$angsuran,
            'nilai_dsr'=>$dsr,
            'nilai_dsr1'=>$dsr,
            'total_pendapatan'=>$data->pendapatan_lainnya + $data->gaji_pokok + $data->pendapatan_lainnya,

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
            'nilai_slik'=>$nilai_slik,
            'nilai_jaminan'=>$rating_jaminan*$proses_jaminan->bobot,
            'nilai_nasabah'=>$rating_nasabah*0.10,
            'nilai_instansi'=>$rating_instansi*$proses_instansi->bobot,

            //identitas pribadi
            'fotos'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->get(),
            'jaminans'=>SkpdJaminan::select()->where('skpd_pembiayaan_id',$id)->get(),
            'jaminanlainnyas'=>SkpdJaminanLainnya::select()->where('skpd_pembiayaan_id',$id)->get(),
            'skpengangkatans'=>SkpdPembiayaan::select()->where('id',$id)->get(),
            'ideb'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori','IDEB')->get()->first(),
             'konfirmasi'=>SkpdFoto::select()->where('skpd_pembiayaan_id',$id)->where('kategori','Konfirmasi Bendahara')->get()->first(),

            //history
            'history'=>SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first(),

            //sla
            'totalwaktu'=>$totalwaktu
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
