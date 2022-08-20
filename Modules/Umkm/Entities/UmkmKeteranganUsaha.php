<?php

namespace Modules\Umkm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Umkm\Entities\UmkmPembiayaan;

class UmkmKeteranganUsaha extends Model
{
    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(UmkmPembiayaan::class);
    }

    public function suku()
    {
        return $this->belongsTo(PasarSukuBangsa::class,'suku_bangsa_id', 'id');
    }


    public function dagang()
    {
        return $this->belongsTo(PasarJenisDagang::class,'jenisdagang_id', 'id');
    }

    public function lamadagang()
    {
        return $this->belongsTo(PasarLamaBerdagang::class,'lama_usaha', 'id');
    }

}
