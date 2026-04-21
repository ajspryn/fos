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
        Schema::create('ultra_mikro_pembiayaan_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('ultra_mikro_pembiayaan_id');
            $table->string('status_id');
            $table->string('user_id')->nullable();
            $table->string('jabatan_id');
            $table->text('catatan')->nullable();
            $table->string('cek_staff_akad')->nullable();
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
        Schema::dropIfExists('ultra_mikro_pembiayaan_histories');
    }
};
