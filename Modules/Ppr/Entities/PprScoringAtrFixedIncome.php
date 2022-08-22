<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprScoringAtrFixedIncome extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function totalScoringFixedIncome()
    {
        return $this->belongsTo(PprScoringFixedIncome::class, 'ppr_scoring_fixed_income_id', 'id');
    }

    // public function capital()
    // {
    //     return $this->belongsTo(PprCapital::class, 'ppr_capital_id', 'id');
    // }

    // public function capacity()
    // {
    //     return $this->belongsTo(PprCapacity::class, 'ppr_capacity_id', 'id');
    // }

    // public function condition()
    // {
    //     return $this->belongsTo(PprCondition::class, 'ppr_condition_id', 'id');
    // }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprScoringAtrFixedIncomeFactory::new();
    }
}
