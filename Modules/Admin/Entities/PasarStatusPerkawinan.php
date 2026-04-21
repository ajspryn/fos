<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Umkm\Entities\UmkmNasabah;


class PasarStatusPerkawinan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function status()
    {
        return $this->hasMany(PasarNasabahh::class,UmkmNasabah::class);
    }
}
