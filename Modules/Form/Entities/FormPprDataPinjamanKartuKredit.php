<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormPprDataPinjamanKartuKredit extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'created_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormPprDataPinjamanKartuKreditFactory::new();
    }
}
