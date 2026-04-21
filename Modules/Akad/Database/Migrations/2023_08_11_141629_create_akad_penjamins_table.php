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
        Schema::create('akad_penjamins', function (Blueprint $table) {
            $table->id();

            //Penjamin
            $table->string('nama_penjamin');
            $table->string('nama_instansi');
            $table->string('departemen_jabatan');
            $table->string('nik_penjamin');
            $table->string('alamat_penjamin');
            $table->string('rt_penjamin', 3);
            $table->string('rw_penjamin', 3);
            $table->string('kel_penjamin');
            $table->string('kec_penjamin');
            $table->string('kabkota_penjamin');

            //Pasangan Penjamin
            $table->string('nama_pasangan_penjamin')->nullable();
            $table->string('nik_pasangan_penjamin')->nullable();
            $table->string('alamat_pasangan_penjamin')->nullable();
            $table->string('rt_pasangan_penjamin', 3)->nullable();
            $table->string('rw_pasangan_penjamin', 3)->nullable();
            $table->string('kel_pasangan_penjamin')->nullable();
            $table->string('kec_pasangan_penjamin')->nullable();
            $table->string('kabkota_pasangan_penjamin')->nullable();

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
        Schema::dropIfExists('akad_penjamins');
    }
};
