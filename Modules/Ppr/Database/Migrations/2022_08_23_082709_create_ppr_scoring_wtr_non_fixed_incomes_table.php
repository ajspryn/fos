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
        Schema::create('ppr_scoring_wtr_non_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_id');
            $table->float('wtr_non_fixed_tingkat_kepercayaan')->nullable();
            $table->float('wtr_non_fixed_pengelolaan_rekening')->nullable();
            $table->float('wtr_non_fixed_reputasi_bisnis')->nullable();
            $table->float('wtr_non_fixed_perilaku_pribadi')->nullable();
            $table->float('wtr_non_fixed_total_bobot_bersih')->nullable();
            $table->float('wtr_non_fixed_score')->nullable();
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
        Schema::dropIfExists('ppr_scoring_wtr_non_fixed_incomes');
    }
};
