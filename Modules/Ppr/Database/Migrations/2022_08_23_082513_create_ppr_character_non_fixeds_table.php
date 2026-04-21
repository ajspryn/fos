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
        Schema::create('ppr_character_non_fixeds', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_wtr_non_fixed_income_id');
            $table->float('character_nf_tingkat_kepercayaan')->nullable();
            $table->float('character_nf_pengelolaan_rekening')->nullable();
            $table->float('character_nf_reputasi_bisnis')->nullable();
            $table->float('character_nf_perilaku_pribadi')->nullable();
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
        Schema::dropIfExists('ppr_character_non_fixeds');
    }
};
