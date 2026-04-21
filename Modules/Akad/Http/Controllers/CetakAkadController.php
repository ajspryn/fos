<?php

namespace Modules\Akad\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Modules\Admin\Entities\PasarJenisJaminan;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Akad\Entities\Pembiayaan;
use Modules\Akad\Entities\RegisterAkad;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\P3k\Entities\P3kNasabah;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmPembiayaan;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class CetakAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
    }

    public function showPasar($id)
    {
        $pembiayaan = PasarPembiayaan::select()->where('id', $id)->first();
        $akad = $pembiayaan->akad_id;

        $data = PasarPembiayaan::select()->where('id', $id)->first();

        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;
        $angsuran1 = (int)($harga_jual / $tenor);

        $nasabah = PasarNasabahh::select()->where('id', $data->nasabah_id)->first();
        $usaha = PasarKeteranganUsaha::select()->where('pasar_pembiayaan_id', $id)->first();
        $pasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->first();
        $jaminanrumah = PasarLegalitasRumah::select()->where('pasar_pembiayaan_id', $id)->first();
        $jaminan = PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->first();
        $jenisjaminan = PasarJenisJaminan::select()->where('kode_jaminan', $jaminan->jaminanlain)->first();
        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Akad_Pasar.doc',
        );

        $bulan = Carbon::now()->isoFormat('M');

        if ($bulan == 1)
            $bulan = 'I';
        elseif ($bulan == 2)
            $bulan = 'II';
        elseif ($bulan == 3)
            $bulan = 'III';
        elseif ($bulan == 4)
            $bulan = 'IV';
        elseif ($bulan == 5)
            $bulan = 'V';
        elseif ($bulan == 6)
            $bulan = 'VI';
        elseif ($bulan == 7)
            $bulan = 'VII';
        elseif ($bulan == 8)
            $bulan = 'VIII';
        elseif ($bulan == 9)
            $bulan = 'IX';
        elseif ($bulan == 10)
            $bulan = 'X';
        elseif ($bulan == 11)
            $bulan = 'XI';
        else
            $bulan = 'XII';

        $no = Pembiayaan::select()->where('status', 'Selesai Akad')->count();

        $no_surat = (2298 - 24) + ($no + 1);

        if ($akad == 1)
            return Response::make(view('akad::murabahah.pasar', [
                'title' => 'Proposal Pasar',
                'segmen' => 'Pasar',
                'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->first(),
                // 'usiaNasabah' => $usiaNasabah,
                'hargaJual' => $harga_jual,
                'nasabah' => $nasabah,
                'angsuran1' => $angsuran1,
                'jaminan' => $jenisjaminan,
                'no_ktb' => $jaminan->no_ktb,
                'now' => Carbon::now()->isoFormat('D MMMM Y'),
                'bulan' => $bulan,
                'no_surat' => $no_surat,
                'tahun' => Carbon::now()->isoFormat('Y'),
                'month' => Carbon::now()->isoFormat('M'),
            ]), 200, $headers);

        else
            return Response::make(view('akad::ijarah.pasar', [
                'title' => 'Proposal Pasar',
                'segmen' => 'Pasar',
                'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->first(),
                // 'usiaNasabah' => $usiaNasabah,
                'hargaJual' => $harga_jual,
                'nasabah' => $nasabah,
                'angsuran1' => $angsuran1,
                'jaminan' => $jenisjaminan,
                'no_ktb' => $jaminan->no_ktb,
                'now' => Carbon::now()->isoFormat('D MMMM Y'),
                'bulan' => $bulan,
                'no_surat' => $no_surat,
                'tahun' => Carbon::now()->isoFormat('Y'),
                'month' => Carbon::now()->isoFormat('M'),
            ]), 200, $headers);
    }
    public function showUmkm($id)
    {
        $pembiayaan = UmkmPembiayaan::select()->where('id', $id)->first();
        $akad = $pembiayaan->akad_id;

        $data = UmkmPembiayaan::select()->where('id', $id)->first();

        $tenor = $data->tenor;
        $harga = $data->harga;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;
        $angsuran1 = (int)($harga_jual / $tenor);

        $nasabah = UmkmNasabah::select()->where('id', $data->nasabah_id)->first();
        $usaha = UmkmKeteranganUsaha::select()->where('umkm_pembiayaan_id', $id)->first();
        $jaminanrumah = UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id', $id)->first();
        $jaminan = UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->first();
        $jenisjaminan = PasarJenisJaminan::select()->where('kode_jaminan', $jaminan->jaminanlain)->first();
        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Akad_Mikro.doc',
        );

        $bulan = Carbon::now()->isoFormat('M');

        if ($bulan == 1)
            $bulan = 'I';
        elseif ($bulan == 2)
            $bulan = 'II';
        elseif ($bulan == 3)
            $bulan = 'III';
        elseif ($bulan == 4)
            $bulan = 'IV';
        elseif ($bulan == 5)
            $bulan = 'V';
        elseif ($bulan == 6)
            $bulan = 'VI';
        elseif ($bulan == 7)
            $bulan = 'VII';
        elseif ($bulan == 8)
            $bulan = 'VIII';
        elseif ($bulan == 9)
            $bulan = 'IX';
        elseif ($bulan == 10)
            $bulan = 'X';
        elseif ($bulan == 11)
            $bulan = 'XI';
        else
            $bulan = 'XII';

        $no = Pembiayaan::select()->where('status', 'Selesai Akad')->count();

        $no_surat = (2298 - 24) + ($no + 1);
        if ($akad == 1)
            return Response::make(view('akad::murabahah.umkm', [
                'title' => 'Proposal UMKM',
                'segmen' => 'Umkm',
                'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->first(),
                // 'usiaNasabah' => $usiaNasabah,
                'hargaJual' => $harga_jual,
                'nasabah' => $nasabah,
                'angsuran1' => $angsuran1,
                'jaminan' => $jenisjaminan,
                'no_ktb' => $jaminan->no_ktb,
                'now' => Carbon::now()->isoFormat('D MMMM Y'),
                'bulan' => $bulan,
                'no_surat' => $no_surat,
                'tahun' => Carbon::now()->isoFormat('Y'),
                'month' => Carbon::now()->isoFormat('M'),
            ]), 200, $headers);

        else
            return Response::make(view('akad::ijarah.umkm', [
                'title' => 'Proposal UMKM',
                'segmen' => 'Umkm',
                'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->first(),
                // 'usiaNasabah' => $usiaNasabah,
                'hargaJual' => $harga_jual,
                'nasabah' => $nasabah,
                'angsuran1' => $angsuran1,
                'jaminan' => $jenisjaminan,
                'no_ktb' => $jaminan->no_ktb,
                'now' => Carbon::now()->isoFormat('D MMMM Y'),
                'bulan' => $bulan,
                'no_surat' => $no_surat,
                'tahun' => Carbon::now()->isoFormat('Y'),
                'month' => Carbon::now()->isoFormat('M'),
            ]), 200, $headers);
    }

    public function showSkpd($id)
    {
        $pembiayaan = SkpdPembiayaan::select()->where('id', $id)->first();
        $akad = $pembiayaan->skpd_akad_id;

        $data = SkpdPembiayaan::select()->where('id', $id)->first();

        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
        $rate = $data->rate;
        $margin = ($rate * $tenor) / 100;

        //idir
        $harga1 = $harga * $margin;
        $harga_jual = $harga1 + $harga;
        $angsuran1 = (int)($harga_jual / $tenor);

        $nasabah = SkpdNasabah::select()->where('id', $data->nasabah_id)->first();
        //Usia Nasabah
        // $usiaNasabah = Carbon::parse($pembiayaan->nasabahh->tgl_lahir)->age;
        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Skpd_Akad.doc',
        );

        $bulan = Carbon::now()->isoFormat('M');

        if ($bulan == 1)
            $bulan = 'I';
        elseif ($bulan == 2)
            $bulan = 'II';
        elseif ($bulan == 3)
            $bulan = 'III';
        elseif ($bulan == 4)
            $bulan = 'IV';
        elseif ($bulan == 5)
            $bulan = 'V';
        elseif ($bulan == 6)
            $bulan = 'VI';
        elseif ($bulan == 7)
            $bulan = 'VII';
        elseif ($bulan == 8)
            $bulan = 'VIII';
        elseif ($bulan == 9)
            $bulan = 'IX';
        elseif ($bulan == 10)
            $bulan = 'X';
        elseif ($bulan == 11)
            $bulan = 'XI';
        else
            $bulan = 'XII';

        $no = Pembiayaan::select()->where('status', 'Selesai Akad')->count();

        $no_surat = (2298 - 24) + ($no + 1);

        if ($akad == 1)
            return Response::make(view('akad::ijarah.skpd', [
                'title' => 'Proposal Skpd',
                'segmen' => 'Skpd',
                'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
                // 'usiaNasabah' => $usiaNasabah,
                'hargaJual' => $harga_jual,
                'nasabah' => $nasabah,
                'angsuran1' => $angsuran1,
                'now' => Carbon::now()->isoFormat('D MMMM Y'),
                'bulan' => $bulan,
                'no_surat' => $no_surat,
                'tahun' => Carbon::now()->isoFormat('Y'),
                'month' => Carbon::now()->isoFormat('M'),
            ]), 200, $headers);

        else
            return Response::make(view('akad::ijarah.skpd', [
                'title' => 'Proposal Skpd',
                'segmen' => 'Skpd',
                'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
                // 'usiaNasabah' => $usiaNasabah,
                'hargaJual' => $harga_jual,
                'nasabah' => $nasabah,
                'angsuran1' => $angsuran1,
                'now' => Carbon::now()->isoFormat('D MMMM Y'),
                'bulan' => $bulan,
                'no_surat' => $no_surat,
                'tahun' => Carbon::now()->isoFormat('Y'),
                'month' => Carbon::now()->isoFormat('M'),

            ]), 200, $headers);
    }

    public function showPpr($id)
    {

        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->first();
        // //Angsuran & Plafond
        // $plafond = $pembiayaan->form_permohonan_nilai_ppr_dimohon;
        // // $margin = $pembiayaan->form_permohonan_jml_margin / 100;
        // $margin = 0.9 / 100;
        // $tenor = $pembiayaan->form_permohonan_jml_bulan;

        // //Angsuran
        // $angsuran = ($plafond * $margin) / (1 - (1 / (1 + $margin)) ** $tenor);

        // //Plafond
        // $plafondMaks = ($angsuran / $margin) * (1 - (1 / (1 + $margin)) ** $tenor);

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir)->age;
        return view('akad::proposal.lihat', [
            'title' => 'Proposal PPR',
            'segmen' => 'PPR',
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->first(),
            'usiaNasabah' => $usiaNasabah,
            // 'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->first(),
            // 'angsuran' => $angsuran,
            // 'plafondMaks' => $plafondMaks,
        ]);
    }

    public function showP3k($id)
    {
        $data = P3kPembiayaan::select()->where('id', $id)->first();
        $akad = $data->akad;

        //Nasabah
        $nasabah = P3kNasabah::select()->where('id', $data->p3k_nasabah_id)->first();
        $namaNasabah = $nasabah->nama_nasabah;
        if ($nasabah->status_pernikahan == "Menikah") {
            if ($nasabah->jenis_kelamin == "Pria") {
                $statusPasangan = 'Istri';
            } elseif ($nasabah->jenis_kelamin == "Wanita") {
                $statusPasangan = 'Suami';
            } else {
                $statusPasangan = NULL;
            }
        }

        //Angsuran
        $nominalPembiayaan = $data->nominal_pembiayaan;
        $tenor = $data->tenor;
        $rate = $data->rate / 100;

        $hargaJual = ($nominalPembiayaan * $rate * $tenor) + $nominalPembiayaan;
        $angsuran = $hargaJual / $tenor;

        //Biaya Administrasi
        $byAdm = 1.5 / 100 * $nominalPembiayaan;

        //Pendapatan
        $gajiPokok = $data->gaji_pokok;
        $gajiTpp = $data->gaji_tpp;
        $totalPendapatan = $gajiPokok + $gajiTpp;

        //Pengeluaran
        $pengeluaranLainnya = $data->pengeluaran_lainnya;

        //Pendapatan bersih
        $pendapatanBersih = $totalPendapatan - $pengeluaranLainnya;

        //Usia
        $usia = Carbon::parse($data->nasabah->tgl_lahir)->age;


        $headers = array(
            'Content-type' => 'text/html',
            'Content-Disposition' => 'attachment;Filename=Akad P3K ' . $namaNasabah . '.doc',
        );

        $bulan = Carbon::now()->isoFormat('M');

        if ($bulan == 1)
            $bulanRomawi = 'I';
        elseif ($bulan == 2)
            $bulanRomawi = 'II';
        elseif ($bulan == 3)
            $bulanRomawi = 'III';
        elseif ($bulan == 4)
            $bulanRomawi = 'IV';
        elseif ($bulan == 5)
            $bulanRomawi = 'V';
        elseif ($bulan == 6)
            $bulanRomawi = 'VI';
        elseif ($bulan == 7)
            $bulanRomawi = 'VII';
        elseif ($bulan == 8)
            $bulanRomawi = 'VIII';
        elseif ($bulan == 9)
            $bulanRomawi = 'IX';
        elseif ($bulan == 10)
            $bulanRomawi = 'X';
        elseif ($bulan == 11)
            $bulanRomawi = 'XI';
        else
            $bulanRomawi = 'XII';

        $no = Pembiayaan::select()->where('status', 'Selesai Akad')->count();

        $no_surat = (2298 - 24) + ($no + 1);

        // if ($akad == "Ijarah Multijasa")
        //     return Response::make(view('akad::ijarah.p3k', [
        //         'title' => 'Proposal P3K',
        //         'segmen' => 'P3K',
        //         'pembiayaan' => SkpdPembiayaan::select()->where('id', $id)->first(),
        //         // 'usiaNasabah' => $usiaNasabah,
        //         'hargaJual' => $harga_jual,
        //         'nasabah' => $nasabah,
        //         'angsuran1' => $angsuran1,
        //         'now' => Carbon::now()->isoFormat('D MMMM Y'),
        //         'bulanRomawi' => $bulanRomawi,
        //         'no_surat' => $no_surat,
        //         'tahun' => Carbon::now()->isoFormat('Y'),
        //         'bulan' => Carbon::now()->isoFormat('M'),
        //     ]), 200, $headers);

        // else
        return Response::make(view('akad::murabahah.index', [
            'title' => 'Proposal P3K',
            'segmen' => 'P3K',
            'pembiayaan' => P3kPembiayaan::select()->where('id', $id)->first(),
            'registerAkad' => RegisterAkad::select()->where('id_pembiayaan', $id)->first(),
            // 'usiaNasabah' => $usiaNasabah,
            // 'hargaJual' => $harga_jual,
            'nasabah' => $nasabah,
            'statusPasangan' => $statusPasangan,
            // 'angsuran1' => $angsuran1,
            'now' => Carbon::now()->isoFormat('D MMMM Y'),
            'bulanRomawi' => $bulanRomawi,
            'no_surat' => $no_surat,
            'tahun' => Carbon::now()->isoFormat('Y'),
            'month' => Carbon::now()->isoFormat('M'),

        ]), 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('akad::create');
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
        return view('akad::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('akad::edit');
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
