<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkpdDeviasi extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function deviasi()
    {
        return $this->hasMany(SkpdPembiayaan::class);
    }
}
