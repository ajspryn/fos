<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarJaminan;
use Modules\Pasar\Entities\PasarJaminanLain;

class PasarJenisJaminan extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function jaminanlain()
    {
        return $this->hasMany(PasarJaminanLain::class);
    }
}

