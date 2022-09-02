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
use Modules\Ppr\Entities\PprCapacity;
use Modules\Ppr\Entities\PprCapacityNonFixed;
use Modules\Ppr\Entities\PprCapital;
use Modules\Ppr\Entities\PprCharacter;
use Modules\Ppr\Entities\PprCharacterNonFixed;
use Modules\Ppr\Entities\PprClDokumen;
use Modules\Ppr\Entities\PprCollateral;
use Modules\Ppr\Entities\PprCollateralNonFixed;
use Modules\Ppr\Entities\PprCondition;
use Modules\Ppr\Entities\PprConditionNonFixed;
use Modules\Ppr\Entities\PprScoring;
use Modules\Ppr\Entities\PprScoringAtrFixedIncome;
use Modules\Ppr\Entities\PprScoringAtrNonFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralFixedIncome;
use Modules\Ppr\Entities\PprScoringCollateralNonFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrFixedIncome;
use Modules\Ppr\Entities\PprScoringWtrNonFixedIncome;

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

    public function dokumen()
    {
        return $this->belongsTo(PprClDokumen::class, 'ppr_cl_dokumen_id', 'id');
    }

    //Scoring Fixed
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

    //Scoring Non Fixed
    public function characterNonFixed()
    {
        return $this->belongsTo(PprCharacterNonFixed::class, 'ppr_character_non_fixed_id', 'id');
    }

    public function capacityNonFixed()
    {
        return $this->belongsTo(PprCapacityNonFixed::class, 'ppr_capacity_non_fixed_id', 'id');
    }

    public function conditionNonFixed()
    {
        return $this->belongsTo(PprConditionNonFixed::class, 'ppr_condition_non_fixed_id', 'id');
    }

    public function collateralNonFixed()
    {
        return $this->belongsTo(PprCollateralNonFixed::class, 'ppr_collateral_non_fixed_id', 'id');
    }

    public function scoringAtrNonFixedIncome()
    {
        return $this->belongsTo(PprScoringAtrNonFixedIncome::class, 'ppr_scoring_atr_non_fixed_income_id', 'id');
    }

    public function scoringWtrNonFixedIncome()
    {
        return $this->belongsTo(PprScoringWtrNonFixedIncome::class, 'ppr_scoring_wtr_non_fixed_income_id', 'id');
    }

    public function scoringCollateralNonFixedIncome()
    {
        return $this->belongsTo(PprScoringCollateralNonFixedIncome::class, 'ppr_scoring_collateral_non_fixed_income_id', 'id');
    }

    public function scoring()
    {
        return $this->belongsTo(PprScoring::class, 'ppr_scoring_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormPprPembiayaanFactory::new();
    }
}
