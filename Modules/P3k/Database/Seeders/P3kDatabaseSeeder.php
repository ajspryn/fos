<?php

namespace Modules\P3k\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class P3kDatabaseSeeder extends Seeder
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

        //DSR
        DB::table('p3k_score_dsrs')->insert([
            'id' => 1,
            'nilai_min' => '80.00',
            'nilai_maks' => '90.00',
            'rating' => '1',
            'bobot' => '0.30',
        ]);

        DB::table('p3k_score_dsrs')->insert([
            'id' => 2,
            'nilai_min' => '70.00',
            'nilai_maks' => '79.00',
            'rating' => '2',
            'bobot' => '0.30',
        ]);

        DB::table('p3k_score_dsrs')->insert([
            'id' => 3,
            'nilai_min' => '60.00',
            'nilai_maks' => '69.00',
            'rating' => '3',
            'bobot' => '0.30',
        ]);

        DB::table('p3k_score_dsrs')->insert([
            'id' => 4,
            'nilai_min' => '0.00',
            'nilai_maks' => '59.00',
            'rating' => '4',
            'bobot' => '0.30',
        ]);

        //DSR > 90%
        DB::table('p3k_score_dsrs')->insert([
            'id' => 5,
            'nilai_min' => '',
            'nilai_maks' => '',
            'rating' => '1',
            'bobot' => '0.30',
        ]);

        //Slik
        DB::table('p3k_score_sliks')->insert([
            'id' => 1,
            'kol_tertinggi' => '5',
            'rating' => '1',
            'bobot' => '0.05',
        ]);

        DB::table('p3k_score_sliks')->insert([
            'id' => 2,
            'kol_tertinggi' => '4',
            'rating' => '1',
            'bobot' => '0.05',
        ]);

        DB::table('p3k_score_sliks')->insert([
            'id' => 3,
            'kol_tertinggi' => '3',
            'rating' => '2',
            'bobot' => '0.05',
        ]);

        DB::table('p3k_score_sliks')->insert([
            'id' => 4,
            'kol_tertinggi' => '2',
            'rating' => '3',
            'bobot' => '0.05',
        ]);

        DB::table('p3k_score_sliks')->insert([
            'id' => 5,
            'kol_tertinggi' => '1',
            'rating' => '4',
            'bobot' => '0.05',
        ]);

        DB::table('p3k_score_sliks')->insert([
            'id' => 6,
            'kol_tertinggi' => '0',
            'rating' => '4',
            'bobot' => '0.05',
        ]);

        //Usia
        DB::table('p3k_score_usias')->insert([
            'id' => 1,
            'usia_min' => '50',
            'usia_maks' => '55',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('p3k_score_usias')->insert([
            'id' => 2,
            'usia_min' => '40',
            'usia_maks' => '49',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('p3k_score_usias')->insert([
            'id' => 3,
            'usia_min' => '30',
            'usia_maks' => '39',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('p3k_score_usias')->insert([
            'id' => 4,
            'usia_min' => '20',
            'usia_maks' => '29',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        //Usia > 56 tahun
        DB::table('p3k_score_usias')->insert([
            'id' => 5,
            'usia_min' => '',
            'usia_maks' => '',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        //Tenor
        DB::table('p3k_score_tenors')->insert([
            'id' => 1,
            'tenor_min' => '120',
            'tenor_maks' => '240',
            'rating' => '1',
            'bobot' => '0.50',
        ]);

        DB::table('p3k_score_tenors')->insert([
            'id' => 2,
            'tenor_min' => '96',
            'tenor_maks' => '108',
            'rating' => '2',
            'bobot' => '0.50',
        ]);

        DB::table('p3k_score_tenors')->insert([
            'id' => 3,
            'tenor_min' => '72',
            'tenor_maks' => '84',
            'rating' => '3',
            'bobot' => '0.50',
        ]);

        DB::table('p3k_score_tenors')->insert([
            'id' => 4,
            'tenor_min' => '12',
            'tenor_maks' => '60',
            'rating' => '4',
            'bobot' => '0.50',
        ]);
    }
}
