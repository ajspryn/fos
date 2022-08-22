<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprCollateral extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function scoreCollateral()
    {
        return $this->belongsTo(PprScoringCollateralFixedIncome::class, 'ppr_scoring_collateral_fixed_income_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\CollateralFactory::new();
    }
}
