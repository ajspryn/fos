<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkpdPembiayaanHistory extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function nasabah()
    {
        return $this->belongsTo(SkpdNasabah::class);
    }

    protected static function newFactory()
    {
        return \Modules\Skpd\Database\factories\SkpdPembiayaanHistoryFactory::new();
    }
}
