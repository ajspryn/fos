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
        Schema::create('form_ppr_data_pinjaman_lainnyas', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->string('form_pinjaman_lainnya_nama')->nullable();
            $table->string('form_pinjaman_lainnya_sejak_tahun')->nullable();
            $table->string('form_pinjaman_lainnya_plafond')->nullable();
            $table->string('form_pinjaman_lainnya_outstanding')->nullable();
            $table->integer('form_pinjaman_lainnya_jangka_waktu_bulan')->nullable();
            $table->string('form_pinjaman_lainnya_bunga_margin')->nullable();
            $table->string('form_pinjaman_lainnya_angsuran_per_bulan')->nullable();
            $table->string('form_pinjaman_lainnya_agunan')->nullable();
            $table->string('form_pinjaman_lainnya_kolektibilitas')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_ppr_data_pinjaman_lainnyas');
    }
};
