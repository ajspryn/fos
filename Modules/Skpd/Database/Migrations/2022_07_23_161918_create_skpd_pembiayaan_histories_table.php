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
        Schema::create('skpd_pembiayaan_histories', function (Blueprint $table) {
            $table->id();
            $table->string('skpd_pembiayaan_id');
            $table->string('status_id');
            $table->string('user_id')->nullable();
            $table->string('jabatan_id');
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
        Schema::dropIfExists('skpd_pembiayaan_histories');
    }
};
