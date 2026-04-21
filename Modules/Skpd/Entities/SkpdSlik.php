<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkpdSlik extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'created_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(SkpdPembiayaan::class, 'skpd_pembiayaan_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Skpd\Database\factories\SkpdSlikFactory::new();
    }
}
