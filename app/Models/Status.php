<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Pasar\Entities\PasarPembiayaanHistory;
use Modules\Umkm\Entities\UmkmPembiayaanHistory;

class Status extends Model
{
    use HasFactory;

    public function statushistory()
    {
        return $this->hasMany(PasarPembiayaanHistory::class,UmkmPembiayaanHistory::class);
    }

   


}
