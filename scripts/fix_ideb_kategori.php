<?php
// Script untuk memperbaiki kategori IDEB yang salah di tabel skpd_fotos
// Jalankan: php scripts/fix_ideb_kategori.php

use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';

// Setup DB jika perlu (jika pakai Laravel artisan, bisa diabaikan)

// Update kategori yang salah menjadi 'IDEB'
$affected = DB::table('skpd_fotos')
     ->whereIn('kategori', ['ideb', 'ideb pemohon', 'IDEB PEMOHON', 'IDEB PEMOHON', 'ideb pemohon', 'ideb_pemohon'])
     ->update(['kategori' => 'IDEB']);

echo "Kategori IDEB yang diperbaiki: $affected baris\n";

// Tambahan: update juga untuk pasangan jika ada variasi penamaan
$affectedPasangan = DB::table('skpd_fotos')
     ->whereIn('kategori', ['ideb pasangan', 'IDEB PASANGAN', 'ideb_pasangan'])
     ->update(['kategori' => 'IDEB Pasangan']);

echo "Kategori IDEB Pasangan yang diperbaiki: $affectedPasangan baris\n";
