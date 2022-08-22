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
        Schema::create('ppr_cl_persyaratans', function (Blueprint $table) {
            $table->id();

            $table->integer('ppr_cl_dokumen_id');
            $table->string('wni')->nullable();
            $table->string('usia_cukup')->nullable();
            $table->string('tidak_melebihi_batas_usia')->nullable();
            $table->string('penghasilan_menjamin')->nullable();
            $table->string('masa_kerja')->nullable();
            $table->string('kol_lancar')->nullable();
            $table->string('kol_kesanggupan')->nullable();
            $table->string('menyampaikan_npwp')->nullable();

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
        Schema::dropIfExists('ppr_cl_persyaratans');
    }
};
