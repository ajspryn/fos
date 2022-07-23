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
        Schema::create('skpd_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah');
            $table->string('no_ktp');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabkota');
            $table->string('provinsi');
            $table->string('alamat_domisili')->nullable();
            $table->string('skpd_status_perkawinan_id');
            $table->string('skpd_tanggungan_id');
            $table->string('no_npwp')->nullable();
            $table->string('no_telp');
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
        Schema::dropIfExists('skpd_nasabahs');
    }
};
