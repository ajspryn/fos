<?php

namespace Modules\Kabag\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
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
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarSlik;
use Modules\Pasar\Entities\PasarSlikPasangan;

class PasarKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $latestSub = PasarPembiayaanHistory::selectRaw('pasar_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('pasar_pembiayaan_id');

        $latestHistories = PasarPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('pasar_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->orderBy('updated_at', 'desc')
            ->get(['pasar_pembiayaan_histories.pasar_pembiayaan_id', 'status_id', 'jabatan_id', 'user_id']);

        $proposalIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 3 && $history->jabatan_id == 1)
                || ($history->status_id == 4 && $history->jabatan_id == 2);
        })->pluck('pasar_pembiayaan_id')->unique();

        $komiteIds = $latestHistories->filter(function ($history) {
            return ($history->status_id == 5 && $history->jabatan_id == 2);
        })->pluck('pasar_pembiayaan_id')->unique();

        $komite = PasarPembiayaan::with(['nasabahh', 'keteranganusaha.jenispasar', 'user'])
            ->whereIn('id', $komiteIds)
            ->orderBy('tgl_pembiayaan', 'desc')
            ->get();

        $bonmurabahah = PasarFoto::whereIn('pasar_pembiayaan_id', $komiteIds)
            ->where('kategori', 'Foto Bon Murabahah')
            ->get()
            ->keyBy('pasar_pembiayaan_id');

        $histories = $latestHistories->whereIn('pasar_pembiayaan_id', $komiteIds)->keyBy('pasar_pembiayaan_id');

        // $komite=PasarPembiayaanHistory::select()->where('status_id', 3 )->orderby('created_at','desc')->get();
        return view('kabag::pasar.komite.index', [
            'title' => 'Data Nasabah',
            'komites' => $komite,
            'histories' => $histories,
            'bonmurabahah' => $bonmurabahah,

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

        PasarPembiayaanHistory::create([
            'pasar_pembiayaan_id' => $request->pasar_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => 2,
            'divisi_id' => null,

        ]);

        return redirect('/kabag/pasar/komite')->with('success', 'Pengajuan Berhasil Diproses');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        $cek = PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        if ($cek && $cek->status_id == 3 && $cek->jabatan_id == 1) {
            PasarPembiayaanHistory::create([
                'pasar_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 2,
                'divisi_id' => null,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = PasarPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }
        $nasabah = PasarNasabahh::select()->where('id', $data->nasabah_id)->first();
        $usaha = PasarKeteranganUsaha::select()->where('pasar_pembiayaan_id', $id)->first();
        $pasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->first();
        $jaminanrumah = PasarLegalitasRumah::select()->where('pasar_pembiayaan_id', $id)->first();
        $jaminanlain = PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->first();
        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;
        $cash = PasarCashPick::select()->first();

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = (int)($harga_jual / $tenor);


        //pemasukan

        $omset = $data->omset;
        $hpp = $data->hpp;
        $listrik = $data->listrik;
        $transport = $data->trasport;
        $sewa = $data->sewa;
        $karyawan = $data->karyawan;
        $telpon = $data->telpon;
        $laba_bersih = ($omset - ($hpp + $listrik + $sewa + $karyawan + $telpon + $transport));

        //pengeluaran

        $cicilan = PasarSlik::select()->where('pasar_pembiayaan_id', $id)->sum('angsuran');
        $biaya_anak = $nasabah->tanggungan->biaya;
        $biaya_istri = $nasabah->status->biaya;
        $kebutuhan_keluarga = PasarPembiayaan::select()->where('id', $id)->sum('keb_keluarga');
        $pengeluaranlain = $biaya_anak + $biaya_istri + $kebutuhan_keluarga;
        $cekcicilanpasangan = PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->count();
        $total_pengeluaran = ($pengeluaranlain + $cicilan + $angsuran1);

        if ($cekcicilanpasangan > 0) {
            $cicilanpasangan =   $cekcicilanpasangan = PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->sum('angsuran');

            $total_pengeluaran = $pengeluaranlain + $cicilan + $angsuran1 + $cicilanpasangan;
            $cicilan =  $cicilan + $cicilanpasangan;
        }

        $di = ($laba_bersih - $total_pengeluaran);

        //rating

        $proses_kepalapasar = PasarBendahara::select()->where('jenis_pasar_id', $pasar->kode_pasar)->first();
        $proses_jenispasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->first();
        $proses_jenisdagang = PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->first();
        $proses_sukubangsa = PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->first();
        $proses_lamadagang = PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->first();
        $proses_jaminanrumah = PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first();
        $proses_cashpickup = PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->first();
        $proses_jenisnasabah = PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->first();


        $proses_jaminanlain = PasarJenisJaminan::select()
            ->where('kode_jaminan', optional($jaminanlain)->jaminanlain)
            ->first();

        // if(!isset($proses_jaminanlain)){
        //     $prosesjaminanlain=PasarJenisJaminan::select()->where('kol',null)->first();
        // }
        // else{
        //     $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->first();
        // }
        //score

        $score_kepalapasar = $proses_kepalapasar->rating;
        $score_jenispasar = $proses_jenispasar->rating;
        $score_jenisdagang = $proses_jenisdagang->rating;
        $score_sukubangsa = $proses_sukubangsa->rating;
        $score_lamadagang = $proses_lamadagang->rating;
        $score_jaminanrumahr = $proses_jaminanrumah->rating;
        $score_cashpick = $proses_cashpickup->rating;
        $score_jenisnasabah = $proses_jenisnasabah->rating;
        $score_jaminanlain = optional($proses_jaminanlain)->rating ?? 0;

        $idir = number_format(($cicilan + $angsuran1) / ($di) * 100);

        if ($idir <= 50) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 4)->first();
        }

        if ($idir >= 50 && $idir <= 60) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 3)->first();
        }

        if ($idir >= 60 && $idir <= 69) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 2)->first();
        }

        if ($idir >= 70) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 1)->first();
        }



        $score_idir = $proses_idir->rating;
        //slik

        $data_slik = PasarSlik::select()->where('pasar_pembiayaan_id', $id)->orderBy('kol', 'desc')->first();

        if (!isset($data_slik)) {
            $prosesslik = PasarScoreSlik::select()->where('kol', null)->first();
        } else {
            $prosesslik = PasarScoreSlik::select()->where('kol', $data_slik->kol)->first();
        }
        $score_slik = $prosesslik->rating;



        $waktuawal = PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuakhir = PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();
        $next = PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->where('id', '>', $waktuawal->id)->orderby('id')->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        $selanjutnya = Carbon::parse($next->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);
        //    return $totalwaktu;
        $historyStatus = PasarPembiayaanHistory::where('pasar_pembiayaan_id', $id)
            ->orderBy('created_at', 'desc')
            ->first();
        return view('kabag::pasar.komite.lihat', [
            'title' => 'Detail Calon Nasabah',
            // 'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->first(),
            'deviasi' => PasarDeviasi::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'bon_murabahah' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Bon Murabahah')->first(),
            'timelines' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->get(),
            'history' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'historyStatus' => $historyStatus,
            'waktuawal' => PasarPembiayaanHistory::select('created_at')->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->last(),
            'waktuakhir' => PasarPembiayaanHistory::select('created_at')->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => PasarNasabahh::select()->where('id', $id)->first(),
            'fotos' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->get(),
            'fototoko' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto toko')->first(),
            'fotodiri' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'fotoktp' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotodiribersamaktp' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->first(),
            'fotokk' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'jaminanusahas' => PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->get(),
            'jaminanlainusahas' => PasarJaminanLain::select()->where('pasar_pembiayaan_id', $id)->get(),
            'usahas' => PasarKeteranganUsaha::all(), //udah
            'akads' => PasarAkad::all(),
            'sektors' => PasarSektorEkonomi::all(),
            'konfirmasi' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Konfirmasi Kepala Pasar')->first(),
            'nota' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->first(),
            'pasars' => PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->first(),
            'lamas' => PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->first(),
            'rumahs' => PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first(),
            'dagangs' => PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->first(),
            'cashs' => PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->first(),
            'nasabahs' => PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->first(),
            'sukus' => PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->first(),
            'jaminans' => PasarJenisJaminan::select()->where('kode_jaminan', optional($jaminanlain)->jaminanlain)->first()
                ?? (object) ['nama_jaminan' => '-', 'bobot' => 0],
            'slik' => $prosesslik,
            'idebs' => PasarSlik::select()->where('pasar_pembiayaan_id', $id)->get(),
            'cicilanpasangans' => PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->get(),
            'ideb' => PasarPembiayaan::select()->where('id', $id)->get(),
            'kepalapasar' => $proses_kepalapasar,
            'idir' => $proses_idir,
            'laba_bersih' => $laba_bersih,
            'cicilan' => $cicilan,
            'cekcicilanpasangan' => $cekcicilanpasangan,
            'pengeluaran_lain' => $pengeluaranlain,
            'total_pengeluaran' => $total_pengeluaran,
            'angsuran' => $angsuran1,
            'nilai_idir' => $idir,
            'harga_jual' => $harga_jual,

            //rating
            'rating_kepalapasar' => $score_kepalapasar,
            'rating_jenispasar' => $score_jenispasar,
            'rating_jenisdagang' => $score_jenisdagang,
            'rating_sukubangsa' => $score_sukubangsa,
            'rating_lamadagang' => $score_lamadagang,
            'rating_jaminanrumah' => $score_jaminanrumahr,
            'rating_cashpick' => $score_cashpick,
            'rating_jenisnasabah' => $score_jenisnasabah,
            'rating_slik' => $score_slik,
            'rating_idir' => $score_idir,
            'rating_jaminanlain' => $score_jaminanlain,

            'score_kepalapasar' => $score_kepalapasar * $proses_kepalapasar->bobot,
            'score_jenispasar' => $score_jenispasar * $proses_jenispasar->bobot,
            'score_jenisdagang' => $score_jenisdagang *  $proses_jenisdagang->bobot,
            'score_sukubangsa' => $score_sukubangsa * $proses_sukubangsa->bobot,
            'score_lamadagang' => $score_lamadagang * $proses_lamadagang->bobot,
            'score_jaminanrumah' => $score_jaminanrumahr * $proses_jaminanrumah->bobot,
            'score_cashpick' => $score_cashpick * $proses_cashpickup->bobot,
            'score_jenisnasabah' => $score_jenisnasabah * $proses_jenisnasabah->bobot,
            'score_slik' => $score_slik * $prosesslik->bobot,
            'score_idir' => $score_idir * $proses_idir->bobot,
            'score_jaminanlain' => $score_jaminanlain * (optional($proses_jaminanlain)->bobot ?? 0),


            //perhitunganSLA
            'totalwaktu' => $totalwaktu,
            'next' => $next,
            'arr' => -2,
            'banyak_history' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->count(),

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
