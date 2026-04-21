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
        Schema::create('p3k_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah');
            $table->string('no_ktp');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabkota');
            $table->string('provinsi');
            $table->string('kd_pos');
            $table->string('alamat_domisili')->nullable();
            $table->string('rt_domisili')->nullable();
            $table->string('rw_domisili')->nullable();
            $table->string('desa_kelurahan_domisili')->nullable();
            $table->string('kecamatan_domisili')->nullable();
            $table->string('kabkota_domisili')->nullable();
            $table->string('provinsi_domisili')->nullable();
            $table->string('kd_pos_domisili')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_hp');
            $table->string('status_pernikahan');
            $table->string('nama_pasangan_nasabah')->nullable();
            $table->string('no_ktp_pasangan')->nullable();
            $table->string('jml_tanggungan');
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
        Schema::dropIfExists('p3k_nasabahs');
    }
};
