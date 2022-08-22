<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprDataPribadi;

class FormPprDataPekerjaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pemohon()
    {
        return $this->belongsTo(FormPprDataPribadi::class, 'form_ppr_data_pribadi_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormPprDataPekerjaanFactory::new();
    }
}
