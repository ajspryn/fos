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
        // Keep legacy relation name for compatibility with existing views/controllers.
        return $this->pasarPembiayaans();
    }

    public function pasarPembiayaans()
    {
        return $this->hasMany(PasarPembiayaan::class, 'akad_id', 'id');
    }

    public function umkmPembiayaans()
    {
        return $this->hasMany(UmkmPembiayaan::class, 'akad_id', 'id');
    }
}
