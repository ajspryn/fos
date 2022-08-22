<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;

class PprClDokumen extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    public function clPersyaratan()
    {
        return $this->belongsTo(PprClPersyaratan::class, 'ppr_cl_persyaratan_id', 'id');
    }

    public function dokFixedIncome()
    {
        return $this->belongsTo(PprClDokumenFixedIncome::class, 'ppr_cl_dokumen_fixed_income_id', 'id');
    }

    public function dokNonFixedIncome()
    {
        return $this->belongsTo(PprClDokumenNonFixedIncome::class, 'ppr_cl_dokumen_non_fixed_income_id', 'id');
    }

    public function dokAgunan()
    {
        return $this->belongsTo(PprClDokumenAgunan::class, 'ppr_cl_dokumen_agunan_id', 'id');
    }

    public function AtrFixedIncome()
    {
        return $this->belongsTo(PprAbilityToRepayFixedIncome::class, 'ppr_ability_to_repay_fixed_income_id', 'id');
    }

    public function AtrNonFixedIncome()
    {
        return $this->belongsTo(PprAbilityToRepayNonFixedIncome::class, 'ppr_ability_to_repay_fixed_income_id', 'id');
    }

    public function pemberkasanMemo()
    {
        return $this->belongsTo(PprPemberkasanMemo::class, 'ppr_pemberkasan_memo_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprClDokumenFactory::new();
    }
}
