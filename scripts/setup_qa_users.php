<?php

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

$segments = [
     ['email' => 'qa.skpd@local.test', 'divisi' => 1, 'name' => 'QA SKPD AO'],
     ['email' => 'qa.umkm@local.test', 'divisi' => 3, 'name' => 'QA UMKM AO'],
     ['email' => 'qa.pasar@local.test', 'divisi' => 2, 'name' => 'QA Pasar AO'],
     ['email' => 'qa.ppr@local.test', 'divisi' => 4, 'name' => 'QA PPR AO'],
     ['email' => 'qa.p3k@local.test', 'divisi' => 6, 'name' => 'QA P3K AO'],
     ['email' => 'qa.ultra@local.test', 'divisi' => 7, 'name' => 'QA UM AO'],
];

foreach ($segments as $s) {
     $u = User::where('email', $s['email'])->first();
     if (!$u) {
          $u = new User;
          $u->name = $s['name'];
          $u->email = $s['email'];
          $u->email_verified_at = now();
     }
     $u->password = Hash::make('audit2024');
     $u->save();

     // Upsert role
     $r = DB::table('roles')->where('user_id', $u->id)->first();
     if (!$r) {
          DB::table('roles')->insert(['user_id' => $u->id, 'role_id' => 2, 'divisi_id' => $s['divisi'], 'jabatan_id' => 1, 'created_at' => now(), 'updated_at' => now()]);
     } else {
          DB::table('roles')->where('user_id', $u->id)->update(['role_id' => 2, 'divisi_id' => $s['divisi'], 'jabatan_id' => 1]);
     }

     // Upsert keterangan_jabatans
     $kj = DB::table('keterangan_jabatans')->where('id', $u->id)->first();
     if (!$kj) {
          DB::table('keterangan_jabatans')->insert(['id' => $u->id, 'jabatan_id' => 1, 'keterangan' => $s['name'], 'created_at' => now(), 'updated_at' => now()]);
     }

     echo $s['email'] . ' (id=' . $u->id . ') ready' . PHP_EOL;
}
echo 'All done' . PHP_EOL;
