<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormPprDataPenghasilanPengeluaran extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    // public function pembiayaan()
    // {
    //     return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    // }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormPprDataPenghasilanPengeluaranFactory::new();
    }
}
