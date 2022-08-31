<?php

namespace Modules\Analis\Http\Controllers;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\PprCapacityGajiBersih;
use Modules\Admin\Entities\PprCapacityJmlTanggunganKeluarga;
use Modules\Admin\Entities\PprCapacityKeamananBisnisPekerjaan;
use Modules\Admin\Entities\PprCapacityPekerjaan;
use Modules\Admin\Entities\PprCapacityPendidikan;
use Modules\Admin\Entities\PprCapacityPengalamanKerja;
use Modules\Admin\Entities\PprCapacityPengalamanPembiayaan;
use Modules\Admin\Entities\PprCapacityPotensiPertumbuhanHasil;
use Modules\Admin\Entities\PprCapacitySumberPendapatan;
use Modules\Admin\Entities\PprCapacityNfSituasiPersaingan;
use Modules\Admin\Entities\PprCapacityNfKaderisasi;
use Modules\Admin\Entities\PprCapacityNfKualifikasiKomersial;
use Modules\Admin\Entities\PprCapacityNfKualifikasiTeknis;
use Modules\Admin\Entities\PprCapacityUsia;
use Modules\Admin\Entities\PprCapitalGajiBersih;
use Modules\Admin\Entities\PprCapitalJmlTanggunganKeluarga;
use Modules\Admin\Entities\PprCapitalKeamananBisnisPekerjaan;
use Modules\Admin\Entities\PprCapitalPekerjaan;
use Modules\Admin\Entities\PprCapitalPengalamanPembiayaan;
use Modules\Admin\Entities\PprCapitalPotensiPertumbuhanHasil;
use Modules\Admin\Entities\PprCapitalSumberPendapatan;
use Modules\Admin\Entities\PprCharacterAngsuranKolektif;
use Modules\Admin\Entities\PprCharacterKelengkapanValiditas;
use Modules\Admin\Entities\PprCharacterKonsistensi;
use Modules\Admin\Entities\PprCharacterMotivasi;
use Modules\Admin\Entities\PprCharacterPengalamanPembiayaan;
use Modules\Admin\Entities\PprCharacterReferensi;
use Modules\Admin\Entities\PprCharacterTempatBekerja;
use Modules\Admin\Entities\PprCharacterNfTingkatKepercayaan;
use Modules\Admin\Entities\PprCharacterNfPengelolaanRekening;
use Modules\Admin\Entities\PprCharacterNfReputasiBisnis;
use Modules\Admin\Entities\PprCharacterNfPerilakuPribadi;
use Modules\Admin\Entities\PprCollateralDayaTarikAgunan;
use Modules\Admin\Entities\PprCollateralJangkaWaktuLikuidasi;
use Modules\Admin\Entities\PprCollateralKontribusiPemohon;
use Modules\Admin\Entities\PprCollateralMarketabilitas;
use Modules\Admin\Entities\PprCollateralPertumbuhanAgunan;
use Modules\Admin\Entities\PprCollateralNfMarketabilitas;
use Modules\Admin\Entities\PprCollateralNfKontribusiPemohon;
use Modules\Admin\Entities\PprCollateralNfPertumbuhanAgunan;
use Modules\Admin\Entities\PprCollateralNfDayaTarikAgunan;
use Modules\Admin\Entities\PprCollateralNfJangkaWaktuLikuidasi;
use Modules\Admin\Entities\PprConditionShariaGajiBersih;
use Modules\Admin\Entities\PprConditionShariaJmlTanggunganKeluarga;
use Modules\Admin\Entities\PprConditionShariaKeamananBisnisPekerjaan;
use Modules\Admin\Entities\PprConditionShariaPekerjaan;
use Modules\Admin\Entities\PprConditionShariaPendidikan;
use Modules\Admin\Entities\PprConditionShariaPengalamanKerja;
use Modules\Admin\Entities\PprConditionShariaPengalamanPembiayaan;
use Modules\Admin\Entities\PprConditionShariaPotensiPertumbuhanHasil;
use Modules\Admin\Entities\PprConditionShariaSumberPendapatan;
use Modules\Admin\Entities\PprConditionShariaUsia;
use Modules\Admin\Entities\PprConditionShariaNfKualitasProdukJasa;
use Modules\Admin\Entities\PprConditionShariaNfSistemPembayaran;
use Modules\Admin\Entities\PprConditionShariaNfLokasiUsaha;
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
use Modules\Ppr\Entities\PprAbilityToRepayFixedIncome;
use Modules\Ppr\Entities\PprAbilityToRepayNonFixedIncome;
use Modules\Ppr\Entities\PprCapacity;
use Modules\Ppr\Entities\PprCapacityNonFixed;
use Modules\Ppr\Entities\PprCapital;
use Modules\Ppr\Entities\PprCharacter;
use Modules\Ppr\Entities\PprCharacterNonFixed;
use Modules\Ppr\Entities\PprClDokumen;
use Modules\Ppr\Entities\PprClDokumenAgunan;
use Modules\Ppr\Entities\PprClDokumenFixedIncome;
use Modules\Ppr\Entities\PprClDokumenNonFixedIncome;
use Modules\Ppr\Entities\PprClPersyaratan;
use Modules\Ppr\Entities\PprCollateral;
use Modules\Ppr\Entities\PprCollateralNonFixed;
use Modules\Ppr\Entities\PprCondition;
use Modules\Ppr\Entities\PprConditionNonFixed;
use Modules\Ppr\Entities\PprPemberkasanMemo;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Ppr\Entities\PprScoringAtrFixedIncome;
use Modules\Ppr\Entities\PprScoringAtrNonFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralNonFixedIncome;
use Modules\Ppr\Entities\PprScoringFixedIncome;
use Modules\Ppr\Entities\PprScoringNonFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrNonFixedIncome;
use Modules\Ppr\Entities\PprScoring;


class PprKomiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $komite = PprPembiayaanHistory::select()->where('status_id', 5)->where('user_id', auth::user()->id)->get();
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
            'jabatan_id' => 3,
            'divisi_id' => null,
        ]);

        // if($request->file('foto')){
        //     $foto=$request->file('foto')->store('foto-pasar-pembiayaan');
        //     PasarFoto::create([
        //         'pasar_pembiayaan_id'=>$request->pasar_pembiayaan_id,
        //         'kategori'=> 'Konfirmasi Kepala Pasar',
        //         'foto'=> $foto,
        //     ]);
        // }

        return redirect('/analis/ppr/komite');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cek = PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $id)
            ->where('user_id', Auth::user()->id)
            ->get()
            ->count();

        if ($cek == 0) {
            PprPembiayaanHistory::create([
                'form_ppr_pembiayaan_id' => $id,
                'status_id' => 4,
                'jabatan_id' => 3,
                'divisi_id' => 0,
                'user_id' => Auth::user()->$id,
            ]);
        }

        $historystatus = PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        //Timeline
        $waktuawal = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'asc')->get()->first();
        $waktuakhir = PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->orderby('created_at', 'desc')->get()->first();

        $waktumulai = Carbon::parse($waktuawal->created_at);
        $waktuberakhir = Carbon::parse($waktuakhir->created_at);

        $totalwaktu = $waktumulai->diffAsCarbonInterval($waktuberakhir);
        // $data = FormPprPembiayaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first();

        // $nasabah = FormPprDataPribadi::select()->where('id', $id)->get()->first();
        // $pekerjaan_nasabah = FormPprDataPekerjaan::select()->where('form_ppr_data_pribadi_id', $id)->get()->first();

        return view('analis::ppr.komite.lihat', [
            'title' => 'Detail Proposal',
            'jabatan' => Role::select()->where('user_id', Auth::user()->id)->get()->first(),
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'scoring' => PprScoring::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'timelines' => PprPembiayaanHistory::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'nasabah' => FormPprDataPribadi::select()->where('id', $id)->get()->first(),

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

            //SLA
            'totalwaktu' => $totalwaktu,
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
