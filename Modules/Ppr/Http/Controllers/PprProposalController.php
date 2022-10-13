<?php

namespace Modules\Ppr\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
use Modules\Form\Entities\FormPprFoto;
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
use Modules\Ppr\Entities\PprScoringWtrFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrNonFixedIncome;
use Modules\Ppr\Entities\PprScoring;
use Modules\Ppr\Entities\PprLampiran;

class PprProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('ppr::proposal.index', [
            'title' => 'Proposal PPR',
            'proposals' => FormPprPembiayaan::select()
                //Mengambil sesuai AO
                ->where('user_id', Auth::user()->id)
                //Query agar pengambilan sesuai AO berfungsi
                ->where(function ($query) {
                    $query
                        ->whereNull('dilengkapi_ao')
                        ->orWhereNull('form_cl')
                        ->orWhereNull('form_score');
                })
                ->get(),
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

            'clPersyaratan' => PprClPersyaratan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'dokFixedIncome' => PprClDokumenFixedIncome::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'dokNonFixedIncome' => PprClDokumenNonFixedIncome::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'dokAgunan' => PprClDokumenAgunan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'AtrFixedIncome' => PprAbilityToRepayFixedIncome::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'AtrNonFixedIncome' => PprAbilityToRepayNonFixedIncome::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'pemberkasanMemo' => PprPemberkasanMemo::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'nasabah' => FormPprDataPribadi::select()->where('id', $id)->get()->first(),
            'fotoPemohon' => FormPprFoto::select()->where('form_ppr_pembiayaan_id', $id)->where('kategori', 'Foto Pemohon')->get()->first(),
            'fotoPasanganPemohon' => FormPprFoto::select()->where('form_ppr_pembiayaan_id', $id)->where('kategori', 'Foto Pasangan Pemohon')->get()->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'pekerjaans' => FormPprDataPekerjaan::all(),
            'agunans' => FormPprDataAgunan::all(),

            'kekayaan_simpanans' => FormPprDataKekayaanSimpanan::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_kekayaan_simpanan' => FormPprDataKekayaanSimpanan::select('deleted_at')->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'kekayaan_tanah_bangunans' => FormPprDataKekayaanTanahBangunan::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_kekayaan_tanah_bangunan' => FormPprDataKekayaanTanahBangunan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'kekayaan_kendaraans' => FormPprDataKekayaanKendaraan::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_kekayaan_kendaraan' => FormPprDataKekayaanKendaraan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'kekayaan_sahams' => FormPprDataKekayaanSaham::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_kekayaan_saham' => FormPprDataKekayaanSaham::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'kekayaan_lainnyas' => FormPprDataKekayaanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_kekayaan_lainnya' => FormPprDataKekayaanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'pinjamans' => FormPprDataPinjaman::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_pinjaman' => FormPprDataPinjaman::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'pinjaman_kartu_kredits' => FormPprDataPinjamanKartuKredit::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_pinjaman_kartu_kredit' => FormPprDataPinjamanKartuKredit::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

            'pinjaman_lainnyas' => FormPprDataPinjamanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            'if_pinjaman_lainnya' => FormPprDataPinjamanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),

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
        $pembiayaan = FormPprPembiayaan::select()->where('id', $id)->get()->first();

        FormPprPembiayaan::where('id', $id)
            ->update([
                'dilengkapi_ao' => $request->dilengkapi_ao,
                'form_cl' => $request->form_cl,
                'form_score' => $request->form_score,
            ]);

        if ($pembiayaan->dilengkapi_ao != 'Telah dilengkapi') {
            FormPprPembiayaan::where('id', $id)
                ->update([
                    'form_permohonan_jenis_akad_pembayaran' => $request->form_permohonan_jenis_akad_pembayaran,
                    'form_permohonan_jenis_akad_pembayaran_lain' => $request->form_permohonan_jenis_akad_pembayaran_lain,
                    'form_permohonan_nilai_ppr_dimohon' => str_replace(",", "", $request->form_permohonan_nilai_ppr_dimohon),
                    'form_permohonan_uang_muka_dana_sendiri' => str_replace(",", "", $request->form_permohonan_uang_muka_dana_sendiri),
                    'form_permohonan_nilai_hpp' => str_replace(",", "", $request->form_permohonan_nilai_hpp),
                    'form_permohonan_harga_jual' => str_replace(",", "", $request->form_permohonan_harga_jual),
                    'form_permohonan_jangka_waktu_ppr' => $request->form_permohonan_jangka_waktu_ppr,
                    'form_permohonan_peruntukan_ppr' => $request->form_permohonan_peruntukan_ppr,
                    'form_permohonan_jml_margin' => str_replace(",", "", $request->form_permohonan_jml_margin),
                    'form_permohonan_jml_sewa' => str_replace(",", "", $request->form_permohonan_jml_sewa),
                    'form_permohonan_jml_bagi_hasil' => str_replace(",", "", $request->form_permohonan_jml_bagi_hasil),
                    'form_permohonan_jml_bulan' => $request->form_permohonan_jml_bulan,
                    'form_permohonan_sistem_pembayaran_angsuran' => $request->form_permohonan_sistem_pembayaran_angsuran,
                    'form_penghasilan_pengeluaran_penghasilan_utama_pemohon' => str_replace(",", "", $request->form_penghasilan_pengeluaran_penghasilan_utama_pemohon),
                    'form_penghasilan_pengeluaran_penghasilan_lain_pemohon' => str_replace(",", "", $request->form_penghasilan_pengeluaran_penghasilan_lain_pemohon),
                    'form_penghasilan_pengeluaran_penghasilan_utama_istri_suami' => str_replace(",", "", $request->form_penghasilan_pengeluaran_penghasilan_utama_istri_suami),
                    'form_penghasilan_pengeluaran_penghasilan_lain_istri_suami' => str_replace(",", "", $request->form_penghasilan_pengeluaran_penghasilan_lain_istri_suami),
                    'form_penghasilan_pengeluaran_total_penghasilan' => str_replace(",", "", $request->form_penghasilan_pengeluaran_total_penghasilan),
                    'form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga' => str_replace(",", "", $request->form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga),
                    'form_penghasilan_pengeluaran_kewajiban_angsuran' => str_replace(",", "", $request->form_penghasilan_pengeluaran_kewajiban_angsuran),
                    'form_penghasilan_pengeluaran_total_pengeluaran' => str_replace(",", "", $request->form_penghasilan_pengeluaran_total_pengeluaran),
                    'form_penghasilan_pengeluaran_sisa_penghasilan' => str_replace(",", "", $request->form_penghasilan_pengeluaran_sisa_penghasilan),
                    'form_penghasilan_pengeluaran_kemampuan_mengangsur' => str_replace(",", "", $request->form_penghasilan_pengeluaran_kemampuan_mengangsur),
                ]);

            if (request('perbarui_foto_pemohon') == 'Ya') {
                if ($pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan == 'Menikah') {
                    foreach ($request->foto as $key => $value) {
                        if ($value['foto']) {
                            Storage::delete($value['foto_lama']);
                            $foto = $value['foto']->store('foto-ppr-pembiayaan');

                            FormPprFoto::where('form_ppr_pembiayaan_id', $id)->where('id', $value['id'])->update([
                                'form_ppr_pembiayaan_id' => $id,
                                'kategori' => $value['kategori'],
                                'foto' => $foto,
                            ]);
                        } else {
                        }
                    }
                } elseif (request('form_pribadi_pemohon_status_pernikahan') == 'Menikah') {
                    foreach ($request->foto as $key => $value) {
                        if ($value['foto']) {
                            $foto = $value['foto']->store('foto-ppr-pembiayaan');
                        } else {
                        }

                        FormPprFoto::create([
                            'form_ppr_pembiayaan_id' => $id,
                            'kategori' => $value['kategori'],
                            'foto' => $foto,
                        ]);
                    }
                } else {
                }
            } else {
                //Kondisi tidak update foto pemohon yang statusnya selain menikah,
                //kemudian statusnya diubah menjadi menikah (untuk upload foto pasangan)
                if (request('form_pribadi_pemohon_status_pernikahan') == 'Menikah' && $pembiayaan->pemohon->form_pribadi_pemohon_status_pernikahan != 'Menikah') {
                    foreach ($request->foto as $key => $value) {
                        if ($value['foto']) {
                            $foto = $value['foto']->store('foto-ppr-pembiayaan');
                        }

                        FormPprFoto::create([
                            'form_ppr_pembiayaan_id' => $id,
                            'kategori' => $value['kategori'],
                            'foto' => $foto,
                        ]);
                    }
                } else {
                }
            }

            FormPprDataPribadi::where('id', $id)
                ->update([
                    'form_pribadi_pemohon_nama_lengkap' => $request->form_pribadi_pemohon_nama_lengkap,
                    'form_pribadi_pemohon_nama_ktp' => $request->form_pribadi_pemohon_nama_ktp,
                    'form_pribadi_pemohon_gelar' => $request->form_pribadi_pemohon_gelar,
                    'form_pribadi_pemohon_nama_alias' => $request->form_pribadi_pemohon_nama_alias,
                    'form_pribadi_pemohon_no_ktp' => $request->form_pribadi_pemohon_no_ktp,
                    'form_pribadi_pemohon_jenis_kelamin' => $request->form_pribadi_pemohon_jenis_kelamin,
                    'form_pribadi_pemohon_tempat_lahir' => $request->form_pribadi_pemohon_tempat_lahir,
                    'form_pribadi_pemohon_tanggal_lahir' => $request->form_pribadi_pemohon_tanggal_lahir,
                    'form_pribadi_pemohon_npwp' => $request->form_pribadi_pemohon_npwp,
                    'form_pribadi_pemohon_pendidikan' => $request->form_pribadi_pemohon_pendidikan,
                    'form_pribadi_pemohon_agama' => $request->form_pribadi_pemohon_agama,
                    'form_pribadi_pemohon_agama_lain' => $request->form_pribadi_pemohon_agama_lain,
                    'form_pribadi_pemohon_status_pernikahan' => $request->form_pribadi_pemohon_status_pernikahan,
                    'form_pribadi_pemohon_jml_anak' => $request->form_pribadi_pemohon_jml_anak,
                    'form_pribadi_pemohon_jml_tanggungan' => $request->form_pribadi_pemohon_jml_tanggungan,
                    'form_pribadi_pemohon_nama_gadis_ibu_kandung' => $request->form_pribadi_pemohon_nama_gadis_ibu_kandung,
                    'form_pribadi_pemohon_alamat_ktp' => $request->form_pribadi_pemohon_alamat_ktp,
                    'form_pribadi_pemohon_alamat_ktp_rt' => $request->form_pribadi_pemohon_alamat_ktp_rt,
                    'form_pribadi_pemohon_alamat_ktp_rw' => $request->form_pribadi_pemohon_alamat_ktp_rw,
                    'form_pribadi_pemohon_alamat_ktp_kelurahan' => $request->form_pribadi_pemohon_alamat_ktp_kelurahan,
                    'form_pribadi_pemohon_alamat_ktp_kecamatan' => $request->form_pribadi_pemohon_alamat_ktp_kecamatan,
                    'form_pribadi_pemohon_alamat_ktp_dati2' => $request->form_pribadi_pemohon_alamat_ktp_dati2,
                    'form_pribadi_pemohon_alamat_ktp_provinsi' => $request->form_pribadi_pemohon_alamat_ktp_provinsi,
                    'form_pribadi_pemohon_alamat_ktp_kode_pos' => $request->form_pribadi_pemohon_alamat_ktp_kode_pos,
                    'form_pribadi_pemohon_alamat_domisili' => $request->form_pribadi_pemohon_alamat_domisili,
                    'form_pribadi_pemohon_alamat_domisili_rt' => $request->form_pribadi_pemohon_alamat_domisili_rt,
                    'form_pribadi_pemohon_alamat_domisili_rw' => $request->form_pribadi_pemohon_alamat_domisili_rw,
                    'form_pribadi_pemohon_alamat_domisili_kelurahan' => $request->form_pribadi_pemohon_alamat_domisili_kelurahan,
                    'form_pribadi_pemohon_alamat_domisili_kecamatan' => $request->form_pribadi_pemohon_alamat_domisili_kecamatan,
                    'form_pribadi_pemohon_alamat_domisili_dati2' => $request->form_pribadi_pemohon_alamat_domisili_dati2,
                    'form_pribadi_pemohon_alamat_domisili_provinsi' => $request->form_pribadi_pemohon_alamat_domisili_provinsi,
                    'form_pribadi_pemohon_alamat_domisili_kode_pos' => $request->form_pribadi_pemohon_alamat_domisili_kode_pos,
                    'form_pribadi_pemohon_no_telp' => $request->form_pribadi_pemohon_no_telp,
                    'form_pribadi_pemohon_no_handphone' => $request->form_pribadi_pemohon_no_handphone,
                    'form_pribadi_pemohon_status_tempat_tinggal' => $request->form_pribadi_pemohon_status_tempat_tinggal,
                    'form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun' => $request->form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun,
                    'form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan' => $request->form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan,
                    'form_pribadi_pemohon_status_tempat_tinggal_dijaminkan' => $request->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan,
                    'form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada' => $request->form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada,
                    'form_pribadi_pemohon_alamat_korespondensi' => $request->form_pribadi_pemohon_alamat_korespondensi,

                    'form_pribadi_istri_suami_nama_lengkap' => $request->form_pribadi_istri_suami_nama_lengkap,
                    'form_pribadi_istri_suami_gelar' => $request->form_pribadi_istri_suami_gelar,
                    'form_pribadi_istri_suami_no_ktp' => $request->form_pribadi_istri_suami_no_ktp,
                    'form_pribadi_istri_suami_tempat_lahir' => $request->form_pribadi_istri_suami_tempat_lahir,
                    'form_pribadi_istri_suami_tanggal_lahir' => $request->form_pribadi_istri_suami_tanggal_lahir,
                    'form_pribadi_istri_suami_npwp' => $request->form_pribadi_istri_suami_npwp,
                    'form_pribadi_istri_suami_pendidikan' => $request->form_pribadi_istri_suami_pendidikan,

                    'form_pribadi_keluarga_terdekat_nama_lengkap' => $request->form_pribadi_keluarga_terdekat_nama_lengkap,
                    'form_pribadi_keluarga_terdekat_hubungan' => $request->form_pribadi_keluarga_terdekat_hubungan,
                    'form_pribadi_keluarga_terdekat_hubungan_lain' => $request->form_pribadi_keluarga_terdekat_hubungan_lain,
                    'form_pribadi_keluarga_terdekat_alamat' => $request->form_pribadi_keluarga_terdekat_alamat,
                    'form_pribadi_keluarga_terdekat_alamat_rt' => $request->form_pribadi_keluarga_terdekat_alamat_rt,
                    'form_pribadi_keluarga_terdekat_alamat_rw' => $request->form_pribadi_keluarga_terdekat_alamat_rw,
                    'form_pribadi_keluarga_terdekat_alamat_kelurahan' => $request->form_pribadi_keluarga_terdekat_alamat_kelurahan,
                    'form_pribadi_keluarga_terdekat_alamat_kecamatan' => $request->form_pribadi_keluarga_terdekat_alamat_kecamatan,
                    'form_pribadi_keluarga_terdekat_alamat_dati2' => $request->form_pribadi_keluarga_terdekat_alamat_dati2,
                    'form_pribadi_keluarga_terdekat_alamat_provinsi' => $request->form_pribadi_keluarga_terdekat_alamat_provinsi,
                    'form_pribadi_keluarga_terdekat_alamat_kode_pos' => $request->form_pribadi_keluarga_terdekat_alamat_kode_pos,
                    'form_pribadi_keluarga_terdekat_no_telp' => $request->form_pribadi_keluarga_terdekat_no_telp,
                ]);




            FormPprDataPekerjaan::where('form_ppr_data_pribadi_id', $id)
                ->update([
                    'form_pekerjaan_pemohon_nama' => $request->form_pekerjaan_pemohon_nama,
                    'form_pekerjaan_pemohon_badan_hukum' => $request->form_pekerjaan_pemohon_badan_hukum,
                    'form_pekerjaan_pemohon_alamat' => $request->form_pekerjaan_pemohon_alamat,
                    'form_pekerjaan_pemohon_alamat_kode_pos' => $request->form_pekerjaan_pemohon_alamat_kode_pos,
                    'form_pekerjaan_pemohon_no_telp' => $request->form_pekerjaan_pemohon_no_telp,
                    'form_pekerjaan_pemohon_no_telp_extension' => $request->form_pekerjaan_pemohon_no_telp_extension,
                    'form_pekerjaan_pemohon_facsimile' => $request->form_pekerjaan_pemohon_facsimile,
                    'form_pekerjaan_pemohon_npwp' => $request->form_pekerjaan_pemohon_npwp,
                    'form_pekerjaan_pemohon_bidang_usaha' => $request->form_pekerjaan_pemohon_bidang_usaha,
                    'form_pekerjaan_pemohon_bidang_usaha_lain' => $request->form_pekerjaan_pemohon_bidang_usaha_lain,
                    'form_pekerjaan_pemohon_jenis_pekerjaan' => $request->form_pekerjaan_pemohon_jenis_pekerjaan,
                    'form_pekerjaan_pemohon_jenis_pekerjaan_lain' => $request->form_pekerjaan_pemohon_jenis_pekerjaan_lain,
                    'form_pekerjaan_pemohon_jml_karyawan' => $request->form_pekerjaan_pemohon_jml_karyawan,
                    'form_pekerjaan_pemohon_departemen' => $request->form_pekerjaan_pemohon_departemen,
                    'form_pekerjaan_pemohon_pangkat_gol_jabatan' => $request->form_pekerjaan_pemohon_pangkat_gol_jabatan,
                    'form_pekerjaan_pemohon_nip_nrp' => $request->form_pekerjaan_pemohon_nip_nrp,
                    'form_pekerjaan_pemohon_mulai_bekerja' => $request->form_pekerjaan_pemohon_mulai_bekerja,
                    'form_pekerjaan_pemohon_usia_pensiun' => $request->form_pekerjaan_pemohon_usia_pensiun,
                    'form_pekerjaan_pemohon_masa_kerja' => $request->form_pekerjaan_pemohon_masa_kerja,
                    'form_pekerjaan_pemohon_nama_atasan_langsung' => $request->form_pekerjaan_pemohon_nama_atasan_langsung,
                    'form_pekerjaan_pemohon_no_telp_atasan_langsung' => $request->form_pekerjaan_pemohon_no_telp_atasan_langsung,
                    'form_pekerjaan_pemohon_no_telp_atasan_langsung_extension' => $request->form_pekerjaan_pemohon_no_telp_atasan_langsung_extension,
                    'form_pekerjaan_pemohon_grup_afiliasi' => $request->form_pekerjaan_pemohon_grup_afiliasi,
                    'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan' => $request->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan,
                    'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan' => $request->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan,
                    'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun' => $request->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun,
                    'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan' => $request->form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan,

                    'form_pekerjaan_istri_suami_nama' => $request->form_pekerjaan_istri_suami_nama,
                    'form_pekerjaan_istri_suami_badan_hukum' => $request->form_pekerjaan_istri_suami_badan_hukum,
                    'form_pekerjaan_istri_suami_alamat' => $request->form_pekerjaan_istri_suami_alamat,
                    'form_pekerjaan_istri_suami_alamat_kode_pos' => $request->form_pekerjaan_istri_suami_alamat_kode_pos,
                    'form_pekerjaan_istri_suami_no_telp' => $request->form_pekerjaan_istri_suami_no_telp,
                    'form_pekerjaan_istri_suami_no_telp_extension' => $request->form_pekerjaan_istri_suami_no_telp_extension,
                    'form_pekerjaan_istri_suami_facsimile' => $request->form_pekerjaan_istri_suami_facsimile,
                    'form_pekerjaan_istri_suami_npwp' => $request->form_pekerjaan_istri_suami_npwp,
                    'form_pekerjaan_istri_suami_bidang_usaha' => $request->form_pekerjaan_istri_suami_bidang_usaha,
                    'form_pekerjaan_istri_suami_bidang_usaha_lain' => $request->form_pekerjaan_istri_suami_bidang_usaha_lain,
                    'form_pekerjaan_istri_suami_jenis_pekerjaan' => $request->form_pekerjaan_istri_suami_jenis_pekerjaan,
                    'form_pekerjaan_istri_suami_jenis_pekerjaan_lain' => $request->form_pekerjaan_istri_suami_jenis_pekerjaan_lain,
                    'form_pekerjaan_istri_suami_jml_karyawan' => $request->form_pekerjaan_istri_suami_jml_karyawan,
                    'form_pekerjaan_istri_suami_departemen' => $request->form_pekerjaan_istri_suami_departemen,
                    'form_pekerjaan_istri_suami_pangkat_gol_jabatan' => $request->form_pekerjaan_istri_suami_pangkat_gol_jabatan,
                    'form_pekerjaan_istri_suami_nip_nrp' => $request->form_pekerjaan_istri_suami_nip_nrp,
                    'form_pekerjaan_istri_suami_mulai_bekerja' => $request->form_pekerjaan_istri_suami_mulai_bekerja,
                    'form_pekerjaan_istri_suami_usia_pensiun' => $request->form_pekerjaan_istri_suami_usia_pensiun,
                    'form_pekerjaan_istri_suami_masa_kerja' => $request->form_pekerjaan_istri_suami_masa_kerja,
                    'form_pekerjaan_istri_suami_nama_atasan_langsung' => $request->form_pekerjaan_istri_suami_nama_atasan_langsung,
                    'form_pekerjaan_istri_suami_no_telp_atasan_langsung' => $request->form_pekerjaan_istri_suami_no_telp_atasan_langsung,
                    'form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension' => $request->form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension,
                    'form_pekerjaan_istri_suami_grup_afiliasi' => $request->form_pekerjaan_istri_suami_grup_afiliasi,
                    'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan' => $request->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan,
                    'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan' => $request->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan,
                    'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun' => $request->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun,
                    'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan' => $request->form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan,
                ]);

            FormPprDataAgunan::where('id', $id)
                ->update([
                    'form_agunan_1_jenis' => $request->form_agunan_1_jenis,
                    'form_agunan_1_jenis_lain' => $request->form_agunan_1_jenis_lain,
                    'form_agunan_1_nilai_harga_jual' => str_replace(",", "", $request->form_agunan_1_nilai_harga_jual),
                    'form_agunan_1_nilai_harga_taksasi_kjpp' => str_replace(",", "", $request->form_agunan_1_nilai_harga_taksasi_kjpp),
                    'form_agunan_1_alamat' => $request->form_agunan_1_alamat,
                    'form_agunan_1_alamat_rt' => $request->form_agunan_1_alamat_rt,
                    'form_agunan_1_alamat_rw' => $request->form_agunan_1_alamat_rw,
                    'form_agunan_1_alamat_kelurahan' => $request->form_agunan_1_alamat_kelurahan,
                    'form_agunan_1_alamat_kecamatan' => $request->form_agunan_1_alamat_kecamatan,
                    'form_agunan_1_alamat_dati2' => $request->form_agunan_1_alamat_dati2,
                    'form_agunan_1_alamat_provinsi' => $request->form_agunan_1_alamat_provinsi,
                    'form_agunan_1_alamat_kode_pos' => $request->form_agunan_1_alamat_kode_pos,
                    'form_agunan_1_status_bukti_kepemilikan' => $request->form_agunan_1_status_bukti_kepemilikan,
                    'form_agunan_1_status_bukti_kepemilikan_tgl_berakhir' => $request->form_agunan_1_status_bukti_kepemilikan_tgl_berakhir,
                    'form_agunan_1_status_bukti_kepemilikan_hak' => $request->form_agunan_1_status_bukti_kepemilikan_hak,
                    'form_agunan_1_no_sertifikat' => $request->form_agunan_1_no_sertifikat,
                    'form_agunan_1_no_sertifikat_tgl_penerbitan' => $request->form_agunan_1_no_sertifikat_tgl_penerbitan,
                    'form_agunan_1_no_imb' => $request->form_agunan_1_no_imb,
                    'form_agunan_1_peruntukan_bangunan' => $request->form_agunan_1_peruntukan_bangunan,
                    'form_agunan_1_luas_tanah' => $request->form_agunan_1_luas_tanah,
                    'form_agunan_1_luas_bangunan' => $request->form_agunan_1_luas_bangunan,
                    'form_agunan_1_atas_nama' => $request->form_agunan_1_atas_nama,
                    'form_agunan_1_nama_pengembang' => $request->form_agunan_1_nama_pengembang,
                    'form_agunan_1_nama_proyek_perumahan' => $request->form_agunan_1_nama_proyek_perumahan,

                    'form_agunan_2_jenis' => $request->form_agunan_2_jenis,
                    'form_agunan_2_jenis_lain' => $request->form_agunan_2_jenis_lain,
                    'form_agunan_2_nilai_harga_jual' => str_replace(",", "", $request->form_agunan_2_nilai_harga_jual),
                    'form_agunan_2_nilai_harga_taksasi_kjpp' => str_replace(",", "", $request->form_agunan_2_nilai_harga_taksasi_kjpp),
                    'form_agunan_2_alamat' => $request->form_agunan_2_alamat,
                    'form_agunan_2_alamat_rt' => $request->form_agunan_2_alamat_rt,
                    'form_agunan_2_alamat_rw' => $request->form_agunan_2_alamat_rw,
                    'form_agunan_2_alamat_kelurahan' => $request->form_agunan_2_alamat_kelurahan,
                    'form_agunan_2_alamat_kecamatan' => $request->form_agunan_2_alamat_kecamatan,
                    'form_agunan_2_alamat_dati2' => $request->form_agunan_2_alamat_dati2,
                    'form_agunan_2_alamat_provinsi' => $request->form_agunan_2_alamat_provinsi,
                    'form_agunan_2_alamat_kode_pos' => $request->form_agunan_2_alamat_kode_pos,
                    'form_agunan_2_status_bukti_kepemilikan' => $request->form_agunan_2_status_bukti_kepemilikan,
                    'form_agunan_2_status_bukti_kepemilikan_tgl_berakhir' => $request->form_agunan_2_status_bukti_kepemilikan_tgl_berakhir,
                    'form_agunan_2_status_bukti_kepemilikan_hak' => $request->form_agunan_2_status_bukti_kepemilikan_hak,
                    'form_agunan_2_no_sertifikat' => $request->form_agunan_2_no_sertifikat,
                    'form_agunan_2_no_sertifikat_tgl_penerbitan' => $request->form_agunan_2_no_sertifikat_tgl_penerbitan,
                    'form_agunan_2_no_imb' => $request->form_agunan_2_no_imb,
                    'form_agunan_2_peruntukan_bangunan' => $request->form_agunan_2_peruntukan_bangunan,
                    'form_agunan_2_luas_tanah' => $request->form_agunan_2_luas_tanah,
                    'form_agunan_2_luas_bangunan' => $request->form_agunan_2_luas_bangunan,
                    'form_agunan_2_atas_nama' => $request->form_agunan_2_atas_nama,

                    'form_agunan_3_jenis' => $request->form_agunan_3_jenis,
                    'form_agunan_3_nilai' => $request->form_agunan_3_nilai,
                    'form_agunan_3_no_rekening' => $request->form_agunan_3_no_rekening,
                    'form_agunan_3_atas_nama' => $request->form_agunan_3_atas_nama,
                ]);


            //Kekayaan simpanan
            if ($request->repeater_kekayaan_simpanan[0]['form_kekayaan_simpanan_nama_bank']) {

                // FormPprDataKekayaanSimpanan::select()->where('form_ppr_pembiayaan_id', $id)->delete();
                foreach ($request->repeater_kekayaan_simpanan as $key => $value) {
                    FormPprDataKekayaanSimpanan::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_kekayaan_simpanan_nama_bank' => $value['form_kekayaan_simpanan_nama_bank'],
                            'form_kekayaan_simpanan_jenis' => $value['form_kekayaan_simpanan_jenis'],
                            'form_kekayaan_simpanan_sejak_tahun' => $value['form_kekayaan_simpanan_sejak_tahun'],
                            'form_kekayaan_simpanan_saldo_per_tanggal' => $value['form_kekayaan_simpanan_saldo_per_tanggal'],
                            'form_kekayaan_simpanan_saldo' => str_replace(",", "", $value['form_kekayaan_simpanan_saldo']),
                        ]
                    );
                }
            } else {
            }

            //Kekayaan tanah dan bangunan
            if ($request->repeater_kekayaan_tanah_bangunan[0]['form_kekayaan_tanah_bangunan_luas_tanah']) {

                // FormPprDataKekayaanTanahBangunan::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_kekayaan_tanah_bangunan as $key => $value) {
                    FormPprDataKekayaanTanahBangunan::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_kekayaan_tanah_bangunan_luas_tanah' => $value['form_kekayaan_tanah_bangunan_luas_tanah'],
                            'form_kekayaan_tanah_bangunan_luas_bangunan' => $value['form_kekayaan_tanah_bangunan_luas_bangunan'],
                            'form_kekayaan_tanah_bangunan_jenis' => $value['form_kekayaan_tanah_bangunan_jenis'],
                            'form_kekayaan_tanah_bangunan_atas_nama' => $value['form_kekayaan_tanah_bangunan_atas_nama'],
                            'form_kekayaan_tanah_bangunan_taksasi_pasar_wajar' => str_replace(",", "", $value['form_kekayaan_tanah_bangunan_taksasi_pasar_wajar']),
                        ]
                    );
                }
            } else {
            }

            //Kekayaan kendaraan
            if ($request->repeater_kekayaan_kendaraan[0]['form_kekayaan_kendaraan_jenis_merk']) {

                // FormPprDataKekayaanKendaraan::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_kekayaan_kendaraan as $key => $value) {
                    FormPprDataKekayaanKendaraan::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_kekayaan_kendaraan_jenis_merk' => $value['form_kekayaan_kendaraan_jenis_merk'],
                            'form_kekayaan_kendaraan_tahun_dikeluarkan' => $value['form_kekayaan_kendaraan_tahun_dikeluarkan'],
                            'form_kekayaan_kendaraan_atas_nama' => $value['form_kekayaan_kendaraan_atas_nama'],
                            'form_kekayaan_kendaraan_taksasi_harga_jual' => str_replace(",", "", $value['form_kekayaan_kendaraan_taksasi_harga_jual']),
                        ]
                    );
                }
            } else {
            }

            //Kekayaan saham
            if ($request->repeater_kekayaan_saham[0]['form_kekayaan_saham_penerbit']) {

                // FormPprDataKekayaanSaham::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_kekayaan_saham as $key => $value) {
                    FormPprDataKekayaanSaham::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_kekayaan_saham_penerbit' => $value['form_kekayaan_saham_penerbit'],
                            'form_kekayaan_saham_per_tanggal' => $value['form_kekayaan_saham_per_tanggal'],
                            'form_kekayaan_saham_rp' => str_replace(",", "", $value['form_kekayaan_saham_rp']),
                        ]
                    );
                }
            } else {
            }

            //Kekayaan lainnya
            if ($request->repeater_kekayaan_lainnya[0]['form_kekayaan_lainnya']) {

                // FormPprDataKekayaanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_kekayaan_lainnya as $key => $value) {
                    FormPprDataKekayaanLainnya::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_kekayaan_lainnya' => $value['form_kekayaan_lainnya'],
                            'form_kekayaan_lainnya_rp' => str_replace(",", "", $value['form_kekayaan_lainnya_rp']),
                        ]
                    );
                }
            } else {
            }

            //Pinjaman
            if ($request->repeater_pinjaman[0]['form_pinjaman_nama_bank']) {

                // FormPprDataPinjaman::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_pinjaman as $key => $value) {
                    FormPprDataPinjaman::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_pinjaman_nama_bank' => $value['form_pinjaman_nama_bank'],
                            'form_pinjaman_jenis' => $value['form_pinjaman_jenis'],
                            'form_pinjaman_sejak_tahun' => $value['form_pinjaman_sejak_tahun'],
                            'form_pinjaman_plafond' => str_replace(",", "", $value['form_pinjaman_plafond']),
                            'form_pinjaman_outstanding' => str_replace(",", "", $value['form_pinjaman_outstanding']),
                            'form_pinjaman_jangka_waktu_bulan' => $value['form_pinjaman_jangka_waktu_bulan'],
                            'form_pinjaman_bunga_margin' => $value['form_pinjaman_bunga_margin'],
                            'form_pinjaman_angsuran_per_bulan' => str_replace(",", "", $value['form_pinjaman_angsuran_per_bulan']),
                            'form_pinjaman_agunan' => $value['form_pinjaman_agunan'],
                            'form_pinjaman_kolektibilitas' => $value['form_pinjaman_kolektibilitas'],
                        ]
                    );
                }
            } else {
            }

            //Pinjaman kartu kredit
            if ($request->repeater_pinjaman_kartu_kredit[0]['form_pinjaman_kartu_kredit_nama_bank']) {

                // FormPprDataPinjamanKartuKredit::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_pinjaman_kartu_kredit as $key => $value) {
                    FormPprDataPinjamanKartuKredit::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_pinjaman_kartu_kredit_nama_bank' => $value['form_pinjaman_kartu_kredit_nama_bank'],
                            'form_pinjaman_kartu_kredit_sejak_tahun' => $value['form_pinjaman_kartu_kredit_sejak_tahun'],
                            'form_pinjaman_kartu_kredit_plafond' => str_replace(",", "", $value['form_pinjaman_kartu_kredit_plafond']),
                            'form_pinjaman_kartu_kredit_outstanding' => str_replace(",", "", $value['form_pinjaman_kartu_kredit_outstanding']),
                            'form_pinjaman_kartu_kredit_jangka_waktu_bulan' => $value['form_pinjaman_kartu_kredit_jangka_waktu_bulan'],
                            'form_pinjaman_kartu_kredit_bunga_margin' => $value['form_pinjaman_kartu_kredit_bunga_margin'],
                            'form_pinjaman_kartu_kredit_angsuran_per_bulan' => str_replace(",", "", $value['form_pinjaman_kartu_kredit_angsuran_per_bulan']),
                            'form_pinjaman_kartu_kredit_agunan' => $value['form_pinjaman_kartu_kredit_agunan'],
                            'form_pinjaman_kartu_kredit_kolektibilitas' => $value['form_pinjaman_kartu_kredit_kolektibilitas'],
                        ]
                    );
                }
            } else {
            }

            //Pinjaman lainnya
            if ($request->repeater_pinjaman_lainnya[0]['form_pinjaman_lainnya_nama']) {

                // FormPprDataPinjamanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->delete();

                foreach ($request->repeater_pinjaman_lainnya as $key => $value) {
                    FormPprDataPinjamanLainnya::updateOrCreate(
                        [
                            'id' => $value['id'],
                        ],
                        [
                            'form_ppr_pembiayaan_id' => $id,
                            'form_pinjaman_lainnya_nama' => $value['form_pinjaman_lainnya_nama'],
                            'form_pinjaman_lainnya_sejak_tahun' => $value['form_pinjaman_lainnya_sejak_tahun'],
                            'form_pinjaman_lainnya_plafond' => str_replace(",", "", $value['form_pinjaman_lainnya_plafond']),
                            'form_pinjaman_lainnya_outstanding' => str_replace(",", "", $value['form_pinjaman_lainnya_outstanding']),
                            'form_pinjaman_lainnya_jangka_waktu_bulan' => $value['form_pinjaman_lainnya_jangka_waktu_bulan'],
                            'form_pinjaman_lainnya_bunga_margin' => $value['form_pinjaman_lainnya_bunga_margin'],
                            'form_pinjaman_lainnya_agunan' => $value['form_pinjaman_lainnya_agunan'],
                            'form_pinjaman_lainnya_kolektibilitas' => $value['form_pinjaman_lainnya_kolektibilitas'],
                        ]
                    );
                }
            } else {
            }

            //Lampiran
            PprLampiran::where('form_ppr_pembiayaan_id', $id)
                ->update([
                    'dokumen_pemohon' => $request->file('dokumen_pemohon')->store('ppr-lampiran'),
                    'dokumen_agunan' => $request->file('dokumen_agunan')->store('ppr-lampiran'),
                    'ots_agunan' => $request->file('ots_agunan')->store('ppr-lampiran'),
                    'ots_tempat_usaha' => $request->file('ots_tempat_usaha')->store('ppr-lampiran'),
                    'hasil_wawancara' => $request->file('hasil_wawancara')->store('ppr-lampiran'),
                    'appraisal_kjpp' => $request->file('appraisal_kjpp')->store('ppr-lampiran'),
                ]);
        } elseif ($pembiayaan->form_cl != 'Telah diisi' && $pembiayaan->dilengkapi_ao == 'Telah dilengkapi') {
            //Check List
            PprClPersyaratan::where('form_ppr_pembiayaan_id', $id)
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
                PprClDokumenFixedIncome::where('form_ppr_pembiayaan_id', $id)
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

                PprAbilityToRepayFixedIncome::where('form_ppr_pembiayaan_id', $id)
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
                PprClDokumenNonFixedIncome::where('form_ppr_pembiayaan_id', $id)
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

                PprAbilityToRepayNonFixedIncome::where('form_ppr_pembiayaan_id', $id)
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

            PprClDokumenAgunan::where('form_ppr_pembiayaan_id', $id)
                ->update([
                    'copy_shgb_shm' => $request->copy_shgb_shm,
                    'copy_shgb_proses' => $request->copy_shgb_proses,
                    'copy_imb' => $request->copy_imb,
                    'copy_imb_proses' => $request->copy_imb_proses,
                ]);

            PprPemberkasanMemo::where('form_ppr_pembiayaan_id', $id)
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
        } elseif ($pembiayaan->form_score != 'Telah dinilai' && $pembiayaan->dilengkapi_ao == 'Telah dilengkapi' && $pembiayaan->form_cl == 'Telah diisi') {
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

                $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();
                PprPembiayaanHistory::create([
                    'form_ppr_pembiayaan_id' => $id,
                    'status_id' => 2,
                    'jabatan_id' => $role->jabatan_id,
                    'divisi_id' => $role->divisi_id,
                    'user_id' => Auth::user()->id,
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

                $role = Role::select()->where('user_id', Auth::user()->id)->get()->first();
                PprPembiayaanHistory::create([
                    'form_ppr_pembiayaan_id' => $id,
                    'status_id' => 2,
                    'jabatan_id' => $role->jabatan_id,
                    'divisi_id' => $role->divisi_id,
                    'user_id' => Auth::user()->id,
                ]);
            } else {
            }
        } else {
        }



        return redirect('/ppr/proposal/')->with('success', 'Proposal Berhasil Diperbarui!');
        // return redirect('/ppr/komite/' . $id)->with('success', 'Proposal telah diajukan ke Komite');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if (request('delete_repeater') == 'Hapus Kekayaan Simpanan') {
            FormPprDataKekayaanSimpanan::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Kekayaan Simpanan Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Kekayaan Tanah & Bangunan') {
            FormPprDataKekayaanTanahBangunan::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Kekayaan Tanah & Bangunan Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Kekayaan Kendaraan') {
            FormPprDataKekayaanKendaraan::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Kekayaan Kendaraan Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Kekayaan Saham') {
            FormPprDataKekayaanSaham::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Kekayaan Saham Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Kekayaan Lainnya') {
            FormPprDataKekayaanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Kekayaan Lainnya Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Pinjaman') {
            FormPprDataPinjaman::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Pinjaman Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Pinjaman Kartu Kredit') {
            FormPprDataPinjamanKartuKredit::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Pinjaman Kartu Kredit Berhasil Dihapus!');
        } elseif (request('delete_repeater') == 'Hapus Pinjaman Lainnya') {
            FormPprDataPinjamanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->delete();
            return redirect('/ppr/proposal/' . $id)->with('success', 'Data Pinjaman Lainnya Berhasil Dihapus!');
        } else {
        }
        // FormPprDataKekayaanSimpanan::find($id)->delete($id);

        // return response()->json([
        //     'success' => 'Record deleted successfully!'
        // ]);
        // dd($id);
    }
}
