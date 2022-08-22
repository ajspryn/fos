<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprCharacter extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function scoreWtr()
    {
        return $this->belongsTo(PprScoringWtrFixedIncome::class, 'ppr_scoring_wtr_fixed_income_id', 'id');
    }


    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\CharacterFactory::new();
    }
}
