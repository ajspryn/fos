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
        Schema::create('pembiayaans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kontrak');
            $table->string('akad');
            $table->string('segmen');
            $table->string('cif');
            $table->string('kode_tabungan');
            $table->string('plafond')->nullable();
            $table->integer('tenor')->nullable();
            $table->string('margin')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('status')->nullable();
            $table->string('catatan')->nullable();

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
        Schema::dropIfExists('pembiayaans');
    }
};
