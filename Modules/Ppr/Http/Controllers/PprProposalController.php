<?php

namespace Modules\Ppr\Http\Controllers;

use App\Models\Role;
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

class PprProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $test = FormPprPembiayaan::select()->where('user_id', Auth::user()->id)->where('form_cl', null)->get();
        // return $test;
        return view('ppr::proposal.index', [
            'title' => 'Proposal PPR',
            'proposals' => FormPprPembiayaan::select()->where('user_id', Auth::user()->id)->whereNull('form_cl')->orWhereNull('form_score')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ppr::create');
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
        return view('ppr::proposal.lihat', [
            'title' => 'Detail Proposal',
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),
            'dokumen' => PprClDokumen::select()->where('id', $id)->get()->first(),

            'clPersyaratan' => PprClPersyaratan::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),
            'dokFixedIncome' => PprClDokumenFixedIncome::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),
            'dokNonFixedIncome' => PprClDokumenNonFixedIncome::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),
            'dokAgunan' => PprClDokumenAgunan::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),
            'AtrFixedIncome' => PprAbilityToRepayFixedIncome::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),
            'AtrNonFixedIncome' => PprAbilityToRepayNonFixedIncome::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),
            'pemberkasanMemo' => PprPemberkasanMemo::select()->where('ppr_cl_dokumen_id', $id)->get()->first(),

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

            // 'persyaratans' => PprClPersyaratan::all(),

            //Kategori Scoring Fixed Income
            'character_tempat_bekerjas' => PprCharacterTempatBekerja::all(),
            'character_konsistensis' => PprCharacterKonsistensi::all(),
            'character_kelengkapan_validitas_datas' => PprCharacterKelengkapanValiditas::all(),
            'character_pembayaran_angsuran_kolektifs' => PprCharacterAngsuranKolektif::all(),
            'character_pengalaman_pembiayaans' => PprCharacterPengalamanPembiayaan::all(),
            'character_motivasis' => PprCharacterMotivasi::all(),
            'character_referensis' => PprCharacterReferensi::all(),

            'capital_pekerjaans' => PprCapitalPekerjaan::all(),
            'capital_pengalaman_riwayat_pembiayaans' => PprCapitalPengalamanPembiayaan::all(),
            'capital_keamanan_bisnis_pekerjaans' => PprCapitalKeamananBisnisPekerjaan::all(),
            'capital_potensi_pertumbuhan_hasils' => PprCapitalPotensiPertumbuhanHasil::all(),
            'capital_sumber_pendapatans' => PprCapitalSumberPendapatan::all(),
            'capital_pendapatan_gaji_bersihs' => PprCapitalGajiBersih::all(),
            'capital_jml_tanggungan_keluargas' => PprCapitalJmlTanggunganKeluarga::all(),

            'capacity_pekerjaans' => PprCapacityPekerjaan::all(),
            'capacity_pengalaman_riwayat_pembiayaans' => PprCapacityPengalamanPembiayaan::all(),
            'capacity_keamanan_bisnis_pekerjaans' => PprCapacityKeamananBisnisPekerjaan::all(),
            'capacity_potensi_pertumbuhan_hasils' => PprCapacityPotensiPertumbuhanHasil::all(),
            'capacity_pengalaman_kerjas' => PprCapacityPengalamanKerja::all(),
            'capacity_pendidikans' => PprCapacityPendidikan::all(),
            'capacity_usias' => PprCapacityUsia::all(),
            'capacity_sumber_pendapatans' => PprCapacitySumberPendapatan::all(),
            'capacity_pendapatan_gaji_bersihs' => PprCapacityGajiBersih::all(),
            'capacity_jml_tanggungan_keluargas' => PprCapacityJmlTanggunganKeluarga::all(),

            'condition_pekerjaans' => PprConditionShariaPekerjaan::all(),
            'condition_pengalaman_riwayat_pembiayaans' => PprConditionShariaPengalamanPembiayaan::all(),
            'condition_keamanan_bisnis_pekerjaans' => PprConditionShariaKeamananBisnisPekerjaan::all(),
            'condition_potensi_pertumbuhan_hasils' => PprConditionShariaPotensiPertumbuhanHasil::all(),
            'condition_pengalaman_kerjas' => PprConditionShariaPengalamanKerja::all(),
            'condition_pendidikans' => PprConditionShariaPendidikan::all(),
            'condition_usias' => PprConditionShariaUsia::all(),
            'condition_sumber_pendapatans' => PprConditionShariaSumberPendapatan::all(),
            'condition_pendapatan_gaji_bersihs' => PprConditionShariaGajiBersih::all(),
            'condition_jml_tanggungan_keluargas' => PprConditionShariaJmlTanggunganKeluarga::all(),

            'collateral_marketabilitases' => PprCollateralMarketabilitas::all(),
            'collateral_kontribusi_pemohon_ftvs' => PprCollateralKontribusiPemohon::all(),
            'collateral_pertumbuhan_agunans' => PprCollateralPertumbuhanAgunan::all(),
            'collateral_daya_tarik_agunans' => PprCollateralDayaTarikAgunan::all(),
            'collateral_jangka_waktu_likuidasis' => PprCollateralJangkaWaktuLikuidasi::all(),

            //Kategori Scoring Non Fixed Income
            'character_nf_tingkat_kepercayaans' => PprCharacterNfTingkatKepercayaan::all(),
            'character_nf_pengelolaan_rekenings' => PprCharacterNfPengelolaanRekening::all(),
            'character_nf_reputasi_bisnises' => PprCharacterNfReputasiBisnis::all(),
            'character_nf_perilaku_pribadis' => PprCharacterNfPerilakuPribadi::all(),

            'capacity_nf_situasi_persaingans' => PprCapacityNfSituasiPersaingan::all(),
            'capacity_nf_kaderisasis' => PprCapacityNfKaderisasi::all(),
            'capacity_nf_kualifikasi_komersials' => PprCapacityNfKualifikasiKomersial::all(),
            'capacity_nf_kualifikasi_teknises' => PprCapacityNfKualifikasiTeknis::all(),

            'condition_sharia_nf_kualitas_produk_jasas' => PprConditionShariaNfKualitasProdukJasa::all(),
            'condition_sharia_nf_sistem_pembayarans' => PprConditionShariaNfSistemPembayaran::all(),
            'condition_sharia_nf_lokasi_usahas' => PprConditionShariaNfLokasiUsaha::all(),

            'collateral_nf_marketabilitases' => PprCollateralNfMarketabilitas::all(),
            'collateral_nf_kontribusi_pemohons' => PprCollateralNfKontribusiPemohon::all(),
            'collateral_nf_pertumbuhan_agunans' => PprCollateralNfPertumbuhanAgunan::all(),
            'collateral_nf_daya_tarik_agunans' => PprCollateralNfDayaTarikAgunan::all(),
            'collateral_nf_jangka_waktu_likuidasis' => PprCollateralNfJangkaWaktuLikuidasi::all(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ppr::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // if (request('form_cl') == 'Telah diisi') {
        //     FormPprPembiayaan::where('id', $id)
        //         ->update([
        //             'form_score' => 'Telah dinilai',
        //         ]);
        // } elseif (request('form_score') == 'Telah dinilai') {
        //     FormPprPembiayaan::where('id', $id)
        //         ->update([
        //             'form_cl' => 'Telah diisi',
        //         ]);
        // } else {
        //     FormPprPembiayaan::where('id', $id)
        //         ->update([
        //             'form_cl' => $request->form_cl,
        //             'form_score' => $request->form_score,
        //         ]);
        // }
        // dd($request);

        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();

        FormPprPembiayaan::where('id', $id)
            ->update([
                'form_cl' => $request->form_cl,
                'form_score' => $request->form_score,
                'form_permohonan_nilai_ppr_dimohon' => $request->form_permohonan_nilai_ppr_dimohon,
                // 'form_permohonan_jenis_akad_pembayaran' => $request->form_permohonan_jenis_akad_pembayaran,
            ]);


        if ($pembiayaan->form_cl != 'Telah diisi') {
            //Check List
            PprClPersyaratan::where('id', $id)
                ->update([
                    'wni' => $request->wni,
                    'usia_cukup' => $request->usia_cukup,
                    'tidak_melebihi_batas_usia' => $request->tidak_melebihi_batas_usia,
                    'penghasilan_menjamin' => $request->penghasilan_menjamin,
                    'masa_kerja' => $request->masa_kerja,
                    'kol_lancar' => $request->kol_lancar,
                    'kol_kesanggupan' => $request->kol_kesanggupan,
                    'menyampaikan_npwp' => $request->menyampaikan_npwp,
                ]);

            if ($pembiayaan->jenis_nasabah == 'Fixed Income') {
                PprClDokumenFixedIncome::where('ppr_cl_dokumen_id', $id)
                    ->update([
                        'aplikasi_permohonan' => $request->aplikasi_permohonan,
                        'copy_ktp' => $request->copy_ktp,
                        'copy_kk' => $request->copy_kk,
                        'copy_sn_sc' => $request->copy_sn_sc,
                        'pasphoto_ktp_sn' => $request->pasphoto_ktp_sn,
                        'copy_slip_gaji' => $request->copy_slip_gaji,
                        'copy_tabungan' => $request->copy_tabungan,
                        'copy_sk' => $request->copy_sk,
                        'sk_pemotongan_gaji' => $request->sk_pemotongan_gaji,
                        'npwp' => $request->npwp,
                    ]);

                PprAbilityToRepayFixedIncome::where('ppr_cl_dokumen_id', $id)
                    ->update([
                        'gaji1_gaji_kotor' => str_replace(",", "", $request->gaji1_gaji_kotor),
                        'gaji1_potongan_tht' => str_replace(",", "", $request->gaji1_potongan_tht),
                        'gaji1_potongan_jamsostek' => str_replace(",", "", $request->gaji1_potongan_jamsostek),
                        'gaji1_potongan_koperasi' => str_replace(",", "", $request->gaji1_potongan_koperasi),
                        'gaji1_potongan_lain' => str_replace(",", "", $request->gaji1_potongan_lain),
                        'gaji1_gaji_bersih' => str_replace(",", "", $request->gaji1_gaji_bersih),
                        'gaji2_gaji_kotor' => str_replace(",", "", $request->gaji2_gaji_kotor),
                        'gaji2_potongan_tht' => str_replace(",", "", $request->gaji2_potongan_tht),
                        'gaji2_potongan_jamsostek' => str_replace(",", "", $request->gaji2_potongan_jamsostek),
                        'gaji2_potongan_koperasi' => str_replace(",", "", $request->gaji2_potongan_koperasi),
                        'gaji2_potongan_lain' => str_replace(",", "", $request->gaji2_potongan_lain),
                        'gaji2_gaji_bersih' => str_replace(",", "", $request->gaji2_gaji_bersih),
                        'gaji_pasangan_gaji_kotor' => str_replace(",", "", $request->gaji_pasangan_gaji_kotor),
                        'gaji_pasangan_potongan_tht' => str_replace(",", "", $request->gaji_pasangan_potongan_tht),
                        'gaji_pasangan_potongan_jamsostek' => str_replace(",", "", $request->gaji_pasangan_potongan_jamsostek),
                        'gaji_pasangan_potongan_koperasi' => str_replace(",", "", $request->gaji_pasangan_potongan_koperasi),
                        'gaji_pasangan_potongan_lain' => str_replace(",", "", $request->gaji_pasangan_potongan_lain),
                        'gaji_pasangan_gaji_bersih' => str_replace(",", "", $request->gaji_pasangan_gaji_bersih),
                        'angsuran_rumah' => str_replace(",", "", $request->angsuran_rumah),
                        'angsuran_mobil' => str_replace(",", "", $request->angsuran_mobil),
                        'angsuran_lain' => str_replace(",", "", $request->angsuran_lain),
                        'total_angsuran' => str_replace(",", "", $request->total_angsuran),
                        'biaya_pangan' => str_replace(",", "", $request->biaya_pangan),
                        'biaya_sandang' => str_replace(",", "", $request->biaya_sandang),
                        'biaya_transportasi' => str_replace(",", "", $request->biaya_transportasi),
                        'biaya_listrik' => str_replace(",", "", $request->biaya_listrik),
                        'biaya_telepon' => str_replace(",", "", $request->biaya_telepon),
                        'biaya_gas' => str_replace(",", "", $request->biaya_gas),
                        'biaya_air' => str_replace(",", "", $request->biaya_air),
                        'biaya_pendidikan' => str_replace(",", "", $request->biaya_pendidikan),
                        'biaya_kesehatan' => str_replace(",", "", $request->biaya_kesehatan),
                        'biaya_lain' => str_replace(",", "", $request->biaya_lain),
                        'total_biaya_per_bulan' => str_replace(",", "", $request->total_biaya_per_bulan),
                        'total_penghasilan_bersih_per_bulan' => str_replace(",", "", $request->total_penghasilan_bersih_per_bulan),
                    ]);
            } else {
                PprClDokumenNonFixedIncome::where('ppr_cl_dokumen_id', $id)
                    ->update([
                        'aplikasi_permohonan' => $request->aplikasi_permohonan,
                        'copy_ktp' => $request->copy_ktp,
                        'copy_kk' => $request->copy_kk,
                        'copy_sn_sc' => $request->copy_sn_sc,
                        'foto_pemohon_pasangan' => $request->foto_pemohon_pasangan,
                        'sk_penghasilan' => $request->sk_penghasilan,
                        'copy_tabungan_menyimpan' => $request->copy_tabungan_menyimpan,
                        'copy_akta_izin_usaha' => $request->copy_akta_izin_usaha,
                        'copy_tabungan_mengambil' => $request->copy_tabungan_mengambil,
                        'npwp_bukti_pp' => $request->npwp_bukti_pp,
                        'laporan_keuangan_perusahaan' => $request->laporan_keuangan_perusahaan,
                    ]);

                PprAbilityToRepayNonFixedIncome::where('ppr_cl_dokumen_id', $id)
                    ->update([
                        //Usaha 1
                        'usaha1_penjualan' => str_replace(",", "", $request->usaha1_penjualan),
                        'usaha1_diskon' => str_replace(",", "", $request->usaha1_diskon),
                        'usaha1_retur' => str_replace(",", "", $request->usaha1_retur),
                        'usaha1_penjualan_bersih' => str_replace(",", "", $request->usaha1_penjualan_bersih),
                        'usaha1_persediaan_barang_langsung' => str_replace(",", "", $request->usaha1_persediaan_barang_langsung),
                        'usaha1_pembelian_bahan_langsung' => str_replace(",", "", $request->usaha1_pembelian_bahan_langsung),
                        'usaha1_upah_langsung' => str_replace(",", "", $request->usaha1_upah_langsung),
                        'usaha1_upah_tidak_langsung' => str_replace(",", "", $request->usaha1_upah_tidak_langsung),
                        'usaha1_biaya_penyusutan' => str_replace(",", "", $request->usaha1_biaya_penyusutan),
                        'usaha1_boh_lain' => str_replace(",", "", $request->usaha1_boh_lain),
                        'usaha1_total_boh' => str_replace(",", "", $request->usaha1_total_boh),
                        'usaha1_jumlah_harga_pokok_penjualan' => str_replace(",", "", $request->usaha1_jumlah_harga_pokok_penjualan),
                        'usaha1_laba_kotor' => str_replace(",", "", $request->usaha1_laba_kotor),
                        'usaha1_biaya_penjualan' => str_replace(",", "", $request->usaha1_biaya_penjualan),
                        'usaha1_biaya_gaji_kds' => str_replace(",", "", $request->usaha1_biaya_gaji_kds),
                        'usaha1_biaya_lisrik_telp_air' => str_replace(",", "", $request->usaha1_biaya_lisrik_telp_air),
                        'usaha1_biaya_perawatan_gedung' => str_replace(",", "", $request->usaha1_biaya_perawatan_gedung),
                        'usaha1_biaya_bagi_hasil_sewa_margin' => str_replace(",", "", $request->usaha1_biaya_bagi_hasil_sewa_margin),
                        'usaha1_biaya_adm_lain' => str_replace(",", "", $request->usaha1_biaya_adm_lain),
                        'usaha1_jml_biaya_adm' => str_replace(",", "", $request->usaha1_jml_biaya_adm),
                        'usaha1_laba_sebelum_pajak' => str_replace(",", "", $request->usaha1_laba_sebelum_pajak),
                        'usaha1_pajak_zakat' => str_replace(",", "", $request->usaha1_pajak_zakat),
                        'usaha1_laba_setelah_pajak' => str_replace(",", "", $request->usaha1_laba_setelah_pajak),

                        //Usaha 2
                        'usaha2_penjualan' => str_replace(",", "", $request->usaha2_penjualan),
                        'usaha2_diskon' => str_replace(",", "", $request->usaha2_diskon),
                        'usaha2_retur' => str_replace(",", "", $request->usaha2_retur),
                        'usaha2_penjualan_bersih' => str_replace(",", "", $request->usaha2_penjualan_bersih),
                        'usaha2_persediaan_barang_langsung' => str_replace(",", "", $request->usaha2_persediaan_barang_langsung),
                        'usaha2_pembelian_bahan_langsung' => str_replace(",", "", $request->usaha2_pembelian_bahan_langsung),
                        'usaha2_upah_langsung' => str_replace(",", "", $request->usaha2_upah_langsung),
                        'usaha2_upah_tidak_langsung' => str_replace(",", "", $request->usaha2_upah_tidak_langsung),
                        'usaha2_biaya_penyusutan' => str_replace(",", "", $request->usaha2_biaya_penyusutan),
                        'usaha2_boh_lain' => str_replace(",", "", $request->usaha2_boh_lain),
                        'usaha2_total_boh' => str_replace(",", "", $request->usaha2_total_boh),
                        'usaha2_jumlah_harga_pokok_penjualan' => str_replace(",", "", $request->usaha2_jumlah_harga_pokok_penjualan),
                        'usaha2_laba_kotor' => str_replace(",", "", $request->usaha2_laba_kotor),
                        'usaha2_biaya_penjualan' => str_replace(",", "", $request->usaha2_biaya_penjualan),
                        'usaha2_biaya_gaji_kds' => str_replace(",", "", $request->usaha2_biaya_gaji_kds),
                        'usaha2_biaya_lisrik_telp_air' => str_replace(",", "", $request->usaha2_biaya_lisrik_telp_air),
                        'usaha2_biaya_perawatan_gedung' => str_replace(",", "", $request->usaha2_biaya_perawatan_gedung),
                        'usaha2_biaya_bagi_hasil_sewa_margin' => str_replace(",", "", $request->usaha2_biaya_bagi_hasil_sewa_margin),
                        'usaha2_biaya_adm_lain' => str_replace(",", "", $request->usaha2_biaya_adm_lain),
                        'usaha2_jml_biaya_adm' => str_replace(",", "", $request->usaha2_jml_biaya_adm),
                        'usaha2_laba_sebelum_pajak' => str_replace(",", "", $request->usaha2_laba_sebelum_pajak),
                        'usaha2_pajak_zakat' => str_replace(",", "", $request->usaha2_pajak_zakat),
                        'usaha2_laba_setelah_pajak' => str_replace(",", "", $request->usaha2_laba_setelah_pajak),

                        //Usaha Pasangan
                        'usaha_pasangan_penjualan' => str_replace(",", "", $request->usaha_pasangan_penjualan),
                        'usaha_pasangan_diskon' => str_replace(",", "", $request->usaha_pasangan_diskon),
                        'usaha_pasangan_retur' => str_replace(",", "", $request->usaha_pasangan_retur),
                        'usaha_pasangan_penjualan_bersih' => str_replace(",", "", $request->usaha_pasangan_penjualan_bersih),
                        'usaha_pasangan_persediaan_barang_langsung' => str_replace(",", "", $request->usaha_pasangan_persediaan_barang_langsung),
                        'usaha_pasangan_pembelian_bahan_langsung' => str_replace(",", "", $request->usaha_pasangan_pembelian_bahan_langsung),
                        'usaha_pasangan_upah_langsung' => str_replace(",", "", $request->usaha_pasangan_upah_langsung),
                        'usaha_pasangan_upah_tidak_langsung' => str_replace(",", "", $request->usaha_pasangan_upah_tidak_langsung),
                        'usaha_pasangan_biaya_penyusutan' => str_replace(",", "", $request->usaha_pasangan_biaya_penyusutan),
                        'usaha_pasangan_boh_lain' => str_replace(",", "", $request->usaha_pasangan_boh_lain),
                        'usaha_pasangan_total_boh' => str_replace(",", "", $request->usaha_pasangan_total_boh),
                        'usaha_pasangan_jumlah_harga_pokok_penjualan' => str_replace(",", "", $request->usaha_pasangan_jumlah_harga_pokok_penjualan),
                        'usaha_pasangan_laba_kotor' => str_replace(",", "", $request->usaha_pasangan_laba_kotor),
                        'usaha_pasangan_biaya_penjualan' => str_replace(",", "", $request->usaha_pasangan_biaya_penjualan),
                        'usaha_pasangan_biaya_gaji_kds' => str_replace(",", "", $request->usaha_pasangan_biaya_gaji_kds),
                        'usaha_pasangan_biaya_lisrik_telp_air' => str_replace(",", "", $request->usaha_pasangan_biaya_lisrik_telp_air),
                        'usaha_pasangan_biaya_perawatan_gedung' => str_replace(",", "", $request->usaha_pasangan_biaya_perawatan_gedung),
                        'usaha_pasangan_biaya_bagi_hasil_sewa_margin' => str_replace(",", "", $request->usaha_pasangan_biaya_bagi_hasil_sewa_margin),
                        'usaha_pasangan_biaya_adm_lain' => str_replace(",", "", $request->usaha_pasangan_biaya_adm_lain),
                        'usaha_pasangan_jml_biaya_adm' => str_replace(",", "", $request->usaha_pasangan_jml_biaya_adm),
                        'usaha_pasangan_laba_sebelum_pajak' => str_replace(",", "", $request->usaha_pasangan_laba_sebelum_pajak),
                        'usaha_pasangan_pajak_zakat' => str_replace(",", "", $request->usaha_pasangan_pajak_zakat),
                        'usaha_pasangan_laba_setelah_pajak' => str_replace(",", "", $request->usaha_pasangan_laba_setelah_pajak),
                        'total_penghasilan_bersih' => str_replace(",", "", $request->total_penghasilan_bersih),
                    ]);
            }

            PprClDokumenAgunan::where('id', $id)
                ->update([
                    'copy_shgb_shm' => $request->copy_shgb_shm,
                    'copy_shgb_proses' => $request->copy_shgb_proses,
                    'copy_imb' => $request->copy_imb,
                    'copy_imb_proses' => $request->copy_imb_proses,
                ]);

            PprPemberkasanMemo::where('id', $id)
                ->update([
                    'cl_persyaratan' => $request->cl_persyaratan,
                    'cl_dokumen' => $request->cl_dokumen,
                    'berkas_copy' => $request->berkas_copy,
                    'paper_hasil_wawancara' => $request->paper_hasil_wawancara,
                    'paper_analisa_5c' => $request->paper_analisa_5c,
                    'paper_fsm' => $request->paper_fsm,
                    'paper_ots' => $request->paper_ots,
                    'laporan_hasil_penilaian_agunan' => $request->laporan_hasil_penilaian_agunan,
                    'perhitungan_plafond_ftv' => $request->perhitungan_plafond_ftv,
                    'daftar_calon_nasabah' => $request->daftar_calon_nasabah,
                ]);
        } elseif ($pembiayaan->form_score != 'Telah dinilai') {
            if ($pembiayaan->jenis_nasabah == 'Fixed Income') {
                PprCharacter::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'character_tempat_bekerja' => $request->character_tempat_bekerja,
                        'character_konsistensi' => $request->character_konsistensi,
                        'character_kelengkapan_validitas_data' => $request->character_kelengkapan_validitas_data,
                        'character_pembayaran_angsuran_kolektif' => $request->character_pembayaran_angsuran_kolektif,
                        'character_pengalaman_pembiayaan' => $request->character_pengalaman_pembiayaan,
                        'character_motivasi' => $request->character_motivasi,
                        'character_referensi' => $request->character_referensi,
                    ]);

                PprCapital::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'capital_pekerjaan' => $request->capital_pekerjaan,
                        'capital_pengalaman_riwayat_pembiayaan' => $request->capital_pengalaman_riwayat_pembiayaan,
                        'capital_keamanan_bisnis_pekerjaan' => $request->capital_keamanan_bisnis_pekerjaan,
                        'capital_potensi_pertumbuhan_hasil' => $request->capital_potensi_pertumbuhan_hasil,
                        'capital_sumber_pendapatan' => $request->capital_sumber_pendapatan,
                        'capital_pendapatan_gaji_bersih' => $request->capital_pendapatan_gaji_bersih,
                        'capital_jml_tanggungan_keluarga' => $request->capital_jml_tanggungan_keluarga,
                    ]);

                PprCapacity::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'capacity_pekerjaan' => $request->capacity_pekerjaan,
                        'capacity_pengalaman_riwayat_pembiayaan' => $request->capacity_pengalaman_riwayat_pembiayaan,
                        'capacity_keamanan_bisnis_pekerjaan' => $request->capacity_keamanan_bisnis_pekerjaan,
                        'capacity_potensi_pertumbuhan_hasil' => $request->capacity_potensi_pertumbuhan_hasil,
                        'capacity_pengalaman_kerja' => $request->capacity_pengalaman_kerja,
                        'capacity_pendidikan' => $request->capacity_pendidikan,
                        'capacity_usia' => $request->capacity_usia,
                        'capacity_sumber_pendapatan' => $request->capacity_sumber_pendapatan,
                        'capacity_pendapatan_gaji_bersih' => $request->capacity_pendapatan_gaji_bersih,
                        'capacity_jml_tanggungan_keluarga' => $request->capacity_jml_tanggungan_keluarga,
                    ]);

                PprCondition::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'condition_pekerjaan' => $request->condition_pekerjaan,
                        'condition_pengalaman_riwayat_pembiayaan' => $request->condition_pengalaman_riwayat_pembiayaan,
                        'condition_keamanan_bisnis_pekerjaan' => $request->condition_keamanan_bisnis_pekerjaan,
                        'condition_potensi_pertumbuhan_hasil' => $request->condition_potensi_pertumbuhan_hasil,
                        'condition_pengalaman_kerja' => $request->condition_pengalaman_kerja,
                        'condition_pendidikan' => $request->condition_pendidikan,
                        'condition_usia' => $request->condition_usia,
                        'condition_sumber_pendapatan' => $request->condition_sumber_pendapatan,
                        'condition_pendapatan_gaji_bersih' => $request->condition_pendapatan_gaji_bersih,
                        'condition_jml_tanggungan_keluarga' => $request->condition_jml_tanggungan_keluarga,
                    ]);

                PprCollateral::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'collateral_marketabilitas' => $request->collateral_marketabilitas,
                        'collateral_kontribusi_pemohon_ftv' => $request->collateral_kontribusi_pemohon_ftv,
                        'collateral_pertumbuhan_agunan' => $request->collateral_pertumbuhan_agunan,
                        'collateral_daya_tarik_agunan' => $request->collateral_daya_tarik_agunan,
                        'collateral_jangka_waktu_likuidasi' => $request->collateral_jangka_waktu_likuidasi,
                    ]);

                //Scoring Ability To Repay (Fixed Income)
                $atr_fixed_pekerjaan = ($request['capital_pekerjaan'] + $request['capacity_pekerjaan'] + $request['condition_pekerjaan']) / 3;
                $atr_fixed_pengalaman_riwayat_pembiayaan = ($request['capital_pengalaman_riwayat_pembiayaan'] + $request['capacity_pengalaman_riwayat_pembiayaan'] + $request['condition_pengalaman_riwayat_pembiayaan']) / 3;
                $atr_fixed_keamanan_bisnis_pekerjaan = ($request['capital_keamanan_bisnis_pekerjaan'] + $request['capacity_keamanan_bisnis_pekerjaan'] + $request['condition_keamanan_bisnis_pekerjaan']) / 3;
                $atr_fixed_potensi_pertumbuhan_hasil = ($request['capital_potensi_pertumbuhan_hasil'] + $request['capacity_potensi_pertumbuhan_hasil'] + $request['condition_potensi_pertumbuhan_hasil']) / 3;
                $atr_fixed_sumber_pendapatan = ($request['capital_sumber_pendapatan'] + $request['capacity_sumber_pendapatan'] + $request['condition_sumber_pendapatan']) / 3;
                $atr_fixed_pendapatan_gaji_bersih = ($request['capital_pendapatan_gaji_bersih'] + $request['capacity_pendapatan_gaji_bersih'] + $request['condition_pendapatan_gaji_bersih']) / 3;
                $atr_fixed_jml_tanggungan_keluarga = ($request['capital_jml_tanggungan_keluarga'] + $request['capacity_jml_tanggungan_keluarga'] + $request['condition_jml_tanggungan_keluarga']) / 3;
                $atr_fixed_pengalaman_kerja = ($request['capacity_pengalaman_kerja'] + $request['condition_pengalaman_kerja']) / 2;
                $atr_fixed_pendidikan = ($request['capacity_pendidikan'] + $request['condition_pendidikan']) / 2;
                $atr_fixed_usia = ($request['capacity_usia'] + $request['condition_usia']) / 2;
                $atr_fixed_total_bobot_bersih = $atr_fixed_pekerjaan + $atr_fixed_pengalaman_riwayat_pembiayaan
                    + $atr_fixed_keamanan_bisnis_pekerjaan + $atr_fixed_potensi_pertumbuhan_hasil
                    + $atr_fixed_sumber_pendapatan + $atr_fixed_pendapatan_gaji_bersih
                    + $atr_fixed_jml_tanggungan_keluarga + $atr_fixed_pengalaman_kerja
                    + $atr_fixed_pendidikan + $atr_fixed_usia;
                PprScoringAtrFixedIncome::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'atr_fixed_pekerjaan' => $atr_fixed_pekerjaan,
                        'atr_fixed_pengalaman_riwayat_pembiayaan' => $atr_fixed_pengalaman_riwayat_pembiayaan,
                        'atr_fixed_keamanan_bisnis_pekerjaan' => $atr_fixed_keamanan_bisnis_pekerjaan,
                        'atr_fixed_potensi_pertumbuhan_hasil' => $atr_fixed_potensi_pertumbuhan_hasil,
                        'atr_fixed_sumber_pendapatan' => $atr_fixed_sumber_pendapatan,
                        'atr_fixed_pendapatan_gaji_bersih' => $atr_fixed_pendapatan_gaji_bersih,
                        'atr_fixed_jml_tanggungan_keluarga' => $atr_fixed_jml_tanggungan_keluarga,
                        'atr_fixed_pengalaman_kerja' => $atr_fixed_pengalaman_kerja,
                        'atr_fixed_pendidikan' => $atr_fixed_pendidikan,
                        'atr_fixed_usia' => $atr_fixed_usia,
                        'atr_fixed_total_bobot_bersih' => $atr_fixed_total_bobot_bersih,
                        'atr_fixed_score' => ($atr_fixed_total_bobot_bersih * 50) / 100,
                    ]);

                //Scoring Willingness To Repay (Fixed Income)
                $wtr_fixed_total_bobot_bersih = $request->character_tempat_bekerja + $request->character_konsistensi
                    + $request->character_kelengkapan_validitas_data + $request->character_pembayaran_angsuran_kolektif
                    + $request->character_pengalaman_pembiayaan + $request->character_motivasi
                    + $request->character_referensi;
                PprScoringWtrFixedIncome::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'wtr_fixed_tempat_bekerja' => $request->character_tempat_bekerja,
                        'wtr_fixed_konsistensi' => $request->character_konsistensi,
                        'wtr_fixed_kelengkapan_validitas_data' => $request->character_kelengkapan_validitas_data,
                        'wtr_fixed_pembayaran_angsuran_kolektif' => $request->character_pembayaran_angsuran_kolektif,
                        'wtr_fixed_pengalaman_pembiayaan' => $request->character_pengalaman_pembiayaan,
                        'wtr_fixed_motivasi' => $request->character_motivasi,
                        'wtr_fixed_referensi' => $request->character_referensi,
                        'wtr_fixed_total_bobot_bersih' => $wtr_fixed_total_bobot_bersih,

                        'wtr_fixed_score' => ($wtr_fixed_total_bobot_bersih * 25) / 100,
                    ]);

                //Scoring Collateral Coverage (Fixed Income)
                $cc_fixed_total_bobot_bersih = $request->collateral_marketabilitas + $request->collateral_kontribusi_pemohon_ftv
                    + $request->collateral_pertumbuhan_agunan + $request->collateral_daya_tarik_agunan + $request->collateral_jangka_waktu_likuidasi;
                PprScoringCollateralFixedIncome::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'cc_marketabilitas' => $request->collateral_marketabilitas,
                        'cc_kontribusi_pemohon_ftv' => $request->collateral_kontribusi_pemohon_ftv,
                        'cc_pertumbuhan_agunan' => $request->collateral_pertumbuhan_agunan,
                        'cc_daya_tarik_agunan' => $request->collateral_daya_tarik_agunan,
                        'cc_jangka_waktu_likuidasi' => $request->collateral_jangka_waktu_likuidasi,
                        'cc_fixed_total_bobot_bersih' => $cc_fixed_total_bobot_bersih,

                        'cc_fixed_score' => ($cc_fixed_total_bobot_bersih * 25) / 100,
                    ]);

                //Total Scoring Fixed Income
                $atr_fixed_score = PprScoringAtrFixedIncome::select()->where('ppr_scoring_id', $id)->get()->first();
                $wtr_fixed_score = PprScoringWtrFixedIncome::select()->where('ppr_scoring_id', $id)->get()->first();
                $cc_fixed_score = PprScoringCollateralFixedIncome::select()->where('ppr_scoring_id', $id)->get()->first();
                $ppr_total_score = $atr_fixed_score->atr_fixed_score + $wtr_fixed_score->wtr_fixed_score + $cc_fixed_score->cc_fixed_score;
                PprScoring::where('id', $id)
                    ->update([
                        'ppr_total_score' => $ppr_total_score,
                    ]);
            } elseif ($pembiayaan->jenis_nasabah == 'Non Fixed Income') {
                PprCharacterNonFixed::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'character_nf_tingkat_kepercayaan' => $request->character_nf_tingkat_kepercayaan,
                        'character_nf_pengelolaan_rekening' => $request->character_nf_pengelolaan_rekening,
                        'character_nf_reputasi_bisnis' => $request->character_nf_reputasi_bisnis,
                        'character_nf_perilaku_pribadi' => $request->character_nf_perilaku_pribadi,
                    ]);

                PprCapacityNonFixed::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'capacity_nf_situasi_persaingan' => $request->capacity_nf_situasi_persaingan,
                        'capacity_nf_kaderisasi' => $request->capacity_nf_kaderisasi,
                        'capacity_nf_kualifikasi_komersial' => $request->capacity_nf_kualifikasi_komersial,
                        'capacity_nf_kualifikasi_teknis' => $request->capacity_nf_kualifikasi_teknis,
                    ]);

                PprConditionNonFixed::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'condition_nf_kualitas_produk_jasa' => $request->condition_nf_kualitas_produk_jasa,
                        'condition_nf_sistem_pembayaran' => $request->condition_nf_sistem_pembayaran,
                        'condition_nf_lokasi_usaha' => $request->condition_nf_lokasi_usaha,
                    ]);

                PprCollateralNonFixed::where('form_ppr_pembiayaan_id', $id)
                    ->update([
                        'collateral_nf_marketabilitas' => $request->collateral_nf_marketabilitas,
                        'collateral_nf_kontribusi_pemohon_ftv' => $request->collateral_nf_kontribusi_pemohon,
                        'collateral_nf_pertumbuhan_agunan' => $request->collateral_nf_pertumbuhan_agunan,
                        'collateral_nf_daya_tarik_agunan' => $request->collateral_nf_daya_tarik_agunan,
                        'collateral_nf_jangka_waktu_likuidasi' => $request->collateral_nf_jangka_waktu_likuidasi,
                    ]);

                //Scoring Ability To Repay (Non Fixed Income)
                $atr_non_fixed_total_bobot_bersih = $request->capacity_nf_situasi_persaingan +
                    $request->capacity_nf_kaderisasi + $request->capacity_nf_kualifikasi_komersial +
                    $request->capacity_nf_kualifikasi_teknis + $request->condition_nf_kualitas_produk_jasa +
                    $request->condition_nf_sistem_pembayaran + $request->condition_nf_lokasi_usaha;
                PprScoringAtrNonFixedIncome::where('ppr_scoring_id', $id)
                    ->update([
                        'atr_non_fixed_situasi_persaingan' => $request->capacity_nf_situasi_persaingan,
                        'atr_non_fixed_kaderisasi' => $request->capacity_nf_kaderisasi,
                        'atr_non_fixed_kualifikasi_komersial' => $request->capacity_nf_kualifikasi_komersial,
                        'atr_non_fixed_kualifikasi_teknis' => $request->capacity_nf_kualifikasi_teknis,
                        'atr_non_fixed_kualitas_produk_jasa' => $request->condition_nf_kualitas_produk_jasa,
                        'atr_non_fixed_sistem_pembayaran' => $request->condition_nf_sistem_pembayaran,
                        'atr_non_fixed_lokasi_usaha' => $request->condition_nf_lokasi_usaha,
                        'atr_non_fixed_total_bobot_bersih' => $atr_non_fixed_total_bobot_bersih,
                        'atr_non_fixed_score' => ($atr_non_fixed_total_bobot_bersih * 50) / 100,
                    ]);

                //Scoring Willingness To Repay (Non Fixed Income)
                $wtr_non_fixed_total_bobot_bersih = $request->character_nf_tingkat_kepercayaan + $request->character_nf_pengelolaan_rekening
                    + $request->character_nf_reputasi_bisnis + $request->character_nf_perilaku_pribadi;
                PprScoringWtrNonFixedIncome::where('ppr_scoring_id', $id)
                    ->update([
                        'wtr_non_fixed_tingkat_kepercayaan' => $request->character_nf_tingkat_kepercayaan,
                        'wtr_non_fixed_pengelolaan_rekening' => $request->character_nf_pengelolaan_rekening,
                        'wtr_non_fixed_reputasi_bisnis' => $request->character_nf_reputasi_bisnis,
                        'wtr_non_fixed_perilaku_pribadi' => $request->character_nf_perilaku_pribadi,
                        'wtr_non_fixed_total_bobot_bersih' => $wtr_non_fixed_total_bobot_bersih,
                        'wtr_non_fixed_score' => ($wtr_non_fixed_total_bobot_bersih * 25) / 100,
                    ]);

                //Scoring Collateral Coverage (Non Fixed Income)
                $cc_non_fixed_total_bobot_bersih = $request->collateral_nf_marketabilitas + $request->collateral_nf_kontribusi_pemohon_ftv
                    + $request->collateral_nf_pertumbuhan_agunan + $request->collateral_nf_daya_tarik_agunan + $request->collateral_nf_jangka_waktu_likuidasi;
                PprScoringCollateralNonFixedIncome::where('ppr_scoring_id', $id)
                    ->update([
                        'cc_non_fixed_marketabilitas' => $request->collateral_nf_marketabilitas,
                        'cc_non_fixed_kontribusi_pemohon_ftv' => $request->collateral_nf_kontribusi_pemohon_ftv,
                        'cc_non_fixed_pertumbuhan_agunan' => $request->collateral_nf_pertumbuhan_agunan,
                        'cc_non_fixed_daya_tarik_agunan' => $request->collateral_nf_daya_tarik_agunan,
                        'cc_non_fixed_jangka_waktu_likuidasi' => $request->collateral_nf_jangka_waktu_likuidasi,
                        'cc_non_fixed_total_bobot_bersih' => $cc_non_fixed_total_bobot_bersih,
                        'cc_non_fixed_score' => ($cc_non_fixed_total_bobot_bersih * 25) / 100,
                    ]);

                //Total Scoring Non Fixed Income
                $atr_non_fixed_score = PprScoringAtrNonFixedIncome::select()->where('ppr_scoring_id', $id)->get()->first();
                $wtr_non_fixed_score = PprScoringWtrNonFixedIncome::select()->where('ppr_scoring_id', $id)->get()->first();
                $cc_non_fixed_score = PprScoringCollateralNonFixedIncome::select()->where('ppr_scoring_id', $id)->get()->first();
                $ppr_total_score = $atr_non_fixed_score->atr_non_fixed_score + $wtr_non_fixed_score->wtr_non_fixed_score + $cc_non_fixed_score->cc_non_fixed_score;
                PprScoring::where('id', $id)
                    ->update([
                        'ppr_total_score' => $ppr_total_score,
                    ]);
            } else {
            }
        } else {
        }



        $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();
        PprPembiayaanHistory::create([
            'form_ppr_pembiayaan_id' => $id,
            'status_id' => 2,
            'jabatan_id' => $role->jabatan_id,
            'divisi_id' => $role->divisi_id,
            'user_id' => Auth::user()->id,
        ]);


        return redirect('/ppr/proposal/');
        // return redirect('/ppr/komite/' . $id)->with('success', 'Proposal telah diajukan ke Komite');
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
