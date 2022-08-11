<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Status;
use App\Models\keterangan_jabatan;

class SkpdPembiayaanHistory extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function nasabah()
    {
        return $this->belongsTo(SkpdNasabah::class);
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
