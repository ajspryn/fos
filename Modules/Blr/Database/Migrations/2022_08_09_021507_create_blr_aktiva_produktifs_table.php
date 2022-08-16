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
        Schema::create('blr_aktiva_produktifs', function (Blueprint $table) {
            $table->id();
            $table->integer('blr_id')->nullable();

            $table->string('jenis_aktiva_produktif')->nullable();
            // $table->float('bulan_satu')->nullable();
            // $table->float('bulan_dua')->nullable();
            // $table->float('bulan_tiga')->nullable();
            // $table->float('bulan_empat')->nullable();
            // $table->float('bulan_lima')->nullable();
            // $table->float('bulan_enam')->nullable();
            // $table->float('bulan_tujuh')->nullable();
            // $table->float('bulan_delapan')->nullable();
            // $table->float('bulan_sembilan')->nullable();
            // $table->float('bulan_sepuluh')->nullable();
            // $table->float('bulan_sebelas')->nullable();
            // $table->float('bulan_duabelas')->nullable();
            // $table->float('rata_rata')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('blr_aktiva_produktifs');
    }
};
