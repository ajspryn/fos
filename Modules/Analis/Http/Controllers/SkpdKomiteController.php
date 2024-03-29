<?php

namespace Modules\Analis\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdSlik;
use Illuminate\Support\Facades\Auth;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdScoreDsr;
use Modules\Admin\Entities\SkpdBendahara;
use Modules\Admin\Entities\SkpdScoreSlik;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Skpd\Entities\SkpdDeviasi;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdJenisNasabah;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Skpd\Entities\SkpdSlikPasangan;

class SkpdKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $proposal = SkpdPembiayaanHistory::select()
            ->latest()
            ->groupBy('skpd_pembiayaan_id')
            ->where(function ($query) {
                $query
                    ->where('status_id', 5)
                    ->where('user_id', Auth::user()->id);
            })
            ->orWhere(function ($query) {
                $query
                    ->where('status_id', '>=', 9);
            })
            ->get();
        return view('analis::skpd.komite.index', [
            'title' => 'Data Komite',
            'proposals' => $proposal,
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
        // return $request;
        SkpdPembiayaanHistory::create([
            'skpd_pembiayaan_id' => $request->skpd_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => $request->jabatan_id,
            'divisi_id' => null,
        ]);

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('foto-skpd-pembiayaan');
            SkpdFoto::create([
                'skpd_pembiayaan_id' => $request->skpd_pembiayaan_id,
                'kategori' => 'Konfirmasi Bendahara',
                'foto' => $foto,
            ]);
        }

        if ($request->status_id == 5) {
            return redirect('/analis/skpd/komite/')->with('success', 'Proposal Berhasil Disetujui!');
        } elseif ($request->status_id == 7) {
            return redirect('/analis/skpd/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
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
            ->get()
            ->first();

        if ($cek->status_id == 5 && $cek->jabatan_id == 2) {
            SkpdPembiayaanHistory::create([
                'skpd_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 3,
                'divisi_id' => 0,
                'user_id' => Auth::user()->$id,
            ]);
        }
        $historystatus = SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        $data = SkpdPembiayaan::select()->where('id', $id)->get()->first();
        $nasabah = SkpdNasabah::select()->where('id', $data->skpd_nasabah_id)->get()->first();
        $jaminan = SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->get()->first();
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
        $cekcicilanpasangan = SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->get()->count();
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
        $data_slik = SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->orderBy('kol_tertinggi', 'desc')->get()->first();
        if ($data_slik) {
            $slik = $data_slik->kol_tertinggi;
        }

        //proses menentukan rating
        $proses_bendahara = SkpdBendahara::select()->where('skpd_instansi_id', $data->skpd_instansi_id)->get()->first();
        if ($dsr >= 36) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 1)->get()->first();
        } else if ($dsr <= 35 && $dsr >= 31) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 2)->get()->first();
        } else if ($dsr <= 30 && $dsr >= 21) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 3)->get()->first();
        } else {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 4)->get()->first();
        }

        // return $proses_dsr;
        $proses_slik = 0;
        if ($data_slik) {
            $proses_slik = SkpdScoreSlik::select()->where('kol', $slik)->get()->first();
        }
        // $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->get()->first();
        $proses_jaminan = SkpdJenisJaminan::select()->where('id', $jaminan->skpd_jenis_jaminan_id)->get()->first();
        $proses_nasabah = SkpdJenisNasabah::select()->where('id', $data->skpd_jenis_nasabah_id)->get()->first();
        $proses_instansi = SkpdInstansi::select()->where('id', $data->skpd_instansi_id)->get()->first();

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

        $waktuawal = SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        // return $proses_dsr;
        return view('analis::skpd.komite.lihat', [
            'title' => 'Detail Proposal',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->get()->first(),
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
            'ideb' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB')->get()->first(),
            'idebPasangan' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB Pasangan')->get()->first(),
            'konfirmasi' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Konfirmasi Bendahara')->get()->first(),
            'deviasi' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),

            //history
            'history' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),

            //SLA
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
