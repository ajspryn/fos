<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pasar\Entities\PasarKeteranganUsaha;

class PasarJenisDagang extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];
    public function dagang()
    {
        return $this->hasMany(PasarKeteranganUsaha::class);
    }
}
