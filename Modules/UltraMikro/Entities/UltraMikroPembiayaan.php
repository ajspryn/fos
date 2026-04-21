<?php

namespace Modules\UltraMikro\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UltraMikroPembiayaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function nasabah()
    {
        return $this->belongsTo(UltraMikroNasabah::class, 'ultra_mikro_nasabah_id', 'id');
    }

    public function petugasLapangan()
    {
        return $this->belongsTo(UltraMikroPetugasLapangan::class, 'petugas_lapangan_id', 'id');
    }

    public function foto()
    {
        return $this->belongsTo(UltraMikroFoto::class, 'id', 'ultra_mikro_pembiayaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function latestHistory()
    {
        return $this->hasOne(UltraMikroPembiayaanHistory::class, 'ultra_mikro_pembiayaan_id')->latestOfMany();
    }

    public function histories()
    {
        return $this->hasMany(UltraMikroPembiayaanHistory::class, 'ultra_mikro_pembiayaan_id');
    }

    public function catatanKomite()
    {
        return $this->hasMany(UltraMikroPembiayaanHistory::class, 'ultra_mikro_pembiayaan_id')
            ->whereIn('jabatan_id', [2, 3])
            ->where(function ($q) {
                $q->where(function ($q2) {
                    $q2->where('jabatan_id', 3)->where('status_id', 11);
                })->orWhere(function ($q2) {
                    $q2->where('jabatan_id', 2)->where('status_id', 5);
                });
            })
            ->orderBy('created_at', 'asc');
    }

    protected static function newFactory()
    {
        return \Modules\UltraMikro\Database\factories\UltraMikroPembiayaanFactory::new();
    }
}
