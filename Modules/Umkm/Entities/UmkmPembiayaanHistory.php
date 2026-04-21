<?php

namespace Modules\Umkm\Entities;

use App\Models\keterangan_jabatan;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Umkm\Entities\UmkmPembiayaan;

class UmkmPembiayaanHistory extends Model
{
    protected $guarded = [
        'created_at'
    ];
    public function history()
    {
        return $this->belongsTo(UmkmPembiayaan::class,'umkm_pembiayaan_id', 'id');
    }
    public function statushistory()
    {
        return $this->belongsTo(Status::class,'status_id', 'id');
    }

      public function jabatan()
    {
        return $this->belongsTo(keterangan_jabatan::class,'jabatan_id','jabatan_id');
    }
}
