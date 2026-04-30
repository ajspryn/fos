<?php

use Illuminate\Support\Facades\DB;
use Modules\Skpd\Entities\SkpdPembiayaan;
use Modules\Skpd\Entities\SkpdFoto;



// Create pembiayaan
$p = new SkpdPembiayaan();
$p->user_id = 62; // QA SKPD AO created earlier
$p->nominal_pembiayaan = 10000000;
$p->tenor = 12;
$p->rate = 1.5;
$p->tanggal_pengajuan = date('Y-m-d');
$p->save();

$id = $p->id;

// Create nasabah with same id if not exists
$exists = DB::table('skpd_nasabahs')->where('id', $id)->first();
if (!$exists) {
     DB::table('skpd_nasabahs')->insert([
          'id' => $id,
          'nama_nasabah' => 'Test Nasabah IDEB',
          'no_ktp' => '1234567890123456',
          'tgl_lahir' => '1990-01-01',
          'created_at' => now(),
          'updated_at' => now(),
     ]);
}

// Insert foto IDEB
SkpdFoto::create([
     'skpd_pembiayaan_id' => $id,
     'kategori' => 'IDEB',
     'foto' => 'foto-skpd-pembiayaan/test_ideb.pdf',
]);

echo "Created test SKPD submission with id={$id}\n";
