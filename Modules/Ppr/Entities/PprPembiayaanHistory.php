<?php

namespace Modules\Ppr\Entities;

use App\Models\keterangan_jabatan;
use App\Models\KeteranganJabatan;
use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Form\Entities\FormPprPembiayaan;

class PprPembiayaanHistory extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pembiayaan()
    {
        return $this->belongsTo(FormPprPembiayaan::class, 'form_ppr_pembiayaan_id', 'id');
    }

    public function statusHistory()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(keterangan_jabatan::class, 'jabatan_id', 'jabatan_id');
    }


    protected static function newFactory()
    {
        return \Modules\Ppr\Database\factories\PprPembiayaanHistoryFactory::new();
    }
}
