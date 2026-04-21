<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaan;

class PasarSektorEkonomi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function sektor()
    {
        // Keep legacy relation name for compatibility with existing views/controllers.
        return $this->pasarPembiayaans();
    }

    public function pasarPembiayaans()
    {
        return $this->hasMany(PasarPembiayaan::class, 'sektor_id', 'id');
    }

    public function umkmPembiayaans()
    {
        return $this->hasMany(UmkmPembiayaan::class, 'sektor_id', 'id');
    }
}
