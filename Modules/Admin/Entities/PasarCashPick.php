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
        return $this->hasMany(PasarPembiayaan::class,UmkmPembiayaan::class);
    }
    
}
