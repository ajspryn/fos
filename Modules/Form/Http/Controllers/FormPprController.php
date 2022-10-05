<?php

namespace Modules\Form\Http\Controllers;

use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Form\Entities\FormPprDataAgunan;
use Modules\Form\Entities\FormPprDataKekayaanKendaraan;
use Modules\Form\Entities\FormPprDataKekayaanLainnya;
use Modules\Form\Entities\FormPprDataKekayaanPinjaman;
use Modules\Form\Entities\FormPprDataKekayaanSaham;
use Modules\Form\Entities\FormPprDataKekayaanSimpanan;
use Modules\Form\Entities\FormPprDataKekayaanTanahBangunan;
use Modules\Form\Entities\FormPprDataPekerjaan;
use Modules\Form\Entities\FormPprDataPenghasilanPengeluaran;
use Modules\Form\Entities\FormPprDataPinjaman;
use Modules\Form\Entities\FormPprDataPinjamanKartuKredit;
use Modules\Form\Entities\FormPprDataPinjamanLainnya;
use Modules\Form\Entities\FormPprDataPribadi;
use Modules\Form\Entities\FormPprFoto;
use Modules\Form\Entities\FormPprPembiayaan;
use Modules\Form\Entities\FormPprPermohonan;
use Modules\Ppr\Entities\PprAbilityToRepayFixedIncome;
use Modules\Ppr\Entities\PprAbilityToRepayNonFixedIncome;
use Modules\Ppr\Entities\PprCapacity;
use Modules\Ppr\Entities\PprCapacityNonFixed;
use Modules\Ppr\Entities\PprCapital;
use Modules\Ppr\Entities\PprClDokumenAgunan;
use Modules\Ppr\Entities\PprClDokumenFixedIncome;
use Modules\Ppr\Entities\PprClDokumenNonFixedIncome;
use Modules\Ppr\Entities\PprClPersyaratan;
use Modules\Ppr\Entities\PprPemberkasanMemo;
use Modules\Ppr\Entities\PprCharacter;
use Modules\Ppr\Entities\PprCharacterNonFixed;
use Modules\Ppr\Entities\PprClDokumen;
use Modules\Ppr\Entities\PprCollateral;
use Modules\Ppr\Entities\PprCollateralNonFixed;
use Modules\Ppr\Entities\PprCondition;
use Modules\Ppr\Entities\PprConditionNonFixed;
use Modules\Ppr\Entities\PprPembiayaanHistory;
use Modules\Ppr\Entities\PprScoring;
use Modules\Ppr\Entities\PprScoringAtrFixedIncome;
use Modules\Ppr\Entities\PprScoringAtrNonFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralNonFixedIncome;
use Modules\Ppr\Entities\PprScoringFixedIncome;
use Modules\Ppr\Entities\PprScoringNonFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrNonFixedIncome;

