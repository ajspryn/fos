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
        Schema::create('blrs', function (Blueprint $table) {
            $table->id();

            $table->integer('tahun')->nullable();
            $table->integer('aktiva_produktif_id')->nullable();
            $table->integer('overhead_id')->nullable();
            $table->integer('ppap_id')->nullable();
            $table->integer('profit_margin_id')->nullable();

            $table->float('cost_of_money')->nullable();
            $table->float('blr')->nullable();
            $table->float('lending_rate')->nullable();
            $table->float('blr_per_tahun')->nullable();
            $table->float('pure_costs')->nullable();
            $table->float('spread_interests')->nullable();

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
        Schema::dropIfExists('blrs');
    }
};
