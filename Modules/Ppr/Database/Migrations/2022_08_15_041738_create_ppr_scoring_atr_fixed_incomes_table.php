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
        Schema::create('ppr_scoring_atr_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_id');
            $table->float('atr_fixed_pekerjaan')->nullable();
            $table->float('atr_fixed_pengalaman_riwayat_pembiayaan')->nullable();
            $table->float('atr_fixed_keamanan_bisnis_pekerjaan')->nullable();
            $table->float('atr_fixed_potensi_pertumbuhan_hasil')->nullable();
            $table->float('atr_fixed_pengalaman_kerja')->nullable();
            $table->float('atr_fixed_pendidikan')->nullable();
            $table->float('atr_fixed_usia')->nullable();
            $table->float('atr_fixed_sumber_pendapatan')->nullable();
            $table->float('atr_fixed_pendapatan_gaji_bersih')->nullable();
            $table->float('atr_fixed_jml_tanggungan_keluarga')->nullable();
            $table->float('atr_fixed_total_bobot_bersih')->nullable();
            $table->float('atr_fixed_score')->nullable();
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
        Schema::dropIfExists('ppr_scoring_atr_fixed_incomes');
    }
};
