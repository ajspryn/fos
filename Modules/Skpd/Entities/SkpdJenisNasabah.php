<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkpdJenisNasabah extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(SkpdPembiayaan::class);
    }
    protected static function newFactory()
    {
        return \Modules\Skpd\Database\factories\SkpdJenisNasabahFactory::new();
    }
}
