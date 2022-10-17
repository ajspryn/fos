<?php

namespace Modules\Akad\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
use Modules\Akad\Entities\Pembiayaan;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Pasar\Entities\PasarDeviasi;
use Modules\Pasar\Entities\PasarFoto;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Pasar\Entities\PasarSlik;
use Modules\Pasar\Entities\PasarSlikPasangan;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmFoto;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;
use Modules\Admin\Entities\UmkmScoreIdir;
use Modules\Umkm\Entities\UmkmDeviasi;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmSlik;
use Modules\Umkm\Entities\UmkmSlikPasangan;
use Modules\Admin\Entities\SkpdBendahara;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdJenisJaminan;
use Modules\Admin\Entities\SkpdScoreDsr;
use Modules\Admin\Entities\SkpdScoreSlik;
use Modules\Skpd\Entities\SkpdDeviasi;
use Modules\Skpd\Entities\SkpdNasabah;
use Modules\Skpd\Entities\SkpdSlik;
use Modules\Skpd\Entities\SkpdSlikPasangan;
use Modules\Form\Entities\FormPprDataAgunan;
use Modules\Form\Entities\FormPprDataKekayaanKendaraan;
use Modules\Form\Entities\FormPprDataKekayaanLainnya;
use Modules\Form\Entities\FormPprDataKekayaanSaham;
use Modules\Form\Entities\FormPprDataKekayaanSimpanan;
use Modules\Form\Entities\FormPprDataKekayaanTanahBangunan;
use Modules\Form\Entities\FormPprDataPekerjaan;
use Modules\Form\Entities\FormPprDataPinjaman;
use Modules\Form\Entities\FormPprDataPinjamanKartuKredit;
use Modules\Form\Entities\FormPprDataPinjamanLainnya;
use Modules\Form\Entities\FormPprDataPribadi;
use Modules\Ppr\Entities\PprLampiran;
use Modules\Ppr\Entities\PprScoring;

