<?php

namespace Modules\Umkm\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Umkm\Entities\UmkmJaminan;
use Modules\Umkm\Entities\UmkmJaminanLain;
use Modules\Umkm\Entities\UmkmNasabah;
use Modules\Umkm\Entities\UmkmKeteranganUsaha;
use Modules\Umkm\Entities\UmkmLegalitasRumah;

class UmkmPembiayaan extends Model
{
    protected $guarded = [
        'created_at'
    ];

    public function nasabahh()
    {
        return $this->belongsTo(UmkmNasabah::class,'nasabah_id', 'id');
    }

    public function keteranganusaha()
    {
        return $this->belongsTo(UmkmKeteranganUsaha::class,'umkm_usaha_id', 'umkm_pembiayaan_id');
    }
    
    public function rumah()
    {
        return $this->belongsTo(UmkmLegalitasRumah::class,'umkm_legalitas_rumah_id', 'umkm_pembiayaan_id');
    }

    public function jaminanpasar()
    {
        return $this->belongsTo(UmkmJaminan::class,'jaminan_id', 'umkm_pembiayaan_id');
    }

    public function jaminanlain()
    {
        return $this->belongsTo(UmkmJaminanLain::class,'jaminanlain_id', 'umkm_pembiayaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'AO_id','id');
    }

    public function akad()
    {
        return $this->belongsTo(PasarAkad::class,'akad_id', 'id');
    }

    public function sektor()
    {
        return $this->belongsTo(PasarSektorEkonomi::class,'sektor_id', 'id');
    }

    public function cash()
    {
        return $this->belongsTo(PasarCashPick::class,'cash', 'id');
    }
    public function slik()
    {
        return $this->belongsTo(UmkmSlik::class,'slik_id', 'umkm_pembiayaan_id');
    }
    public function history()
    {
        return $this->hasMany(UmkmPembiayaanHistory::class);
    }

    public function jenisnasabah()
    {
        return $this->belongsTo(PasarJenisNasabah::class,'nasabah', 'id');
    }
}

