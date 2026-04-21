<?php

namespace Modules\UltraMikro\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UltraMikroDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        //Slik
        DB::table('ultra_mikro_score_sliks')->insert([
            'id' => 1,
            'kol_terburuk' => '1',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        DB::table('ultra_mikro_score_sliks')->insert([
            'id' => 2,
            'kol_terburuk' => '2',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ultra_mikro_score_sliks')->insert([
            'id' => 3,
            'kol_terburuk' => '3',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ultra_mikro_score_sliks')->insert([
            'id' => 4,
            'kol_terburuk' => '4',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ultra_mikro_score_sliks')->insert([
            'id' => 5,
            'kol_terburuk' => '5',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ultra_mikro_score_sliks')->insert([
            'id' => 6,
            'kol_terburuk' => '0',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //Usia
        DB::table('ultra_mikro_score_usias')->insert([
            'id' => 1,
            'usia_min' => '61',
            'usia_maks' => '',
            'rating' => '1',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_usias')->insert([
            'id' => 2,
            'usia_min' => '51',
            'usia_maks' => '60',
            'rating' => '2',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_usias')->insert([
            'id' => 3,
            'usia_min' => '41',
            'usia_maks' => '50',
            'rating' => '3',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_usias')->insert([
            'id' => 4,
            'usia_min' => '31',
            'usia_maks' => '40',
            'rating' => '4',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_usias')->insert([
            'id' => 5,
            'usia_min' => '20',
            'usia_maks' => '30',
            'rating' => '5',
            'bobot' => '0.05',
        ]);

        //Kelompok
        DB::table('ultra_mikro_score_kelompoks')->insert([
            'id' => 1,
            'status_kelompok' => 'Bubar',
            'rating' => '1',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_kelompoks')->insert([
            'id' => 2,
            'status_kelompok' => 'Ada Sebagian Kecil (25%)',
            'rating' => '2',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_kelompoks')->insert([
            'id' => 3,
            'status_kelompok' => 'Ada Setengahnya (50%)',
            'rating' => '3',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_kelompoks')->insert([
            'id' => 4,
            'status_kelompok' => 'Ada Sebagian Besar (75%)',
            'rating' => '4',
            'bobot' => '0.05',
        ]);

        DB::table('ultra_mikro_score_kelompoks')->insert([
            'id' => 5,
            'status_kelompok' => 'Lengkap (100%)',
            'rating' => '5',
            'bobot' => '0.05',
        ]);

        //Status Tempat Tinggal
        DB::table('ultra_mikro_score_tempat_tinggals')->insert([
            'id' => 1,
            'status_tempat_tinggal' => 'Rumah Kontrak & Alamat Pindah',
            'rating' => '1',
            'bobot' => '0.25',
        ]);

        DB::table('ultra_mikro_score_tempat_tinggals')->insert([
            'id' => 2,
            'status_tempat_tinggal' => 'Rumah Kontrak & Alamat Tetap',
            'rating' => '2',
            'bobot' => '0.25',
        ]);

        DB::table('ultra_mikro_score_tempat_tinggals')->insert([
            'id' => 3,
            'status_tempat_tinggal' => 'Rumah Keluarga & Alamat Beda',
            'rating' => '3',
            'bobot' => '0.25',
        ]);

        DB::table('ultra_mikro_score_tempat_tinggals')->insert([
            'id' => 4,
            'status_tempat_tinggal' => 'Rumah Keluarga & Alamat Tetap',
            'rating' => '4',
            'bobot' => '0.25',
        ]);

        DB::table('ultra_mikro_score_tempat_tinggals')->insert([
            'id' => 5,
            'status_tempat_tinggal' => 'Rumah Sendiri & Alamat Tetap',
            'rating' => '5',
            'bobot' => '0.25',
        ]);

        //Repayment
        DB::table('ultra_mikro_score_repayments')->insert([
            'id' => 1,
            'kategori_repayment' => 'Rp 50.000 - 100.000',
            'rating' => '1',
            'bobot' => '0.50',
        ]);

        DB::table('ultra_mikro_score_repayments')->insert([
            'id' => 2,
            'kategori_repayment' => 'Rp 101.000 - 150.000',
            'rating' => '2',
            'bobot' => '0.50',
        ]);

        DB::table('ultra_mikro_score_repayments')->insert([
            'id' => 3,
            'kategori_repayment' => 'Rp 151.000 - 200.000',
            'rating' => '3',
            'bobot' => '0.50',
        ]);

        DB::table('ultra_mikro_score_repayments')->insert([
            'id' => 4,
            'kategori_repayment' => 'Rp 201.000 - 250.000',
            'rating' => '4',
            'bobot' => '0.50',
        ]);

        DB::table('ultra_mikro_score_repayments')->insert([
            'id' => 5,
            'kategori_repayment' => '≥ Rp 250.000',
            'rating' => '5',
            'bobot' => '0.50',
        ]);
    }
}
