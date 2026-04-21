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
        Schema::create('akad_jaminans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_penjamin');

            //Jaminan 1
            $table->string('nama_jaminan1');
            $table->string('no_jaminan1');
            $table->float('luas_tanah_jaminan1')->nullable();
            $table->date('tgl_terbit_jaminan1');
            $table->string('penerbit_jaminan1');
            $table->date('masa_berlaku_jaminan1');
            $table->string('atas_nama_jaminan1');
            $table->string('hub_nama_jaminan1');
            $table->string('alamat_jaminan1');
            $table->string('rt_jaminan1', 3);
            $table->string('rw_jaminan1', 3);
            $table->string('kel_jaminan1');
            $table->string('kec_jaminan1');
            $table->string('kabkota_jaminan1');

            //Jaminan 2
            $table->string('nama_jaminan2')->nullable();
            $table->string('no_jaminan2')->nullable();
            $table->float('luas_tanah_jaminan2')->nullable();
            $table->date('tgl_terbit_jaminan2')->nullable();
            $table->string('penerbit_jaminan2')->nullable();
            $table->date('masa_berlaku_jaminan2')->nullable();
            $table->string('atas_nama_jaminan2')->nullable();
            $table->string('hub_nama_jaminan2')->nullable();
            $table->string('alamat_jaminan2')->nullable();
            $table->string('rt_jaminan2', 3)->nullable();
            $table->string('rw_jaminan2', 3)->nullable();
            $table->string('kel_jaminan2')->nullable();
            $table->string('kec_jaminan2')->nullable();
            $table->string('kabkota_jaminan2')->nullable();

            //Jaminan Kendaraan
            $table->string('merk_kendaraan')->nullable();
            $table->string('tipe_kendaraan')->nullable();
            $table->string('warna')->nullable();
            $table->string('tahun_dibuat')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_polisi')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akad_jaminans');
    }
};
