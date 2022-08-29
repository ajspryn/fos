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
        Schema::create('ppr_scoring_atr_non_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_id');
            $table->float('atr_non_fixed_situasi_persaingan')->nullable();
            $table->float('atr_non_fixed_kaderisasi')->nullable();
            $table->float('atr_non_fixed_kualifikasi_komersial')->nullable();
            $table->float('atr_non_fixed_kualifikasi_teknis')->nullable();
            $table->float('atr_non_fixed_kualitas_produk_jasa')->nullable();
            $table->float('atr_non_fixed_sistem_pembayaran')->nullable();
            $table->float('atr_non_fixed_lokasi_usaha')->nullable();
            $table->float('atr_non_fixed_total_bobot_bersih')->nullable();
            $table->float('atr_non_fixed_score')->nullable();
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
        Schema::dropIfExists('ppr_scoring_atr_non_fixed_incomes');
    }
};
