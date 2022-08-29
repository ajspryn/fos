<?php

namespace Modules\Pasar\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\PasarAkad;
use Modules\Admin\Entities\PasarCashPick;
use Modules\Admin\Entities\PasarJenisNasabah;
use Modules\Admin\Entities\PasarSektorEkonomi;
use Modules\Pasar\Entities\PasarNasabahh;
use Modules\Pasar\Entities\PasarKeteranganUsaha;
use Modules\Pasar\Entities\PasarLegalitasRumah;


class PasarPembiayaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function nasabahh()
    {
        return $this->belongsTo(PasarNasabahh::class,'nasabah_id', 'id');
    }

    public function keteranganusaha()
    {
        return $this->belongsTo(PasarKeteranganUsaha::class,'pasar_keterangan_usaha_id', 'pasar_pembiayaan_id');
    }
    
    public function rumah()
    {
        return $this->belongsTo(PasarLegalitasRumah::class,'pasar_legalitas_rumah_id', 'pasar_pembiayaan_id');
    }

    public function jaminanpasar()
    {
        return $this->belongsTo(PasarJaminan::class,'jaminan_id', 'pasar_pembiayaan_id');
    }

    public function jaminanpasarlain()
    {
        return $this->belongsTo(PasarJaminanLain::class,'jaminanlain_id', 'pasar_pembiayaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'AO_id', 'id');
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
        return $this->belongsTo(PasarCashPick::class,'cashpickup', 'id');
    }

    public function jenisnasabah()
    {
        return $this->belongsTo(PasarJenisNasabah::class,'nasabah', 'id');
    }

    public function slik()
    {
        return $this->belongsTo(PasarSlik::class,'slik_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(PasarPembiayaanHistory::class);
    }
}
