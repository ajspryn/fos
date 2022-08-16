<?php

namespace Modules\Blr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlrOverhead extends Model
{
    use HasFactory;

    protected $guarded = [
        '$id'
    ];

    public function blr()
    {
        return $this->belongsTo(Blr::class, 'blr_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Blr\Database\factories\BlrOverheadFactory::new();
    }
}
