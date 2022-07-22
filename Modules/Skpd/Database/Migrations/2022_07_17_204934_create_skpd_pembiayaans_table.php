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
            $table->string("harga_beli");
            $table->string("tenor");
            $table->string("skpd_jenis_penggunaan_id")->nullable();
            $table->string("skpd_sektor_ekonomi_id")->nullable();
            $table->string("skpd_akad_id")->nullable();
            $table->integer("skpd_nasabah_id");
            $table->integer("skpd_instansi_id");
            $table->integer("skpd_golongan_id");
            $table->integer("sk_pengangkatan");
            $table->string("gaji_pokok");
            $table->string("pendapatan_lainnya");
            $table->string("gaji_tpp");
            $table->string("pengeluaran_lainnya")->nullable();
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
