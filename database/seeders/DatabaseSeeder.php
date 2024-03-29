<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Users
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'Admin@bprsbtb.com',
            'password' => bcrypt('admin123'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Sandi M Ilham',
            'email' => 'Sandi.ilham@bprsbtb.com',
            'password' => bcrypt('sandibtb25'),
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Zainal',
            'email' => 'Zainal@bprsbtb.com',
            'password' => bcrypt('zainal123'),
        ]);

        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Gunanto',
            'email' => 'Gunanto@bprsbtb.com',
            'password' => bcrypt('gunanto123'),
        ]);

        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Kepala Bagian',
            'email' => 'Kabag@bprsbtb.com',
            'password' => bcrypt('kabag123'),
        ]);

        DB::table('users')->insert([
            'id' => 6,
            'name' => 'Analis',
            'email' => 'Analis@bprsbtb.com',
            'password' => bcrypt('analis123'),
        ]);

        DB::table('users')->insert([
            'id' => 7,
            'name' => 'Dirbis',
            'email' => 'Dirbis@bprsbtb.com',
            'password' => bcrypt('dirbis123'),
        ]);

        DB::table('users')->insert([
            'id' => 8,
            'name' => 'Direktur Utama',
            'email' => 'Dirut@bprsbtb.com',
            'password' => bcrypt('dirut123'),
        ]);

        DB::table('users')->insert([
            'id' => 9,
            'name' => 'Staff Akad',
            'email' => 'staffakad@bprsbtb.com',
            'password' => bcrypt('staff123'),
        ]);

        //Divisi
        DB::table('divisis')->insert([
            'id' => 1,
            'divisi_id' => 0,
            'nama_divisi' => 'Admin',
        ]);

        DB::table('divisis')->insert([
            'id' => 2,
            'divisi_id' => 1,
            'nama_divisi' => 'SKPD',
        ]);

        DB::table('divisis')->insert([
            'id' => 3,
            'divisi_id' => 2,
            'nama_divisi' => 'Pasar',
        ]);

        DB::table('divisis')->insert([
            'id' => 4,
            'divisi_id' => 3,
            'nama_divisi' => 'UMKM',
        ]);

        DB::table('divisis')->insert([
            'id' => 5,
            'divisi_id' => 4,
            'nama_divisi' => 'PPR',
        ]);

        //Roles
        DB::table('roles')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'divisi_id' => 0,
            'jabatan_id' => 0,
        ]);

        DB::table('roles')->insert([
            'user_id' => 2,
            'role_id' => 2,
            'divisi_id' => 4,
            'jabatan_id' => 1,
        ]);

        DB::table('roles')->insert([
            'user_id' => 3,
            'role_id' => 2,
            'divisi_id' => 4,
            'jabatan_id' => 1,
        ]);

        DB::table('roles')->insert([
            'user_id' => 4,
            'role_id' => 2,
            'divisi_id' => 4,
            'jabatan_id' => 1,
        ]);

        DB::table('roles')->insert([
            'user_id' => 5,
            'role_id' => 2,
            'divisi_id' => 0,
            'jabatan_id' => 2,
        ]);

        DB::table('roles')->insert([
            'user_id' => 6,
            'role_id' => 2,
            'divisi_id' => 0,
            'jabatan_id' => 3,
        ]);

        DB::table('roles')->insert([
            'user_id' => 7,
            'role_id' => 2,
            'divisi_id' => 0,
            'jabatan_id' => 4,
        ]);

        DB::table('roles')->insert([
            'user_id' => 8,
            'role_id' => 2,
            'divisi_id' => 0,
            'jabatan_id' => 5,
        ]);

        DB::table('roles')->insert([
            'user_id' => 9,
            'role_id' => 1,
            'divisi_id' => 5,
            'jabatan_id' => 1,
        ]);

        //Status
        DB::table('statuses')->insert([
            'id' => 1,
            'keterangan' => 'Diajukan',
        ]);

        DB::table('statuses')->insert([
            'id' => 2,
            'keterangan' => 'Dilengkapi',
        ]);

        DB::table('statuses')->insert([
            'id' => 3,
            'keterangan' => 'Diajukan ke Komite',
        ]);

        DB::table('statuses')->insert([
            'id' => 4,
            'keterangan' => 'Sedang Ditinjau',
        ]);

        DB::table('statuses')->insert([
            'id' => 5,
            'keterangan' => 'Disetujui',
        ]);

        DB::table('statuses')->insert([
            'id' => 6,
            'keterangan' => 'Ditolak',
        ]);

        DB::table('statuses')->insert([
            'id' => 7,
            'keterangan' => 'Rekomendasi Revisi',
        ]);

        DB::table('statuses')->insert([
            'id' => 8,
            'keterangan' => 'Akad Dicetak',
        ]);

        DB::table('statuses')->insert([
            'id' => 9,
            'keterangan' => 'Akad Selesai',
        ]);

        DB::table('statuses')->insert([
            'id' => 10,
            'keterangan' => 'Akad Batal',
        ]);

        //Jabatan
        // DB::table('keterangan_jabatans')->insert([
        //     'id' => 0,
        //     'jabatan_id' => 0,
        //     'keterangan' => 'Nasabah',
        // ]);

        DB::table('keterangan_jabatans')->insert([
            'id' => 1,
            'jabatan_id' => 1,
            'keterangan' => 'Staff/AO',
        ]);

        DB::table('keterangan_jabatans')->insert([
            'id' => 2,
            'jabatan_id' => 2,
            'keterangan' => 'Kabag',
        ]);

        DB::table('keterangan_jabatans')->insert([
            'id' => 3,
            'jabatan_id' => 3,
            'keterangan' => 'Analis',
        ]);

        DB::table('keterangan_jabatans')->insert([
            'id' => 4,
            'jabatan_id' => 4,
            'keterangan' => 'Direktur Bisnis',
        ]);

        DB::table('keterangan_jabatans')->insert([
            'id' => 5,
            'jabatan_id' => 5,
            'keterangan' => 'Direktur Utama',
        ]);

        DB::table('keterangan_jabatans')->insert([
            'jabatan_id' => 0,
            'keterangan' => 'Nasabah',
        ]);
    }
}
