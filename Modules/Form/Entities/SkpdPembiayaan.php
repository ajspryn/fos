<?php

namespace Modules\Form\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\SkpdAkad;
use Modules\Admin\Entities\SkpdGolongan;
use Modules\Admin\Entities\SkpdInstansi;
use Modules\Admin\Entities\SkpdJenisPenggunaan;
use Modules\Admin\Entities\SkpdSektorEkonomi;
use Modules\Admin\Entities\SkpdStatusPerkawinan;
use Modules\Admin\Entities\SkpdTanggungan;
use Modules\Skpd\Entities\SkpdDeviasi;
use Modules\Skpd\Entities\SkpdFoto;
use Modules\Skpd\Entities\SkpdJaminan;
use Modules\Skpd\Entities\SkpdJaminanLainnya;
use Modules\Skpd\Entities\SkpdJenisNasabah;
use Modules\Skpd\Entities\SkpdNasabah;

class SkpdPembiayaan extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function nasabah()
    {
        return $this->belongsTo(SkpdNasabah::class, 'skpd_nasabah_id', 'id');
    }

    public function jenis_nasabah()
    {
        return $this->belongsTo(SkpdJenisNasabah::class, 'skpd_jenis_nasabah_id', 'id');
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

    public function sektor()
    {
        return $this->belongsTo(SkpdSektorEkonomi::class, 'skpd_sektor_ekonomi_id', 'id');
    }

    public function akad()
    {
        return $this->belongsTo(SkpdAkad::class, 'skpd_akad_id', 'id');
    }

    public function status_perkawinan()
    {
        return $this->belongsTo(SkpdStatusPerkawinan::class, 'skpd_status_perkawinan_id', 'id');
    }

    public function tanggungan()
    {
        return $this->belongsTo(SkpdTanggungan::class, 'skpd_tanggungan_id', 'id');
    }

    public function jaminan()
    {
        return $this->belongsTo(SkpdJaminan::class, 'id', 'skpd_pembiayaan_id');
    }

    public function jaminan_lainnya()
    {
        return $this->belongsTo(SkpdJaminanLainnya::class, 'id', 'skpd_pembiayaan_id');
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

    protected static function newFactory()
    {
        return \Modules\Form\Database\factories\SkpdPembiayaanFactory::new();
    }
}
