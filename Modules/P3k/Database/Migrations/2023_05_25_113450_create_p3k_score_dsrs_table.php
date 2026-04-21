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
        Schema::create('p3k_score_dsrs', function (Blueprint $table) {
            $table->id();
            $table->float("nilai_min")->nullable();
            $table->float("nilai_maks")->nullable();
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
        Schema::dropIfExists('p3k_score_dsrs');
    }
};
