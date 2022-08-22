<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprCapacity extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function scoreAtr()
    {
        return $this->belongsTo(PprScoringAtrFixedIncome::class, 'ppr_scoring_atr_fixed_income_id', 'id');
    }


    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\CapacityFactory::new();
    }
}
