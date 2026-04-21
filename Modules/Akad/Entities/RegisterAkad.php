<?php

namespace Modules\Akad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisterAkad extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'created_at'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function jaminan()
    {
        return $this->belongsTo(AkadJaminan::class, 'id_jaminan', 'id');
    }

    public function asuransi()
    {
        return $this->belongsTo(AkadAsuransi::class, 'id_asuransi', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\Akad\Database\factories\RegisterAkadFactory::new();
    }
}
