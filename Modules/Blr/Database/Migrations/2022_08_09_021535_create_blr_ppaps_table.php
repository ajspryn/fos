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
        Schema::create('blr_ppaps', function (Blueprint $table) {
            $table->id();
            $table->integer('blr_id');

            $table->string('jenis_ppap');
            $table->float('januari');
            $table->float('februari');
            $table->float('maret');
            $table->float('april');
            $table->float('mei');
            $table->float('juni');
            $table->float('juli');
            $table->float('agustus');
            $table->float('september');
            $table->float('oktober');
            $table->float('november');
            $table->float('desember');
            $table->float('total');
            $table->float('rata_rata');
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
        Schema::dropIfExists('blr_ppaps');
    }
};
