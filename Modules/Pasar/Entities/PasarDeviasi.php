<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasarDeviasi extends Model
{
    use HasFactory;

    protected $guarded = ['created_at'];
    
    protected static function newFactory()
    {
        return \Modules\Pasar\Database\factories\PasarDeviasiFactory::new();
    }
}
