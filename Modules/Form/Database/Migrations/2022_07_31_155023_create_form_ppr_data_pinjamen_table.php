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
        Schema::create('form_ppr_data_pinjamen', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->string('form_pinjaman_nama_bank')->nullable();
            $table->string('form_pinjaman_jenis')->nullable();
            $table->string('form_pinjaman_sejak_tahun')->nullable();
            $table->integer('form_pinjaman_jangka_waktu_bulan')->nullable();
            $table->string('form_pinjaman_plafond')->nullable();
            $table->string('form_pinjaman_angsuran_per_bulan')->nullable();

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
        Schema::dropIfExists('form_ppr_data_pinjamen');
    }
};
