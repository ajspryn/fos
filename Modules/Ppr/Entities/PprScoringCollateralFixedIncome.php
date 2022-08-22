<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprScoringCollateralFixedIncome extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function totalScoringFixedIncome()
    {
        return $this->belongsTo(PprScoringFixedIncome::class, 'ppr_scoring_fixed_income_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprScoringCollateralFixedIncomeFactory::new();
    }
}
