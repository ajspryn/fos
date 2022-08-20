<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PasarSlik extends Model
{
    protected $guarded = [
        'created_at'
    ];

    public function slik()
    {
        return $this->hasMany(PasarPembiayaan::class);
    }
}
