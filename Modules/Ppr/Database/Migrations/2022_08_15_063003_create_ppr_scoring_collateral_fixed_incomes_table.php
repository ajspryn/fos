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
        Schema::create('ppr_scoring_collateral_fixed_incomes', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_scoring_fixed_income_id');
            $table->float('cc_marketabilitas')->nullable();
            $table->float('cc_kontribusi_pemohon_ftv')->nullable();
            $table->float('cc_pertumbuhan_agunan')->nullable();
            $table->float('cc_daya_tarik_agunan')->nullable();
            $table->float('cc_jangka_waktu_likuidasi')->nullable();
            $table->float('cc_fixed_total_bobot_bersih')->nullable();
            $table->float('cc_fixed_score')->nullable();
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
        Schema::dropIfExists('ppr_scoring_collateral_fixed_incomes');
    }
};
