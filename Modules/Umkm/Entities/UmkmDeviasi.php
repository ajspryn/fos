<?php

namespace Modules\Umkm\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UmkmDeviasi extends Model
{
    use HasFactory;

    protected $guarded = ['created_at'];
    
    protected static function newFactory()
    {
        return \Modules\Umkm\Database\factories\UmkmDeviasiFactory::new();
    }
}