class FormPprController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::ppr.index', [
            'title' => 'Form PPR',
            'aos' => Role::select()->where('jabatan_id', 1)->where('divisi_id', 4)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('form::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $jmlPembiayaan = FormPprPembiayaan::select()->get()->count();
        $jmlClFixed = PprClDokumenFixedIncome::select()->get()->count();
        $jmlClNonFixed = PprClDokumenNonFixedIncome::select()->get()->count();

        if ($jmlPembiayaan == 0) {
            $hitung =  FormPprPembiayaan::select()->get()->count();
            $id = $hitung + 1;

            //Id Check List
            $hitungIdClDokumenFixed = PprClDokumenFixedIncome::select()->get()->count();
            $idClDokumenFixed = $hitungIdClDokumenFixed + 1;

            $hitungIdClAtrFixed = PprAbilityToRepayFixedIncome::select()->get()->count();
            $idClAtrFixed = $hitungIdClAtrFixed + 1;

            $hitungIdClDokumenNonFixed = PprClDokumenNonFixedIncome::select()->get()->count();
            $idClDokumenNonFixed = $hitungIdClDokumenNonFixed + 1;

            $hitungIdClAtrNonFixed = PprAbilityToRepayNonFixedIncome::select()->get()->count();
            $idClAtrNonFixed = $hitungIdClAtrNonFixed + 1;

            //Id Scoring
            $hitungIdScoringAtrFixed = PprScoringAtrFixedIncome::select()->get()->count();
            $idScoringAtrFixed = $hitungIdScoringAtrFixed + 1;

            $hitungIdScoringWtrFixed = PprScoringWtrFixedIncome::select()->get()->count();
            $idScoringWtrFixed = $hitungIdScoringWtrFixed + 1;

            $hitungIdScoringCcFixed = PprScoringCollateralFixedIncome::select()->get()->count();
            $idScoringCcFixed = $hitungIdScoringCcFixed + 1;

            $hitungIdScoringAtrNonFixed = PprScoringAtrNonFixedIncome::select()->get()->count();
            $idScoringAtrNonFixed = $hitungIdScoringAtrNonFixed + 1;

            $hitungIdScoringWtrNonFixed = PprScoringWtrNonFixedIncome::select()->get()->count();
            $idScoringWtrNonFixed = $hitungIdScoringWtrNonFixed + 1;

            $hitungIdScoringCcNonFixed = PprScoringCollateralNonFixedIncome::select()->get()->count();
            $idScoringCcNonFixed = $hitungIdScoringCcNonFixed + 1;
        } else {
            $hitung = FormPprPembiayaan::select()->orderBy('id', 'DESC')->get()->first();
            $id = $hitung->id + 1;

            //Id Fixed Income
            if ($jmlClFixed == 0) {
                //Id Check List
                $hitungIdClDokumenFixed = PprClDokumenFixedIncome::select()->get()->count();
                $idClDokumenFixed = $hitungIdClDokumenFixed + 1;

                $hitungIdClAtrFixed = PprAbilityToRepayFixedIncome::select()->get()->count();
                $idClAtrFixed = $hitungIdClAtrFixed + 1;

                //Id Score
                $hitungIdScoringAtrFixed = PprScoringAtrFixedIncome::select()->get()->count();
                $idScoringAtrFixed = $hitungIdScoringAtrFixed + 1;

                $hitungIdScoringWtrFixed = PprScoringWtrFixedIncome::select()->get()->count();
                $idScoringWtrFixed = $hitungIdScoringWtrFixed + 1;

                $hitungIdScoringCcFixed = PprScoringCollateralFixedIncome::select()->get()->count();
                $idScoringCcFixed = $hitungIdScoringCcFixed + 1;
            } else {
                //Id Check List
                $hitungIdClDokumenFixed = PprClDokumenFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClDokumenFixed = $hitungIdClDokumenFixed->id + 1;

                $hitungIdClAtrFixed = PprAbilityToRepayFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClAtrFixed = $hitungIdClAtrFixed->id + 1;

                //Id Score
                $hitungIdScoringAtrFixed = PprScoringAtrFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringAtrFixed = $hitungIdScoringAtrFixed->id + 1;

                $hitungIdScoringWtrFixed = PprScoringWtrFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringWtrFixed = $hitungIdScoringWtrFixed->id + 1;

                $hitungIdScoringCcFixed = PprScoringCollateralFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringCcFixed = $hitungIdScoringCcFixed->id + 1;
            }

            //Id Non Fixed Income
            if ($jmlClNonFixed == 0) {
                //Id Check List
                $hitungIdClDokumenNonFixed = PprClDokumenNonFixedIncome::select()->get()->count();
                $idClDokumenNonFixed = $hitungIdClDokumenNonFixed + 1;

                $hitungIdClAtrNonFixed = PprAbilityToRepayNonFixedIncome::select()->get()->count();
                $idClAtrNonFixed = $hitungIdClAtrNonFixed + 1;

                //Id Score
                $hitungIdScoringAtrNonFixed = PprScoringAtrNonFixedIncome::select()->get()->count();
                $idScoringAtrNonFixed = $hitungIdScoringAtrNonFixed + 1;

                $hitungIdScoringWtrNonFixed = PprScoringWtrNonFixedIncome::select()->get()->count();
                $idScoringWtrNonFixed = $hitungIdScoringWtrNonFixed + 1;

                $hitungIdScoringCcNonFixed = PprScoringCollateralNonFixedIncome::select()->get()->count();
                $idScoringCcNonFixed = $hitungIdScoringCcNonFixed + 1;
            } else {
                //Id Check List
                $hitungIdClDokumenNonFixed = PprClDokumenNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClDokumenNonFixed = $hitungIdClDokumenNonFixed->id + 1;

                $hitungIdClAtrNonFixed = PprAbilityToRepayNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClAtrNonFixed = $hitungIdClAtrNonFixed->id + 1;

                //Id Score
                $hitungIdScoringAtrNonFixed = PprScoringAtrNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringAtrNonFixed = $hitungIdScoringAtrNonFixed->id + 1;

                $hitungIdScoringWtrNonFixed = PprScoringWtrNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringWtrNonFixed = $hitungIdScoringWtrNonFixed->id + 1;

                $hitungIdScoringCcNonFixed = PprScoringCollateralNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringCcNonFixed = $hitungIdScoringCcNonFixed->id + 1;
            }
        }

        FormPprPembiayaan::create([
            'id' => $id,
            // 'user_id' => Auth::user()->id,
            'jenis_nasabah' => request('jenis_nasabah'),
            'user_id' => $request->user_id,
            'form_ppr_data_pribadi_id' => $id,
            'form_ppr_data_pekerjaan_id' => $id,
            'form_ppr_data_agunan_id' => $id,

            'ppr_cl_dokumen_id' => $id,
            'ppr_scoring_id' => $id,

            'form_permohonan_jenis_akad_pembayaran' => request('form_permohonan_jenis_akad_pembayaran'),
            'form_permohonan_jenis_akad_pembayaran_lain' => request('form_permohonan_jenis_akad_pembayaran_lain'),
            'form_permohonan_nilai_ppr_dimohon' => str_replace(",", "", request('form_permohonan_nilai_ppr_dimohon')),
            'form_permohonan_uang_muka_dana_sendiri' => str_replace(",", "", request('form_permohonan_uang_muka_dana_sendiri')),
            'form_permohonan_nilai_hpp' => str_replace(",", "", request('form_permohonan_nilai_hpp')),
            'form_permohonan_harga_jual' => str_replace(",", "", request('form_permohonan_harga_jual')),
            'form_permohonan_jangka_waktu_ppr' => request('form_permohonan_jangka_waktu_ppr'),
            'form_permohonan_peruntukan_ppr' => request('form_permohonan_peruntukan_ppr'),
            'form_permohonan_jml_margin' => str_replace(",", "", request('form_permohonan_jml_margin')),
            'form_permohonan_jml_sewa' => str_replace(",", "", request('form_permohonan_jml_sewa')),
            'form_permohonan_jml_bagi_hasil' => str_replace(",", "", request('form_permohonan_jml_bagi_hasil')),
            'form_permohonan_jml_bulan' => request('form_permohonan_jml_bulan'),
            'form_permohonan_sistem_pembayaran_angsuran' => request('form_permohonan_sistem_pembayaran_angsuran'),

            'form_penghasilan_pengeluaran_penghasilan_utama_pemohon' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_utama_pemohon')),
            'form_penghasilan_pengeluaran_penghasilan_lain_pemohon' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_lain_pemohon')),
            'form_penghasilan_pengeluaran_penghasilan_utama_istri_suami' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_utama_istri_suami')),
            'form_penghasilan_pengeluaran_penghasilan_lain_istri_suami' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_lain_istri_suami')),
            'form_penghasilan_pengeluaran_total_penghasilan' => str_replace(",", "", request('form_penghasilan_pengeluaran_total_penghasilan')),
            'form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga' => str_replace(",", "", request('form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga')),
            'form_penghasilan_pengeluaran_kewajiban_angsuran' => str_replace(",", "", request('form_penghasilan_pengeluaran_kewajiban_angsuran')),
            'form_penghasilan_pengeluaran_total_pengeluaran' => str_replace(",", "", request('form_penghasilan_pengeluaran_total_pengeluaran')),
            'form_penghasilan_pengeluaran_sisa_penghasilan' => str_replace(",", "", request('form_penghasilan_pengeluaran_sisa_penghasilan')),
            'form_penghasilan_pengeluaran_kemampuan_mengangsur' => str_replace(",", "", request('form_penghasilan_pengeluaran_kemampuan_mengangsur'))
        ]);



        if (request('jenis_nasabah') == 'Fixed Income') {
            PprClDokumen::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_cl_persyaratan_id' => $id,
                'ppr_cl_dokumen_agunan_id' => $id,
                'ppr_pemberkasan_memo_id' => $id,
                'ppr_cl_dokumen_fixed_income_id' => $idClDokumenFixed,
                'ppr_ability_to_repay_fixed_income_id' => $idClAtrFixed,
            ]);

            PprClDokumenFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_cl_dokumen_id' => $id,
            ]);

            PprAbilityToRepayFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_cl_dokumen_id' => $id,
            ]);

            PprScoring::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
                'ppr_scoring_wtr_fixed_income_id' => $idScoringWtrFixed,
                'ppr_scoring_collateral_fixed_income_id' => $idScoringCcFixed,
            ]);

            PprCharacter::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_wtr_fixed_income_id' => $idScoringWtrFixed,
            ]);

            PprCapital::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
            ]);

            PprCapacity::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
            ]);

            PprCondition::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
            ]);

            PprCollateral::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_collateral_fixed_income_id' => $idScoringCcFixed,
            ]);

            PprScoringAtrFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_id' => $id,
            ]);

            PprScoringWtrFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_id' => $id,
            ]);

            PprScoringCollateralFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_id' => $id,
            ]);
        } else {
            PprClDokumen::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_cl_persyaratan_id' => $id,
                'ppr_cl_dokumen_agunan_id' => $id,
                'ppr_pemberkasan_memo_id' => $id,
                'ppr_cl_dokumen_non_fixed_income_id' => $idClDokumenNonFixed,
                'ppr_ability_to_repay_non_fixed_income_id' => $idClAtrNonFixed,
            ]);

            PprClDokumenNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_cl_dokumen_id' => $id,
            ]);

            PprAbilityToRepayNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_cl_dokumen_id' => $id,
            ]);

            PprScoring::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_non_fixed_income_id' => $idScoringAtrNonFixed,
                'ppr_scoring_wtr_non_fixed_income_id' => $idScoringWtrNonFixed,
                'ppr_scoring_collateral_non_fixed_income_id' => $idScoringCcNonFixed,
            ]);

            PprCharacterNonFixed::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_wtr_non_fixed_income_id' => $idScoringWtrNonFixed,
            ]);

            PprCapacityNonFixed::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_non_fixed_income_id' => $idScoringAtrNonFixed,
            ]);

            PprConditionNonFixed::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_atr_non_fixed_income_id' => $idScoringAtrNonFixed,
            ]);

            PprCollateralNonFixed::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_collateral_non_fixed_income_id' => $idScoringCcNonFixed,
            ]);

            PprScoringAtrNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_id' => $id,
            ]);

            PprScoringWtrNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_id' => $id,
            ]);

            PprScoringCollateralNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $id,
                'ppr_scoring_id' => $id,
            ]);
        }

        PprClPersyaratan::create([
            'form_ppr_pembiayaan_id' => $id,
            'ppr_cl_dokumen_id' => $id,
        ]);

        PprClDokumenAgunan::create([
            'form_ppr_pembiayaan_id' => $id,
            'ppr_cl_dokumen_id' => $id,
        ]);

        PprPemberkasanMemo::create([
            'form_ppr_pembiayaan_id' => $id,
            'ppr_cl_dokumen_id' => $id,
        ]);

        FormPprDataPribadi::create([
            //Pemohon
            'id' => $id,
            'form_pribadi_pemohon_nama_lengkap' => request('form_pribadi_pemohon_nama_lengkap'),
            'form_pribadi_pemohon_nama_ktp' => request('form_pribadi_pemohon_nama_ktp'),
            'form_pribadi_pemohon_gelar' => request('form_pribadi_pemohon_gelar'),
            'form_pribadi_pemohon_nama_alias' => request('form_pribadi_pemohon_nama_alias'),
            'form_pribadi_pemohon_no_ktp' => request('form_pribadi_pemohon_no_ktp'),
            'form_pribadi_pemohon_jenis_kelamin' => request('form_pribadi_pemohon_jenis_kelamin'),
            'form_pribadi_pemohon_tempat_lahir' => request('form_pribadi_pemohon_tempat_lahir'),
            'form_pribadi_pemohon_tanggal_lahir' => request('form_pribadi_pemohon_tanggal_lahir'),
            'form_pribadi_pemohon_npwp' => request('form_pribadi_pemohon_npwp'),
            'form_pribadi_pemohon_pendidikan' => request('form_pribadi_pemohon_pendidikan'),
            'form_pribadi_pemohon_agama' => request('form_pribadi_pemohon_agama'),
            'form_pribadi_pemohon_agama_lain' => request('form_pribadi_pemohon_agama_lain'),
            'form_pribadi_pemohon_status_pernikahan' => request('form_pribadi_pemohon_status_pernikahan'),
            'form_pribadi_pemohon_jml_anak' => request('form_pribadi_pemohon_jml_anak'),
            'form_pribadi_pemohon_jml_tanggungan' => request('form_pribadi_pemohon_jml_tanggungan'),
            'form_pribadi_pemohon_nama_gadis_ibu_kandung' => request('form_pribadi_pemohon_nama_gadis_ibu_kandung'),
            'form_pribadi_pemohon_alamat_ktp' => request('form_pribadi_pemohon_alamat_ktp'),
            'form_pribadi_pemohon_alamat_ktp_rt' => request('form_pribadi_pemohon_alamat_ktp_rt'),
            'form_pribadi_pemohon_alamat_ktp_rw' => request('form_pribadi_pemohon_alamat_ktp_rw'),
            'form_pribadi_pemohon_alamat_ktp_kelurahan' => request('form_pribadi_pemohon_alamat_ktp_kelurahan'),
            'form_pribadi_pemohon_alamat_ktp_kecamatan' => request('form_pribadi_pemohon_alamat_ktp_kecamatan'),
            'form_pribadi_pemohon_alamat_ktp_dati2' => request('form_pribadi_pemohon_alamat_ktp_dati2'),
            'form_pribadi_pemohon_alamat_ktp_provinsi' => request('form_pribadi_pemohon_alamat_ktp_provinsi'),
            'form_pribadi_pemohon_alamat_ktp_kode_pos' => request('form_pribadi_pemohon_alamat_ktp_kode_pos'),
            'form_pribadi_pemohon_alamat_domisili' => request('form_pribadi_pemohon_alamat_domisili'),
            'form_pribadi_pemohon_alamat_domisili_rt' => request('form_pribadi_pemohon_alamat_domisili_rt'),
            'form_pribadi_pemohon_alamat_domisili_rw' => request('form_pribadi_pemohon_alamat_domisili_rw'),
            'form_pribadi_pemohon_alamat_domisili_kelurahan' => request('form_pribadi_pemohon_alamat_domisili_kelurahan'),
            'form_pribadi_pemohon_alamat_domisili_kecamatan' => request('form_pribadi_pemohon_alamat_domisili_kecamatan'),
            'form_pribadi_pemohon_alamat_domisili_dati2' => request('form_pribadi_pemohon_alamat_domisili_dati2'),
            'form_pribadi_pemohon_alamat_domisili_provinsi' => request('form_pribadi_pemohon_alamat_domisili_provinsi'),
            'form_pribadi_pemohon_alamat_domisili_kode_pos' => request('form_pribadi_pemohon_alamat_domisili_kode_pos'),
            'form_pribadi_pemohon_no_telp' => str_replace("+62 0", "", request('form_pribadi_pemohon_no_telp')),
            'form_pribadi_pemohon_no_handphone' => str_replace("+62 0", "", request('form_pribadi_pemohon_no_handphone')),
            'form_pribadi_pemohon_status_tempat_tinggal' => request('form_pribadi_pemohon_status_tempat_tinggal'),
            'form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun' => request('form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun'),
            'form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan' => request('form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan'),
            'form_pribadi_pemohon_status_tempat_tinggal_dijaminkan' => request('form_pribadi_pemohon_status_tempat_tinggal_dijaminkan'),
            'form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada' => request('form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada'),
            'form_pribadi_pemohon_alamat_korespondensi' => request('form_pribadi_pemohon_alamat_korespondensi'),
            'foto_id' => $id,

            //Istri/suami pemohon
            'form_pribadi_istri_suami_nama_lengkap' => request('form_pribadi_istri_suami_nama_lengkap'),
            'form_pribadi_istri_suami_gelar' => request('form_pribadi_istri_suami_gelar'),
            'form_pribadi_istri_suami_no_ktp' => request('form_pribadi_istri_suami_no_ktp'),
            'form_pribadi_istri_suami_tempat_lahir' => request('form_pribadi_istri_suami_tempat_lahir'),
            'form_pribadi_istri_suami_tanggal_lahir' => request('form_pribadi_istri_suami_tanggal_lahir'),
            'form_pribadi_istri_suami_npwp' => request('form_pribadi_istri_suami_npwp'),
            'form_pribadi_istri_suami_pendidikan' => request('form_pribadi_istri_suami_pendidikan'),

            //Keluaga terdekat
            'form_pribadi_keluarga_terdekat_nama_lengkap' => request('form_pribadi_keluarga_terdekat_nama_lengkap'),
            'form_pribadi_keluarga_terdekat_hubungan' => request('form_pribadi_keluarga_terdekat_hubungan'),
            'form_pribadi_keluarga_terdekat_hubungan_lain' => request('form_pribadi_keluarga_terdekat_hubungan_lain'),
            'form_pribadi_keluarga_terdekat_alamat' => request('form_pribadi_keluarga_terdekat_alamat'),
            'form_pribadi_keluarga_terdekat_alamat_rt' => request('form_pribadi_keluarga_terdekat_alamat_rt'),
            'form_pribadi_keluarga_terdekat_alamat_rw' => request('form_pribadi_keluarga_terdekat_alamat_rw'),
            'form_pribadi_keluarga_terdekat_alamat_kelurahan' => request('form_pribadi_keluarga_terdekat_alamat_kelurahan'),
            'form_pribadi_keluarga_terdekat_alamat_kecamatan' => request('form_pribadi_keluarga_terdekat_alamat_kecamatan'),
            'form_pribadi_keluarga_terdekat_alamat_dati2' => request('form_pribadi_keluarga_terdekat_alamat_dati2'),
            'form_pribadi_keluarga_terdekat_alamat_provinsi' => request('form_pribadi_keluarga_terdekat_alamat_provinsi'),
            'form_pribadi_keluarga_terdekat_alamat_kode_pos' => request('form_pribadi_keluarga_terdekat_alamat_kode_pos'),
            'form_pribadi_keluarga_terdekat_no_telp' => str_replace("+62 0", "", request('form_pribadi_keluarga_terdekat_no_telp'))
        ]);

        FormPprDataPekerjaan::create([
            //Pemohon
            'form_ppr_data_pribadi_id' => $id,
            'form_pekerjaan_pemohon_nama' => request('form_pekerjaan_pemohon_nama'),
            'form_pekerjaan_pemohon_badan_hukum' => request('form_pekerjaan_pemohon_badan_hukum'),
            'form_pekerjaan_pemohon_alamat' => request('form_pekerjaan_pemohon_alamat'),
            'form_pekerjaan_pemohon_alamat_kode_pos' => request('form_pekerjaan_pemohon_alamat_kode_pos'),
            'form_pekerjaan_pemohon_no_telp' => str_replace("+62 0", "", request('form_pekerjaan_pemohon_no_telp')),
            'form_pekerjaan_pemohon_no_telp_extension' => request('form_pekerjaan_pemohon_no_telp_extension'),
            'form_pekerjaan_pemohon_facsimile' => request('form_pekerjaan_pemohon_facsimile'),
            'form_pekerjaan_pemohon_npwp' => request('form_pekerjaan_pemohon_npwp'),
            'form_pekerjaan_pemohon_bidang_usaha' => request('form_pekerjaan_pemohon_bidang_usaha'),
            'form_pekerjaan_pemohon_bidang_usaha_lain' => request('form_pekerjaan_pemohon_bidang_usaha_lain'),
            'form_pekerjaan_pemohon_jenis_pekerjaan' => request('form_pekerjaan_pemohon_jenis_pekerjaan'),
            'form_pekerjaan_pemohon_jenis_pekerjaan_lain' => request('form_pekerjaan_pemohon_jenis_pekerjaan_lain'),
            'form_pekerjaan_pemohon_jml_karyawan' => request('form_pekerjaan_pemohon_jml_karyawan'),
            'form_pekerjaan_pemohon_departemen' => request('form_pekerjaan_pemohon_departemen'),
            'form_pekerjaan_pemohon_pangkat_gol_jabatan' => request('form_pekerjaan_pemohon_pangkat_gol_jabatan'),
            'form_pekerjaan_pemohon_nip_nrp' => request('form_pekerjaan_pemohon_nip_nrp'),
            'form_pekerjaan_pemohon_mulai_bekerja' => request('form_pekerjaan_pemohon_mulai_bekerja'),
            'form_pekerjaan_pemohon_usia_pensiun' => request('form_pekerjaan_pemohon_usia_pensiun'),
            'form_pekerjaan_pemohon_masa_kerja' => request('form_pekerjaan_pemohon_masa_kerja'),
            'form_pekerjaan_pemohon_nama_atasan_langsung' => request('form_pekerjaan_pemohon_nama_atasan_langsung'),
            'form_pekerjaan_pemohon_no_telp_atasan_langsung' => str_replace("+62 0", "", request('form_pekerjaan_pemohon_no_telp_atasan_langsung')),
            'form_pekerjaan_pemohon_grup_afiliasi' => request('form_pekerjaan_pemohon_grup_afiliasi'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan'),

            //Istri/suami pemohon
            'form_pekerjaan_istri_suami_nama' => request('form_pekerjaan_istri_suami_nama'),
            'form_pekerjaan_istri_suami_badan_hukum' => request('form_pekerjaan_istri_suami_badan_hukum'),
            'form_pekerjaan_istri_suami_alamat' => request('form_pekerjaan_istri_suami_alamat'),
            'form_pekerjaan_istri_suami_alamat_kode_pos' => request('form_pekerjaan_istri_suami_alamat_kode_pos'),
            'form_pekerjaan_istri_suami_no_telp' => str_replace("+62 0", "", request('form_pekerjaan_istri_suami_no_telp')),
            'form_pekerjaan_istri_suami_no_telp_extension' => request('form_pekerjaan_istri_suami_no_telp_extension'),
            'form_pekerjaan_istri_suami_facsimile' => request('form_pekerjaan_istri_suami_facsimile'),
            'form_pekerjaan_istri_suami_npwp' => request('form_pekerjaan_istri_suami_npwp'),
            'form_pekerjaan_istri_suami_bidang_usaha' => request('form_pekerjaan_istri_suami_bidang_usaha'),
            'form_pekerjaan_istri_suami_bidang_usaha_lain' => request('form_pekerjaan_istri_suami_bidang_usaha_lain'),
            'form_pekerjaan_istri_suami_jenis_pekerjaan' => request('form_pekerjaan_istri_suami_jenis_pekerjaan'),
            'form_pekerjaan_istri_suami_jenis_pekerjaan_lain' => request('form_pekerjaan_istri_suami_jenis_pekerjaan_lain'),
            'form_pekerjaan_istri_suami_jml_karyawan' => request('form_pekerjaan_istri_suami_jml_karyawan'),
            'form_pekerjaan_istri_suami_departemen' => request('form_pekerjaan_istri_suami_departemen'),
            'form_pekerjaan_istri_suami_pangkat_gol_jabatan' => request('form_pekerjaan_istri_suami_pangkat_gol_jabatan'),
            'form_pekerjaan_istri_suami_nip_nrp' => request('form_pekerjaan_istri_suami_nip_nrp'),
            'form_pekerjaan_istri_suami_mulai_bekerja' => request('form_pekerjaan_istri_suami_mulai_bekerja'),
            'form_pekerjaan_istri_suami_usia_pensiun' => request('form_pekerjaan_istri_suami_usia_pensiun'),
            'form_pekerjaan_istri_suami_masa_kerja' => request('form_pekerjaan_istri_suami_masa_kerja'),
            'form_pekerjaan_istri_suami_nama_atasan_langsung' => request('form_pekerjaan_istri_suami_nama_atasan_langsung'),
            'form_pekerjaan_istri_suami_no_telp_atasan_langsung' => str_replace("+62 0", "", request('form_pekerjaan_istri_suami_no_telp_atasan_langsung')),
            'form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension' => request('form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension'),
            'form_pekerjaan_istri_suami_grup_afiliasi' => request('form_pekerjaan_istri_suami_grup_afiliasi'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan')
        ]);

        // $request->validate([
        //     'foto.*kategori'=> 'required',
        //     'foto.*.foto' => 'required',
        // ]);

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

        FormPprDataAgunan::create([
            //Agunan I
            'form_ppr_pembiayaan_id' => $id,
            'form_agunan_1_jenis' => request('form_agunan_1_jenis'),
            'form_agunan_1_jenis_lain' => request('form_agunan_1_jenis_lain'),
            'form_agunan_1_nilai_harga_jual' => str_replace(",", "", request('form_agunan_1_nilai_harga_jual')),
            'form_agunan_1_alamat' => request('form_agunan_1_alamat'),
            'form_agunan_1_alamat_rt' => request('form_agunan_1_alamat_rt'),
            'form_agunan_1_alamat_rw' => request('form_agunan_1_alamat_rw'),
            'form_agunan_1_alamat_kelurahan' => request('form_agunan_1_alamat_kelurahan'),
            'form_agunan_1_alamat_kecamatan' => request('form_agunan_1_alamat_kecamatan'),
            'form_agunan_1_alamat_dati2' => request('form_agunan_1_alamat_dati2'),
            'form_agunan_1_alamat_provinsi' => request('form_agunan_1_alamat_provinsi'),
            'form_agunan_1_alamat_kode_pos' => request('form_agunan_1_alamat_kode_pos'),
            'form_agunan_1_status_bukti_kepemilikan' => request('form_agunan_1_status_bukti_kepemilikan'),
            'form_agunan_1_status_bukti_kepemilikan_tgl_berakhir' => request('form_agunan_1_status_bukti_kepemilikan_tgl_berakhir'),
            'form_agunan_1_status_bukti_kepemilikan_hak' => request('form_agunan_1_status_bukti_kepemilikan_hak'),
            'form_agunan_1_no_sertifikat' => request('form_agunan_1_no_sertifikat'),
            'form_agunan_1_no_sertifikat_tgl_penerbitan' => request('form_agunan_1_no_sertifikat_tgl_penerbitan'),
            'form_agunan_1_no_imb' => request('form_agunan_1_no_imb'),
            'form_agunan_1_peruntukan_bangunan' => request('form_agunan_1_peruntukan_bangunan'),
            'form_agunan_1_luas_tanah' => request('form_agunan_1_luas_tanah'),
            'form_agunan_1_luas_bangunan' => request('form_agunan_1_luas_bangunan'),
            'form_agunan_1_atas_nama' => request('form_agunan_1_atas_nama'),
            'form_agunan_1_nama_pengembang' => request('form_agunan_1_nama_pengembang'),
            'form_agunan_1_nama_proyek_perumahan' => request('form_agunan_1_nama_proyek_perumahan'),

            //Agunan II
            'form_agunan_2_jenis' => request('form_agunan_2_jenis'),
            'form_agunan_2_jenis_lain' => request('form_agunan_2_jenis_lain'),
            'form_agunan_2_nilai_harga_jual' => str_replace(",", "", request('form_agunan_2_nilai_harga_jual')),
            'form_agunan_2_alamat' => request('form_agunan_2_alamat'),
            'form_agunan_2_alamat_rt' => request('form_agunan_2_alamat_rt'),
            'form_agunan_2_alamat_rw' => request('form_agunan_2_alamat_rw'),
            'form_agunan_2_alamat_kelurahan' => request('form_agunan_2_alamat_kelurahan'),
            'form_agunan_2_alamat_kecamatan' => request('form_agunan_2_alamat_kecamatan'),
            'form_agunan_2_alamat_dati2' => request('form_agunan_2_alamat_dati2'),
            'form_agunan_2_alamat_provinsi' => request('form_agunan_2_alamat_provinsi'),
            'form_agunan_2_alamat_kode_pos' => request('form_agunan_2_alamat_kode_pos'),
            'form_agunan_2_status_bukti_kepemilikan' => request('form_agunan_2_status_bukti_kepemilikan'),
            'form_agunan_2_status_bukti_kepemilikan_tgl_berakhir' => request('form_agunan_2_status_bukti_kepemilikan_tgl_berakhir'),
            'form_agunan_2_status_bukti_kepemilikan_hak' => request('form_agunan_2_status_bukti_kepemilikan_hak'),
            'form_agunan_2_no_sertifikat' => request('form_agunan_2_no_sertifikat'),
            'form_agunan_2_no_sertifikat_tgl_penerbitan' => request('form_agunan_2_no_sertifikat_tgl_penerbitan'),
            'form_agunan_2_no_imb' => request('form_agunan_2_no_imb'),
            'form_agunan_2_peruntukan_bangunan' => request('form_agunan_2_peruntukan_bangunan'),
            'form_agunan_2_luas_tanah' => request('form_agunan_2_luas_tanah'),
            'form_agunan_2_luas_bangunan' => request('form_agunan_2_luas_bangunan'),
            'form_agunan_2_atas_nama' => request('form_agunan_2_atas_nama'),

            //Agunan III
            'form_agunan_3_jenis' => request('form_agunan_3_jenis'),
            'form_agunan_3_nilai' => str_replace(",", "", request('form_agunan_3_nilai')),
            'form_agunan_3_no_rekening' => request('form_agunan_3_no_rekening'),
            'form_agunan_3_atas_nama' => request('form_agunan_3_atas_nama')
        ]);

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->repeater_kekayaan_simpanan as $key => $value) {
                FormPprDataKekayaanSimpanan::create([
                    //Kekayaan simpanan
                    'form_ppr_pembiayaan_id' => $id,
                    'form_kekayaan_simpanan_nama_bank' => $value['form_kekayaan_simpanan_nama_bank'],
                    'form_kekayaan_simpanan_jenis' => $value['form_kekayaan_simpanan_jenis'],
                    'form_kekayaan_simpanan_sejak_tahun' => $value['form_kekayaan_simpanan_sejak_tahun'],
                    'form_kekayaan_simpanan_saldo_per_tanggal' => $value['form_kekayaan_simpanan_saldo_per_tanggal'],
                    'form_kekayaan_simpanan_saldo' => str_replace(",", "", $value['form_kekayaan_simpanan_saldo']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->kekayaan_tanah_bangunan as $key => $value) {
                FormPprDataKekayaanTanahBangunan::create([
                    //Kekayaan tanah dan bangunan
                    'form_ppr_pembiayaan_id' => $id,
                    'form_kekayaan_tanah_bangunan_luas_tanah' => $value['form_kekayaan_tanah_bangunan_luas_tanah'],
                    'form_kekayaan_tanah_bangunan_luas_bangunan' => $value['form_kekayaan_tanah_bangunan_luas_bangunan'],
                    'form_kekayaan_tanah_bangunan_jenis' => $value['form_kekayaan_tanah_bangunan_jenis'],
                    'form_kekayaan_tanah_bangunan_atas_nama' => $value['form_kekayaan_tanah_bangunan_atas_nama'],
                    'form_kekayaan_tanah_bangunan_taksasi_pasar_wajar' => str_replace(",", "", $value['form_kekayaan_tanah_bangunan_taksasi_pasar_wajar']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->kekayaan_kendaraan as $key => $value) {
                FormPprDataKekayaanKendaraan::create([
                    //Kekayaan kendaraan
                    'form_ppr_pembiayaan_id' => $id,
                    'form_kekayaan_kendaraan_jenis_merk' => $value['form_kekayaan_kendaraan_jenis_merk'],
                    'form_kekayaan_kendaraan_tahun_dikeluarkan' => $value['form_kekayaan_kendaraan_tahun_dikeluarkan'],
                    'form_kekayaan_kendaraan_atas_nama' => $value['form_kekayaan_kendaraan_atas_nama'],
                    'form_kekayaan_kendaraan_taksasi_harga_jual' => str_replace(",", "", $value['form_kekayaan_kendaraan_taksasi_harga_jual']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->kekayaan_saham as $key => $value) {
                FormPprDataKekayaanSaham::create([
                    //Kekayaan saham
                    'form_ppr_pembiayaan_id' => $id,
                    'form_kekayaan_saham_penerbit' => $value['form_kekayaan_saham_penerbit'],
                    'form_kekayaan_saham_per_tanggal' => $value['form_kekayaan_saham_per_tanggal'],
                    'form_kekayaan_saham_rp' => str_replace(",", "", $value['form_kekayaan_saham_rp']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->kekayaan_lainnya as $key => $value) {
                FormPprDataKekayaanLainnya::create([
                    //Kekayaan lainnya
                    'form_ppr_pembiayaan_id' => $id,
                    'form_kekayaan_lainnya' => $value['form_kekayaan_lainnya'],
                    'form_kekayaan_lainnya_rp' => str_replace(",", "", $value['form_kekayaan_lainnya_rp']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->pinjaman as $key => $value) {
                FormPprDataPinjaman::create([
                    //Pinjaman
                    'form_ppr_pembiayaan_id' => $id,
                    'form_pinjaman_nama_bank' => $value['form_pinjaman_nama_bank'],
                    'form_pinjaman_jenis' => $value['form_pinjaman_jenis'],
                    'form_pinjaman_sejak_tahun' => $value['form_pinjaman_sejak_tahun'],
                    'form_pinjaman_jangka_waktu_bulan' => $value['form_pinjaman_jangka_waktu_bulan'],
                    'form_pinjaman_plafond' => str_replace(",", "", $value['form_pinjaman_plafond']),
                    'form_pinjaman_angsuran_per_bulan' => str_replace(",", "", $value['form_pinjaman_angsuran_per_bulan']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->pinjaman_kartu_kredit as $key => $value) {
                FormPprDataPinjamanKartuKredit::create([
                    //Pinjaman kartu kredit
                    'form_ppr_pembiayaan_id' => $id,
                    'form_pinjaman_kartu_kredit_nama_bank' => $value['form_pinjaman_kartu_kredit_nama_bank'],
                    'form_pinjaman_kartu_kredit_sejak_tahun' => $value['form_pinjaman_kartu_kredit_sejak_tahun'],
                    'form_pinjaman_kartu_kredit_plafond' => str_replace(",", "", $value['form_pinjaman_kartu_kredit_plafond']),
                ]);
            }
        }

        if ($request->pinjaman[0]['form_pinjaman_nama_bank']) {
            foreach ($request->pinjaman_lainnya as $key => $value) {
                FormPprDataPinjamanLainnya::create([
                    //Pinjaman lainnya
                    'form_ppr_pembiayaan_id' => $id,
                    'form_pinjaman_lainnya' => $value['form_pinjaman_lainnya'],
                    'form_pinjaman_lainnya_rp' => str_replace(",", "", $value['form_pinjaman_lainnya_rp']),
                ]);
            }
        }

        PprPembiayaanHistory::create([
            'form_ppr_pembiayaan_id' => $id,
            'status_id' => 1,
            'user_id' => null,
            'jabatan_id' => 0,
            'divisi_id' => null
        ]);

        return redirect('/')->with('success', 'Pengajuan PPR Anda Berhasil Diajukan!');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('form::ppr.nasabah', [
            'title' => 'Pengajuan PPR BPRS BTB',
            'pembiayaan' => FormPprPembiayaan::select()->where('id', $id)->get()->first(),

            'nasabah' => FormPprDataPribadi::select()->where('id', $id)->get()->first(),
            'fotoPemohon' => FormPprFoto::select()->where('form_ppr_pembiayaan_id', $id)->where('kategori', 'Foto Pemohon')->get()->first(),
            'aos' => Role::select()->where('jabatan_id', 1)->get(),
            'pekerjaans' => FormPprDataPekerjaan::all(),
            'agunans' => FormPprDataAgunan::all(),

            'kekayaan_simpanans' => FormPprDataKekayaanSimpanan::select()->where('form_ppr_pembiayaan_id', $id)->get(),
            // 'kekayaan_simpanan' => FormPprDataKekayaanSimpanan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'kekayaan_tanah_bangunan' => FormPprDataKekayaanTanahBangunan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'kekayaan_kendaraan' => FormPprDataKekayaanKendaraan::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'kekayaan_saham' => FormPprDataKekayaanSaham::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'kekayaan_lainnya' => FormPprDataKekayaanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'pinjaman' => FormPprDataPinjaman::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'pinjaman_kartu_kredit' => FormPprDataPinjamanKartuKredit::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            'pinjaman_lainnya' => FormPprDataPinjamanLainnya::select()->where('form_ppr_pembiayaan_id', $id)->get()->first(),
            // 'persyaratans' => PprClPersyaratan::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $jmlPembiayaan = FormPprPembiayaan::select()->get()->count();
        $jmlClFixed = PprClDokumenFixedIncome::select()->get()->count();
        $jmlClNonFixed = PprClDokumenNonFixedIncome::select()->get()->count();

        if ($jmlPembiayaan == 0) {
            $hitung =  FormPprPembiayaan::select()->get()->count();
            $number = $hitung + 1;

            //Id Check List
            $hitungIdClDokumenFixed = PprClDokumenFixedIncome::select()->get()->count();
            $idClDokumenFixed = $hitungIdClDokumenFixed + 1;

            $hitungIdClAtrFixed = PprAbilityToRepayFixedIncome::select()->get()->count();
            $idClAtrFixed = $hitungIdClAtrFixed + 1;

            $hitungIdClDokumenNonFixed = PprClDokumenNonFixedIncome::select()->get()->count();
            $idClDokumenNonFixed = $hitungIdClDokumenNonFixed + 1;

            $hitungIdClAtrNonFixed = PprAbilityToRepayNonFixedIncome::select()->get()->count();
            $idClAtrNonFixed = $hitungIdClAtrNonFixed + 1;

            //Id Scoring
            $hitungIdScoringAtrFixed = PprScoringAtrFixedIncome::select()->get()->count();
            $idScoringAtrFixed = $hitungIdScoringAtrFixed + 1;

            $hitungIdScoringWtrFixed = PprScoringWtrFixedIncome::select()->get()->count();
            $idScoringWtrFixed = $hitungIdScoringWtrFixed + 1;

            $hitungIdScoringCcFixed = PprScoringCollateralFixedIncome::select()->get()->count();
            $idScoringCcFixed = $hitungIdScoringCcFixed + 1;

            $hitungIdScoringAtrNonFixed = PprScoringAtrNonFixedIncome::select()->get()->count();
            $idScoringAtrNonFixed = $hitungIdScoringAtrNonFixed + 1;

            $hitungIdScoringWtrNonFixed = PprScoringWtrNonFixedIncome::select()->get()->count();
            $idScoringWtrNonFixed = $hitungIdScoringWtrNonFixed + 1;

            $hitungIdScoringCcNonFixed = PprScoringCollateralNonFixedIncome::select()->get()->count();
            $idScoringCcNonFixed = $hitungIdScoringCcNonFixed + 1;
        } else {
            $hitung = FormPprPembiayaan::select()->orderBy('id', 'DESC')->get()->first();
            $number = $hitung->id + 1;

            //Id Fixed Income
            if ($jmlClFixed == 0) {
                //Id Check List
                $hitungIdClDokumenFixed = PprClDokumenFixedIncome::select()->get()->count();
                $idClDokumenFixed = $hitungIdClDokumenFixed + 1;

                $hitungIdClAtrFixed = PprAbilityToRepayFixedIncome::select()->get()->count();
                $idClAtrFixed = $hitungIdClAtrFixed + 1;

                //Id Score
                $hitungIdScoringAtrFixed = PprScoringAtrFixedIncome::select()->get()->count();
                $idScoringAtrFixed = $hitungIdScoringAtrFixed + 1;

                $hitungIdScoringWtrFixed = PprScoringWtrFixedIncome::select()->get()->count();
                $idScoringWtrFixed = $hitungIdScoringWtrFixed + 1;

                $hitungIdScoringCcFixed = PprScoringCollateralFixedIncome::select()->get()->count();
                $idScoringCcFixed = $hitungIdScoringCcFixed + 1;
            } else {
                //Id Check List
                $hitungIdClDokumenFixed = PprClDokumenFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClDokumenFixed = $hitungIdClDokumenFixed->id + 1;

                $hitungIdClAtrFixed = PprAbilityToRepayFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClAtrFixed = $hitungIdClAtrFixed->id + 1;

                //Id Score
                $hitungIdScoringAtrFixed = PprScoringAtrFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringAtrFixed = $hitungIdScoringAtrFixed->id + 1;

                $hitungIdScoringWtrFixed = PprScoringWtrFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringWtrFixed = $hitungIdScoringWtrFixed->id + 1;

                $hitungIdScoringCcFixed = PprScoringCollateralFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringCcFixed = $hitungIdScoringCcFixed->id + 1;
            }

            //Id Non Fixed Income
            if ($jmlClNonFixed == 0) {
                //Id Check List
                $hitungIdClDokumenNonFixed = PprClDokumenNonFixedIncome::select()->get()->count();
                $idClDokumenNonFixed = $hitungIdClDokumenNonFixed + 1;

                $hitungIdClAtrNonFixed = PprAbilityToRepayNonFixedIncome::select()->get()->count();
                $idClAtrNonFixed = $hitungIdClAtrNonFixed + 1;

                //Id Score
                $hitungIdScoringAtrNonFixed = PprScoringAtrNonFixedIncome::select()->get()->count();
                $idScoringAtrNonFixed = $hitungIdScoringAtrNonFixed + 1;

                $hitungIdScoringWtrNonFixed = PprScoringWtrNonFixedIncome::select()->get()->count();
                $idScoringWtrNonFixed = $hitungIdScoringWtrNonFixed + 1;

                $hitungIdScoringCcNonFixed = PprScoringCollateralNonFixedIncome::select()->get()->count();
                $idScoringCcNonFixed = $hitungIdScoringCcNonFixed + 1;
            } else {
                //Id Check List
                $hitungIdClDokumenNonFixed = PprClDokumenNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClDokumenNonFixed = $hitungIdClDokumenNonFixed->id + 1;

                $hitungIdClAtrNonFixed = PprAbilityToRepayNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idClAtrNonFixed = $hitungIdClAtrNonFixed->id + 1;

                //Id Score
                $hitungIdScoringAtrNonFixed = PprScoringAtrNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringAtrNonFixed = $hitungIdScoringAtrNonFixed->id + 1;

                $hitungIdScoringWtrNonFixed = PprScoringWtrNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringWtrNonFixed = $hitungIdScoringWtrNonFixed->id + 1;

                $hitungIdScoringCcNonFixed = PprScoringCollateralNonFixedIncome::select()->orderBy('id', 'DESC')->get()->first();
                $idScoringCcNonFixed = $hitungIdScoringCcNonFixed->id + 1;
            }
        }

        FormPprPembiayaan::create([
            'id' => $number,
            // 'user_id' => Auth::user()->id,
            'jenis_nasabah' => $request->jenis_nasabah,
            'user_id' => $request->user_id,
            'form_ppr_data_pribadi_id' => $id,
            'form_ppr_data_pekerjaan_id' => $number,
            'form_ppr_data_agunan_id' => $number,

            'ppr_cl_dokumen_id' => $number,
            'ppr_scoring_id' => $number,

            'form_permohonan_jenis_akad_pembayaran' => request('form_permohonan_jenis_akad_pembayaran'),
            'form_permohonan_jenis_akad_pembayaran_lain' => request('form_permohonan_jenis_akad_pembayaran_lain'),
            'form_permohonan_nilai_ppr_dimohon' => str_replace(",", "", request('form_permohonan_nilai_ppr_dimohon')),
            'form_permohonan_uang_muka_dana_sendiri' => str_replace(",", "", request('form_permohonan_uang_muka_dana_sendiri')),
            'form_permohonan_nilai_hpp' => str_replace(",", "", request('form_permohonan_nilai_hpp')),
            'form_permohonan_harga_jual' => str_replace(",", "", request('form_permohonan_harga_jual')),
            'form_permohonan_jangka_waktu_ppr' => request('form_permohonan_jangka_waktu_ppr'),
            'form_permohonan_peruntukan_ppr' => request('form_permohonan_peruntukan_ppr'),
            'form_permohonan_jml_margin' => str_replace(",", "", request('form_permohonan_jml_margin')),
            'form_permohonan_jml_sewa' => str_replace(",", "", request('form_permohonan_jml_sewa')),
            'form_permohonan_jml_bagi_hasil' => str_replace(",", "", request('form_permohonan_jml_bagi_hasil')),
            'form_permohonan_jml_bulan' => request('form_permohonan_jml_bulan'),
            'form_permohonan_sistem_pembayaran_angsuran' => request('form_permohonan_sistem_pembayaran_angsuran'),

            'form_penghasilan_pengeluaran_penghasilan_utama_pemohon' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_utama_pemohon')),
            'form_penghasilan_pengeluaran_penghasilan_lain_pemohon' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_lain_pemohon')),
            'form_penghasilan_pengeluaran_penghasilan_utama_istri_suami' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_utama_istri_suami')),
            'form_penghasilan_pengeluaran_penghasilan_lain_istri_suami' => str_replace(",", "", request('form_penghasilan_pengeluaran_penghasilan_lain_istri_suami')),
            'form_penghasilan_pengeluaran_total_penghasilan' => str_replace(",", "", request('form_penghasilan_pengeluaran_total_penghasilan')),
            'form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga' => str_replace(",", "", request('form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga')),
            'form_penghasilan_pengeluaran_kewajiban_angsuran' => str_replace(",", "", request('form_penghasilan_pengeluaran_kewajiban_angsuran')),
            'form_penghasilan_pengeluaran_total_pengeluaran' => str_replace(",", "", request('form_penghasilan_pengeluaran_total_pengeluaran')),
            'form_penghasilan_pengeluaran_sisa_penghasilan' => str_replace(",", "", request('form_penghasilan_pengeluaran_sisa_penghasilan')),
            'form_penghasilan_pengeluaran_kemampuan_mengangsur' => str_replace(",", "", request('form_penghasilan_pengeluaran_kemampuan_mengangsur'))
        ]);



        if ($request->jenis_nasabah == 'Fixed Income') {
            PprClDokumen::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_cl_persyaratan_id' => $number,
                'ppr_cl_dokumen_agunan_id' => $number,
                'ppr_pemberkasan_memo_id' => $number,
                'ppr_cl_dokumen_fixed_income_id' => $idClDokumenFixed,
                'ppr_ability_to_repay_fixed_income_id' => $idClAtrFixed,
            ]);

            PprClDokumenFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_cl_dokumen_id' => $number,
            ]);

            PprAbilityToRepayFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_cl_dokumen_id' => $number,
            ]);

            PprScoring::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
                'ppr_scoring_wtr_fixed_income_id' => $idScoringWtrFixed,
                'ppr_scoring_collateral_fixed_income_id' => $idScoringCcFixed,
            ]);

            PprCharacter::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_wtr_fixed_income_id' => $idScoringWtrFixed,
            ]);

            PprCapital::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
            ]);

            PprCapacity::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
            ]);

            PprCondition::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_fixed_income_id' => $idScoringAtrFixed,
            ]);

            PprCollateral::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_collateral_fixed_income_id' => $idScoringCcFixed,
            ]);

            PprScoringAtrFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_id' => $number,
            ]);

            PprScoringWtrFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_id' => $number,
            ]);

            PprScoringCollateralFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_id' => $number,
            ]);
        } else {
            PprClDokumen::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_cl_persyaratan_id' => $number,
                'ppr_cl_dokumen_agunan_id' => $number,
                'ppr_pemberkasan_memo_id' => $number,
                'ppr_cl_dokumen_non_fixed_income_id' => $idClDokumenNonFixed,
                'ppr_ability_to_repay_non_fixed_income_id' => $idClAtrNonFixed,
            ]);

            PprClDokumenNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_cl_dokumen_id' => $number,
            ]);

            PprAbilityToRepayNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_cl_dokumen_id' => $number,
            ]);

            PprScoring::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_non_fixed_income_id' => $idScoringAtrNonFixed,
                'ppr_scoring_wtr_non_fixed_income_id' => $idScoringWtrNonFixed,
                'ppr_scoring_collateral_non_fixed_income_id' => $idScoringCcNonFixed,
            ]);

            PprCharacterNonFixed::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_wtr_non_fixed_income_id' => $idScoringWtrNonFixed,
            ]);

            PprCapacityNonFixed::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_non_fixed_income_id' => $idScoringAtrNonFixed,
            ]);

            PprConditionNonFixed::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_atr_non_fixed_income_id' => $idScoringAtrNonFixed,
            ]);

            PprCollateralNonFixed::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_collateral_non_fixed_income_id' => $idScoringCcNonFixed,
            ]);

            PprScoringAtrNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_id' => $number,
            ]);

            PprScoringWtrNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_id' => $number,
            ]);

            PprScoringCollateralNonFixedIncome::create([
                'form_ppr_pembiayaan_id' => $number,
                'ppr_scoring_id' => $number,
            ]);
        }

        PprClPersyaratan::create([
            'form_ppr_pembiayaan_id' => $number,
            'ppr_cl_dokumen_id' => $number,
        ]);

        PprClDokumenAgunan::create([
            'form_ppr_pembiayaan_id' => $number,
            'ppr_cl_dokumen_id' => $number,
        ]);

        PprPemberkasanMemo::create([
            'form_ppr_pembiayaan_id' => $number,
            'ppr_cl_dokumen_id' => $number,
        ]);

        FormPprDataPribadi::where('id', $id)
            ->update([
                //Pemohon
                'id' => $id,
                'form_pribadi_pemohon_nama_lengkap' => request('form_pribadi_pemohon_nama_lengkap'),
                'form_pribadi_pemohon_nama_ktp' => request('form_pribadi_pemohon_nama_ktp'),
                'form_pribadi_pemohon_gelar' => request('form_pribadi_pemohon_gelar'),
                'form_pribadi_pemohon_nama_alias' => request('form_pribadi_pemohon_nama_alias'),
                'form_pribadi_pemohon_no_ktp' => request('form_pribadi_pemohon_no_ktp'),
                'form_pribadi_pemohon_jenis_kelamin' => request('form_pribadi_pemohon_jenis_kelamin'),
                'form_pribadi_pemohon_tempat_lahir' => request('form_pribadi_pemohon_tempat_lahir'),
                'form_pribadi_pemohon_tanggal_lahir' => request('form_pribadi_pemohon_tanggal_lahir'),
                'form_pribadi_pemohon_npwp' => request('form_pribadi_pemohon_npwp'),
                'form_pribadi_pemohon_pendidikan' => request('form_pribadi_pemohon_pendidikan'),
                'form_pribadi_pemohon_agama' => request('form_pribadi_pemohon_agama'),
                'form_pribadi_pemohon_agama_lain' => request('form_pribadi_pemohon_agama_lain'),
                'form_pribadi_pemohon_status_pernikahan' => request('form_pribadi_pemohon_status_pernikahan'),
                'form_pribadi_pemohon_jml_anak' => request('form_pribadi_pemohon_jml_anak'),
                'form_pribadi_pemohon_jml_tanggungan' => request('form_pribadi_pemohon_jml_tanggungan'),
                'form_pribadi_pemohon_nama_gadis_ibu_kandung' => request('form_pribadi_pemohon_nama_gadis_ibu_kandung'),
                'form_pribadi_pemohon_alamat_ktp' => request('form_pribadi_pemohon_alamat_ktp'),
                'form_pribadi_pemohon_alamat_ktp_rt' => request('form_pribadi_pemohon_alamat_ktp_rt'),
                'form_pribadi_pemohon_alamat_ktp_rw' => request('form_pribadi_pemohon_alamat_ktp_rw'),
                'form_pribadi_pemohon_alamat_ktp_kelurahan' => request('form_pribadi_pemohon_alamat_ktp_kelurahan'),
                'form_pribadi_pemohon_alamat_ktp_kecamatan' => request('form_pribadi_pemohon_alamat_ktp_kecamatan'),
                'form_pribadi_pemohon_alamat_ktp_dati2' => request('form_pribadi_pemohon_alamat_ktp_dati2'),
                'form_pribadi_pemohon_alamat_ktp_provinsi' => request('form_pribadi_pemohon_alamat_ktp_provinsi'),
                'form_pribadi_pemohon_alamat_ktp_kode_pos' => request('form_pribadi_pemohon_alamat_ktp_kode_pos'),
                'form_pribadi_pemohon_alamat_domisili' => request('form_pribadi_pemohon_alamat_domisili'),
                'form_pribadi_pemohon_alamat_domisili_rt' => request('form_pribadi_pemohon_alamat_domisili_rt'),
                'form_pribadi_pemohon_alamat_domisili_rw' => request('form_pribadi_pemohon_alamat_domisili_rw'),
                'form_pribadi_pemohon_alamat_domisili_kelurahan' => request('form_pribadi_pemohon_alamat_domisili_kelurahan'),
                'form_pribadi_pemohon_alamat_domisili_kecamatan' => request('form_pribadi_pemohon_alamat_domisili_kecamatan'),
                'form_pribadi_pemohon_alamat_domisili_dati2' => request('form_pribadi_pemohon_alamat_domisili_dati2'),
                'form_pribadi_pemohon_alamat_domisili_provinsi' => request('form_pribadi_pemohon_alamat_domisili_provinsi'),
                'form_pribadi_pemohon_alamat_domisili_kode_pos' => request('form_pribadi_pemohon_alamat_domisili_kode_pos'),
                'form_pribadi_pemohon_no_telp' => str_replace("+62 0", "", request('form_pribadi_pemohon_no_telp')),
                'form_pribadi_pemohon_no_handphone' => str_replace("+62 0", "", request('form_pribadi_pemohon_no_handphone')),
                'form_pribadi_pemohon_status_tempat_tinggal' => request('form_pribadi_pemohon_status_tempat_tinggal'),
                'form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun' => request('form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_tahun'),
                'form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan' => request('form_pribadi_pemohon_status_tempat_tinggal_lama_ditempati_bulan'),
                'form_pribadi_pemohon_status_tempat_tinggal_dijaminkan' => request('form_pribadi_pemohon_status_tempat_tinggal_dijaminkan'),
                'form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada' => request('form_pribadi_pemohon_status_tempat_tinggal_dijaminkan_ya_kepada'),
                'form_pribadi_pemohon_alamat_korespondensi' => request('form_pribadi_pemohon_alamat_korespondensi'),
                'foto_id' => $id,

                //Istri/suami pemohon
                'form_pribadi_istri_suami_nama_lengkap' => request('form_pribadi_istri_suami_nama_lengkap'),
                'form_pribadi_istri_suami_gelar' => request('form_pribadi_istri_suami_gelar'),
                'form_pribadi_istri_suami_no_ktp' => request('form_pribadi_istri_suami_no_ktp'),
                'form_pribadi_istri_suami_tempat_lahir' => request('form_pribadi_istri_suami_tempat_lahir'),
                'form_pribadi_istri_suami_tanggal_lahir' => request('form_pribadi_istri_suami_tanggal_lahir'),
                'form_pribadi_istri_suami_npwp' => request('form_pribadi_istri_suami_npwp'),
                'form_pribadi_istri_suami_pendidikan' => request('form_pribadi_istri_suami_pendidikan'),

                //Keluaga terdekat
                'form_pribadi_keluarga_terdekat_nama_lengkap' => request('form_pribadi_keluarga_terdekat_nama_lengkap'),
                'form_pribadi_keluarga_terdekat_hubungan' => request('form_pribadi_keluarga_terdekat_hubungan'),
                'form_pribadi_keluarga_terdekat_hubungan_lain' => request('form_pribadi_keluarga_terdekat_hubungan_lain'),
                'form_pribadi_keluarga_terdekat_alamat' => request('form_pribadi_keluarga_terdekat_alamat'),
                'form_pribadi_keluarga_terdekat_alamat_rt' => request('form_pribadi_keluarga_terdekat_alamat_rt'),
                'form_pribadi_keluarga_terdekat_alamat_rw' => request('form_pribadi_keluarga_terdekat_alamat_rw'),
                'form_pribadi_keluarga_terdekat_alamat_kelurahan' => request('form_pribadi_keluarga_terdekat_alamat_kelurahan'),
                'form_pribadi_keluarga_terdekat_alamat_kecamatan' => request('form_pribadi_keluarga_terdekat_alamat_kecamatan'),
                'form_pribadi_keluarga_terdekat_alamat_dati2' => request('form_pribadi_keluarga_terdekat_alamat_dati2'),
                'form_pribadi_keluarga_terdekat_alamat_provinsi' => request('form_pribadi_keluarga_terdekat_alamat_provinsi'),
                'form_pribadi_keluarga_terdekat_alamat_kode_pos' => request('form_pribadi_keluarga_terdekat_alamat_kode_pos'),
                'form_pribadi_keluarga_terdekat_no_telp' => str_replace("+62 0", "", request('form_pribadi_keluarga_terdekat_no_telp'))
            ]);

        FormPprDataPekerjaan::create([
            //Pemohon
            'form_ppr_data_pribadi_id' => $id,
            'form_pekerjaan_pemohon_nama' => request('form_pekerjaan_pemohon_nama'),
            'form_pekerjaan_pemohon_badan_hukum' => request('form_pekerjaan_pemohon_badan_hukum'),
            'form_pekerjaan_pemohon_alamat' => request('form_pekerjaan_pemohon_alamat'),
            'form_pekerjaan_pemohon_alamat_kode_pos' => request('form_pekerjaan_pemohon_alamat_kode_pos'),
            'form_pekerjaan_pemohon_no_telp' => str_replace("+62 0", "", request('form_pekerjaan_pemohon_no_telp')),
            'form_pekerjaan_pemohon_no_telp_extension' => request('form_pekerjaan_pemohon_no_telp_extension'),
            'form_pekerjaan_pemohon_facsimile' => request('form_pekerjaan_pemohon_facsimile'),
            'form_pekerjaan_pemohon_npwp' => request('form_pekerjaan_pemohon_npwp'),
            'form_pekerjaan_pemohon_bidang_usaha' => request('form_pekerjaan_pemohon_bidang_usaha'),
            'form_pekerjaan_pemohon_bidang_usaha_lain' => request('form_pekerjaan_pemohon_bidang_usaha_lain'),
            'form_pekerjaan_pemohon_jenis_pekerjaan' => request('form_pekerjaan_pemohon_jenis_pekerjaan'),
            'form_pekerjaan_pemohon_jenis_pekerjaan_lain' => request('form_pekerjaan_pemohon_jenis_pekerjaan_lain'),
            'form_pekerjaan_pemohon_jml_karyawan' => request('form_pekerjaan_pemohon_jml_karyawan'),
            'form_pekerjaan_pemohon_departemen' => request('form_pekerjaan_pemohon_departemen'),
            'form_pekerjaan_pemohon_pangkat_gol_jabatan' => request('form_pekerjaan_pemohon_pangkat_gol_jabatan'),
            'form_pekerjaan_pemohon_nip_nrp' => request('form_pekerjaan_pemohon_nip_nrp'),
            'form_pekerjaan_pemohon_mulai_bekerja' => request('form_pekerjaan_pemohon_mulai_bekerja'),
            'form_pekerjaan_pemohon_usia_pensiun' => request('form_pekerjaan_pemohon_usia_pensiun'),
            'form_pekerjaan_pemohon_masa_kerja' => request('form_pekerjaan_pemohon_masa_kerja'),
            'form_pekerjaan_pemohon_nama_atasan_langsung' => request('form_pekerjaan_pemohon_nama_atasan_langsung'),
            'form_pekerjaan_pemohon_no_telp_atasan_langsung' => str_replace("+62 0", "", request('form_pekerjaan_pemohon_no_telp_atasan_langsung')),
            'form_pekerjaan_pemohon_grup_afiliasi' => request('form_pekerjaan_pemohon_grup_afiliasi'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun'),
            'form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan' => request('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan'),

            //Istri/suami pemohon
            'form_pekerjaan_istri_suami_nama' => request('form_pekerjaan_istri_suami_nama'),
            'form_pekerjaan_istri_suami_badan_hukum' => request('form_pekerjaan_istri_suami_badan_hukum'),
            'form_pekerjaan_istri_suami_alamat' => request('form_pekerjaan_istri_suami_alamat'),
            'form_pekerjaan_istri_suami_alamat_kode_pos' => request('form_pekerjaan_istri_suami_alamat_kode_pos'),
            'form_pekerjaan_istri_suami_no_telp' => str_replace("+62 0", "", request('form_pekerjaan_istri_suami_no_telp')),
            'form_pekerjaan_istri_suami_no_telp_extension' => request('form_pekerjaan_istri_suami_no_telp_extension'),
            'form_pekerjaan_istri_suami_facsimile' => request('form_pekerjaan_istri_suami_facsimile'),
            'form_pekerjaan_istri_suami_npwp' => request('form_pekerjaan_istri_suami_npwp'),
            'form_pekerjaan_istri_suami_bidang_usaha' => request('form_pekerjaan_istri_suami_bidang_usaha'),
            'form_pekerjaan_istri_suami_bidang_usaha_lain' => request('form_pekerjaan_istri_suami_bidang_usaha_lain'),
            'form_pekerjaan_istri_suami_jenis_pekerjaan' => request('form_pekerjaan_istri_suami_jenis_pekerjaan'),
            'form_pekerjaan_istri_suami_jenis_pekerjaan_lain' => request('form_pekerjaan_istri_suami_jenis_pekerjaan_lain'),
            'form_pekerjaan_istri_suami_jml_karyawan' => request('form_pekerjaan_istri_suami_jml_karyawan'),
            'form_pekerjaan_istri_suami_departemen' => request('form_pekerjaan_istri_suami_departemen'),
            'form_pekerjaan_istri_suami_pangkat_gol_jabatan' => request('form_pekerjaan_istri_suami_pangkat_gol_jabatan'),
            'form_pekerjaan_istri_suami_nip_nrp' => request('form_pekerjaan_istri_suami_nip_nrp'),
            'form_pekerjaan_istri_suami_mulai_bekerja' => request('form_pekerjaan_istri_suami_mulai_bekerja'),
            'form_pekerjaan_istri_suami_usia_pensiun' => request('form_pekerjaan_istri_suami_usia_pensiun'),
            'form_pekerjaan_istri_suami_masa_kerja' => request('form_pekerjaan_istri_suami_masa_kerja'),
            'form_pekerjaan_istri_suami_nama_atasan_langsung' => request('form_pekerjaan_istri_suami_nama_atasan_langsung'),
            'form_pekerjaan_istri_suami_no_telp_atasan_langsung' => str_replace("+62 0", "", request('form_pekerjaan_istri_suami_no_telp_atasan_langsung')),
            'form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension' => request('form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension'),
            'form_pekerjaan_istri_suami_grup_afiliasi' => request('form_pekerjaan_istri_suami_grup_afiliasi'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun'),
            'form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan' => request('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan')
        ]);

        // $request->validate([
        //     'foto.*kategori'=> 'required',
        //     'foto.*.foto' => 'required',
        // ]);

        foreach ($request->foto as $key => $value) {
            if ($value['foto']) {
                $foto = $value['foto']->store('foto-ppr-pembiayaan');
            }

            FormPprFoto::create([
                'form_ppr_pembiayaan_id' => $number,
                'kategori' => $value['kategori'],
                'foto' => $foto,
            ]);
        }


        FormPprDataAgunan::create([
            //Agunan I
            'form_ppr_pembiayaan_id' => $number,
            'form_agunan_1_jenis' => request('form_agunan_1_jenis'),
            'form_agunan_1_jenis_lain' => request('form_agunan_1_jenis_lain'),
            'form_agunan_1_nilai_harga_jual' => str_replace(",", "", request('form_agunan_1_nilai_harga_jual')),
            'form_agunan_1_alamat' => request('form_agunan_1_alamat'),
            'form_agunan_1_alamat_rt' => request('form_agunan_1_alamat_rt'),
            'form_agunan_1_alamat_rw' => request('form_agunan_1_alamat_rw'),
            'form_agunan_1_alamat_kelurahan' => request('form_agunan_1_alamat_kelurahan'),
            'form_agunan_1_alamat_kecamatan' => request('form_agunan_1_alamat_kecamatan'),
            'form_agunan_1_alamat_dati2' => request('form_agunan_1_alamat_dati2'),
            'form_agunan_1_alamat_provinsi' => request('form_agunan_1_alamat_provinsi'),
            'form_agunan_1_alamat_kode_pos' => request('form_agunan_1_alamat_kode_pos'),
            'form_agunan_1_status_bukti_kepemilikan' => request('form_agunan_1_status_bukti_kepemilikan'),
            'form_agunan_1_status_bukti_kepemilikan_tgl_berakhir' => request('form_agunan_1_status_bukti_kepemilikan_tgl_berakhir'),
            'form_agunan_1_status_bukti_kepemilikan_hak' => request('form_agunan_1_status_bukti_kepemilikan_hak'),
            'form_agunan_1_no_sertifikat' => request('form_agunan_1_no_sertifikat'),
            'form_agunan_1_no_sertifikat_tgl_penerbitan' => request('form_agunan_1_no_sertifikat_tgl_penerbitan'),
            'form_agunan_1_no_imb' => request('form_agunan_1_no_imb'),
            'form_agunan_1_peruntukan_bangunan' => request('form_agunan_1_peruntukan_bangunan'),
            'form_agunan_1_luas_tanah' => request('form_agunan_1_luas_tanah'),
            'form_agunan_1_luas_bangunan' => request('form_agunan_1_luas_bangunan'),
            'form_agunan_1_atas_nama' => request('form_agunan_1_atas_nama'),
            'form_agunan_1_nama_pengembang' => request('form_agunan_1_nama_pengembang'),
            'form_agunan_1_nama_proyek_perumahan' => request('form_agunan_1_nama_proyek_perumahan'),

            //Agunan II
            'form_agunan_2_jenis' => request('form_agunan_2_jenis'),
            'form_agunan_2_jenis_lain' => request('form_agunan_2_jenis_lain'),
            'form_agunan_2_nilai_harga_jual' => str_replace(",", "", request('form_agunan_2_nilai_harga_jual')),
            'form_agunan_2_alamat' => request('form_agunan_2_alamat'),
            'form_agunan_2_alamat_rt' => request('form_agunan_2_alamat_rt'),
            'form_agunan_2_alamat_rw' => request('form_agunan_2_alamat_rw'),
            'form_agunan_2_alamat_kelurahan' => request('form_agunan_2_alamat_kelurahan'),
            'form_agunan_2_alamat_kecamatan' => request('form_agunan_2_alamat_kecamatan'),
            'form_agunan_2_alamat_dati2' => request('form_agunan_2_alamat_dati2'),
            'form_agunan_2_alamat_provinsi' => request('form_agunan_2_alamat_provinsi'),
            'form_agunan_2_alamat_kode_pos' => request('form_agunan_2_alamat_kode_pos'),
            'form_agunan_2_status_bukti_kepemilikan' => request('form_agunan_2_status_bukti_kepemilikan'),
            'form_agunan_2_status_bukti_kepemilikan_tgl_berakhir' => request('form_agunan_2_status_bukti_kepemilikan_tgl_berakhir'),
            'form_agunan_2_status_bukti_kepemilikan_hak' => request('form_agunan_2_status_bukti_kepemilikan_hak'),
            'form_agunan_2_no_sertifikat' => request('form_agunan_2_no_sertifikat'),
            'form_agunan_2_no_sertifikat_tgl_penerbitan' => request('form_agunan_2_no_sertifikat_tgl_penerbitan'),
            'form_agunan_2_no_imb' => request('form_agunan_2_no_imb'),
            'form_agunan_2_peruntukan_bangunan' => request('form_agunan_2_peruntukan_bangunan'),
            'form_agunan_2_luas_tanah' => request('form_agunan_2_luas_tanah'),
            'form_agunan_2_luas_bangunan' => request('form_agunan_2_luas_bangunan'),
            'form_agunan_2_atas_nama' => request('form_agunan_2_atas_nama'),

            //Agunan III
            'form_agunan_3_jenis' => request('form_agunan_3_jenis'),
            'form_agunan_3_nilai' => str_replace(",", "", request('form_agunan_3_nilai')),
            'form_agunan_3_no_rekening' => request('form_agunan_3_no_rekening'),
            'form_agunan_3_atas_nama' => request('form_agunan_3_atas_nama')
        ]);


        foreach ($request->repeater_kekayaan_simpanan as $key => $value) {
            FormPprDataKekayaanSimpanan::create([
                //Kekayaan simpanan
                'form_ppr_pembiayaan_id' => $number,
                'form_kekayaan_simpanan_nama_bank' => $value['form_kekayaan_simpanan_nama_bank'],
                'form_kekayaan_simpanan_jenis' => $value['form_kekayaan_simpanan_jenis'],
                'form_kekayaan_simpanan_sejak_tahun' => $value['form_kekayaan_simpanan_sejak_tahun'],
                'form_kekayaan_simpanan_saldo_per_tanggal' => $value['form_kekayaan_simpanan_saldo_per_tanggal'],
                'form_kekayaan_simpanan_saldo' => str_replace(",", "", $value['form_kekayaan_simpanan_saldo']),
            ]);
        }

        foreach ($request->kekayaan_tanah_bangunan as $key => $value) {
            FormPprDataKekayaanTanahBangunan::create([
                //Kekayaan tanah dan bangunan
                'form_ppr_pembiayaan_id' => $number,
                'form_kekayaan_tanah_bangunan_luas_tanah' => $value['form_kekayaan_tanah_bangunan_luas_tanah'],
                'form_kekayaan_tanah_bangunan_luas_bangunan' => $value['form_kekayaan_tanah_bangunan_luas_bangunan'],
                'form_kekayaan_tanah_bangunan_jenis' => $value['form_kekayaan_tanah_bangunan_jenis'],
                'form_kekayaan_tanah_bangunan_atas_nama' => $value['form_kekayaan_tanah_bangunan_atas_nama'],
                'form_kekayaan_tanah_bangunan_taksasi_pasar_wajar' => str_replace(",", "", $value['form_kekayaan_tanah_bangunan_taksasi_pasar_wajar']),
            ]);
        }

        foreach ($request->kekayaan_kendaraan as $key => $value) {
            FormPprDataKekayaanKendaraan::create([
                //Kekayaan kendaraan
                'form_ppr_pembiayaan_id' => $number,
                'form_kekayaan_kendaraan_jenis_merk' => $value['form_kekayaan_kendaraan_jenis_merk'],
                'form_kekayaan_kendaraan_tahun_dikeluarkan' => $value['form_kekayaan_kendaraan_tahun_dikeluarkan'],
                'form_kekayaan_kendaraan_atas_nama' => $value['form_kekayaan_kendaraan_atas_nama'],
                'form_kekayaan_kendaraan_taksasi_harga_jual' => str_replace(",", "", $value['form_kekayaan_kendaraan_taksasi_harga_jual']),
            ]);
        }

        foreach ($request->kekayaan_saham as $key => $value) {
            FormPprDataKekayaanSaham::create([
                //Kekayaan saham
                'form_ppr_pembiayaan_id' => $number,
                'form_kekayaan_saham_penerbit' => $value['form_kekayaan_saham_penerbit'],
                'form_kekayaan_saham_per_tanggal' => $value['form_kekayaan_saham_per_tanggal'],
                'form_kekayaan_saham_rp' => str_replace(",", "", $value['form_kekayaan_saham_rp']),
            ]);
        }

        foreach ($request->kekayaan_lainnya as $key => $value) {
            FormPprDataKekayaanLainnya::create([
                //Kekayaan lainnya
                'form_ppr_pembiayaan_id' => $number,
                'form_kekayaan_lainnya' => $value['form_kekayaan_lainnya'],
                'form_kekayaan_lainnya_rp' => str_replace(",", "", $value['form_kekayaan_lainnya_rp']),
            ]);
        }

        foreach ($request->pinjaman as $key => $value) {
            FormPprDataPinjaman::create([
                //Pinjaman
                'form_ppr_pembiayaan_id' => $number,
                'form_pinjaman_nama_bank' => $value['form_pinjaman_nama_bank'],
                'form_pinjaman_jenis' => $value['form_pinjaman_jenis'],
                'form_pinjaman_sejak_tahun' => $value['form_pinjaman_sejak_tahun'],
                'form_pinjaman_jangka_waktu_bulan' => $value['form_pinjaman_jangka_waktu_bulan'],
                'form_pinjaman_plafond' => str_replace(",", "", $value['form_pinjaman_plafond']),
                'form_pinjaman_angsuran_per_bulan' => str_replace(",", "", $value['form_pinjaman_angsuran_per_bulan']),
            ]);
        }

        foreach ($request->pinjaman_kartu_kredit as $key => $value) {
            FormPprDataPinjamanKartuKredit::create([
                //Pinjaman kartu kredit
                'form_ppr_pembiayaan_id' => $number,
                'form_pinjaman_kartu_kredit_nama_bank' => $value['form_pinjaman_kartu_kredit_nama_bank'],
                'form_pinjaman_kartu_kredit_sejak_tahun' => $value['form_pinjaman_kartu_kredit_sejak_tahun'],
                'form_pinjaman_kartu_kredit_plafond' => str_replace(",", "", $value['form_pinjaman_kartu_kredit_plafond']),
            ]);
        }

        foreach ($request->pinjaman_lainnya as $key => $value) {
            FormPprDataPinjamanLainnya::create([
                //Pinjaman lainnya
                'form_ppr_pembiayaan_id' => $number,
                'form_pinjaman_lainnya' => $value['form_pinjaman_lainnya'],
                'form_pinjaman_lainnya_rp' => str_replace(",", "", $value['form_pinjaman_lainnya_rp']),
            ]);
        }

        return redirect('/')->with('success', 'Pengajuan PPR Anda Berhasil Diajukan!');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'form_permohonan_nilai_ppr_dimohon' => ['required', 'integer', 'max:255'],
    //     ]);
    // }

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
