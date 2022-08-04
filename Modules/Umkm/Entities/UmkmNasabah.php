<?php

namespace Modules\Umkm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Umkm\Entities\UmkmPembiayaan;
use Modules\Admin\Entities\PasarStatusPerkawinan;
use Modules\Admin\Entities\PasarTanggungan;


class UmkmNasabah extends Model
{
    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(UmkmPembiayaan::class);
    }

    public function status()
    {
        return $this->belongsTo(PasarStatusPerkawinan::class,'status_id', 'id');
    }

    public function tanggungan()
    {
        return $this->belongsTo(PasarTanggungan::class,'jumlah_anak', 'id');
    }
}
