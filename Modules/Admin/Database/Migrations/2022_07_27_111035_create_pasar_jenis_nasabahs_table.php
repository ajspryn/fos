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
        Schema::create('pasar_jenis_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_jenisnasabah')->nullable();
            $table->string('nama_jenisnasabah');;
            $table->string('rating');
            $table->string('bobot');
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
        Schema::dropIfExists('pasar_jenis_nasabahs');
    }
};
