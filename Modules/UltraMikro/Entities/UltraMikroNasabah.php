<?php

namespace Modules\UltraMikro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UltraMikroNasabah extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(UltraMikroPembiayaan::class);
    }

    protected static function newFactory()
    {
        return \Modules\UltraMikro\Database\factories\UltraMikroNasabahFactory::new();
    }
}
