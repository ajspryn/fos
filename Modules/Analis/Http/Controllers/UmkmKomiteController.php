<?php

namespace Modules\Analis\Http\Controllers;

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

class UmkmKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $search = request('search');

        $latestSub = UmkmPembiayaanHistory::selectRaw('umkm_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('umkm_pembiayaan_id');

        $proposalIds = UmkmPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('umkm_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('umkm_pembiayaan_histories.status_id', 3)
                        ->where('umkm_pembiayaan_histories.jabatan_id', 1);
                })->orWhere(function ($q2) {
                    $q2->where('umkm_pembiayaan_histories.status_id', 4)
                        ->where('umkm_pembiayaan_histories.jabatan_id', 3);
                });
            })
            ->pluck('umkm_pembiayaan_histories.umkm_pembiayaan_id');

        $latestHistories = UmkmPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('umkm_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->whereNotIn('umkm_pembiayaan_histories.umkm_pembiayaan_id', $proposalIds)
            ->get(['umkm_pembiayaan_histories.umkm_pembiayaan_id', 'status_id', 'jabatan_id']);

        $histories = $latestHistories->keyBy('umkm_pembiayaan_id');
        $komiteIds = $latestHistories->pluck('umkm_pembiayaan_id')->unique();

        $query = UmkmPembiayaan::with(['nasabahh', 'keteranganusaha', 'user'])
            ->whereIn('id', $komiteIds);

        if ($search) {
            $query->whereHas('nasabahh', function ($q) use ($search) {
                $q->where('nama_nasabah', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        $komites = $query->orderByDesc('tgl_pembiayaan')->paginate(10)->withQueryString();

        return view('analis::umkm.komite.index', [
            'title' => 'Data Komite',
            'komites' => $komites,
            'histories' => $histories,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('analis::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        UmkmPembiayaanHistory::create([
            'umkm_pembiayaan_id' => $request->umkm_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => 3,
            'divisi_id' => null,

        ]);

        if ($request->status_id == 11) {
            return redirect('/analis/umkm/komite/')->with('success', 'Proposal Berhasil Direkomendasikan!');
        } elseif ($request->status_id == 7) {
            return redirect('/analis/umkm/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
        } else {
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cek = UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        if ($cek && $cek->status_id == 3 && $cek->jabatan_id == 1) {
            UmkmPembiayaanHistory::create([
                'umkm_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 3,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = UmkmPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }
        $nasabah = UmkmNasabah::select()->where('id', $data->nasabah_id)->first();
        $usaha = UmkmKeteranganUsaha::select()->where('umkm_pembiayaan_id', $id)->first();
        $jaminanrumah = UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id', $id)->first();
        $jaminanlain = UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->first();
        $tenor = (float)str_replace('.', '', $data->tenor ?? '0');
        $harga = (float)str_replace('.', '', $data->nominal_pembiayaan ?? '0');
        $rate = (float)($data->rate ?? 0);
        $margin = $tenor > 0 ? ($rate * $tenor) / 100 : 0;
        $cash = PasarCashPick::select()->first();

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;

        $angsuran1 = $tenor > 0 ? (int)($harga_jual / $tenor) : 0;


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

        //pengeluaran

        $cicilan = UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->sum('angsuran');
        $biaya_anak = $nasabah->tanggungan->biaya;
        $biaya_istri = $nasabah->status->biaya;
        $kebutuhan_keluarga = UmkmPembiayaan::select()->where('id', $id)->sum('keb_keluarga');
        $pengeluaranlain = $biaya_anak + $biaya_istri + $kebutuhan_keluarga;
        $total_pengeluaran = ($pengeluaranlain + $cicilan);
        $cekcicilanpasangan = UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->count();


        if ($cekcicilanpasangan > 0) {
            $cicilanpasangan =   $cekcicilanpasangan = UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->sum('angsuran');

            $total_pengeluaran = $pengeluaranlain + $cicilan + $cicilanpasangan;
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

        $score_jenisdagang = optional($proses_jenisdagang)->rating ?? 0;
        $score_sukubangsa = optional($proses_sukubangsa)->rating ?? 0;
        $score_lamadagang = optional($proses_lamadagang)->rating ?? 0;
        $score_jaminanrumahr = optional($proses_jaminanrumah)->rating ?? 0;
        $score_cashpick = optional($proses_cashpickup)->rating ?? 0;
        $score_jenisnasabah = optional($proses_jenisnasabah)->rating ?? 0;
        $score_jaminanlain = optional($proses_jaminanlain)->rating ?? 0;

        $idir = number_format(($angsuran1) / ($di) * 100);

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



        $score_idir = optional($proses_idir)->rating ?? 0;
        //slik

        $data_slik = UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->orderBy('kol', 'desc')->first();

        if (!isset($data_slik)) {
            $prosesslik = PasarScoreSlik::select()->where('kol', null)->first();
        } else {
            $prosesslik = PasarScoreSlik::select()->where('kol', $data_slik->kol)->first();
        }
        $score_slik = optional($prosesslik)->rating ?? 0;


        //SLA
        $waktuawal = UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuakhir = UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);


        //    return $harga1;
        return view('analis::umkm.komite.lihat', [
            'title' => 'Detail Calon Nasabah',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'timelines' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->get(),
            'history' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->first(),
            'nasabah' => UmkmNasabah::select()->where('id', $id)->first(),
            'fotos' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->get(),
            'fototoko' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto toko')->first(),
            'fotodiri' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->first(),
            'fotoktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotodiribersamaktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->first(),
            'fotokk' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
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
            'nota' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->first(),
            // 'slik'=>$prosesslik,
            'idebs' => UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->get(),
            'ideppasangans' => UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->get(),
            'ideb' => UmkmPembiayaan::select()->where('id', $id)->get(),
            'laba_bersih' => $laba_bersih,
            'total_pendapatan_bersih' => $total_pendapatan_bersih,
            'cicilan' => $cicilan,
            'cekcicilanpasangan' => $cekcicilanpasangan,
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

            'score_jenisdagang' => $score_jenisdagang * (optional($proses_jenisdagang)->bobot ?? 0),
            'score_sukubangsa' => $score_sukubangsa * (optional($proses_sukubangsa)->bobot ?? 0),
            'score_lamadagang' => $score_lamadagang * (optional($proses_lamadagang)->bobot ?? 0),
            'score_jaminanrumah' => $score_jaminanrumahr * (optional($proses_jaminanrumah)->bobot ?? 0),
            'score_cashpick' => $score_cashpick * (optional($proses_cashpickup)->bobot ?? 0),
            'score_jenisnasabah' => $score_jenisnasabah * (optional($proses_jenisnasabah)->bobot ?? 0),
            'score_slik' => $score_slik * (optional($prosesslik)->bobot ?? 0),
            'score_idir' => $score_idir * (optional($proses_idir)->bobot ?? 0),
            'score_jaminanlain' => $score_jaminanlain * (optional($proses_jaminanlain)->bobot ?? 0),


            'deviasi' => UmkmDeviasi::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),


            //SLA
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->count(),


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('analis::edit');
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
