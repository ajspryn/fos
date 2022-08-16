<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Admin\Entities\PasarJaminanRumahh;

class PasarLegalitasRumah extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(PasarPembiayaan::class);
    }
    public function legalitas()
    {
        return $this->belongsTo(PasarJaminanRumahh::class,'legalitas_kepemilikan_rumah', 'id');
    }
}
