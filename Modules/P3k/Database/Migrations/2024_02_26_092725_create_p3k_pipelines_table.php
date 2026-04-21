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
        Schema::create('p3k_pipelines', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("segmen_id");
            $table->string("jabatan");
            $table->string("bulan");
            $table->string("tahun");
            $table->string("nominal_target");
            $table->string("nominal_realisasi")->nullable();
            $table->string("nominal_on_process")->nullable();
            $table->string("keterangan")->nullable();

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
        Schema::dropIfExists('p3k_pipelines');
    }
};
