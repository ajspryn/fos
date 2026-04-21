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
        Schema::create('ppr_characters', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_wtr_fixed_income_id');
            $table->float('character_tempat_bekerja')->nullable();
            $table->float('character_konsistensi')->nullable();
            $table->float('character_kelengkapan_validitas_data')->nullable();
            $table->float('character_pembayaran_angsuran_kolektif')->nullable();
            $table->float('character_pengalaman_pembiayaan')->nullable();
            $table->float('character_motivasi')->nullable();
            $table->float('character_referensi')->nullable();

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
        Schema::dropIfExists('ppr_characters');
    }
};
