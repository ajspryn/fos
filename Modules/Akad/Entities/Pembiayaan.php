<?php

namespace Modules\Akad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembiayaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'created_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected static function newFactory()
    {
        return \Modules\Akad\Database\factories\PembiayaanFactory::new();
    }
}
