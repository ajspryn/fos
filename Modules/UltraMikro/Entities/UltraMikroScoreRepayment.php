<?php

namespace Modules\UltraMikro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UltraMikroScoreRepayment extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    protected static function newFactory()
    {
        return \Modules\UltraMikro\Database\factories\UltraMikroScoreRepaymentFactory::new();
    }
}
