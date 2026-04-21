<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Modules\Form\Entities\FormPprPembiayaan;

class PprClPersyaratan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    public function dokumen()
    {
        return $this->belongsTo(PprClDokumen::class, 'ppr_cl_dokumen_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprClPersyaratanFactory::new();
    }
}
