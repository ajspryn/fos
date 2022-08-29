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
        Schema::create('ppr_collateral_non_fixeds', function (Blueprint $table) {
            $table->id();

            $table->integer('form_ppr_pembiayaan_id');
            $table->integer('ppr_scoring_collateral_non_fixed_income_id');
            $table->float('collateral_nf_marketabilitas')->nullable();
            $table->float('collateral_nf_kontribusi_pemohon_ftv')->nullable();
            $table->float('collateral_nf_pertumbuhan_agunan')->nullable();
            $table->float('collateral_nf_daya_tarik_agunan')->nullable();
            $table->float('collateral_nf_jangka_waktu_likuidasi')->nullable();
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
        Schema::dropIfExists('ppr_collateral_non_fixeds');
    }
};
