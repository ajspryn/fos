<?php

namespace Modules\Analis\Http\Controllers;

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
        $search = request('search');

        $latestSub = PasarPembiayaanHistory::selectRaw('pasar_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('pasar_pembiayaan_id');

        // IDs yang masih di antrian proposal (exclude dari komite)
        $proposalIds = PasarPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('pasar_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('pasar_pembiayaan_histories.status_id', 3)
                        ->where('pasar_pembiayaan_histories.jabatan_id', 1);
                })->orWhere(function ($q2) {
                    $q2->where('pasar_pembiayaan_histories.status_id', 4)
                        ->where('pasar_pembiayaan_histories.jabatan_id', 3);
                });
            })
            ->pluck('pasar_pembiayaan_histories.pasar_pembiayaan_id');

        $latestHistories = PasarPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('pasar_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->whereNotIn('pasar_pembiayaan_histories.pasar_pembiayaan_id', $proposalIds)
            ->get([
                'pasar_pembiayaan_histories.pasar_pembiayaan_id',
                'status_id',
                'jabatan_id',
                'user_id',
            ]);

        $histories = $latestHistories->keyBy('pasar_pembiayaan_id');
        $komiteIds = $latestHistories->pluck('pasar_pembiayaan_id')->unique();

        $query = PasarPembiayaan::with(['nasabahh', 'keteranganusaha.jenispasar', 'user'])
            ->whereIn('id', $komiteIds);

        if ($search) {
            $query->whereHas('nasabahh', function ($q) use ($search) {
                $q->where('nama_nasabah', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        $komites = $query->orderByDesc('tgl_pembiayaan')->paginate(10)->withQueryString();

        return view('analis::pasar.komite.index', [
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
        PasarPembiayaanHistory::create([
            'pasar_pembiayaan_id' => $request->pasar_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => 3,
            'divisi_id' => null,
        ]);

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('foto-pasar-pembiayaan');
            PasarFoto::create([
                'pasar_pembiayaan_id' => $request->pasar_pembiayaan_id,
                'kategori' => 'Konfirmasi Kepala Pasar',
                'foto' => $foto,
            ]);
        }

        if ($request->status_id == 11) {
            return redirect('/analis/pasar/komite/')->with('success', 'Proposal Berhasil Direkomendasikan!');
        } elseif ($request->status_id == 7) {
            return redirect('/analis/pasar/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
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
        $cek = PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        if ($cek && $cek->status_id == 5 && $cek->jabatan_id == 2) {
            PasarPembiayaanHistory::create([
                'pasar_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 3,
                'divisi_id' => null,
                'user_id' => Auth::user()->id,
            ]);
        }
        $historyStatus = PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();


        $data = PasarPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }
        $nasabah = PasarNasabahh::select()->where('id', $data->nasabah_id)->first();
        $usaha = PasarKeteranganUsaha::select()->where('pasar_pembiayaan_id', $id)->first();
        $pasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->first();
        $jaminanrumah = PasarLegalitasRumah::select()->where('pasar_pembiayaan_id', $id)->first();
        $jaminanlain = PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->first();
        $tenor = (float)str_replace('.', '', $data->tenor ?? '0');
        $harga = (float)str_replace('.', '', $data->harga ?? '0');
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


        $proses_jaminanlain = PasarJenisJaminan::select()->where('kode_jaminan', optional($jaminanlain)->jaminanlain)->first();

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

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);

        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        //    return $harga1;
        return view('analis::pasar.komite.lihat', [
            'title' => 'Detail Calon Nasabah',
            // 'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->first(),
            'deviasi' => PasarDeviasi::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'timelines' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->get(),
            'history' => $historyStatus,
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
            'nota' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->first(),
            'pasars' => PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->first(),
            'lamas' => PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->first(),
            'rumahs' => PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->first(),
            'dagangs' => PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->first(),
            'cashs' => PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->first(),
            'nasabahs' => PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->first(),
            'sukus' => PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->first(),
            'jaminans' => PasarJenisJaminan::select()->where('kode_jaminan', optional($jaminanlain)->jaminanlain)->first() ?? (object)['nama_jaminan' => '-', 'bobot' => 0],
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
            'rating_jaminanlain' => $score_jaminanlain ?? 0,

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
            'score_jaminanlain' => ($score_jaminanlain ?? 0) * (optional($proses_jaminanlain)->bobot ?? 0),


            //perhitunganSLA
            'totalwaktu' => $totalwaktu,
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
