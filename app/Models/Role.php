<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function keterangan_jabatan()
    {
        return $this->belongsTo(keterangan_jabatan::class, 'jabatan_id', 'id');
    }
    protected $guarded = [
        'created_at'
    ];
}
