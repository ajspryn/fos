<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasarFoto extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];
}
