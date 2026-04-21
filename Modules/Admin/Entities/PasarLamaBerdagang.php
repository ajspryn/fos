<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;

class PasarLamaBerdagang extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];
    public function lamadagang()
    {
        return $this->hasMany(PasarKeteranganUsaha::class, UmkmKeteranganUsaha::class);
    }
}
