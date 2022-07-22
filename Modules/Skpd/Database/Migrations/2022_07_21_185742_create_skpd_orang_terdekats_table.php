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
        Schema::create('skpd_orang_terdekats', function (Blueprint $table) {
            $table->id();
            $table->integer('skpd_nasabah_id');
            $table->string('nama_orang_terdekat');
            $table->string('alamat_orang_terdekat');
            $table->string('no_telp_orang_terdekat');
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
        Schema::dropIfExists('skpd_orang_terdekats');
    }
};
