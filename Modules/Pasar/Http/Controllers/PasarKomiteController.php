<?php

namespace Modules\Pasar\Http\Controllers;

use App\Models\Role;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarBendahara;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarScoreIdir;
use Modules\Admin\Entities\PasarScoreSlik;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Pasar\Entities\PasarDeviasi;
use Modules\Pasar\Entities\PasarDokumen;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Pasar\Entities\PasarSlik;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class PasarKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite=PasarPembiayaan::select()->where('AO_id',Auth::user()->id)->whereNotNull('sektor_id')->get();


        return view('pasar::komite.index',[
            'title'=>'Data Nasabah',
            'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->get()->first(),
            'komites'=> $komite,
        ]);

        return redirect('/pasar/komite/')->with('success', 'Pengajuan Anda Di Teruskan Ke Komite');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pasar::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // return $request;
        PasarPembiayaanHistory::create([
            'pasar_pembiayaan_id'=>$request->pasar_pembiayaan_id,
            'catatan'=>$request->catatan,
            'status_id'=>$request->status_id,
            'user_id'=> $request->user_id,
            'jabatan_id'=> $request->jabatan_id,
        ]);

        if($request->file('dokumen_deviasi')){
            $dokumen_deviasi=$request->file('dokumen_deviasi')->store('pasar-dokumen_deviasi');
            PasarDeviasi::create([
                'pasar_pembiayaan_id'=> $request->pasar_pembiayaan_id,
                'dokumen_deviasi'=> $dokumen_deviasi,
            ]);
        }


        return redirect('/pasar/komite');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        $data=PasarPembiayaan::select()->where('nasabah_id',$id)->get()->first();
        $nasabah=PasarNasabahh::select()->where('id',$data->nasabah_id)->get()->first();
        $usaha=PasarKeteranganUsaha::select()->where('pasar_pembiayaan_id',$id)->get()->first();
        $pasar=PasarJenisPasar::select()->where('kode_pasar',$usaha->jenispasar_id)->get()->first();
        $jaminanrumah=PasarLegalitasRumah::select()->where('pasar_pembiayaan_id',$id)->get()->first();
        $jaminanlain=PasarJaminan::select()->where('pasar_pembiayaan_id',$id)->get()->first();
        $tenor=$data->tenor;
        $harga=$data->harga;
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

        $cicilan=PasarSlik::select()->where('pasar_pembiayaan_id',$id)->sum('angsuran');
        $biaya_anak=$nasabah->tanggungan->biaya;
        $biaya_istri=$nasabah->status->biaya;
        $kebutuhan_keluarga=PasarPembiayaan::select()->where('id',$id)->sum('keb_keluarga');
        $pengeluaranlain=$biaya_anak+$biaya_istri+$cicilan+$kebutuhan_keluarga;
        $total_pengeluaran = ($pengeluaranlain+$cicilan+$angsuran1);

        $di=($laba_bersih-$total_pengeluaran);

        //rating

        $proses_kepalapasar=PasarBendahara::select()->where('jenis_pasar_id',$pasar->kode_pasar)->get()->first();
        $proses_jenispasar=PasarJenisPasar::select()->where('kode_pasar',$usaha->jenispasar_id)->get()->first();
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

        $score_kepalapasar=$proses_kepalapasar->rating;
        $score_jenispasar=$proses_jenispasar->rating;
        $score_jenisdagang=$proses_jenisdagang->rating;
        $score_sukubangsa=$proses_sukubangsa->rating;
        $score_lamadagang=$proses_lamadagang->rating;
        $score_jaminanrumahr=$proses_jaminanrumah->rating;
        $score_cashpick=$proses_cashpickup->rating;
        $score_jenisnasabah=$proses_jenisnasabah->rating;
        $score_jaminanlain=$proses_jaminanlain->rating;

        $idir=number_format(($cicilan+$angsuran1)/($di)*100);

        if($idir<=50){
            $proses_idir=PasarScoreIdir::select()->where('rating',4)->get()->first();
        }

        if($idir>=50 && $idir<=60){
            $proses_idir=PasarScoreIdir::select()->where('rating',3)->get()->first();
        }

        if($idir>=60 && $idir<=69){
            $proses_idir=PasarScoreIdir::select()->where('rating',2)->get()->first();
        }

        if( $idir>=70){
            $proses_idir=PasarScoreIdir::select()->where('rating',1)->get()->first();
        }



        $score_idir=$proses_idir->rating;
        //slik

        $data_slik=PasarSlik::select()->where('pasar_pembiayaan_id',$id)->orderBy('kol', 'desc')->get()->first();

        if(!isset($data_slik)){
            $prosesslik=PasarScoreSlik::select()->where('kol',null)->get()->first();
        }
        else{
            $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->get()->first();
        }
        $score_slik = $prosesslik->rating;
        $timeline=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first();
        $statushistory=Status::select()->where('id',$timeline->status_id)->get();


        $waktuawal=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->orderby('created_at','asc')->get()->first();
        $waktuakhir=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first();
        $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai=Carbon::parse($waktuawal->created_at); 
        $waktuberakhir=Carbon::parse($waktuakhir->created_at);
        $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu=$waktumulai->diffAsCarbonInterval($waktuberakhir);

     //   return $statushistory;
        return view('pasar::komite.lihat',[
            'title'=>'Detail Calon Nasabah',
            'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->get()->first(),
            'timelines'=>PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->get(),
            'history'=>PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->orderby('created_at','desc')->get()->first(),
            'pembiayaan'=>PasarPembiayaan::select()->where('id',$id)->get()->first(),
            'nasabah'=>PasarNasabahh::select()->where('id',$id)->get()->first(),
            'fotos'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->get(),
            'fototoko'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto toko')->get()->first(),
            'nota'=>PasarFoto::select()->where('pasar_pembiayaan_id',$id)->where('kategori', 'Foto Nota Pembelanjaan')->get()->first(),
            'jaminanusahas'=>PasarJaminan::select()->where('pasar_pembiayaan_id',$id)->get(),
            'jaminanlainusahas'=>PasarJaminanLain::select()->where('pasar_pembiayaan_id',$id)->get(),
            'usahas'=>PasarKeteranganUsaha::all(), //udah
            'akads'=>PasarAkad::all(),
            'sektors'=>PasarSektorEkonomi::all(),
            'pasars'=>PasarJenisPasar::select()->where('kode_pasar',$usaha->jenispasar_id)->get()->first(),
            'lamas'=>PasarLamaBerdagang::select()->where('kode_lamaberdagang',$usaha->lama_usaha)->get()->first(),
            'rumahs'=>PasarJaminanRumahh::select()->where('kode_jaminan',$jaminanrumah->legalitas_kepemilikan_rumah)->get()->first(),
            'dagangs'=>PasarJenisDagang::select()->where('kode_jenisdagang',$usaha->jenisdagang_id)->get()->first(),
            'cashs'=>PasarCashPick::select()->where('kode_jeniscash',$data->cashpickup)->get()->first(),
            'nasabahs'=>PasarJenisNasabah::select()->where('kode_jenisnasabah',$data->nasabah)->get()->first(),
            'sukus'=>PasarSukuBangsa::select()->where('kode_suku',$usaha->suku_bangsa_id)->get()->first(),
            'jaminans'=>PasarJenisJaminan::select()->where('kode_jaminan',$jaminanlain->jaminanlain)->get()->first(),
            'slik'=>$prosesslik,
            'idebs'=>PasarSlik::select()->where('pasar_pembiayaan_id',$id)->get(),
            'statushistory'=>$statushistory,
            'ideb'=>PasarPembiayaan::select()->where('id',$id)->get(),
            'kepalapasar'=>$proses_kepalapasar,
            'idir'=>$proses_idir,
            'laba_bersih'=>$laba_bersih,
            'cicilan'=>$cicilan,
            'pengeluaran_lain'=>$pengeluaranlain,
            'total_pengeluaran'=>$total_pengeluaran,
            'angsuran'=>$angsuran1,
            'nilai_idir'=>$idir,
            'harga_jual'=>$harga_jual,

            //rating
            'rating_kepalapasar'=>$score_kepalapasar,
            'rating_jenispasar'=>$score_jenispasar,
            'rating_jenisdagang'=>$score_jenisdagang,
            'rating_sukubangsa'=>$score_sukubangsa,
            'rating_lamadagang'=>$score_lamadagang,
            'rating_jaminanrumah'=>$score_jaminanrumahr,
            'rating_cashpick'=>$score_cashpick,
            'rating_jenisnasabah'=>$score_jenisnasabah,
            'rating_slik'=>$score_slik,
            'rating_idir'=>$score_idir,
            'rating_jaminanlain'=>$score_jaminanlain,

            'score_kepalapasar'=>$score_kepalapasar * $proses_kepalapasar->bobot,
            'score_jenispasar'=>$score_jenispasar * $proses_jenispasar->bobot,
            'score_jenisdagang'=> $score_jenisdagang *  $proses_jenisdagang->bobot,
            'score_sukubangsa'=>$score_sukubangsa * $proses_sukubangsa->bobot,
            'score_lamadagang'=>$score_lamadagang * $proses_lamadagang->bobot,
            'score_jaminanrumah'=>$score_jaminanrumahr * $proses_jaminanrumah->bobot,
            'score_cashpick'=>$score_cashpick * $proses_cashpickup->bobot,
            'score_jenisnasabah'=>$score_jenisnasabah * $proses_jenisnasabah->bobot,
            'score_slik'=>$score_slik * $prosesslik->bobot,
            'score_idir'=>$score_idir *$proses_idir->bobot,
            'score_jaminanlain'=>$score_jaminanlain* $proses_jaminanlain->bobot,

            //SLA
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
        return view('pasar::edit');
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
