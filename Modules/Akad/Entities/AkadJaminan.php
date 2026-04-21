<?php

namespace Modules\Akad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AkadJaminan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function penjamin()
    {
        return $this->belongsTo(AkadPenjamin::class, 'id', 'id_penjamin');
    }

    protected static function newFactory()
    {
        return \Modules\Akad\Database\factories\AkadJaminanFactory::new();
    }
}