class ProposalAkadController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $proposalpasar = PasarPembiayaanHistory::select()
            ->groupBy('pasar_pembiayaan_id')
            ->where('status_id', 5)
            ->where('jabatan_id', 4)
            ->where('cek_staff_akad', 'Belum')
            ->orWhere('cek_staff_akad', 'Dicetak')
            ->get();

        $proposalppr = PprPembiayaanHistory::select()
            ->groupBy('form_ppr_pembiayaan_id')
            ->where('status_id', 5)
            ->where('jabatan_id', 4)
            ->where('cek_staff_akad', 'Belum')
            ->orWhere('cek_staff_akad', 'Dicetak')
            ->get();

        $proposalskpd = SkpdPembiayaanHistory::select()
            ->groupBy('skpd_pembiayaan_id')
            ->where('status_id', 5)
            ->where('jabatan_id', 4)
            ->where('cek_staff_akad', 'Belum')
            ->orWhere('cek_staff_akad', 'Dicetak')
            ->get();

        $proposalumkm = UmkmPembiayaanHistory::select()
            ->groupBy('umkm_pembiayaan_id')
            ->where('status_id', 5)
            ->where('jabatan_id', 4)
            ->where('cek_staff_akad', 'Belum')
            ->orWhere('cek_staff_akad', 'Dicetak')
            ->get();

        // return $pasar;
        return view('akad::proposal.index', [
            'title' => 'Dashboard Proposal Akad',
            'proposalpasars' => $proposalpasar,
            'proposalskpds' => $proposalskpd,
            'proposalumkms' => $proposalumkm,
            'proposalpprs' => $proposalppr,
        ]);
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
        $jmlPembiayaan = Pembiayaan::select()->get()->count();

        if ($jmlPembiayaan == 0) {
            $hitungId = Pembiayaan::select()->get()->count();
            $id = $hitungId + 1;
        } else {
            $hitungId = Pembiayaan::select()->orderBy('id', 'DESC')->get()->first();
            $id = $hitungId->id + 1;
        }

        $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();

        if ($request->segmen == 'PPR') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "PPR",
                'ao_id' => $request->ao_id,
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);

            PprPembiayaanHistory::where('form_ppr_pembiayaan_id', $request->form_ppr_pembiayaan_id)
                ->where('status_id', 5)
                ->where('jabatan_id', 4)
                ->latest()
                ->first()
                ->update([
                    'cek_staff_akad' => $request->cek_staff_akad,
                ]);

            PprPembiayaanHistory::create([
                'form_ppr_pembiayaan_id' => $request->form_ppr_pembiayaan_id,
                'status_id' => $request->status_id,
                'jabatan_id' => $role->jabatan_id,
                'divisi_id' => $role->divisi_id,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'cek_staff_akad' => $request->cek_staff_akad,
            ]);
        } else if ($request->segmen == 'SKPD') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "SKPD",
                'ao_id' => $request->ao_id,
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);

            SkpdPembiayaanHistory::where('skpd_pembiayaan_id', $request->skpd_pembiayaan_id)
                ->where('status_id', 5)
                ->where('jabatan_id', 4)
                ->latest()
                ->first()
                ->update([
                    'cek_staff_akad' => $request->cek_staff_akad,
                ]);

            SkpdPembiayaanHistory::create([
                'skpd_pembiayaan_id' => $request->skpd_pembiayaan_id,
                'status_id' => $request->status_id,
                'jabatan_id' => $role->jabatan_id,
                'divisi_id' => $role->divisi_id,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'cek_staff_akad' => $request->cek_staff_akad,
            ]);
        } else if ($request->segmen == 'Pasar') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "Pasar",
                'ao_id' => $request->ao_id,
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);

            PasarPembiayaanHistory::where('pasar_pembiayaan_id', $request->pasar_pembiayaan_id)
                ->where('status_id', 5)
                ->where('jabatan_id', 4)
                ->latest()
                ->first()
                ->update([
                    'cek_staff_akad' => $request->cek_staff_akad,
                ]);

            PasarPembiayaanHistory::create([
                'pasar_pembiayaan_id' => $request->pasar_pembiayaan_id,
                'status_id' => $request->status_id,
                'jabatan_id' => $role->jabatan_id,
                'divisi_id' => $role->divisi_id,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'cek_staff_akad' => $request->cek_staff_akad,
            ]);
        } else if ($request->segmen == 'UMKM') {
            Pembiayaan::create([
                'id' => $id,
                // Temp till get from API
                'kode_kontrak' => $id,
                'akad' => $request->akad,
                'segmen' => "UMKM",
                'ao_id' => $request->ao_id,
                'cif' => $request->cif,
                'kode_tabungan' => $request->kode_tabungan,
                'plafond' => $request->plafond,
                'tenor' => $request->tenor,
                'margin' => $request->margin,
                'harga_jual' => $request->harga_jual,
                'status' => $request->status,
                'catatan' => $request->catatan,
            ]);

            UmkmPembiayaanHistory::where('umkm_pembiayaan_id', $request->umkm_pembiayaan_id)
                ->where('status_id', 5)
                ->where('jabatan_id', 4)
                ->latest()
                ->first()
                ->update([
                    'cek_staff_akad' => $request->cek_staff_akad,
                ]);

            UmkmPembiayaanHistory::create([
                'umkm_pembiayaan_id' => $request->umkm_pembiayaan_id,
                'status_id' => $request->status_id,
                'jabatan_id' => $role->jabatan_id,
                'divisi_id' => $role->divisi_id,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id,
                'cek_staff_akad' => $request->cek_staff_akad,
            ]);
        } else {
        }
        if ($request->status == 'Selesai Akad') {
            return redirect('/staff/proposal')->with('success', 'Akad Berhasil Diselesaikan!');
        } else if ($request->status == 'Akad Batal') {
            return redirect('/staff/proposal')->with('success', 'Akad Berhasil Dibatalkan!');
        } else {
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function showPpr($id)
    {

        $historystatus = PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        $data = FormPprPembiayaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first();

        $nasabah = FormPprDataPribadi::select()->where('id', $id)->get()->first();
        $pekerjaan_nasabah = FormPprDataPekerjaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first();

        //Timeline
        $waktuawal = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();

        //Plafond
        $plafond = $pembiayaan->form_permohonan_nilai_ppr_dimohon;

        //Tenor
        $tenorTahun = $pembiayaan->form_permohonan_jangka_waktu_ppr;
        $tenorBulan = $pembiayaan->form_permohonan_jml_bulan;

        //Perhitungan Margin, Harga Jual & Angsuran
        $hpp = $pembiayaan->form_permohonan_nilai_hpp;
        $persenMargin = ($pembiayaan->form_permohonan_jml_margin / $plafond) / $tenorBulan * 100;
        $marginRp = $plafond * $persenMargin / 100 * $tenorBulan;
        $hargaJual = $plafond + $marginRp;
        $angsuran = $hargaJual / $tenorBulan;
        $plafondMaks = $hpp * 0.9; //Maks pembiayaan 90% dari HPP
        $kemampuanMengangsur = $pembiayaan->form_penghasilan_pengeluaran_kemampuan_mengangsur;

        //Idir
        $penghasilanBersih = $pembiayaan->form_penghasilan_pengeluaran_sisa_penghasilan;
        $kewajibanAngsuran = $pembiayaan->form_penghasilan_pengeluaran_kewajiban_angsuran;
        $idir = (($kewajibanAngsuran + $kemampuanMengangsur) / $penghasilanBersih) * 100;


        //FTV
        $hargaJualAgunan = $pembiayaan->agunan->form_agunan_1_nilai_harga_jual;
        $hargaTaksasiKjpp = $pembiayaan->agunan->form_agunan_1_nilai_harga_taksasi_kjpp;
        if ($hargaJualAgunan > $hargaTaksasiKjpp) {
            $ftv = ($plafond / $hargaTaksasiKjpp) * 100;
            $pembagi = "Taksasi KJPP";
        } else {
            $ftv = ($plafond / $hargaJualAgunan) * 100;
            $pembagi = "Harga Jual Agunan";
        }

        //DP
        $persenDp = 100 - $ftv;
        $dp = $hpp - $plafond;

        //Usia Nasabah
        $usiaNasabah = Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir)->age;

        return view('dirbis::ppr.komite.lihat', [
            'segmen' => 'PPR',
            'title' => 'Detail Proposal',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'nasabah' => FormPprDataPribadi::select()->where('id', $id)->get()->first(),
            'usiaNasabah' => $usiaNasabah,
            'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'hpp' => $hpp,
            'tenorTahun' => $tenorTahun,
            'tenorBulan' => $tenorBulan,
            'persenMargin' => $persenMargin,
            'marginRp' => $marginRp,
            'hargaJual' => $hargaJual,
            'angsuran' => $angsuran,
            'plafond' => $plafond,
            'plafondMaks' => $plafondMaks,
            'idir' => $idir,
            'idebs' => FormPprDataPinjaman::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'idebKartuKredits' => FormPprDataPinjamanKartuKredit::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'idebLains' => FormPprDataPinjamanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'lampiran' => PprLampiran::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'ftv' => $ftv,
            'pembagi' => $pembagi,
            'persenDp' => $persenDp,
            'dp' => $dp,

            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'pekerjaans' => FormPprDataPekerjaan::all(),
            'agunans' => FormPprDataAgunan::all(),
            'kekayaan_simpanans' => FormPprDataKekayaanSimpanan::all(),
            'kekayaan_tanah_bangunans' => FormPprDataKekayaanTanahBangunan::all(),
            'kekayaan_kendaraans' => FormPprDataKekayaanKendaraan::all(),
            'kekayaan_sahams' => FormPprDataKekayaanSaham::all(),
            'kekayaan_lains' => FormPprDataKekayaanLainnya::all(),
            'pinjamans' => FormPprDataPinjaman::all(),
            'pinjaman_kartu_kredits' => FormPprDataPinjamanKartuKredit::all(),
            'pinjaman_lains' => FormPprDataPinjamanLainnya::all(),

            //History
            'history' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'timelines' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->get(),

            //perhitunganSLA
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->count(),
        ]);
    }

    public function showPasar($id)
    {
        $data = PasarPembiayaan::select()->where('id', $id)->get()->first();
        $nasabah = PasarNasabahh::select()->where('id', $data->nasabah_id)->get()->first();
        $usaha = PasarKeteranganUsaha::select()->where('pasar_pembiayaan_id', $id)->get()->first();
        $pasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->get()->first();
        $jaminanrumah = PasarLegalitasRumah::select()->where('pasar_pembiayaan_id', $id)->get()->first();
        $jaminanlain = PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->get()->first();
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
        $cekcicilanpasangan = PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->get()->count();
        $total_pengeluaran = ($pengeluaranlain + $cicilan + $angsuran1);

        if ($cekcicilanpasangan > 0) {
            $cicilanpasangan =   $cekcicilanpasangan = PasarSlikPasangan::select()->where('pasar_pembiayaan_id', $id)->sum('angsuran');

            $total_pengeluaran = $pengeluaranlain + $cicilan + $angsuran1 + $cicilanpasangan;
            $cicilan =  $cicilan + $cicilanpasangan;
        }

        $di = ($laba_bersih - $total_pengeluaran);

        //rating

        $proses_kepalapasar = PasarBendahara::select()->where('jenis_pasar_id', $pasar->kode_pasar)->get()->first();
        $proses_jenispasar = PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->get()->first();
        $proses_jenisdagang = PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->get()->first();
        $proses_sukubangsa = PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->get()->first();
        $proses_lamadagang = PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->get()->first();
        $proses_jaminanrumah = PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->get()->first();
        $proses_cashpickup = PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->get()->first();
        $proses_jenisnasabah = PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->get()->first();


        $proses_jaminanlain = PasarJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->get()->first();

        // if(!isset($proses_jaminanlain)){
        //     $prosesjaminanlain=PasarJenisJaminan::select()->where('kol',null)->get()->first();
        // }
        // else{
        //     $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->get()->first();
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
        $score_jaminanlain = $proses_jaminanlain->rating;

        $idir = number_format(($cicilan + $angsuran1) / ($di) * 100);

        if ($idir <= 50) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 4)->get()->first();
        }

        if ($idir >= 50 && $idir <= 60) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 3)->get()->first();
        }

        if ($idir >= 60 && $idir <= 69) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 2)->get()->first();
        }

        if ($idir >= 70) {
            $proses_idir = PasarScoreIdir::select()->where('rating', 1)->get()->first();
        }



        $score_idir = $proses_idir->rating;
        //slik

        $data_slik = PasarSlik::select()->where('pasar_pembiayaan_id', $id)->orderBy('kol', 'desc')->get()->first();

        if (!isset($data_slik)) {
            $prosesslik = PasarScoreSlik::select()->where('kol', null)->get()->first();
        } else {
            $prosesslik = PasarScoreSlik::select()->where('kol', $data_slik->kol)->get()->first();
        }
        $score_slik = $prosesslik->rating;

        $waktuawal = PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

        // $no = Pembiayaan::select()->where('status','Selesai Akad')->get()->count();

        // $no_surat = (2298 - 12) + ($no+1);


        // return $no_surat;
        //    return $harga1;
        return view('akad::proposal.lihat', [
            'segmen' => 'Pasar',
            'title' => 'Detail Calon Nasabah',
            // 'jabatan'=>Role::select()->where('user_id',Auth::user()->id)->get()->first(),
            'deviasi' => PasarDeviasi::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'timelines' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->get(),
            'history' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'waktuawal' => PasarPembiayaanHistory::select('created_at')->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->last(),
            'waktuakhir' => PasarPembiayaanHistory::select('created_at')->where('pasar_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'pembiayaan' => PasarPembiayaan::select()->where('id', $id)->get()->first(),
            'nasabah' => PasarNasabahh::select()->where('id', $id)->get()->first(),
            'fotos' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->get(),
            'fototoko' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto toko')->get()->first(),
            'fotodiri' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'jaminanusahas' => PasarJaminan::select()->where('pasar_pembiayaan_id', $id)->get(),
            'jaminanlainusahas' => PasarJaminanLain::select()->where('pasar_pembiayaan_id', $id)->get(),
            'usahas' => PasarKeteranganUsaha::all(), //udah
            'akads' => PasarAkad::all(),
            'sektors' => PasarSektorEkonomi::all(),
            'konfirmasi' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Konfirmasi Kepala Pasar')->get()->first(),
            'nota' => PasarFoto::select()->where('pasar_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->get()->first(),
            'pasars' => PasarJenisPasar::select()->where('kode_pasar', $usaha->jenispasar_id)->get()->first(),
            'lamas' => PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->get()->first(),
            'rumahs' => PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->get()->first(),
            'dagangs' => PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->get()->first(),
            'cashs' => PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->get()->first(),
            'nasabahs' => PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->get()->first(),
            'sukus' => PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->get()->first(),
            'jaminans' => PasarJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->get()->first(),
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
            'score_jaminanlain' => $score_jaminanlain * $proses_jaminanlain->bobot,


            //perhitunganSLA
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id', $id)->count(),
        ]);
    }
    public function showSkpd($id)
    {
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
        }
        if ($dsr <= 35 && $dsr >= 31) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 2)->get()->first();
        }
        if ($dsr <= 30 && $dsr >= 21) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 3)->get()->first();
        }
        if ($dsr < 20) {
            $proses_dsr = SkpdScoreDsr::select()->where('rating', 4)->get()->first();
        }

        // return $proses_dsr;
        $proses_slik = 0;
        if ($data_slik) {
            $proses_slik = SkpdScoreSlik::select()->where('kol', $slik)->get()->first();
        }
        // $proses_slik=SkpdScoreSlik::select()->where('kol',$slik)->get()->first();
        $proses_jaminan = SkpdJenisJaminan::select()->where('id', $jaminan->skpd_jenis_jaminan_id)->get()->first();
        $proses_nasabah = 'Nasabah Baru';
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
        $rating_nasabah = 2;
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
        // $no = Pembiayaan::select()->where('status','Selesai Akad')->get()->count();

        // $no_surat = (2298 - 12) + ($no+1);


        // return $no_surat;
        return view('akad::proposal.lihat', [
            'segmen' => 'SKPD',
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
            'deviasi' => SkpdDeviasi::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'cekcicilanpasangan' => $cekcicilanpasangan,
            'ideppasangans' => SkpdSlikPasangan::select()->where('skpd_pembiayaan_id', $id)->get(),

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
            'ideb' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'IDEB')->get()->first(),
            'konfirmasi' => SkpdFoto::select()->where('skpd_pembiayaan_id', $id)->where('kategori', 'Konfirmasi Bendahara')->get()->first(),


            //history
            'history' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),

            //SLA
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => SkpdPembiayaanHistory::select()->where('skpd_pembiayaan_id', $id)->count(),
        ]);
    }
    public function showUmkm($id)
    {
        $data = UmkmPembiayaan::select()->where('id', $id)->get()->first();
        $nasabah = UmkmNasabah::select()->where('id', $data->nasabah_id)->get()->first();
        $usaha = UmkmKeteranganUsaha::select()->where('umkm_pembiayaan_id', $id)->get()->first();
        $jaminanrumah = UmkmLegalitasRumah::select()->where('umkm_pembiayaan_id', $id)->get()->first();
        $jaminanlain = UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->get()->first();
        $tenor = $data->tenor;
        $harga = $data->nominal_pembiayaan;
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

        $cicilan = UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->sum('angsuran');
        $biaya_anak = $nasabah->tanggungan->biaya;
        $biaya_istri = $nasabah->status->biaya;
        $kebutuhan_keluarga = UmkmPembiayaan::select()->where('id', $id)->sum('keb_keluarga');
        $pengeluaranlain = $biaya_anak + $biaya_istri + $kebutuhan_keluarga;
        $total_pengeluaran = ($pengeluaranlain + $cicilan + $angsuran1);
        $cekcicilanpasangan = UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->get()->count();

        if ($cekcicilanpasangan > 0) {
            $cicilanpasangan =   $cekcicilanpasangan = UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->sum('angsuran');

            $total_pengeluaran = $pengeluaranlain + $cicilan + $angsuran1 + $cicilanpasangan;
            $cicilan =  $cicilan + $cicilanpasangan;
        }

        $di = ($laba_bersih - $total_pengeluaran);

        //rating

        $proses_jenisdagang = PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->get()->first();
        $proses_sukubangsa = PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->get()->first();
        $proses_lamadagang = PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->get()->first();
        $proses_jaminanrumah = PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->get()->first();
        $proses_cashpickup = PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->get()->first();
        $proses_jenisnasabah = PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->get()->first();


        $proses_jaminanlain = PasarJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->get()->first();

        // if(!isset($proses_jaminanlain)){
        //     $prosesjaminanlain=PasarJenisJaminan::select()->where('kol',null)->get()->first();
        // }
        // else{
        //     $prosesslik=PasarScoreSlik::select()->where('kol',$data_slik->kol)->get()->first();
        // }
        //score

        $score_jenisdagang = $proses_jenisdagang->rating;
        $score_sukubangsa = $proses_sukubangsa->rating;
        $score_lamadagang = $proses_lamadagang->rating;
        $score_jaminanrumahr = $proses_jaminanrumah->rating;
        $score_cashpick = $proses_cashpickup->rating;
        $score_jenisnasabah = $proses_jenisnasabah->rating;
        $score_jaminanlain = $proses_jaminanlain->rating;

        $idir = number_format(($cicilan + $angsuran1) / ($di) * 100);

        if ($idir <= 50) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 4)->get()->first();
        }

        if ($idir >= 50 && $idir <= 60) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 3)->get()->first();
        }

        if ($idir >= 60 && $idir <= 69) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 2)->get()->first();
        }

        if ($idir >= 70) {
            $proses_idir = UmkmScoreIdir::select()->where('rating', 1)->get()->first();
        }



        $score_idir = $proses_idir->rating;
        //slik

        $data_slik = UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->orderBy('kol', 'desc')->get()->first();

        if (!isset($data_slik)) {
            $prosesslik = PasarScoreSlik::select()->where('kol', null)->get()->first();
        } else {
            $prosesslik = PasarScoreSlik::select()->where('kol', $data_slik->kol)->get()->first();
        }
        $score_slik = $prosesslik->rating;


        $waktuawal = UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();
        // $next=PasarPembiayaanHistory::select()->where('pasar_pembiayaan_id',$id)->where('id' ,'>',$waktuawal->id)->orderby('id')->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);
        // $selanjutnya=Carbon::parse($next->created_at);


        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);



        //    return $harga1;
        return view('akad::proposal.lihat', [
            'segmen' => 'UMKM',
            'title' => 'Detail Calon Nasabah',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'timelines' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->get(),
            'history' => UmkmPembiayaanHistory::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),
            'pembiayaan' => UmkmPembiayaan::select()->where('id', $id)->get()->first(),
            'nasabah' => UmkmNasabah::select()->where('id', $id)->get()->first(),
            'fotos' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->get(),
            'fototoko' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto toko')->get()->first(),
            'fotodiri' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri')->get()->first(),
            'fotoktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto KTP')->get()->first(),
            'fotodiribersamaktp' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Diri Bersama KTP')->get()->first(),
            'fotokk' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Kartu Keluarga')->get()->first(),
            'jaminanusahas' => UmkmJaminan::select()->where('umkm_pembiayaan_id', $id)->get(),
            'jaminanlainusahas' => UmkmJaminanLain::select()->where('umkm_pembiayaan_id', $id)->get(),
            'usahas' => UmkmKeteranganUsaha::all(), //udah
            'akads' => PasarAkad::all(),
            'nota' => UmkmFoto::select()->where('umkm_pembiayaan_id', $id)->where('kategori', 'Foto Nota Pembelanjaan')->get()->first(),
            'sektors' => PasarSektorEkonomi::all(),
            'lamas' => PasarLamaBerdagang::select()->where('kode_lamaberdagang', $usaha->lama_usaha)->get()->first(),
            'rumahs' => PasarJaminanRumahh::select()->where('kode_jaminan', $jaminanrumah->legalitas_kepemilikan_rumah)->get()->first(),
            'dagangs' => PasarJenisDagang::select()->where('kode_jenisdagang', $usaha->jenisdagang_id)->get()->first(),
            'cashs' => PasarCashPick::select()->where('kode_jeniscash', $data->cashpickup)->get()->first(),
            'nasabahs' => PasarJenisNasabah::select()->where('kode_jenisnasabah', $data->nasabah)->get()->first(),
            'sukus' => PasarSukuBangsa::select()->where('kode_suku', $usaha->suku_bangsa_id)->get()->first(),
            'jaminans' => PasarJenisJaminan::select()->where('kode_jaminan', $jaminanlain->jaminanlain)->get()->first(),
            // 'slik'=>$prosesslik,
            'idebs' => UmkmSlik::select()->where('umkm_pembiayaan_id', $id)->get(),
            'cicilanpasangans' => UmkmSlikPasangan::select()->where('umkm_pembiayaan_id', $id)->get(),
            'ideb' => UmkmPembiayaan::select()->where('id', $id)->get(),
            'laba_bersih' => $laba_bersih,
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

            'score_jenisdagang' => $score_jenisdagang *  $proses_jenisdagang->bobot,
            'score_sukubangsa' => $score_sukubangsa * $proses_sukubangsa->bobot,
            'score_lamadagang' => $score_lamadagang * $proses_lamadagang->bobot,
            'score_jaminanrumah' => $score_jaminanrumahr * $proses_jaminanrumah->bobot,
            'score_cashpick' => $score_cashpick * $proses_cashpickup->bobot,
            'score_jenisnasabah' => $score_jenisnasabah * $proses_jenisnasabah->bobot,
            'score_slik' => $score_slik * $prosesslik->bobot,
            'score_idir' => $score_idir * $proses_idir->bobot,
            'score_jaminanlain' => $score_jaminanlain * $proses_jaminanlain->bobot,

            'deviasi' => UmkmDeviasi::select()->where('umkm_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first(),

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
