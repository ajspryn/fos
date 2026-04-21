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
        Schema::create('akad_asuransis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_asuransi');
            $table->integer('biaya_asuransi_jiwa');
            $table->integer('biaya_asuransi_kendaraan');
            $table->integer('biaya_asuransi_kebakaran');

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
        Schema::dropIfExists('akad_asuransis');
    }
};
