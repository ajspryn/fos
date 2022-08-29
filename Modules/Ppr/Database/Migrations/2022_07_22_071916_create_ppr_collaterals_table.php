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
        Schema::create('ppr_collaterals', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_collateral_fixed_income_id');
            $table->float('collateral_marketabilitas')->nullable();
            $table->float('collateral_kontribusi_pemohon_ftv')->nullable();
            $table->float('collateral_pertumbuhan_agunan')->nullable();
            $table->float('collateral_daya_tarik_agunan')->nullable();
            $table->float('collateral_jangka_waktu_likuidasi')->nullable();

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
        Schema::dropIfExists('ppr_collaterals');
    }
};
