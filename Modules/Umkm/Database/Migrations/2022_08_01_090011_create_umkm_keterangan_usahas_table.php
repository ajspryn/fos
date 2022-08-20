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
        Schema::create('umkm_keterangan_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('umkm_pembiayaan_id');
            $table->string('suku_bangsa_id')->nullable();
            $table->string('nama_usaha');
            $table->string('lama_usaha');
            $table->string('kep_toko_id');
            $table->string('leg_toko_id');
            $table->string('jenisdagang_id');
            $table->string('foto_id');
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
        Schema::dropIfExists('umkm_keterangan_usahas');
    }
};
