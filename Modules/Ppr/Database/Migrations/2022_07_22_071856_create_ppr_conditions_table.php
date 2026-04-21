<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppr_conditions', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_atr_fixed_income_id');
            $table->float('condition_pekerjaan')->nullable();
            $table->float('condition_pengalaman_riwayat_pembiayaan')->nullable();
            $table->float('condition_keamanan_bisnis_pekerjaan')->nullable();
            $table->float('condition_potensi_pertumbuhan_hasil')->nullable();
            $table->float('condition_pengalaman_kerja')->nullable();
            $table->float('condition_pendidikan')->nullable();
            $table->float('condition_usia')->nullable();
            $table->float('condition_sumber_pendapatan')->nullable();
            $table->float('condition_pendapatan_gaji_bersih')->nullable();
            $table->float('condition_jml_tanggungan_keluarga')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppr_conditions');
    }
};
