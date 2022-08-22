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
        Schema::create('form_ppr_data_kekayaan_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->string('form_kekayaan_kendaraan_jenis_merk')->nullable();
            $table->string('form_kekayaan_kendaraan_tahun_dikeluarkan')->nullable();
            $table->string('form_kekayaan_kendaraan_atas_nama')->nullable();
            $table->string('form_kekayaan_kendaraan_taksasi_harga_jual')->nullable();

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
        Schema::dropIfExists('form_ppr_data_kekayaan_kendaraans');
    }
};
