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
        Schema::create('p3k_pembiayaans', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("pengajuan_fas_aktif_ke");
            $table->string("total_angsuran_btb_fas_aktif")->nullable();
            $table->date("tanggal_pengajuan");
            $table->string("nominal_pembiayaan");
            $table->string("rate")->nullable();
            $table->string("tenor");
            $table->string("harga_jual")->nullable();
            $table->string("jenis_penggunaan")->nullable();
            $table->string("akad")->nullable();
            $table->integer("p3k_nasabah_id");
            $table->string("jabatan")->nullable();
            $table->string("gaji_pokok");
            $table->string("gaji_tpp")->nullable();
            $table->string("gaji_pasangan")->nullable();
            $table->string("dokumen_keuangan");
            $table->string("dokumen_ideb")->nullable();
            $table->string("pengeluaran_lainnya")->nullable();
            $table->string("keterangan_pengeluaran_lainnya")->nullable();
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
        Schema::dropIfExists('p3k_pembiayaans');
    }
};
