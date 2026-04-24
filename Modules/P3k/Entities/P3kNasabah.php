<?php

namespace Modules\P3k\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P3kNasabah extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(P3kPembiayaan::class);
    }

    public function orangTerdekat()
    {
        return $this->belongsTo(P3kOrangTerdekat::class, 'id', 'p3k_nasabah_id');
    }

    public function pekerjaan()
    {
        return $this->hasOne(P3kPekerjaan::class, 'p3k_nasabah_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\P3k\Database\factories\P3kNasabahFactory::new();
    }
}
