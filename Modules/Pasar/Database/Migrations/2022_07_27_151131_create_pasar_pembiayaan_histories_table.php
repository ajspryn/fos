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
        Schema::create('pasar_pembiayaan_histories', function (Blueprint $table) {
            $table->id();
            $table->string('pasar_pembiayaan_id');
            $table->string('status_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('jabatan_id')->nullable();
            $table->string('divisi_id')->nullable();
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
        Schema::dropIfExists('pasar_pembiayaan_histories');
    }
};
