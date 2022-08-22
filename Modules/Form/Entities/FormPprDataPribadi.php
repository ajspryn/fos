<?php

namespace Modules\Form\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;

class FormPprDataPribadi extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(FormPprPembiayaan::class);
    }

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\FormPprDataPribadiFactory::new();
    }
}
