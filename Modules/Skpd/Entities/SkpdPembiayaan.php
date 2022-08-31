<?php

namespace Modules\Skpd\Entities;

use App\Models\User;
use Modules\Skpd\Entities\SkpdNasabah;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\SkpdGolongan;
use Modules\Admin\Entities\SkpdInstansi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Admin\Entities\SkpdJenisPenggunaan;
use Modules\Admin\Entities\SkpdSektorEkonomi;
use Modules\Admin\Entities\SkpdStatusPerkawinan;

class SkpdPembiayaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function nasabah()
    {
        return $this->belongsTo(SkpdNasabah::class, 'skpd_nasabah_id', 'id');
    }

    public function instansi()
    {
        return $this->belongsTo(SkpdInstansi::class, 'skpd_instansi_id', 'id');
    }

    public function golongan()
    {
        return $this->belongsTo(SkpdGolongan::class, 'skpd_golongan_id', 'id');
    }

    public function jenis_penggunaan()
    {
        return $this->belongsTo(SkpdJenisPenggunaan::class, 'skpd_jenis_penggunaan_id', 'id');
    }

    public function status_perkawinan()
    {
        return $this->belongsTo(SkpdStatusPerkawinan::class, 'skpd_status_perkawinan_id', 'id');
    }

    public function sektor()
    {
        return $this->belongsTo(SkpdSektorEkonomi::class, 'skpd_sektor_ekonomi_id', 'id');
    }

    public function akad()
    {
        return $this->belongsTo(SkpdAkad::class, 'skpd_akad_id', 'id');
    }

    public function jaminan()
    {
        return $this->belongsTo(SkpdJaminan::class, 'id', 'skpd_pembiayaan_id');
    }
    public function deviasi()
    {
        return $this->belongsTo(SkpdDeviasi::class, 'id', 'skpd_pembiayaan_id');
    }

    public function foto()
    {
        return $this->belongsTo(SkpdFoto::class, 'id', 'skpd_pembiayaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
