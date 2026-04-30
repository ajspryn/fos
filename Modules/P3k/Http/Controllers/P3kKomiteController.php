<?php

namespace Modules\P3k\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $proposals = P3kPembiayaan::with(['nasabah.pekerjaan'])
            ->where('user_id', Auth::user()->id)
            ->whereNotNull('dokumen_ideb')
            ->when($search, function ($q) use ($search) {
                $q->whereHas('nasabah', function ($q2) use ($search) {
                    $q2->where('nama_nasabah', 'like', "%{$search}%")
                        ->orWhere('no_ktp', 'like', "%{$search}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(25)
            ->appends($request->only('search'));

        $proposalIds = $proposals->pluck('id');

        $latestSub = P3kPembiayaanHistory::selectRaw('p3k_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('p3k_pembiayaan_id');

        $histories = P3kPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('p3k_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->whereIn('p3k_pembiayaan_histories.p3k_pembiayaan_id', $proposalIds)
            ->with(['statushistory', 'jabatan'])
            ->get()
            ->keyBy('p3k_pembiayaan_id');

        $bonMurabahah = P3kFoto::whereIn('p3k_pembiayaan_id', $proposalIds)
            ->where('kategori', 'Bon Murabahah')
            ->get()
            ->keyBy('p3k_pembiayaan_id');

        return view('p3k::komite.index', [
            'title' => 'Proposal Calon Nasabah',
            'proposals' => $proposals,
            'histories' => $histories,
            'bonMurabahah' => $bonMurabahah,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('p3k::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $role = role::select()->where('user_id', Auth::user()->id)->first();

        P3kPembiayaanHistory::create([
            'p3k_pembiayaan_id' => $request->p3k_pembiayaan_id,
            'status_id' => $request->status_id,
            'catatan' => $request->catatan,
            'jabatan_id' => $role->jabatan_id,
            'divisi_id' => $role->divisi_id,
            'user_id' => Auth::user()->id,
        ]);

        if ($request->file('dokumen_deviasi')) {

            //Store file dengan nama asli
            $dokumenDeviasi = $request->file('dokumen_deviasi');
            $dokumenDeviasiName = time() . '_' . $dokumenDeviasi->getClientOriginalName();
            $request->file('dokumen_deviasi')->storeAs('p3k-dokumen-deviasi', $dokumenDeviasiName, 'public');
            $filePathDokumenDeviasi = 'p3k-dokumen-deviasi/' . $dokumenDeviasiName;

            P3kDeviasi::create([
                'p3k_pembiayaan_id' => $request->p3k_pembiayaan_id,
                'kategori_deviasi' => $request->kategori_deviasi,
                'dokumen_deviasi' => $filePathDokumenDeviasi,
            ]);
            return redirect('p3k/komite/' . $request->p3k_pembiayaan_id)->with('success', 'Dokumen Deviasi Berhasil Diupload!');
        }

        if ($request->status_id == 3) {
            return redirect('p3k/komite')->with('success', 'Proposal Berhasil Diajukan!');
        } elseif ($request->status_id == 7) {
            return redirect('p3k/komite')->with('success', 'Proposal Diajukan Untuk Revisi!');
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
        // $cek = P3kPembiayaanHistory::select()
        //     ->where('p3k_pembiayaan_id', $id)
        //     ->where('user_id', Auth::user()->id)
        //     ->get()
        //     ->count();

        // if ($cek == 0) {
        //     P3kPembiayaanHistory::create([
        //         'p3k_pembiayaan_id' => $id,
        //         'status_id' => 2,
        //         'jabatan_id' => 1,
        //         'divisi_id' => 0,
        //         'user_id' => Auth::user()->id,
        //     ]);
        // }

        $data = P3kPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }

        $toNumber = static function ($value): float {
            $str = str_replace('.', '', (string) ($value ?? '0'));
            $str = str_replace(',', '.', $str);
            return (float) $str;
        };

        //Angsuran
        $nominalPembiayaan = $toNumber($data->nominal_pembiayaan);
        $tenor = (float) ($data->tenor ?? 0);
        $rate = (float) ($data->rate ?? 0) / 100;

        $hargaJual = $tenor > 0 ? ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan : 0;
        $angsuran = $tenor > 0 ? $hargaJual / $tenor : 0;
        $totalAngsuranBtbFasAktif = $toNumber($data->total_angsuran_btb_fas_aktif);

        //Biaya Administrasi
        $byAdm = 1.5 / 100 * $nominalPembiayaan;

        //Pendapatan
        $gajiPokok = $toNumber($data->gaji_pokok);
        $gajiTpp = $toNumber($data->gaji_tpp);
        $gajiPasangan = $toNumber($data->gaji_pasangan);
        $totalPendapatan = $gajiPokok + $gajiTpp;
        $totalPendapatanJoinIncome = $gajiPokok + $gajiTpp + $gajiPasangan;

        //Pengeluaran
        $pengeluaranLainnya = $toNumber($data->pengeluaran_lainnya);

        //Pendapatan bersih
        $pendapatanBersih = $totalPendapatan - $totalAngsuranBtbFasAktif - $pengeluaranLainnya;
        $pendapatanBersihJoinIncome = $totalPendapatanJoinIncome - $totalAngsuranBtbFasAktif - $pengeluaranLainnya;

        //Proses Scoring
        //DSR
        $dsr = $totalPendapatan > 0
            ? (int) number_format((($angsuran + $totalAngsuranBtbFasAktif) / $totalPendapatan) * 100)
            : 0;
        //DSR Join Income
        $dsrJoinIncome = $totalPendapatanJoinIncome > 0
            ? (int) number_format((($angsuran + $totalAngsuranBtbFasAktif) / $totalPendapatanJoinIncome) * 100)
            : 0;


        // Cache DSR score table to avoid multiple DB hits
        $scoresDsr = P3kScoreDsr::all()->keyBy('id');
        if ($dsr >= 80 && $dsr <= 90) {
            $prosesDsr = $scoresDsr->get(1);
        } else if ($dsr >= 70 && $dsr <= 79) {
            $prosesDsr = $scoresDsr->get(2);
        } else if ($dsr >= 60 && $dsr <= 69) {
            $prosesDsr = $scoresDsr->get(3);
        } else if ($dsr >= 0 && $dsr <= 59) {
            $prosesDsr = $scoresDsr->get(4);
        }
        //DSR > 90%
        else {
            $prosesDsr = $scoresDsr->get(5);
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
        $usiaInMonth = $usia * 12;
        $sisaUsia = 696 - $usiaInMonth;
        $akhirPembiayaan = ($usiaInMonth + $data->tenor) / 12;

        // Cache Usia score table
        $scoresUsia = P3kScoreUsia::all()->keyBy('id');
        if ($usia >= 50 && $usia <= 55) {
            $prosesUsia = $scoresUsia->get(1);
        } else if ($usia >= 40 && $usia <= 49) {
            $prosesUsia = $scoresUsia->get(2);
        } else if ($usia >= 30 && $usia <= 39) {
            $prosesUsia = $scoresUsia->get(3);
        } else if ($usia >= 20 && $usia <= 29) {
            $prosesUsia = $scoresUsia->get(4);
        }
        //Usia >= 56 Tahun
        else {
            $prosesUsia = $scoresUsia->get(5);
        }

        $ratingUsia = $prosesUsia->rating;
        $bobotUsia = $prosesUsia->bobot;
        $scoreUsia = $ratingUsia * $bobotUsia;

        //Tenor
        // Cache Tenor score table
        $scoresTenor = P3kScoreTenor::all()->keyBy('id');
        if ($tenor >= 120 && $tenor <= 240) {
            $prosesTenor = $scoresTenor->get(1);
        } else if ($tenor >= 96 && $tenor <= 108) {
            $prosesTenor = $scoresTenor->get(2);
        } else if ($tenor >= 72 && $tenor <= 84) {
            $prosesTenor = $scoresTenor->get(3);
        }
        //Tenor <= 5 tahun
        else {
            $prosesTenor = $scoresTenor->get(4);
        }

        $ratingTenor = $prosesTenor->rating;
        $bobotTenor = $prosesTenor->bobot;
        $scoreTenor = $ratingTenor * $bobotTenor;

        $timelines = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        $banyakHistory = $timelines->count();
        $history = $timelines->last();

        if ($timelines->isNotEmpty()) {
            $waktuMulai = Carbon::parse($timelines->first()->created_at);
            $waktuBerakhir = Carbon::parse($timelines->last()->created_at);
            $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);
        } else {
            $totalWaktu = null;
        }

        // fetch fotos once and reuse
        $fotosAll = P3kFoto::select()->where('p3k_pembiayaan_id', $id)->get();

        $totalScore = $scoreDsr + $scoreUsia + $scoreTenor;

        return view('p3k::komite.lihat', [
            'title' => 'Detail Proposal',
            'arr' => -2,
            'banyakHistory' => $banyakHistory,
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => $data,
            'timelines' => $timelines,

            'fotos' => $fotosAll,
            'bonMurabahah' => $fotosAll->firstWhere('kategori', 'Bon Murabahah'),
            'fotoKtp' => $fotosAll->firstWhere('kategori', 'Foto KTP'),
            'fotoKartuKeluarga' => $fotosAll->firstWhere('kategori', 'Foto Kartu Keluarga'),
            'fotoNpwp' => $fotosAll->firstWhere('kategori', 'Foto NPWP'),
            'fotoKtpPasangan' => $fotosAll->firstWhere('kategori', 'Foto KTP Pasangan'),
            'fotoStatusPernikahan' => $fotosAll->firstWhere('kategori', 'Akta Status Pernikahan/Perceraian'),
            'dokumenIdebPasangan' => $fotosAll->firstWhere('kategori', 'IDEB Pasangan'),
            'deviasi' => P3kDeviasi::select()->where('p3k_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),

            'idebs' => P3kSlik::select()->where('p3k_pembiayaan_id', $id)->get(),
            'idebPasangans' => P3kSlikPasangan::select()->where('p3k_pembiayaan_id', $id)->get(),

            'hargaJual' => $hargaJual,
            'tenor' => $tenor,
            'rate' => $rate,
            'angsuran' => $angsuran,
            'pendapatanBersih' => $pendapatanBersih,
            'pendapatanBersihJoinIncome' => $pendapatanBersihJoinIncome,
            'byAdm' => $byAdm,

            'usiaInMonth' => $usiaInMonth,
            'sisaUsia' => $sisaUsia,
            'akhirPembiayaan' => $akhirPembiayaan,

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
            'total_score' => $totalScore,

            //History
            'history' => $history,

            //SLA
            'totalWaktu' => $totalWaktu,
        ]);
    }

    public function uploadBonMurabahah(Request $request)
    {
        if ($request->file('bon_murabahah')) {
            $bonMurabahah = $request->file('bon_murabahah')->store('foto-p3k-pembiayaan', 'public');
            P3kFoto::create([
                'p3k_pembiayaan_id' => $request->p3k_pembiayaan_id,
                'kategori' => 'Bon Murabahah',
                'foto' => $bonMurabahah,
            ]);
        }


        return redirect('/skpd/komite')->with('success', 'Bon Murabahah Berhasil diupload!');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('p3k::edit');
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
