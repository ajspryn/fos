<?php

namespace Modules\Umkm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarJaminanRumahh;
use Modules\Umkm\Entities\UmkmPembiayaan;

class UmkmLegalitasRumah extends Model
{
    protected $guarded = [
        'created_at'
    ];
    public function pembiayaan()
    {
        return $this->hasMany(UmkmPembiayaan::class);
    }

    public function legalitasrumah()
    {
        return $this->belongsTo(PasarJaminanRumahh::class,'legalitas_kepemilikan_rumah', 'id');
    }
}
