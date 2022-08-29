<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;

class PprConditionNonFixed extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    public function scoreAtr()
    {
        return $this->belongsTo(PprScoringAtrNonFixedIncome::class, 'ppr_scoring_atr_non_fixed_income_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprConditionNonFixedFactory::new();
    }
}
