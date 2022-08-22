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
        Schema::create('form_ppr_data_kekayaan_simpanans', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            //Kekayaan
            $table->string('form_kekayaan_simpanan_nama_bank')->nullable();
            $table->string('form_kekayaan_simpanan_jenis')->nullable();
            $table->string('form_kekayaan_simpanan_sejak_tahun')->nullable();
            $table->date('form_kekayaan_simpanan_saldo_per_tanggal')->nullable();
            $table->string('form_kekayaan_simpanan_saldo')->nullable();

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
        Schema::dropIfExists('form_ppr_data_kekayaan_simpanans');
    }
};
