<?php

namespace Modules\Blr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlrTotalAktivaProduktif extends Model
{
    use HasFactory;

    protected $guarded = [
        '$id'
    ];

    public function aktiva_produktif()
    {
        return $this->belongsTo(BlrAktivaProduktif::class, 'aktiva_produktif_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Blr\Database\factories\BlrTotalAktivaProduktifFactory::new();
    }
}
