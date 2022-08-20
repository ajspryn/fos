<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarJenisJaminan;

class PasarJaminan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];
    
    public function jaminan()
    {
        return $this->belongsTo(PasarJenisJaminan::class,'jaminan_id', 'id');
    }

    public function jaminanlain()
    {
        return $this->belongsTo(PasarJenisJaminan::class,'jaminanlain', 'id');
    }

}
