<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarStatusPerkawinan;
use Modules\Admin\Entities\PasarTanggungan;
use Modules\Pasar\Entities\PasarPembiayaan;

class PasarNasabahh extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function pembiayaan()
    {
        return $this->hasMany(PasarPembiayaan::class);
    }

    public function status()
    {
        return $this->belongsTo(PasarStatusPerkawinan::class,'status_id', 'id');
    }

    public function tanggungan()
    {
        return $this->belongsTo(PasarTanggungan::class,'jumlah_anak', 'id');
    }

}
