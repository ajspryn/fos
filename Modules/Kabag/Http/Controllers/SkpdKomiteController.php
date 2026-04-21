<?php

namespace Modules\Kabag\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\SkpdBendahara;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Admin\Entities\SkpdScoreDsr;
use Modules\Admin\Entities\SkpdScoreSlik;
use Modules\Skpd\Entities\SkpdDeviasi;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdJenisNasabah;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Skpd\Entities\SkpdSlik;
use Modules\Skpd\Entities\SkpdSlikPasangan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class SkpdKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $latestSub = SkpdPembiayaanHistory::selectRaw('skpd_pembiayaan_id, MAX(id) as latest_id')
            ->groupBy('skpd_pembiayaan_id');

        $latestHistories = SkpdPembiayaanHistory::joinSub($latestSub, 'lh', function ($join) {
            $join->on('skpd_pembiayaan_histories.id', '=', 'lh.latest_id');
        })
            ->with(['statushistory', 'jabatan'])
            ->orderBy('updated_at', 'desc')
            ->get(['skpd_pembiayaan_histories.skpd_pembiayaan_id', 'status_id', 'jabatan_id', 'user_id']);

        $komiteIds = $latestHistories->filter(function ($history) {
            return $history->status_id == 5 && $history->jabatan_id == 2;
        })->pluck('skpd_pembiayaan_id')->unique();

        $histories = $latestHistories->whereIn('skpd_pembiayaan_id', $komiteIds)->keyBy('skpd_pembiayaan_id');

        $proposals = SkpdPembiayaan::with(['nasabah', 'instansi', 'user'])
            ->whereIn('id', $komiteIds)
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        $bonmurabahahByPembiayaan = SkpdFoto::whereIn('skpd_pembiayaan_id', $komiteIds)
            ->where('kategori', 'Foto Bon Murabahah')
            ->get()
            ->keyBy('skpd_pembiayaan_id');

        return view('kabag::skpd.komite.index', [
            'title' => 'Data Komite',
            'proposals' => $proposals,
            'histories' => $histories,
            'bonmurabahahByPembiayaan' => $bonmurabahahByPembiayaan,
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
        SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id' => $request->skpd_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => $request->jabatan_id,
        ]);

        if ($request->status_id == 5) {
            return redirect('/kabag/skpd/komite/')->with('success', 'Proposal Berhasil Disetujui!');
        } elseif ($request->status_id == 6) {
            return redirect('/kabag/skpd/komite/')->with('success', 'Proposal Berhasil Ditolak!');
        } elseif ($request->status_id == 7) {
            return redirect('/kabag/skpd/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
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

        $cek = SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();

        if ($cek && $cek->status_id == 11 && $cek->jabatan_id == 3) {
            SkpdPembiayaanHistory::create([
                'skpd_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 2,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = SkpdPembiayaan::select()->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Data pembiayaan tidak ditemukan.');
        }
        $nasabah = SkpdNasabah::select()->where('id', $data->skpd_nasabah_id)->first();
        $jaminan = SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->first();
        $nominal_pembiayaan = $data->nominal_pembiayaan;
        $tenor = $data->tenor;
        $rate = $data->rate / 100;

        //angsuran
        $harga_jual = $nominal_pembiayaan * $rate * $tenor + $nominal_pembiayaan;
        $angsuran = $harga_jual / $tenor;

        //pengeluaran
        $biaya_anak = $nasabah->tanggungan->biaya;
        $biaya_istri = $nasabah->status_perkawinan->biaya;
        $cicilan = SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->sum('angsuran');
        $pengeluaran_lainnya = SkpdPembiayaan::select()->where('id', $id)->sum('pengeluaran_lainnya');
        $cekcicilanpasangan = SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->count();
        $total_pengeluaran = $biaya_anak + $biaya_istri + $cicilan + $pengeluaran_lainnya;

        // if($cekcicilanpasangan>0){
        //     $cicilanpasangan =   $cekcicilanpasangan=SkpdSlikPasangan::select()->where('skpd_pembiayaan_id',$id)->sum('angsuran');

        //     $total_pengeluaran=$biaya_anak+$biaya_istri+$cicilan+$pengeluaran_lainnya+$cicilanpasangan;
        //     $cicilan =  $cicilan+$cicilanpasangan;
        // }
        //pemasukan
        $gaji_pokok = $data->gaji_pokok;
        $pendapatan_lainnya = $data->pendapatan_lainnya;
        $gaji_tpp = $data->gaji_tpp;
        $total_pemasukan = $gaji_pokok + $gaji_tpp + $pendapatan_lainnya;

        //pendapatan Bersih
        $pendapatan_bersih = $total_pemasukan - $total_pengeluaran;

        //DSR(rasio total angsuran terhadap pendapatan bersih)
        if ($data->skpd_golongan_id == 18) {
            $dsr = number_format($angsuran / $total_pemasukan * 100);
        } else {
            $dsr = number_format($angsuran / $gaji_tpp * 100);
        }

        //mencari slik dengan kol tertinggi
        $data_slik = SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->orderBy('kol_tertinggi', 'desc')->first();
        if ($data_slik) {
            $slik = $data_slik->kol_tertinggi;
        }

        $dsrDev = SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->where('kategori_deviasi', 'DSR')->orderby('created_at', 'desc')->first();
        //proses menentukan rating
        $proses_bendahara = SkpdBendahara::select()->where('skpd_instansi_id', $data->skpd_instansi_id)->first();
        // Jika ada Deviasi
        if ($dsrDev) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 5)->first();
        } else if ($dsr >= 36 && $dsr <= 40) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 1)->first();
        } else if ($dsr >= 31 && $dsr <= 35) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 2)->first();
        } else if ($dsr >= 21 && $dsr <= 30) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 3)->first();
        } else if ($dsr >= 0 && $dsr <= 20) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 4)->first();
        }
        //DSR < 0
        else if ($dsr < 0) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 6)->first();
        }
        //DSR antara 40-41, range untuk deviasi (sebelum deviasi)
        else if ($dsr > 40 && $dsr <= 41) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 7)->first();
        }
        //DSR > 41
        else {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 8)->first();
        }

        // return $proses_dsr;
        $proses_slik = 0;
        if ($data_slik) {
            $proses_slik = SkpdScoreSlik::select()->where('kol', $slik)->first();
        }
        // $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->first();
        $proses_jaminan = SkpdJenisJaminan::select()->where('id', $jaminan->skpd_jenis_jaminan_id)->first();
        $proses_nasabah = SkpdJenisNasabah::select()->where('id', $data->skpd_jenis_nasabah_id)->first();
        $proses_instansi = SkpdInstansi::select()->where('id', $data->skpd_instansi_id)->first();

        // return $dsr;
        //mengambil rating
        $rating_dsr = $proses_dsr->rating;
        $rating_slik = 0;
        if ($data_slik) {
            $rating_slik = $proses_slik->rating;
        }
        // $rating_slik=$proses_slik->rating;
        $rating_bendahara = $proses_bendahara->rating;
        $rating_jaminan = $proses_jaminan->rating;
        $rating_nasabah = $proses_nasabah->rating;
        $rating_instansi = $proses_instansi->rating;

        // $angsuran1=$angsuran;
        // $dsr1=$angsuran1/$total_pemasukan*100;
        // $dsr1=$angsuran1/$pendapatan_bersih*100;

        $nilai_slik = 0;
        if ($rating_slik) {
            $nilai_slik = $rating_slik * $proses_slik->bobot;
        }

        $waktuawal = SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'asc')->first();
        $waktuakhir = SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        $historyStatus = SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->first();
        // return $proses_dsr;
        return view('kabag::skpd.komite.lihat', [
            'title' => 'Detail Proposal',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
            'timelines' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->get(),
            'cicilan' => $cicilan,
            'biayakeluarga' => $biaya_anak + $biaya_istri,
            'pendapatan_bersih' => $pendapatan_bersih,
            'ideps' => SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->get(),
            'harga_jual' => $harga_jual,
            'tenor' => $tenor,
            'angsuran1' => $angsuran,
            'nilai_dsr' => $dsr,
            'nilai_dsr1' => $dsr,
            'total_pendapatan' => $data->pendapatan_lainnya + $data->gaji_pokok + $data->pendapatan_lainnya,
            'cekcicilanpasangan' => $cekcicilanpasangan,
            'ideppasangans' => SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->get(),
            'bonMurabahah' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Bon Murabahah')->first(),

            'bendahara' => $proses_bendahara,
            'dsr' => $proses_dsr,
            'slik' => $proses_slik,
            'jaminan' => $proses_jaminan,
            'jenis_nasabah' => $proses_nasabah->keterangan,
            'instansi' => $proses_instansi,
            'rating_bendahara' => $rating_bendahara,
            'rating_dsr' => $rating_dsr,
            'rating_slik' => $rating_slik,
            'rating_jaminan' => $rating_jaminan,
            'rating_nasabah' => $rating_nasabah,
            'rating_instansi' => $rating_instansi,
            'nilai_bendahara' => $rating_bendahara * $proses_bendahara->bobot,
            'nilai_dsr' => $rating_dsr * $proses_dsr->bobot,
            'nilai_slik' => $nilai_slik,
            'nilaiSlikDeviasi' => 3 * 0.20, //Ada deviasi rating slik menjadi 3
            'nilai_jaminan' => $rating_jaminan * $proses_jaminan->bobot,
            'nilai_nasabah' => $rating_nasabah * 0.10,
            'nilai_instansi' => $rating_instansi * $proses_instansi->bobot,

            //identitas pribadi
            'fotos' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->get(),
            'jaminans' => SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->get(),
            'jaminanlainnyas' => SkpdJaminanLainnya::select()->where('skpd_pembiayaan_id', $id)->get(),
            'skpengangkatans' => SkpdPembiayaan::select()->where('id', $id)->get(),
            'ideb' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB')->first(),
            'idebPasangan' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->first(),
            'konfirmasi' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Konfirmasi Bendahara')->first(),
            'deviasi' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->get(),
            'ifDeviasi' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),
            'deviasiSlik' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->where('kategori_deviasi', 'Slik')->orderby('created_at', 'desc')->first(),
            'deviasiDSR' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->where('kategori_deviasi', 'DSR')->orderby('created_at', 'desc')->first(),
            'deviasiAgunan' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->where('kategori_deviasi', 'Agunan')->orderby('created_at', 'desc')->first(),

            //history
            'history' => $historyStatus,
            'historyStatus' => $historyStatus,

            //sla
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->count(),
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
