<?php

namespace Modules\Umkm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Umkm\Entities\UmkmPembiayaan;

class UmkmJaminanLain extends Model
{
    protected $guarded = [
        'created_at'
    ];
    public function pembiayaan()
    {
        return $this->hasMany(UmkmPembiayaan::class);
    }
}
