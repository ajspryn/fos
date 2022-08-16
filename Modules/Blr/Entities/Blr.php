<?php

namespace Modules\Blr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blr extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function aktiva_produktif()
    {
        return $this->belongsTo(BlrAktivaProduktif::class, 'blr_aktiva_produktif_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Blr\Database\factories\BlrFactory::new();
    }
}
