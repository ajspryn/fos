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
        Schema::create('pasar_pembiayaans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pembiayaan');
            $table->string('nasabah_id');
            $table->string('AO_id');
            $table->string('penggunaan_id')->nullable();
            $table->string('akad_id')->nullable();
            $table->string('sektor_id')->nullable();
            $table->string('harga')->nullable();
            $table->string('rate')->nullable();
            $table->string('nasabah')->nullable();
            $table->string('cashpickup')->nullable();
            $table->string('tenor')->nullable();
            $table->string('pasar_legalitas_rumah_id');
            $table->string('pasar_keterangan_usaha_id');
            $table->string('jaminan_id');
            $table->string('jaminanlain_id')->nullable();
            $table->string('omset');
            $table->string('hpp')->nullable();
            $table->string('trasport')->nullable();
            $table->string('telpon')->nullable();
            $table->string('sewa')->nullable();
            $table->string('listrik')->nullable();
            $table->string('karyawan')->nullable();
            $table->string('slik_id');
            $table->string('keb_keluarga')->nullable();
            $table->string('dokumen_keuangan')->nullable();
            $table->string('kesanggupan_angsuran');
            $table->string('aset')->nullable();
            $table->string('keterangan_keb_keluarga');
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
        Schema::dropIfExists('pasar_pembiayaans');
    }
};
