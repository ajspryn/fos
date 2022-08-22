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
        Schema::create('form_ppr_data_kekayaan_tanah_bangunans', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->float('form_kekayaan_tanah_bangunan_luas_tanah')->nullable();
            $table->float('form_kekayaan_tanah_bangunan_luas_bangunan')->nullable();
            $table->string('form_kekayaan_tanah_bangunan_jenis')->nullable();
            $table->string('form_kekayaan_tanah_bangunan_atas_nama')->nullable();
            $table->string('form_kekayaan_tanah_bangunan_taksasi_pasar_wajar')->nullable();

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
        Schema::dropIfExists('form_ppr_data_kekayaan_tanah_bangunans');
    }
};
