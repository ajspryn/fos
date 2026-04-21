<?php

namespace Modules\Akad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class AkadAsuransi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    protected static function newFactory()
    {
        return \Modules\Akad\Database\factories\AkadAsuransiFactory::new();
    }
}
