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
        Schema::create('pasar_sektor_ekonomis', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_sektor_ekonomi')->nullable();
            $table->string('nama_sektor_ekonomi');
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
        Schema::dropIfExists('pasar_sektor_ekonomis');
    }
};
