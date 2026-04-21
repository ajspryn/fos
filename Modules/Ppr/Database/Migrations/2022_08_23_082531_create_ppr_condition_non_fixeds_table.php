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
        Schema::create('ppr_condition_non_fixeds', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_atr_non_fixed_income_id');
            $table->float('condition_nf_kualitas_produk_jasa')->nullable();
            $table->float('condition_nf_sistem_pembayaran')->nullable();
            $table->float('condition_nf_lokasi_usaha')->nullable();
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
        Schema::dropIfExists('ppr_condition_non_fixeds');
    }
};
