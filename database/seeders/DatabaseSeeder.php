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

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'Admin@btb.com',
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
            'name' => 'Guswanto',
            'email' => 'Guswanto@bprsbtb.com',
            'password' => bcrypt('guswanto123'),
        ]);

        DB::table('users')->insert([
            'id' => 6,
            'name' => 'Fattah Yasin',
            'email' => 'Yasin@bprsbtb.com',
            'password' => bcrypt('yasin123'),
        ]);

        DB::table('users')->insert([
            'id' => 7,
            'name' => 'Arie Wibowo Irawan',
            'email' => 'Arie@bprsbtb.com',
            'password' => bcrypt('ariebtb123'),
        ]);

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

        //Status
        DB::table('statuses')->insert([
            'id' => 1,
            'keterangan' => 'Diajukan oleh Nasabah',
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

        //Jabatan
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
    }
}
