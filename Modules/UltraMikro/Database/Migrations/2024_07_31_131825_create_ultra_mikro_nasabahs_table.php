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
        Schema::create('ultra_mikro_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah');
            $table->string('no_ktp');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->integer('usia_saat_pengajuan');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->text('alamat_ktp');
            $table->text('alamat_domisili');
            $table->string('no_hp');
            $table->string('status_pernikahan');
            $table->string('nama_pasangan_nasabah')->nullable();
            $table->string('no_ktp_pasangan')->nullable();
            $table->string('jml_tanggungan');
            $table->string('nama_pekerjaan');
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('lama_pekerjaan')->nullable();
            $table->string('tempat_pekerjaan')->nullable();

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
        Schema::dropIfExists('ultra_mikro_nasabahs');
    }
};
