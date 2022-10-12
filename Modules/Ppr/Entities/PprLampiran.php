<?php

namespace Modules\Ppr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Form\Entities\FormPprPembiayaan;

class PprLampiran extends Model
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
        return \Modules\Ppr\Database\factories\PprLampiranFactory::new();
    }
}
