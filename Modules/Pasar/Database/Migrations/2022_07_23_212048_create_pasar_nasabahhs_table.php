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
        Schema::create('pasar_nasabahhs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah')->nullable();
            $table->string('no_ktp')->nullable();
            $table->string('tmp_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabkota');
            $table->string('provinsi');
            $table->string('alamat_domisili')->nullable();
            $table->string('lama_tinggal')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('agama_id')->nullable();
            $table->string('status_id')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jumlah_anak')->nullable();
            $table->string('npwp')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('namaot')->nullable();
            $table->string('alamat_ot')->nullable();
            $table->string('telp_ot')->nullable();
            $table->string('foto_id')->nullable();
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
        Schema::dropIfExists('pasar_nasabahhs');
    }
};
