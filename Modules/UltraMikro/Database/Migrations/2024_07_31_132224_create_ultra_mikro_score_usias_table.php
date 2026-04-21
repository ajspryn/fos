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
        Schema::create('ultra_mikro_score_usias', function (Blueprint $table) {
            $table->id();
            $table->integer("usia_min")->nullable();
            $table->integer("usia_maks")->nullable();
            $table->integer("rating");
            $table->float("bobot");
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
        Schema::dropIfExists('ultra_mikro_score_usias');
    }
};
