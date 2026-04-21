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
        Schema::create('form_ppr_data_pinjaman_kartu_kredits', function (Blueprint $table) {
            $table->id();
            $table->integer('form_ppr_pembiayaan_id');

            $table->string('form_pinjaman_kartu_kredit_nama_bank')->nullable();
            $table->string('form_pinjaman_kartu_kredit_sejak_tahun')->nullable();
            $table->string('form_pinjaman_kartu_kredit_plafond')->nullable();
            $table->string('form_pinjaman_kartu_kredit_outstanding')->nullable();
            $table->integer('form_pinjaman_kartu_kredit_jangka_waktu_bulan')->nullable();
            $table->string('form_pinjaman_kartu_kredit_bunga_margin')->nullable();
            $table->string('form_pinjaman_kartu_kredit_angsuran_per_bulan')->nullable();
            $table->string('form_pinjaman_kartu_kredit_agunan')->nullable();
            $table->string('form_pinjaman_kartu_kredit_kolektibilitas')->nullable();

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
        Schema::dropIfExists('form_ppr_data_pinjaman_kartu_kredits');
    }
};
