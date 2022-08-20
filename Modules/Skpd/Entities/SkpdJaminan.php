<?php

namespace Modules\Skpd\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\SkpdJenisJaminan;

class SkpdJaminan extends Model
{
    use HasFactory;

    protected $guarded = [
        'created_at'
    ];

    public function jenis_jaminan()
    {
        return $this->belongsTo(SkpdJenisJaminan::class, 'skpd_jenis_jaminan_id', 'id');
    }


}
