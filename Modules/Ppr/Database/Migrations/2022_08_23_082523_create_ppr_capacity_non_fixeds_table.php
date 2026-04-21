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
        Schema::create('ppr_capacity_non_fixeds', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_atr_non_fixed_income_id');
            $table->float('capacity_nf_situasi_persaingan')->nullable();
            $table->float('capacity_nf_kaderisasi')->nullable();
            $table->float('capacity_nf_kualifikasi_komersial')->nullable();
            $table->float('capacity_nf_kualifikasi_teknis')->nullable();
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
        Schema::dropIfExists('ppr_capacity_non_fixeds');
    }
};
