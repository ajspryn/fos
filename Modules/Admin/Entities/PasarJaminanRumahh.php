<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarLegalitasRumah;
use Modules\Umkm\Entities\UmkmLegalitasRumah;

class PasarJaminanRumahh extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function legalitas()
    {
        return $this->hasMany(PasarLegalitasRumah::class);
    }

}
