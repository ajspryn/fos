<?php

namespace Modules\Dirbis\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\P3kScoreDsr;
use Modules\Admin\Entities\P3kScoreSlik;
use Modules\Admin\Entities\P3kScoreTenor;
use Modules\Admin\Entities\P3kScoreUsia;
use Modules\P3k\Entities\P3kDeviasi;
use Modules\P3k\Entities\P3kFoto;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;
use Modules\P3k\Entities\P3kSlik;
use Modules\P3k\Entities\P3kSlikPasangan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class P3kKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite = P3kPembiayaanHistory::select()
            ->latest()
            ->groupBy('p3k_pembiayaan_id')
            ->where(function ($query) {
                $query
                    ->where('status_id', 5)
                    ->where('user_id', Auth::user()->id);
            })
            ->orWhere(function ($query) {
                $query
                    ->where('status_id', '>=', 9)
                    ->where('user_id', Auth::user()->id);
            })
            ->orWhere(function ($query) {
                $query
                    ->where('status_id', 5)
                    ->where('jabatan_id', 2);
            })
            ->orWhere(function ($query) {
                $query
                    ->where('status_id', 4)
                    ->where('jabatan_id', 4);
            })
            ->get();

        return view('dirbis::p3k.komite.index', [
            'title' => 'Data Komite',
            'proposals' => $komite,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        P3kPembiayaanHistory::create([
            'p3k_pembiayaan_id' => $request->p3k_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => $request->jabatan_id,
            'divisi_id' => null,
        ]);

        if ($request->status_id == 5) {
            return redirect('/dirbis/p3k/komite/')->with('success', 'Proposal Berhasil Disetujui!');
        } elseif ($request->status_id == 7) {
            return redirect('/dirbis/p3k/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
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
        $cek = P3kPembiayaanHistory::select()
            ->where('p3k_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        if ($cek && $cek->status_id == 5 && $cek->jabatan_id == 2) {
            P3kPembiayaanHistory::create([
                'p3k_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 4,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = P3kPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }

        //Angsuran
        $nominalPembiayaan = $data->nominal_pembiayaan;
        $tenor = $data->tenor;
        $rate = $data->rate / 100;

        $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
        $angsuran = $hargaJual / $tenor;
        $totalAngsuranBtbFasAktif = $data->total_angsuran_btb_fas_aktif;

        //Biaya Administrasi
        $byAdm = 1.5 / 100 * $nominalPembiayaan;

        //Pendapatan
        $gajiPokok = $data->gaji_pokok;
        $gajiTpp = $data->gaji_tpp;
        $gajiPasangan = $data->gaji_pasangan;
        $totalPendapatan = $gajiPokok + $gajiTpp;
        $totalPendapatanJoinIncome = $gajiPokok + $gajiTpp + $gajiPasangan;

        //Pengeluaran
        $pengeluaranLainnya = $data->pengeluaran_lainnya;

        //Pendapatan bersih
        $pendapatanBersih = $totalPendapatan - $totalAngsuranBtbFasAktif - $pengeluaranLainnya;
        $pendapatanBersihJoinIncome = $totalPendapatanJoinIncome - $totalAngsuranBtbFasAktif - $pengeluaranLainnya;

        //Proses Scoring
        //DSR
        $dsr = number_format((($angsuran + $totalAngsuranBtbFasAktif) / $totalPendapatan) * 100);
        //DSR Join Income
        $dsrJoinIncome = number_format((($angsuran + $totalAngsuranBtbFasAktif) / $totalPendapatanJoinIncome) * 100);

        if ($dsr >= 80 && $dsr <= 90) {
            $prosesDsr = P3kScoreDsr::select()->where('id', 1)->first();
        } else if ($dsr >= 70 && $dsr <= 79) {
            $prosesDsr = P3kScoreDsr::select()->where('id', 2)->first();
        } else if ($dsr >= 60 && $dsr <= 69) {
            $prosesDsr = P3kScoreDsr::select()->where('id', 3)->first();
        } else if ($dsr >= 0 && $dsr <= 59) {
            $prosesDsr = P3kScoreDsr::select()->where('id', 4)->first();
        }
        //DSR > 90%
        else {
            $prosesDsr = P3kScoreDsr::select()->where('id', 5)->first();
        }

        $ratingDsr = $prosesDsr->rating;
        $bobotDsr = $prosesDsr->bobot;
        $scoreDsr = $ratingDsr * $bobotDsr;

        // //IDEB
        // $cekIdeb = P3kSlik::select()->where('p3k_pembiayaan_id', $id)->orderBy('kol_tertinggi', 'DESC')->first();
        // if ($cekIdeb) {
        //     $kolTertinggi = $cekIdeb->kol_tertinggi;
        //     if ($kolTertinggi == 5) {
        //         $prosesIdeb = P3kScoreSlik::select()->where('id', 1)->first();
        //     } else if ($kolTertinggi == 4) {
        //         $prosesIdeb = P3kScoreSlik::select()->where('id', 2)->first();
        //     } else if ($kolTertinggi == 3) {
        //         $prosesIdeb = P3kScoreSlik::select()->where('id', 3)->first();
        //     } else if ($kolTertinggi == 2) {
        //         $prosesIdeb = P3kScoreSlik::select()->where('id', 4)->first();
        //     } else if ($kolTertinggi == 1) {
        //         $prosesIdeb = P3kScoreSlik::select()->where('id', 5)->first();
        //     } else {
        //     }
        // }
        // //Jika tidak ada IDEB
        // else {
        //     $prosesIdeb = P3kScoreSlik::select()->where('id', 6)->first();
        // }

        // $ratingIdeb = $prosesIdeb->rating;
        // $bobotIdeb = $prosesIdeb->bobot;
        // $scoreIdeb = $ratingIdeb * $bobotIdeb;

        //Usia
        $usia = Carbon::parse($data->nasabah->tgl_lahir)->age;

        if ($usia >= 50 && $usia <= 55) {
            $prosesUsia = P3kScoreUsia::select()->where('id', 1)->first();
        } else if ($usia >= 40 && $usia <= 49) {
            $prosesUsia = P3kScoreUsia::select()->where('id', 2)->first();
        } else if ($usia >= 30 && $usia <= 39) {
            $prosesUsia = P3kScoreUsia::select()->where('id', 3)->first();
        } else if ($usia >= 20 && $usia <= 29) {
            $prosesUsia = P3kScoreUsia::select()->where('id', 4)->first();
        }
        //Usia >= 56 Tahun
        else {
            $prosesUsia = P3kScoreUsia::select()->where('id', 5)->first();
        }

        $ratingUsia = $prosesUsia->rating;
        $bobotUsia = $prosesUsia->bobot;
        $scoreUsia = $ratingUsia * $bobotUsia;

        //Tenor
        if ($tenor >= 120 && $tenor <= 240) {
            $prosesTenor = P3kScoreTenor::select()->where('id', 1)->first();
        } else if ($tenor >= 96 && $tenor <= 108) {
            $prosesTenor = P3kScoreTenor::select()->where('id', 2)->first();
        } else if ($tenor >= 72 && $tenor <= 84) {
            $prosesTenor = P3kScoreTenor::select()->where('id', 3)->first();
        }
        //Tenor <= 5 tahun
        else {
            $prosesTenor = P3kScoreTenor::select()->where('id', 4)->first();
        }

        $ratingTenor = $prosesTenor->rating;
        $bobotTenor = $prosesTenor->bobot;
        $scoreTenor = $ratingTenor * $bobotTenor;


        //Timeline
        $waktuAwal = P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuAkhir = P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();

        $waktuMulai = Carbon::parse($waktuAwal->created_at);
        $waktuBerakhir = Carbon::parse($waktuAkhir->created_at);

        $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);

        return view('dirbis::p3k.komite.lihat', [
            'title' => 'Detail Proposal',
            'arr' => -2,
            'banyakHistory' => P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $id)->count(),
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => P3kPembiayaan::select()->where('id', $id)->first(),
            'timelines' => P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $id)->get(),

            'fotos' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->get(),
            'bonMurabahah' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Bon Murabahah')->first(),
            'fotoKtp' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotoKartuKeluarga' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fotoNpwp' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto NPWP')->first(),
            'fotoKtpPasangan' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Foto KTP Pasangan')->first(),
            'fotoStatusPernikahan' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'Akta Status Pernikahan/Perceraian')->first(),
            'dokumenIdebPasangan' => P3kFoto::select()->where('p3k_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->first(),
            'deviasi' => P3kDeviasi::select()->where('p3k_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),

            // 'idebs' => P3kSlik::select()->where('p3k_pembiayaan_id', $id)->get(),
            // 'idebPasangans' => P3kSlikPasangan::select()->where('p3k_pembiayaan_id', $id)->get(),

            'hargaJual' => $hargaJual,
            'tenor' => $tenor,
            'rate' => $rate,
            'angsuran' => $angsuran,
            'pendapatanBersih' => $pendapatanBersih,
            'pendapatanBersihJoinIncome' => $pendapatanBersihJoinIncome,
            'byAdm' => $byAdm,

            //DSR
            'dsr' => $dsr,
            'dsrJoinIncome' => $dsrJoinIncome,

            //Scoring
            'prosesDsr' => $prosesDsr,
            // 'prosesIdeb' => $prosesIdeb,
            'prosesUsia' => $prosesUsia,
            'prosesTenor' => $prosesTenor,

            'ratingDsr' => $ratingDsr,
            // 'ratingIdeb' => $ratingIdeb,
            'ratingUsia' => $ratingUsia,
            'ratingTenor' => $ratingTenor,

            'bobotDsr' => $bobotDsr,
            // 'bobotIdeb' => $bobotIdeb,
            'bobotUsia' => $bobotUsia,
            'bobotTenor' => $bobotTenor,

            'scoreDsr' => $scoreDsr,
            // 'scoreIdeb' => $scoreIdeb,
            'scoreUsia' => $scoreUsia,
            'scoreTenor' => $scoreTenor,
            //History
            'history' => P3kPembiayaanHistory::select()->where('p3k_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),

            //SLA
            'totalWaktu' => $totalWaktu,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirbis::edit');
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
