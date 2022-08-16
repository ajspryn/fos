<?php

namespace Modules\Blr\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlrJenisAktivaProduktif extends Model
{
    use HasFactory;

    protected $guarded = [
        '$id'
    ];

    public function blr()
    {
        return $this->belongsTo(Blr::class, 'blr_id', 'id');
    }

    public function nilai_aktiva_produktif()
    {
        return $this->hasMany(BlrAktivaProduktif::class);
    }

    protected static function newFactory()
    {
        return \Modules\Blr\Database\factories\BlrJenisAktivaProduktifFactory::new();
    }
}
