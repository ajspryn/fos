<?php

namespace Modules\Analis\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Ppr\Entities\PprLampiran;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Ppr\Entities\PprScoring;


class PprKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite = PprPembiayaanHistory::select()
            ->latest()
            ->groupBy('form_ppr_pembiayaan_id')
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

        return view('analis::ppr.komite.index', [
            'title' => 'Data Komite PPR',
            'komites' => $komite,
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
        PprPembiayaanHistory::create([
            'form_ppr_pembiayaan_id' => $request->form_ppr_pembiayaan_id,
            'catatan' => $request->catatan,
            'status_id' => $request->status_id,
            'user_id' => Auth::user()->id,
            'jabatan_id' => $request->jabatan_id,
            'divisi_id' => null,
        ]);

        if ($request->status_id == 5) {
            return redirect('/analis/ppr/komite/')->with('success', 'Proposal Berhasil Disetujui!');
        } elseif ($request->status_id == 7) {
            FormPprPembiayaan::where('id', $request->form_ppr_pembiayaan_id)
                ->update([
                    'dilengkapi_ao' => 'Butuh Revisi',
                    'form_cl' => 'Butuh Revisi',
                    'form_score' => 'Butuh Revisi',
                ]);
            return redirect('/analis/ppr/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
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
        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();

        $cek = PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $id)
            ->latest()
            ->get()
            ->first();

        if ($cek->status_id == 5 && $cek->jabatan_id == 2) {
            PprPembiayaanHistory::create([
                'form_ppr_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 3,
                'divisi_id' => 0,
                'user_id' => Auth::user()->$id,
            ]);
        } else {
        }

        //Timeline
        $waktuawal = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);

        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);

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

        return view('analis::ppr.komite.lihat', [
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

            //SLA
            'totalwaktu' => $totalwaktu,
            'arr' => -2,
            'banyak_history' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->count(),

        ]);

        return redirect('/analis/ppr/komite/')->with('success', 'Proposal Berhasil Disetujui');
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
