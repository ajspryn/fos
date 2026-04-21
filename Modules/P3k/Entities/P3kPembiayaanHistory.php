<?php

namespace Modules\P3k\Entities;

use App\Models\keterangan_jabatan;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class P3kPembiayaanHistory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function p3kPembiayaan()
    {
        return $this->belongsTo(P3kPembiayaan::class, 'p3k_pembiayaan_id');
    }

    public function nasabah()
    {
        return $this->belongsTo(P3kNasabah::class);
    }

    public function statushistory()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(keterangan_jabatan::class, 'jabatan_id', 'jabatan_id');
    }

    protected static function newFactory()
    {
        return \Modules\P3k\Database\factories\P3kPembiayaanHistoryFactory::new();
    }
}
