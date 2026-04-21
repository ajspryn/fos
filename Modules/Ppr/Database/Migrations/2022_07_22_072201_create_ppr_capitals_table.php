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
        Schema::create('ppr_capitals', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_atr_fixed_income_id');
            $table->float('capital_pekerjaan')->nullable();
            $table->float('capital_pengalaman_riwayat_pembiayaan')->nullable();
            $table->float('capital_keamanan_bisnis_pekerjaan')->nullable();
            $table->float('capital_potensi_pertumbuhan_hasil')->nullable();
            $table->float('capital_sumber_pendapatan')->nullable();
            $table->float('capital_pendapatan_gaji_bersih')->nullable();
            $table->float('capital_jml_tanggungan_keluarga')->nullable();

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
        Schema::dropIfExists('ppr_capitals');
    }
};
