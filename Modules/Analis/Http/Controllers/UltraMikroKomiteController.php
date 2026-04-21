<?php

namespace Modules\Analis\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\UltraMikro\Entities\UltraMikroScoreSlik;
use Modules\UltraMikro\Entities\UltraMikroScoreRepayment;
use Modules\UltraMikro\Entities\UltraMikroScoreTempatTinggal;
use Modules\UltraMikro\Entities\UltraMikroScoreKelompok;
use Modules\UltraMikro\Entities\UltraMikroScoreUsia;
use Modules\UltraMikro\Entities\UltraMikroFoto;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;
use Modules\UltraMikro\Entities\UltraMikroPembiayaanHistory;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class UltraMikroKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $search = request('search');

        $latestSub = UltraMikroPembiayaanHistory::selectRaw('ultra_mikro_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('ultra_mikro_pembiayaan_id');

        $proposalIds = UltraMikroPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ultra_mikro_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('ultra_mikro_pembiayaan_histories.status_id', 3)
                        ->where('ultra_mikro_pembiayaan_histories.jabatan_id', 1);
                })->orWhere(function ($q2) {
                    $q2->where('ultra_mikro_pembiayaan_histories.status_id', 4)
                        ->where('ultra_mikro_pembiayaan_histories.jabatan_id', 3);
                });
            })
            ->pluck('ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id');

        $latestHistories = UltraMikroPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('ultra_mikro_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->whereNotIn('ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id', $proposalIds)
            ->get([
                'ultra_mikro_pembiayaan_histories.ultra_mikro_pembiayaan_id',
                'status_id',
                'jabatan_id',
                'user_id',
                'catatan',
            ]);

        $histories = $latestHistories->keyBy('ultra_mikro_pembiayaan_id');
        $komiteIds = $latestHistories->pluck('ultra_mikro_pembiayaan_id')->unique();

        $query = UltraMikroPembiayaan::with(['nasabah', 'user'])
            ->whereIn('id', $komiteIds);

        if ($search) {
            $query->whereHas('nasabah', function ($q) use ($search) {
                $q->where('nama_nasabah', 'like', "%{$search}%")
                    ->orWhere('no_ktp', 'like', "%{$search}%");
            });
        }

        $proposals = $query->orderByDesc('tanggal_pengajuan')->paginate(10)->withQueryString();

        return view('analis::ultra_mikro.komite.index', [
            'title' => 'Data Komite',
            'proposals' => $proposals,
            'histories' => $histories,
            'search' => $search,
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
        UltraMikroPembiayaanHistory::create([
            'ultra_mikro_pembiayaan_id' => $request->ultra_mikro_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => $request->jabatan_id,
            'divisi_id' => null,
        ]);

        if ($request->status_id == 11) {
            return redirect('/analis/ultra_mikro/komite/')->with('success', 'Proposal Berhasil Direkomendasikan!');
        } elseif ($request->status_id == 7) {
            return redirect('/analis/ultra_mikro/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
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
        $cek = UltraMikroPembiayaanHistory::select()
            ->where('ultra_mikro_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        if ($cek && $cek->status_id == 3 && $cek->jabatan_id == 1) {
            UltraMikroPembiayaanHistory::create([
                'ultra_mikro_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 3,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = UltraMikroPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }

        //Angsuran
        $nominalPembiayaan = (float)str_replace('.', '', $data->nominal_pembiayaan ?? '0');
        $tenor = (float)str_replace('.', '', $data->tenor ?? '0');
        // $rate = $data->rate / 100;

        if ($data->frekuensi_pembayaran == "Setiap 1 Minggu") {
            $minggu = "Minggu";
            $frekuensiPembayaran = 4;
        } elseif ($data->frekuensi_pembayaran == "Setiap 2 Minggu") {
            $minggu = "2 Minggu";
            $frekuensiPembayaran = 2;
        } else {
            $minggu = "4 Minggu";
            $frekuensiPembayaran = 1;
        }


        // $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
        $angsuran = $tenor > 0 ? $nominalPembiayaan / $tenor : 0;
        $angsuranPerKunjungan = $frekuensiPembayaran > 0 ? $angsuran / $frekuensiPembayaran : 0;

        //Biaya Administrasi
        // $byAdm = 1.5 / 100 * $nominalPembiayaan;

        //Pendapatan
        $penghasilan = (float)str_replace('.', '', $data->penghasilan ?? '0');
        $pengeluaran = (float)str_replace('.', '', $data->pengeluaran ?? '0');

        //Pendapatan bersih
        $pendapatanBersih = $penghasilan - $pengeluaran;

        //Proses Scoring
        //DSR
        $dsr = $pendapatanBersih > 0 ? number_format(($angsuran / $pendapatanBersih) * 100) : 0;

        //Usia
        $usia = Carbon::parse($data->nasabah->tgl_lahir)->age;

        if ($usia >= 61) {
            $prosesUsia = UltraMikroScoreUsia::select()->where('id', 1)->first();
        } else if ($usia >= 51 && $usia <= 60) {
            $prosesUsia = UltraMikroScoreUsia::select()->where('id', 2)->first();
        } else if ($usia >= 41 && $usia <= 50) {
            $prosesUsia = UltraMikroScoreUsia::select()->where('id', 3)->first();
        } else if ($usia >= 31 && $usia <= 40) {
            $prosesUsia = UltraMikroScoreUsia::select()->where('id', 4)->first();
        } else if ($usia >= 20 && $usia <= 30) {
            $prosesUsia = UltraMikroScoreUsia::select()->where('id', 5)->first();
        }
        //Usia < 20
        else {
            $prosesUsia = UltraMikroScoreUsia::select()->where('id', 5)->first();
        }

        $ratingUsia = $prosesUsia->rating;
        $bobotUsia = $prosesUsia->bobot;
        $scoreUsia = $ratingUsia * $bobotUsia;


        //Score repayment
        if ($data->repayment_id == 1) {
            $prosesRepayment = UltraMikroScoreRepayment::select()->where('id', 1)->first();
        } else if ($data->repayment_id == 2) {
            $prosesRepayment = UltraMikroScoreRepayment::select()->where('id', 2)->first();
        } else if ($data->repayment_id == 3) {
            $prosesRepayment = UltraMikroScoreRepayment::select()->where('id', 3)->first();
        } else if ($data->repayment_id == 4) {
            $prosesRepayment = UltraMikroScoreRepayment::select()->where('id', 4)->first();
        } else {
            $prosesRepayment = UltraMikroScoreRepayment::select()->where('id', 5)->first();
        }

        $kategoriRepayment = $prosesRepayment->kategori_repayment;
        $ratingRepayment = $prosesRepayment->rating;
        $bobotRepayment = $prosesRepayment->bobot;
        $scoreRepayment = $ratingRepayment * $bobotRepayment;

        //Score tempat tinggal
        if ($data->status_tempat_tinggal_id == 1) {
            $prosesStatusTempatTinggal = UltraMikroScoreTempatTinggal::select()->where('id', 1)->first();
        } else if ($data->status_tempat_tinggal_id == 2) {
            $prosesStatusTempatTinggal = UltraMikroScoreTempatTinggal::select()->where('id', 2)->first();
        } else if ($data->status_tempat_tinggal_id == 3) {
            $prosesStatusTempatTinggal = UltraMikroScoreTempatTinggal::select()->where('id', 3)->first();
        } else if ($data->status_tempat_tinggal_id == 4) {
            $prosesStatusTempatTinggal = UltraMikroScoreTempatTinggal::select()->where('id', 4)->first();
        } else {
            $prosesStatusTempatTinggal = UltraMikroScoreTempatTinggal::select()->where('id', 5)->first();
        }

        $kategoriStatusTempatTinggal = $prosesStatusTempatTinggal->status_tempat_tinggal;
        $ratingStatusTempatTinggal = $prosesStatusTempatTinggal->rating;
        $bobotStatusTempatTinggal = $prosesStatusTempatTinggal->bobot;
        $scoreStatusTempatTinggal = $ratingStatusTempatTinggal * $bobotStatusTempatTinggal;

        //Score kelompok
        if ($data->status_kelompok_id == 1) {
            $prosesStatusKelompok = UltraMikroScoreKelompok::select()->where('id', 1)->first();
        } else if ($data->status_kelompok_id == 2) {
            $prosesStatusKelompok = UltraMikroScoreKelompok::select()->where('id', 2)->first();
        } else if ($data->status_kelompok_id == 3) {
            $prosesStatusKelompok = UltraMikroScoreKelompok::select()->where('id', 3)->first();
        } else if ($data->status_kelompok_id == 4) {
            $prosesStatusKelompok = UltraMikroScoreKelompok::select()->where('id', 4)->first();
        } else {
            $prosesStatusKelompok = UltraMikroScoreKelompok::select()->where('id', 5)->first();
        }

        $kategoriStatusKelompok = $prosesStatusKelompok->status_kelompok;
        $ratingStatusKelompok = $prosesStatusKelompok->rating;
        $bobotStatusKelompok = $prosesStatusKelompok->bobot;
        $scoreStatusKelompok = $ratingStatusKelompok * $bobotStatusKelompok;

        //Score kol slik
        if ($data->kol_id == 1) {
            $prosesKol = UltraMikroScoreSlik::select()->where('id', 1)->first();
        } else if ($data->kol_id == 2) {
            $prosesKol = UltraMikroScoreSlik::select()->where('id', 2)->first();
        } else if ($data->kol_id == 3) {
            $prosesKol = UltraMikroScoreSlik::select()->where('id', 3)->first();
        } else if ($data->kol_id == 4) {
            $prosesKol = UltraMikroScoreSlik::select()->where('id', 4)->first();
        } else if ($data->kol_id == 5) {
            $prosesKol = UltraMikroScoreSlik::select()->where('id', 5)->first();
        }
        //Tidak ada slik
        else {
            $prosesKol = UltraMikroScoreSlik::select()->where('id', 6)->first();
        }

        $kategoriKol = $prosesKol->kol_terburuk;
        $ratingKol = $prosesKol->rating;
        $bobotKol = $prosesKol->bobot;
        $scoreKol = $ratingKol * $bobotKol;

        //Timeline
        $waktuAwal = UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuAkhir = UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();

        $waktuMulai = Carbon::parse($waktuAwal->created_at);
        $waktuBerakhir = Carbon::parse($waktuAkhir->created_at);

        $totalWaktu = $waktuMulai->diffAsCarbonInterval($waktuBerakhir);

        $historyStatus = UltraMikroPembiayaanHistory::select()
            ->where('ultra_mikro_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        return view('analis::ultra_mikro.komite.lihat', [
            'title' => 'Detail Proposal',
            'arr' => -2,
            'banyakHistory' => UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->count(),
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => UltraMikroPembiayaan::select()->where('id', $id)->first(),
            'timelines' => UltraMikroPembiayaanHistory::select()->where('ultra_mikro_pembiayaan_id', $id)->get(),

            'fotos' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->get(),
            'bonMurabahah' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Bon Murabahah')->first(),
            'fotoKtp' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->first(),
            'fotoKartuKeluarga' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->first(),
            'fotoKtpPasangan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Foto KTP Pasangan')->first(),
            'fotoStatusPernikahan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Akta Status Pernikahan/Perceraian')->first(),
            'dokumenIdebPasangan' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->first(),
            'fotoSuratPermohonanRestruct' => UltraMikroFoto::select()->where('ultra_mikro_pembiayaan_id', $id)->where('kategori', 'Surat Permohonan Restruct')->first(),

            // 'idebs' => UltraMikroSlik::select()->where('ultra_mikro_pembiayaan_id', $id)->get(),
            // 'idebPasangans' => UltraMikroSlikPasangan::select()->where('ultra_mikro_pembiayaan_id', $id)->get(),

            'tenor' => $tenor,
            'angsuran' => $angsuran,
            'angsuranPerKunjungan' => $angsuranPerKunjungan,
            'minggu' => $minggu,
            'pendapatanBersih' => $pendapatanBersih,

            //DSR
            'dsr' => $dsr,


            'kategoriRepayment' => $kategoriRepayment,
            'kategoriStatusTempatTinggal' => $kategoriStatusTempatTinggal,
            'kategoriKol' => $kategoriKol,
            'kategoriStatusKelompok' => $kategoriStatusKelompok,

            'prosesUsia' => $prosesUsia,
            'prosesRepayment' => $prosesRepayment,
            'prosesStatusTempatTinggal' => $prosesStatusTempatTinggal,
            'prosesKol' => $prosesKol,
            'prosesStatusKelompok' => $prosesStatusKelompok,

            'ratingUsia' => $ratingUsia,
            'ratingRepayment' => $ratingRepayment,
            'ratingStatusTempatTinggal' => $ratingStatusTempatTinggal,
            'ratingKol' => $ratingKol,
            'ratingStatusKelompok' => $ratingStatusKelompok,

            'bobotUsia' => $bobotUsia,
            'bobotRepayment' => $bobotRepayment,
            'bobotStatusTempatTinggal' => $bobotStatusTempatTinggal,
            'bobotKol' => $bobotKol,
            'bobotStatusKelompok' => $bobotStatusKelompok,

            'scoreUsia' => $scoreUsia,
            'scoreRepayment' => $scoreRepayment,
            'scoreStatusTempatTinggal' => $scoreStatusTempatTinggal,
            'scoreKol' => $scoreKol,
            'scoreStatusKelompok' => $scoreStatusKelompok,

            //History
            'history' => $historyStatus,
            'historyStatus' => $historyStatus,

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
