<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;

class PprScoring extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    //Fixed Income
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

    //Non Fixed Income
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


    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprScoringFactory::new();
    }
}
