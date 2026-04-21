<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarJaminanLain;

class PasarJenisNasabah extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function jenisnasabah()
    {
        return $this->hasMany(PasarJaminanLain::class);
    }
}
