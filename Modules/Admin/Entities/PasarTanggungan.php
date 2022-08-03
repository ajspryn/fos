<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Umkm\Entities\UmkmNasabah;

class PasarTanggungan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function tanggungan()
    {
        return $this->hasMany(PasarNasabahh::class,UmkmNasabah::class);
    }
}
