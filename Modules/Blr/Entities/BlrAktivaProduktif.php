<?php

namespace Modules\Blr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlrAktivaProduktif extends Model
{
    use HasFactory;

    protected $guarded = [
        '$id'
    ];

    public function blr()
    {
        return $this->belongsTo(Blr::class, 'blr_id', 'id');
    }

    public function jenis_aktiva_produktif()
    {
        return $this->belongsTo(BlrJenisAktivaProduktif::class, 'blr_jenis_aktiva_produktif_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Blr\Database\factories\BlrAktivaProduktifFactory::new();
    }
}
