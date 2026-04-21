<?php

namespace Modules\P3k\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P3kOrangTerdekat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function nasabah()
    {
        return $this->belongsTo(P3kNasabah::class, 'p3k_nasabah_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\P3k\Database\factories\P3kOrangTerdekatFactory::new();
    }
}
