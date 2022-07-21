<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class connection extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Skpd\Database\factories\ConnectionFactory::new();
    }
}
