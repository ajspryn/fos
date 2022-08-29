<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;

class PprCollateralNonFixed extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    public function scoreCollateral()
    {
        return $this->belongsTo(PprScoringCollateralNonFixedIncome::class, 'ppr_scoring_collateral_non_fixed_income_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprCollateralNonFixedFactory::new();
    }
}
