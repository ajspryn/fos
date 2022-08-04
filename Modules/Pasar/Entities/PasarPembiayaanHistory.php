<?php

namespace Modules\Pasar\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Status;
use Modules\Pasar\Entities\PasarPembiayaan;

class PasarPembiayaanHistory extends Model
{
    protected $guarded = [
        'created_at'
    ];

    public function history()
    {
        return $this->belongsTo(PasarPembiayaan::class,'pasar_pembiayaan_id', 'id');
    }

    public function statushistory()
    {
        return $this->belongsTo(Status::class,'status_id', 'id');
    }
}
