<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class keterangan_jabatan extends Model
{
    use HasFactory;

     public function jabatan()
    {
        return $this->hasMany(PasarPembiayaanHistory::class, SkpdPembiayaanHistory::class,UmkmPembiayaanHistory::class );
    }
}
