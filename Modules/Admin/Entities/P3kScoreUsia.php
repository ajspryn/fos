<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P3kScoreUsia extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\P3kScoreUsiaFactory::new();
    }
}
