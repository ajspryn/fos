<?php

namespace Modules\P3k\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class P3kSlik extends Model
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
        return $this->belongsTo(P3kPembiayaan::class, 'p3k_pembiayaan_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\P3k\Database\factories\P3kSlikFactory::new();
    }
}
