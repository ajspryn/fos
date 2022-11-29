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
        Schema::create('skpd_jenis_nasabahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jenis_nasabah');
            $table->string('keterangan');
            $table->integer('rating');
            $table->float('bobot');

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
        Schema::dropIfExists('skpd_jenis_nasabahs');
    }
};
