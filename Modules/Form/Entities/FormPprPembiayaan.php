<?php

namespace Modules\Form\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprDataPribadi;
use Modules\Form\Entities\FormPprDataPekerjaan;
use Modules\Form\Entities\FormPprDataAgunan;
use Modules\Form\Entities\FormPprDataKekayaanSimpanan;
use Modules\Form\Entities\FormPprDataKekayaanTanahBangunan;
use Modules\Form\Entities\FormPprDataKekayaanKendaraan;
use Modules\Form\Entities\FormPprDataKekayaanSaham;
use Modules\Form\Entities\FormPprDataKekayaanLainnya;
use Modules\Form\Entities\FormPprDataPinjaman;
use Modules\Form\Entities\FormPprDataPinjamanKartuKredit;
use Modules\Form\Entities\FormPprDataPinjamanLainnya;
use Modules\Ppr\Entities\PprAbilityToRepayFixedIncome;
use Modules\Ppr\Entities\PprAbilityToRepayNonFixedIncome;
use Modules\Ppr\Entities\PprCapacity;
use Modules\Ppr\Entities\PprCapital;
use Modules\Ppr\Entities\PprCharacter;
use Modules\Ppr\Entities\PprClDokumen;
use Modules\Ppr\Entities\PprClDokumenAgunan;
use Modules\Ppr\Entities\PprClDokumenFixedIncome;
use Modules\Ppr\Entities\PprClDokumenNonFixedIncome;
use Modules\Ppr\Entities\PprClPersyaratan;
use Modules\Ppr\Entities\PprCollateral;
use Modules\Ppr\Entities\PprCondition;
use Modules\Ppr\Entities\PprPemberkasanMemo;
use Modules\Ppr\Entities\PprScoringAtrFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralFixedIncome;
use Modules\Ppr\Entities\PprScoringFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrFixedIncome;

class FormPprPembiayaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pemohon()
    {
        return $this->belongsTo(FormPprDataPribadi::class, 'form_ppr_data_pribadi_id', 'id');
    }

    public function pekerjaan()
    {
        return $this->belongsTo(FormPprDataPekerjaan::class, 'form_ppr_data_pekerjaan_id', 'id');
    }

    // public function penghasilan_pengeluaran()
    // {
    //     return $this->belongsTo(FormPprDataPenghasilanPengeluaran::class, 'form_ppr_data_penghasilan_pengeluaran_id', 'id');
    // }

    public function agunan()
    {
        return $this->belongsTo(FormPprDataAgunan::class, 'form_ppr_data_agunan_id', 'id');
    }

    public function kekayaan_simpanan()
    {
        return $this->belongsTo(FormPprDataKekayaanSimpanan::class, 'form_ppr_data_kekayaan_simpanan_id', 'id');
    }

    public function kekayaan_tanah_bangunan()
    {
        return $this->belongsTo(FormPprDataKekayaanTanahBangunan::class, 'form_ppr_data_kekayaan_tanah_bangunan_id', 'id');
    }

    public function kekayaan_kendaraan()
    {
        return $this->belongsTo(FormPprDataKekayaanKendaraan::class, 'form_ppr_data_kekayaan_kendaraan_id', 'id');
    }

    public function kekayaan_saham()
    {
        return $this->belongsTo(FormPprDataKekayaanSaham::class, 'form_ppr_data_kekayaan_saham_id', 'id');
    }

    public function kekayaan_lainnya()
    {
        return $this->belongsTo(FormPprDataKekayaanLainnya::class, 'form_ppr_data_kekayaan_lainnya_id', 'id');
    }

    public function pinjaman()
    {
        return $this->belongsTo(FormPprDataPinjaman::class, 'form_ppr_data_pinjaman_id', 'id');
    }

    public function pinjaman_kartu_kredit()
    {
        return $this->belongsTo(FormPprDataPinjamanKartuKredit::class, 'form_ppr_data_pinjaman_kartu_kredit_id', 'id');
    }

    public function pinjaman_lainnya()
    {
        return $this->belongsTo(FormPprDataPinjamanLainnya::class, 'form_ppr_data_pinjaman_lainnya_id', 'id');
    }

    // public function clPersyaratan()
    // {
    //     return $this->belongsTo(PprClPersyaratan::class, 'ppr_cl_persyaratan_id', 'id');
    // }

    // public function clDokumenFixedIncome()
    // {
    //     return $this->belongsTo(PprClDokumenFixedIncome::class, 'ppr_cl_dokumen_fixed_income_id', 'id');
    // }

    // public function clDokumenNonFixedIncome()
    // {
    //     return $this->belongsTo(PprClDokumenNonFixedIncome::class, 'ppr_cl_dokumen_non_fixed_income_id', 'id');
    // }

    // public function clDokumenAgunan()
    // {
    //     return $this->belongsTo(PprClDokumenAgunan::class, 'ppr_cl_dokumen_agunan_id', 'id');
    // }

    // public function ArtFixedIncome()
    // {
    //     return $this->belongsTo(PprAbilityToRepayFixedIncome::class, 'ppr_ability_to_repay_fixed_income_id', 'id');
    // }

    // public function ArtNonFixedIncome()
    // {
    //     return $this->belongsTo(PprAbilityToRepayNonFixedIncome::class, 'ppr_ability_to_repay_fixed_income_id', 'id');
    // }

    // public function pemberkasanMemo()
    // {
    //     return $this->belongsTo(PprPemberkasanMemo::class, 'ppr_pemberkasan_memo_id', 'id');
    // }

    public function dokumen()
    {
        return $this->belongsTo(PprClDokumen::class, 'ppr_cl_dokumen_id', 'id');
    }

    //Scoring
    public function character()
    {
        return $this->belongsTo(PprCharacter::class, 'ppr_character_id', 'id');
    }

    public function capital()
    {
        return $this->belongsTo(PprCapital::class, 'ppr_capital_id', 'id');
    }

    public function capacity()
    {
        return $this->belongsTo(PprCapacity::class, 'ppr_capacity_id', 'id');
    }

    public function condition()
    {
        return $this->belongsTo(PprCondition::class, 'ppr_condition_id', 'id');
    }

    public function collateral()
    {
        return $this->belongsTo(PprCollateral::class, 'ppr_collateral_id', 'id');
    }

    public function scoringAtrFixedIncome()
    {
        return $this->belongsTo(PprScoringAtrFixedIncome::class, 'ppr_scoring_atr_fixed_income_id', 'id');
    }

    public function scoringWtrFixedIncome()
    {
        return $this->belongsTo(PprScoringWtrFixedIncome::class, 'ppr_scoring_wtr_fixed_income_id', 'id');
    }

    public function scoringCollateralFixedIncome()
    {
        return $this->belongsTo(PprScoringCollateralFixedIncome::class, 'ppr_scoring_collateral_fixed_income_id', 'id');
    }

    public function scoringFixedIncome()
    {
        return $this->belongsTo(PprScoringFixedIncome::class, 'ppr_scoring_fixed_income_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormPprPembiayaanFactory::new();
    }
}
