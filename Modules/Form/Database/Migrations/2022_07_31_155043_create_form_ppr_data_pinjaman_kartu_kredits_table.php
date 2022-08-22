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
        Schema::dropIfExists('form_ppr_data_pinjaman_kartu_kredits');
    }
};
