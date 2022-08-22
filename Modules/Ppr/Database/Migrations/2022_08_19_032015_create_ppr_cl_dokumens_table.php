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
        Schema::create('ppr_cl_dokumens', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->integer('ppr_cl_persyaratan_id')->nullable();
            $table->integer('ppr_cl_dokumen_fixed_income_id')->nullable();
            $table->integer('ppr_cl_dokumen_non_fixed_income_id')->nullable();
            $table->integer('ppr_cl_dokumen_agunan_id')->nullable();
            $table->integer('ppr_ability_to_repay_fixed_income_id')->nullable();
            $table->integer('ppr_ability_to_repay_non_fixed_income_id')->nullable();
            $table->integer('ppr_pemberkasan_memo_id')->nullable();

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
        Schema::dropIfExists('ppr_cl_dokumens');
    }
};
