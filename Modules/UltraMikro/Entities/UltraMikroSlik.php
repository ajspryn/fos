<?php

namespace Modules\UltraMikro\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class UltraMikroSlik extends Model
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
        return $this->belongsTo(UltraMikroPembiayaan::class, 'ultra_mikro_pembiayaan_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\UltraMikro\Database\factories\UltraMikroSlikFactory::new();
    }
}
