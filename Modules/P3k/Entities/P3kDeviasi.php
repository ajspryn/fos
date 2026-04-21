<?php

namespace Modules\P3k\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P3kDeviasi extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    protected static function newFactory()
    {
        return \Modules\P3k\Database\factories\P3kDeviasiFactory::new();
    }
}
