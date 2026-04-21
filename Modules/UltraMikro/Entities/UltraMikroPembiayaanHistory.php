<?php

namespace Modules\UltraMikro\Entities;

use App\Models\keterangan_jabatan;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UltraMikroPembiayaanHistory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function nasabah()
    {
        return $this->belongsTo(UltraMikroNasabah::class);
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
        return \Modules\UltraMikro\Database\factories\UltraMikroPembiayaanHistoryFactory::new();
    }
}
