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
        Schema::create('skpd_pembiayaans', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal_pengajuan");
            $table->string("jenis_penggunaan")->nullable();
            $table->string("sektor_ekonomi")->nullable();
            $table->string("akad")->nullable();
            $table->integer("skpd_nasabah_id");
            $table->integer("instansi_id");
            $table->integer("golongan_id");
            $table->integer("jaminan_id");
            $table->integer("jaminan_lainnya_id");
            $table->string("gaji_pokok");
            $table->string("gaji_pendapatan");
            $table->string("gaji_tpp");
            $table->string("pengeluaran_lainnya");
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
        Schema::dropIfExists('skpd_pembiayaans');
    }
};
