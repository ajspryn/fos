<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Admin\Entities\SkpdStatusPerkawinan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\SkpdTanggungan;

class SkpdNasabah extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(SkpdPembiayaan::class);
    }

    public function status_perkawinan()
    {
        return $this->belongsTo(SkpdStatusPerkawinan::class,'skpd_status_perkawinan_id', 'id');
    }

    public function tanggungan()
    {
        return $this->belongsTo(SkpdTanggungan::class,'skpd_tanggungan_id', 'id');
    }

    public function orang_terdekat()
    {
        return $this->belongsTo(SkpdOrangTerdekat::class, 'id', 'skpd_nasabah_id');
    }

    
}
