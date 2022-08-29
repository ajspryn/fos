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
        Schema::create('ppr_scorings', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_atr_fixed_income_id')->nullable();
            $table->integer('ppr_scoring_wtr_fixed_income_id')->nullable();
            $table->integer('ppr_scoring_collateral_fixed_income_id')->nullable();
            $table->integer('ppr_scoring_atr_non_fixed_income_id')->nullable();
            $table->integer('ppr_scoring_wtr_non_fixed_income_id')->nullable();
            $table->integer('ppr_scoring_collateral_non_fixed_income_id')->nullable();
            $table->float('ppr_total_score')->nullable();
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
        Schema::dropIfExists('ppr_scorings');
    }
};
