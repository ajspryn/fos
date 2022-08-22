<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprClDokumenNonFixedIncome extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function dokumen()
    {
        return $this->belongsTo(PprClDokumen::class, 'ppr_cl_dokumen_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprClDokumenNonFixedIncomeFactory::new();
    }
}
