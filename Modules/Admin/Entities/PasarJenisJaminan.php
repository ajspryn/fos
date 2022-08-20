<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarJaminan;

class PasarJenisJaminan extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function jaminan()
    {
        return $this->hasMany(PasarJaminan::class);
    }
}

