<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PasarJaminanLain extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];
    
    public function jaminanlain()
    {
        return $this->belongsTo(PasarJenisJaminan::class,'jaminanlain', 'id');
    }

    public function jaminanpasarlain()
    {
        return $this->hasMany(PasarJaminanLain::class);
    }
}
