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
        Schema::create('umkm_pembiayaans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pembiayaan');
            $table->string('nasabah_id');
            $table->string('AO_id');
            $table->string('penggunaan_id')->nullable();
            $table->string('akad_id')->nullable();
            $table->string('sektor_id')->nullable();
            $table->string('nominal_pembiayaan')->nullable();
            $table->string('rate')->nullable();
            $table->string('nasabah')->nullable();
            $table->string('cash')->nullable();
            $table->string('tenor')->nullable();
            $table->string('umkm_legalitas_rumah_id');
            $table->string('umkm_usaha_id');
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
            $table->string('kesanggupan_angsuran');
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
        Schema::dropIfExists('umkm_pembiayaans');
    }
};
