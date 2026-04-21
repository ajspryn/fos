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
        Schema::create('ppr_scoring_wtr_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_id');
            $table->float('wtr_fixed_tempat_bekerja')->nullable();
            $table->float('wtr_fixed_konsistensi')->nullable();
            $table->float('wtr_fixed_kelengkapan_validitas_data')->nullable();
            $table->float('wtr_fixed_pembayaran_angsuran_kolektif')->nullable();
            $table->float('wtr_fixed_pengalaman_pembiayaan')->nullable();
            $table->float('wtr_fixed_motivasi')->nullable();
            $table->float('wtr_fixed_referensi')->nullable();
            $table->float('wtr_fixed_total_bobot_bersih')->nullable();
            $table->float('wtr_fixed_score')->nullable();
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
        Schema::dropIfExists('ppr_scoring_wtr_fixed_incomes');
    }
};
