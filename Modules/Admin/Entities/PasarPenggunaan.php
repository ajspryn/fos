<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasarPenggunaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];
}
