<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PprCapacityPengalamanKerja extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\PprCapacityPengalamanKerjaFactory::new();
    }
}
