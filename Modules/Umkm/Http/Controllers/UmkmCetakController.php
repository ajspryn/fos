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

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UmkmCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $id = Request('id');
        if (!$id) abort(404);
        $cek = UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        if ($cek == 0) {
            UmkmPembiayaanHistory::create([
                'umkm_pembiayaan_id' => $id,
                'status_id' => 2,
                'jabatan_id' => 1,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = UmkmPembiayaan::select()->where('id', $id)->first();
        $nasabah = UmkmNasabah::select()->where('id', $data->nasabah_id)->first();
        $usaha = UmkmKeteranganUsaha::select()->where('umkm_pembiayaan_id', $id)->first();
        $jaminanrumah = UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id', $id)->first();
        $jaminanlain = UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->first();
        $tenor = $data->tenor;
        $harga = (float)str_replace('.', '', $data->nominal_pembiayaan ?? '0');
        $rate = (float)($data->rate ?? 0);
        $margin = ($rate * $tenor) / 100;
        $cash = PasarCashPick::select()->first();

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = (int)($harga_jual / $tenor);


        //pemasukan

        $omset = (float)str_replace('.', '', $data->omset ?? '0');
        $hpp = (float)str_replace('.', '', $data->hpp ?? '0');
        $listrik = (float)str_replace('.', '', $data->listrik ?? '0');
        $transport = (float)str_replace('.', '', $data->trasport ?? '0');
        $sewa = (float)str_replace('.', '', $data->sewa ?? '0');
        $karyawan = (float)str_replace('.', '', $data->karyawan ?? '0');
        $telpon = (float)str_replace('.', '', $data->telpon ?? '0');
        $laba_bersih = ($omset - ($hpp + $listrik + $sewa + $karyawan + $telpon + $transport));
        $total_pendapatan_bersih = $laba_bersih + (float)str_replace('.', '', $data->pendapatan_lain ?? '0');

        //pengeluaran

        $cicilan = UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->sum('angsuran');
        $biaya_anak = $nasabah->tanggungan->biaya;
        $biaya_istri = $nasabah->status->biaya;
        $kebutuhan_keluarga = UmkmPembiayaan::select()->where('id', $id)->sum('keb_keluarga');
        $pengeluaranlain = $biaya_anak + $biaya_istri + $kebutuhan_keluarga;
        $total_pengeluaran = ($pengeluaranlain + $cicilan + $angsuran1);
        $cekcicilanpasangan = UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->count();


        if ($cekcicilanpasangan > 0) {
            $cicilanpasangan =   $cekcicilanpasangan = UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->sum('angsuran');

            $total_pengeluaran = $pengeluaranlain + $cicilan + $angsuran1 + $cicilanpasangan;
            $cicilan =  $cicilan + $cicilanpasangan;
        }

        $di = ($total_pendapatan_bersih - $total_pengeluaran);

        //rating

        $proses_jenisdagang = PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->first();
        $proses_sukubangsa = PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->first();
        $proses_lamadagang = PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->first();
        $proses_jaminanrumah = PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first();
        $proses_cashpickup = PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->first();
        $proses_jenisnasabah = PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->first();


        $proses_jaminanlain = PasarJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->first();

        // if(!isset($proses_jaminanlain)){
        //     $prosesjaminanlain=PasarJenisJaminan::select()->where('kol',null)->first();
        // }
        // else{
        //     $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->first();
        // }
        //score

        $score_jenisdagang = $proses_jenisdagang->rating;
        $score_sukubangsa = $proses_sukubangsa->rating;
        $score_lamadagang = $proses_lamadagang->rating;
        $score_jaminanrumahr = $proses_jaminanrumah->rating;
        $score_cashpick = $proses_cashpickup->rating;
        $score_jenisnasabah = $proses_jenisnasabah->rating;
        $score_jaminanlain = $proses_jaminanlain->rating;

        $idir = number_format(($cicilan + $angsuran1) / ($di) * 100);

        if ($idir <= 50) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 4)->first();
        }

        if ($idir >= 50 && $idir <= 60) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 3)->first();
        }

        if ($idir >= 60 && $idir <= 69) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 2)->first();
        }

        if ($idir >= 70) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 1)->first();
        }



        $score_idir = $proses_idir->rating;
        //slik

        $data_slik = UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->orderBy('kol', 'desc')->first();

        if (!isset($data_slik)) {
            $prosesslik = PasarScoreSlik::select()->where('kol', null)->first();
        } else {
            $prosesslik = PasarScoreSlik::select()->where('kol', $data_slik->kol)->first();
        }
        $score_slik = $prosesslik->rating;

        $waktuawal = UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuakhir = UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        $catatanApprovals = UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $id)
            ->whereIn('jabatan_id', [2, 3])
            ->where(function ($query) {
                $query->where('jabatan_id', 3)->where('status_id', 11)
                    ->orWhere(function ($query) {
                        $query->where('jabatan_id', 2)->where('status_id', 5);
                    });
            })
            ->orderBy('created_at', 'ASC')
            ->groupBy('jabatan_id')
            ->get();
        $timelinesAll = UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $id)->orderBy('created_at', 'asc')->get();
        $namaAO = \App\Models\User::find($timelinesAll->where('jabatan_id', 1)->first()?->user_id)?->name ?? '-';
        $namaKabag = \App\Models\User::find($catatanApprovals->where('jabatan_id', 2)->first()?->user_id)?->name ?? '-';
        $namaAnalis = \App\Models\User::find($catatanApprovals->where('jabatan_id', 3)->first()?->user_id)?->name ?? '-';

        // $ideps=UmkmSlik::select()->where('umkm_pembiayaan_id',$id)->get();
        //    return $ideps;
        return view('umkm::cetak', [
            'title' => 'Detail Calon Nasabah',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'timelines' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->get(),
            'history' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => UmkmNasabah::select()->where('id', $data->nasabah_id)->first(),
            'fotos' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->get(),
            'fototoko' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto toko')->first(),
            'fotodiri' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'fotoktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotodiribersamaktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->first(),
            'fotokk' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'nota' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->first(),
            'jaminanusahas' => UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->get(),
            'jaminanlainusahas' => UmkmJaminanLain::select()->where('umkm_pembiayaan_id', $id)->get(),
            'usahas' => UmkmKeteranganUsaha::all(), //udah
            'akads' => PasarAkad::all(),
            'sektors' => PasarSektorEkonomi::all(),
            'lamas' => PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->first(),
            'rumahs' => PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first(),
            'dagangs' => PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->first(),
            'cashs' => PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->first(),
            'nasabahs' => PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->first(),
            'sukus' => PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->first(),
            'jaminans' => PasarJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->first(),
            // 'slik'=>$prosesslik,
            'idebs' => UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->get(),
            'ideppasangans' => UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->get(),
            'ideb' => UmkmPembiayaan::select()->where('id', $id)->get(),
            'cekcicilanpasangan' => $cekcicilanpasangan,
            'laba_bersih' => $laba_bersih,
            'total_pendapatan_bersih' => $total_pendapatan_bersih,
            'cicilan' => $cicilan,
            'pengeluaran_lain' => $pengeluaranlain,
            'total_pengeluaran' => $total_pengeluaran,
            'angsuran' => $angsuran1,
            'harga_jual' => $harga_jual,
            'idir' => $proses_idir,
            'nilai_idir' => $idir,
            'slik' => $prosesslik,

            //rating
            'rating_jenisdagang' => $score_jenisdagang,
            'rating_sukubangsa' => $score_sukubangsa,
            'rating_lamadagang' => $score_lamadagang,
            'rating_jaminanrumah' => $score_jaminanrumahr,
            'rating_cashpick' => $score_cashpick,
            'rating_jenisnasabah' => $score_jenisnasabah,
            'rating_slik' => $score_slik,
            'rating_idir' => $score_idir,
            'rating_jaminanlain' => $score_jaminanlain,

            'score_jenisdagang' => $score_jenisdagang *  $proses_jenisdagang->bobot,
            'score_sukubangsa' => $score_sukubangsa * $proses_sukubangsa->bobot,
            'score_lamadagang' => $score_lamadagang * $proses_lamadagang->bobot,
            'score_jaminanrumah' => $score_jaminanrumahr * $proses_jaminanrumah->bobot,
            'score_cashpick' => $score_cashpick * $proses_cashpickup->bobot,
            'score_jenisnasabah' => $score_jenisnasabah * $proses_jenisnasabah->bobot,
            'score_slik' => $score_slik * $prosesslik->bobot,
            'score_idir' => $score_idir * $proses_idir->bobot,
            'score_jaminanlain' => $score_jaminanlain * $proses_jaminanlain->bobot,


            'arr' => -2,
            'banyak_history' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->count(),
            'totalwaktu' => $totalwaktu,

            //Catatan & Penandatangan
            'catatanApprovals' => $catatanApprovals,
            'namaAO' => $namaAO,
            'namaKabag' => $namaKabag,
            'namaAnalis' => $namaAnalis,
        ]);
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
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('umkm::show');
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
