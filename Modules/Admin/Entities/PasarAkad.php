<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaan;

class PasarAkad extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function akad()
    {
        return $this->hasMany(PasarPembiayaan::class,UmkmPembiayaan::class);
    }

    
}
