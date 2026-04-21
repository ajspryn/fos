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
        Schema::create('ultra_mikro_pembiayaans', function (Blueprint $table) {
            // $table->id();
            // $table->string("jenis_pby_ultra_mikro");
            // $table->date("tanggal_pengajuan");
            // $table->string("nomor_aplikasi");
            // $table->date("tanggal_kunjungan");
            // $table->integer("user_id");
            // $table->integer("petugas_lapangan_id");
            // $table->string("nominal_pembiayaan");
            // $table->string("tenor");
            // $table->string("tujuan_pembiayaan");
            // $table->string("akad");
            // $table->string("frekuensi_pembayaran");
            // $table->integer("ultra_mikro_nasabah_id");
            // $table->string("penghasilan");
            // $table->string("pengeluaran");
            // $table->string("dokumen_ideb")->nullable();
            // // $table->integer("kol_terburuk")->nullable();
            // $table->integer("repayment_id");
            // $table->integer("status_tempat_tinggal_id");
            // $table->integer("status_kelompok_id");
            // $table->integer("kol_id");
            // $table->timestamps();

            $table->id();
            $table->string("jenis_pby_ultra_mikro");
            $table->date("tanggal_pengajuan");
            $table->string("nomor_aplikasi");
            $table->date("tanggal_kunjungan");
            $table->integer("user_id");
            $table->integer("petugas_lapangan_id");
            $table->string("nominal_pembiayaan");
            $table->string("tenor");
            $table->string("rate")->nullable();
            $table->string("harga_jual")->nullable();
            $table->string("biaya")->nullable();
            $table->string("tujuan_pembiayaan");
            $table->string("akad");
            $table->string("frekuensi_pembayaran");
            $table->integer("ultra_mikro_nasabah_id");
            $table->string("penghasilan");
            $table->string("omset")->nullable();
            $table->string("belanja_usaha")->nullable();
            $table->string("penghasilan_kotor")->nullable();
            $table->string("penghasilan_lain")->nullable();
            $table->string("pengeluaran");
            $table->string("dokumen_ideb")->nullable();
            $table->integer("repayment_id");
            $table->integer("status_tempat_tinggal_id");
            $table->integer("status_kelompok_id");
            $table->integer("kol_id");
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
        Schema::dropIfExists('ultra_mikro_pembiayaans');
    }
};
