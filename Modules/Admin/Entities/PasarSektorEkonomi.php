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
        return $this->hasMany(PasarPembiayaan::class,UmkmPembiayaan::class);
    }

}
