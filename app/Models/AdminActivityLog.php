<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivityLog extends Model
{
     protected $fillable = ['user_id', 'action', 'module', 'description', 'ip_address'];

     public function user()
     {
          return $this->belongsTo(User::class);
     }

     /**
      * Helper static untuk mencatat log aktivitas.
      */
     public static function log(string $action, ?string $module = null, ?string $description = null): void
     {
          static::create([
               'user_id'     => auth()->id(),
               'action'      => $action,
               'module'      => $module,
               'description' => $description,
               'ip_address'  => request()->ip(),
          ]);
     }
}
