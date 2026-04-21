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
        Schema::create('pasar_status_perkawinans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_status_perkawinan')->nullable();
            $table->string('nama_status_perkawinan');
            $table->string('biaya');
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
        Schema::dropIfExists('pasar_status_perkawinans');
    }
};
