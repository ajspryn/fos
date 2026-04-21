<?php

namespace Modules\Skpd\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
use Modules\Skpd\Entities\SkpdSlikPasangan;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Skpd\Entities\SkpdDeviasi;

class SkpdCetakProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $id = Request('id');
        if (!$id) abort(404);
        $cek = SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();

        if ($cek == 0) {
            SkpdPembiayaanHistory::create([
                'skpd_pembiayaan_id' => $id,
                'status_id' => 2,
                'jabatan_id' => 1,
                'divisi_id' => 0,
                'user_id' => Auth::user()->id,
            ]);
        }

        $data = SkpdPembiayaan::select()->where('id', $id)->first();
        $nasabah = SkpdNasabah::select()->where('id', $data->skpd_nasabah_id)->first();
        $jaminan = SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->first();
        $nominal_pembiayaan = (float)str_replace('.', '', $data->nominal_pembiayaan ?? '0');
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
        $gaji_pokok = (float)str_replace('.', '', $data->gaji_pokok ?? '0');
        $pendapatan_lainnya = (float)str_replace('.', '', $data->pendapatan_lainnya ?? '0');
        $gaji_tpp = (float)str_replace('.', '', $data->gaji_tpp ?? '0');
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


        //proses menentukan rating
        $dsrDev = SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->where('kategori_deviasi', 'DSR')->orderby('created_at', 'desc')->first();
        $proses_bendahara = SkpdBendahara::select()->where('skpd_instansi_id', $data->skpd_instansi_id)->first();
        if ($dsr >= 36 && $dsr <= 40) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 1)->first();
        } else if ($dsr >= 31 && $dsr <= 35) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 2)->first();
        } else if ($dsr >= 21 && $dsr <= 30) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 3)->first();
        } else if ($dsrDev) {
            $proses_dsr = SkpdScoreDsr::select()->where('id', 5)->first();
        }
        // if ($dsr < 20) {
        else {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 4)->first();
        }

        // return $proses_dsr;
        $proses_slik = 0;
        if ($data_slik) {
            $proses_slik = SkpdScoreSlik::select()->where('kol', $slik)->first();
        }
        // $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->first();
        $proses_jaminan = SkpdJenisJaminan::select()->where('id', $jaminan->skpd_jenis_jaminan_id)->first();
        $proses_nasabah = 'Nasabah Baru';
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
        $rating_nasabah = 2;
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

        $catatanApprovals = SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $id)
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
        $timelinesAll = SkpdPembiayaanHistory::where('skpd_pembiayaan_id', $id)->orderBy('created_at', 'asc')->get();
        $namaAO = \App\Models\User::find($timelinesAll->where('jabatan_id', 1)->first()?->user_id)?->name ?? '-';
        $namaKabag = \App\Models\User::find($catatanApprovals->where('jabatan_id', 2)->first()?->user_id)?->name ?? '-';
        $namaAnalis = \App\Models\User::find($catatanApprovals->where('jabatan_id', 3)->first()?->user_id)?->name ?? '-';

        // return $total_pengeluaran;
        return view('skpd::cetak', [
            'title' => 'Detail Proposal',
            'arr' => -2,
            'banyak_history' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->count(),
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->first(),
            'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
            'timelines' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->get(),
            'cicilan' => $cicilan,
            'biayakeluarga' => $biaya_anak + $biaya_istri,
            'pendapatan_bersih' => $pendapatan_bersih,
            'ideps' => SkpdSlik::select()->where('skpd_pembiayaan_id', $id)->get(),
            'ideppasangans' => SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->get(),
            'harga_jual' => $harga_jual,
            'tenor' => $tenor,
            'angsuran1' => $angsuran,
            'nilai_dsr' => $dsr,
            'nilai_dsr1' => $dsr,
            'total_pendapatan' => $pendapatan_lainnya + $gaji_pokok + $gaji_tpp,
            'total_pengeluaran' => $total_pengeluaran,
            'cekcicilanpasangan' => $cekcicilanpasangan,

            'bendahara' => $proses_bendahara,
            'dsr' => $proses_dsr,
            'slik' => $proses_slik,
            'jaminan' => $proses_jaminan,
            'nasabah' => $proses_nasabah,
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
            'nilai_jaminan' => $rating_jaminan * $proses_jaminan->bobot,
            'nilai_nasabah' => $rating_nasabah * 0.10,
            'nilai_instansi' => $rating_instansi * $proses_instansi->bobot,

            //identitas pribadi
            'fotos' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->get(),
            'jaminans' => SkpdJaminan::select()->where('skpd_pembiayaan_id', $id)->get(),
            'jaminanlainnyas' => SkpdJaminanLainnya::select()->where('skpd_pembiayaan_id', $id)->get(),
            'skpengangkatans' => SkpdPembiayaan::select()->where('id', $id)->get(),
            'ideb' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB')->first(),
            'konfirmasi' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Konfirmasi Bendahara')->first(),

            //history
            'history' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->first(),

            //sla
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
        return view('skpd::create');
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
        return view('skpd::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('skpd::edit');
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
