<?php

namespace Modules\Umkm\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarScoreSlik;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Admin\Entities\UmkmScoreIdir;
use Modules\Umkm\Entities\UmkmDeviasi;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Umkm\Entities\UmkmSlik;
use Modules\Umkm\Entities\UmkmSlikPasangan;

class UmkmKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite=UmkmPembiayaan::select()->where('AO_id',Auth::user()->id)->whereNotNull('sektor_id')->orderby('created_at','desc')->get();
    

        return view('umkm::komite.index',[
            'title'=>'Data Nasabah',
            'komites'=> $komite,
        ]);

        return redirect('/umkm/komite/')->with('success', 'Pengajuan Anda Di Teruskan Ke Komite');
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
        UmkmPembiayaanHistory::create([
            'umkm_pembiayaan_id'=>$request->umkm_pembiayaan_id,
            'catatan'=>$request->catatan,
            'status_id'=>$request->status_id,
            'user_id'=> $request->user_id,
            'jabatan_id'=> $request->jabatan_id,
        ]);
        if($request->file('dokumen_deviasi')){
            $dokumen_deviasi=$request->file('dokumen_deviasi')->store('umkm-dokumen_deviasi');
            UmkmDeviasi::create([
                'umkm_pembiayaan_id'=> $request->umkm_pembiayaan_id,
                'dokumen_deviasi'=> $dokumen_deviasi,
            ]);
        }


        return redirect('/umkm/komite')->with('success', 'Pengajuan Berhasil Diproses AO');
    }

    public function upload(Request $request)
    {
        if($request->file('Foto_Bon_Murabahah')){
            $bonmurabahah=$request->file('Foto_Bon_Murabahah')->store('foto-umkm-pembiayaan');
            UmkmFoto::create([
                'umkm_pembiayaan_id'=> $request->umkm_pembiayaan_id,
                'kategori' => 'Foto Bon Murabahah',
                'foto' => $bonmurabahah,
            ]);
        }


        return redirect('/umkm/komite')->with('success', 'Lampiran Berhasil di Upload AO');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        
        $data=UmkmPembiayaan::select()->where('id',$id)->get()->first();
        $nasabah=UmkmNasabah::select()->where('id',$data->nasabah_id)->get()->first();
        $usaha=UmkmKeteranganUsaha::select()->where('umkm_pembiayaan_id',$id)->get()->first();
        $jaminanrumah=UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id',$id)->get()->first();
        $jaminanlain=UmkmJaminan::select()->where('umkm_pembiayaan_id',$id)->get()->first();
        $tenor=$data->tenor;
        $harga=$data->nominal_pembiayaan;
        $rate=$data->rate;
        $margin=($rate*$tenor)/100;
        $cash=PasarCashPick::select()->first();

        //idir
        $harga1=$harga*$margin;
        $harga_jual=$harga1+$harga;

        $angsuran1=(int)($harga_jual/$tenor);
        

        //pemasukan

        $omset=$data->omset;
        $hpp=$data->hpp;
        $listrik=$data->listrik;
        $transport=$data->trasport;
        $sewa=$data->sewa;
        $karyawan=$data->karyawan;
        $telpon=$data->telpon;
        $laba_bersih=($omset-($hpp+$listrik+$sewa+$karyawan+$telpon+$transport));

        //pengeluaran

        $cicilan=UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->sum('angsuran');
        $biaya_anak=$nasabah->tanggungan->biaya;
        $biaya_istri=$nasabah->status->biaya;
        $kebutuhan_keluarga=UmkmPembiayaan::select()->where('id',$id)->sum('keb_keluarga');
        $pengeluaranlain=$biaya_anak+$biaya_istri+$kebutuhan_keluarga;
        $total_pengeluaran = ($pengeluaranlain+$cicilan+$angsuran1);
        $cekcicilanpasangan=UmkmSlikPasangan::select()->where('umkm_pembiayaan_id',$id)->get()->count();


        if($cekcicilanpasangan > 0){
            $cicilanpasangan =   $cekcicilanpasangan=UmkmSlikPasangan::select()->where('umkm_pembiayaan_id',$id)->sum('angsuran');

            $total_pengeluaran = $pengeluaranlain+$cicilan+$angsuran1+$cicilanpasangan;
            $cicilan =  $cicilan+$cicilanpasangan;
        }

        $di=($laba_bersih-$total_pengeluaran);

        //rating

        $proses_jenisdagang=PasarJenisDagang::select()->where('kode_jenisdagang',$usaha->jenisdagang_id)->get()->first();
        $proses_sukubangsa=PasarSukuBangsa::select()->where('kode_suku',$usaha->suku_bangsa_id)->get()->first();
        $proses_lamadagang=PasarLamaBerdagang::select()->where('kode_lamaberdagang',$usaha->lama_usaha)->get()->first();
        $proses_jaminanrumah=PasarJaminanRumahh::select()->where('kode_jaminan',$jaminanrumah->legalitas_kepemilikan_rumah)->get()->first();
        $proses_cashpickup=PasarCashPick::select()->where('kode_jeniscash',$data->cashpickup)->get()->first();
        $proses_jenisnasabah=PasarJenisNasabah::select()->where('kode_jenisnasabah',$data->nasabah)->get()->first();


        $proses_jaminanlain=PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first();
        
        // if(!isset($proses_jaminanlain)){
        //     $prosesjaminanlain=PasarJenisJaminan::select()->where('kol',null)->get()->first();
        // }
        // else{
        //     $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->get()->first();
        // }
        //score 

        $score_jenisdagang=$proses_jenisdagang->rating;
        $score_sukubangsa=$proses_sukubangsa->rating;
        $score_lamadagang=$proses_lamadagang->rating;
        $score_jaminanrumahr=$proses_jaminanrumah->rating;
        $score_cashpick=$proses_cashpickup->rating;
        $score_jenisnasabah=$proses_jenisnasabah->rating;
        $score_jaminanlain=$proses_jaminanlain->rating;

        $idir=number_format(($cicilan+$angsuran1)/($di)*100);

        if($idir<=50){
            $proses_idir=UmkmScoreIdir::select()->where('rating',4)->get()->first();
        }

        if($idir>=50 && $idir<=60){
            $proses_idir=UmkmScoreIdir::select()->where('rating',3)->get()->first();
        }
    
        if($idir>=60 && $idir<=69){
            $proses_idir=UmkmScoreIdir::select()->where('rating',2)->get()->first();
        }

        if( $idir>=70){
            $proses_idir=UmkmScoreIdir::select()->where('rating',1)->get()->first();
        }
       


        $score_idir=$proses_idir->rating;
        //slik 

        $data_slik=UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->orderBy('kol', 'desc')->get()->first(); 

        if(!isset($data_slik)){
            $prosesslik=PasarScoreSlik::select()->where('kol',null)->get()->first();
        }
        else{
            $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->get()->first();
        }
        $score_slik = $prosesslik->rating;

        $waktuawal=UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id',$id)->orderby('created_at','asc')->get()->first();
        $waktuakhir=UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai=Carbon::parse($waktuawal->created_at);
        $waktuberakhir=Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu=$waktumulai->diffAsCarbonInterval($waktuberakhir);

      
        // $ideps=UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->get();
        //    return $ideps;
        return view('umkm::komite.lihat',[
            'title'=>'Detail Calon Nasabah',
            'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->get()->first(),
            'timelines'=>UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id',$id)->get(),
            'history'=>UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first(),
            'pembiayaan'=>UmkmPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>UmkmNasabah::select()->where('id',$data->nasabah_id)->get()->first(),
            'fotos'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->get(),
            'fototoko'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto toko')->get()->first(),
            'fotodiri'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto KTP')->get()->first(),
            'bon_murabahah'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Bon Murabahah')->get()->first(),
            'fotodiribersamaktp'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'nota'=>UmkmFoto::select()->where('umkm_pembiayaan_id',$id)->where('kategori', 'Foto Nota Pembelanjaan')->get()->first(),
            'jaminanusahas'=>UmkmJaminan::select()->where('umkm_pembiayaan_id',$id)->get(),
            'jaminanlainusahas'=>UmkmJaminanLain::select()->where('umkm_pembiayaan_id',$id)->get(),
            'usahas'=>UmkmKeteranganUsaha::all(), //udah
            'akads'=>PasarAkad::all(),
            'sektors'=>PasarSektorEkonomi::all(),
            'lamas'=>PasarLamaBerdagang::select()->where('kode_lamaberdagang',$usaha->lama_usaha)->get()->first(),
            'rumahs'=>PasarJaminanRumahh::select()->where('kode_jaminan',$jaminanrumah->legalitas_kepemilikan_rumah)->get()->first(),
            'dagangs'=>PasarJenisDagang::select()->where('kode_jenisdagang',$usaha->jenisdagang_id)->get()->first(),
            'cashs'=>PasarCashPick::select()->where('kode_jeniscash',$data->cashpickup)->get()->first(),
            'nasabahs'=>PasarJenisNasabah::select()->where('kode_jenisnasabah',$data->nasabah)->get()->first(),
            'sukus'=>PasarSukuBangsa::select()->where('kode_suku',$usaha->suku_bangsa_id)->get()->first(),
            'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first(),
            // 'slik'=>$prosesslik,
            'ideps'=>UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->get(),
            'ideppasangans'=>UmkmSlikPasangan::select()->where('umkm_pembiayaan_id',$id)->get(),
            'ideb'=>UmkmPembiayaan::select()->where('id',$id)->get(),
            'cekcicilanpasangan'=>$cekcicilanpasangan,
            'laba_bersih'=>$laba_bersih,
            'cicilan'=>$cicilan,
            'pengeluaran_lain'=>$pengeluaranlain,
            'total_pengeluaran'=>$total_pengeluaran,
            'angsuran'=>$angsuran1,
            'harga_jual'=>$harga_jual,
             'idir'=>$proses_idir,
             'nilai_idir'=>$idir,
             'slik'=>$prosesslik,
        
            //rating
            'rating_jenisdagang'=>$score_jenisdagang,
            'rating_sukubangsa'=>$score_sukubangsa,
            'rating_lamadagang'=>$score_lamadagang,
            'rating_jaminanrumah'=>$score_jaminanrumahr,
            'rating_cashpick'=>$score_cashpick,
            'rating_jenisnasabah'=>$score_jenisnasabah,
            'rating_slik'=>$score_slik,
            'rating_idir'=>$score_idir,
            'rating_jaminanlain'=>$score_jaminanlain,

            'score_jenisdagang'=> $score_jenisdagang *  $proses_jenisdagang->bobot,
            'score_sukubangsa'=>$score_sukubangsa * $proses_sukubangsa->bobot,
            'score_lamadagang'=>$score_lamadagang * $proses_lamadagang->bobot,
            'score_jaminanrumah'=>$score_jaminanrumahr * $proses_jaminanrumah->bobot,
            'score_cashpick'=>$score_cashpick * $proses_cashpickup->bobot,
            'score_jenisnasabah'=>$score_jenisnasabah * $proses_jenisnasabah->bobot,
            'score_slik'=>$score_slik * $prosesslik->bobot,
            'score_idir'=>$score_idir *$proses_idir->bobot,
            'score_jaminanlain'=>$score_jaminanlain* $proses_jaminanlain->bobot,
             

            'arr'=>-2,
            'banyak_history'=>UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id',$id)->count(),
            'totalwaktu'=>$totalwaktu,
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
