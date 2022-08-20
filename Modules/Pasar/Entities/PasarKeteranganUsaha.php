<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarJenisDagang;
use Modules\Admin\Entities\PasarJenisPasar;
use Modules\Admin\Entities\PasarLamaBerdagang;
use Modules\Admin\Entities\PasarSukuBangsa;
use Modules\Pasar\Entities\PasarPembiayaan;

class PasarKeteranganUsaha extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];
    public function keteranganusaha()
    {
        return $this->hasMany(PasarPembiayaan::class);
    }

    public function suku()
    {
        return $this->belongsTo(PasarSukuBangsa::class,'suku_bangsa_id', 'id');
    }

    public function jenispasar()
    {
        return $this->belongsTo(PasarJenisPasar::class,'jenispasar_id', 'id');
    }

    public function dagang()
    {
        return $this->belongsTo(PasarJenisDagang::class,'jenisdagang_id', 'id');
    }

    public function lamadagang()
    {
        return $this->belongsTo(PasarLamaBerdagang::class,'lama_usaha', 'id');
    }

}
