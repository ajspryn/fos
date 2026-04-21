<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarPembiayaan;
use Modules\Umkm\Entities\UmkmPembiayaan;

class PasarCashPick extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function cash()
    {
        // Keep legacy relation name for compatibility with existing views/controllers.
        return $this->pasarPembiayaans();
    }

    public function pasarPembiayaans()
    {
        return $this->hasMany(PasarPembiayaan::class, 'cashpickup', 'id');
    }

    public function umkmPembiayaans()
    {
        return $this->hasMany(UmkmPembiayaan::class, 'cash', 'id');
    }
}
