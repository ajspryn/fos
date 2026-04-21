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
        Schema::create('pasar_lama_berdagangs', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_lamaberdagang')->nullable();
            $table->string('nama_lamaberdagang');
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
        Schema::dropIfExists('pasar_lama_berdagangs');
    }
};
