<?php

namespace Modules\P3k\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kPembiayaan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function nasabah()
    {
        return $this->belongsTo(P3kNasabah::class, 'p3k_nasabah_id', 'id');
    }

    public function pekerjaan()
    {
        return $this->hasOneThrough(P3kPekerjaan::class, P3kNasabah::class); // Adjust if needed
    }

    public function foto()
    {
        return $this->belongsTo(P3kFoto::class, 'id', 'p3k_pembiayaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function histories()
    {
        return $this->hasMany(P3kPembiayaanHistory::class, 'p3k_pembiayaan_id');
    }

    public function latestHistory()
    {
        return $this->hasOne(P3kPembiayaanHistory::class, 'p3k_pembiayaan_id')->latestOfMany();
    }

    public function catatanKomite()
    {
        return $this->hasMany(P3kPembiayaanHistory::class, 'p3k_pembiayaan_id')
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
        return \Modules\P3k\Database\factories\P3kPembiayaanFactory::new();
    }
}
