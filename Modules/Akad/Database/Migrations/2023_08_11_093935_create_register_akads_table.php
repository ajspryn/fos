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
        Schema::create('register_akads', function (Blueprint $table) {
            $table->id();
            $table->string('no_akad')->nullable();
            $table->string('no_rek_tabungan')->nullable();
            $table->string('kd_kontrak')->nullable();
            $table->string('segmen');
            $table->string('akad');
            $table->string('id_pembiayaan');
            $table->string('inisial_produk');
            $table->string('kd_produk');
            $table->string('jenis_produk');
            $table->date('tgl_akad');
            $table->date('tgl_pencairan');
            $table->date('tgl_angsuran_awal');
            $table->date('tgl_jatuh_tempo');
            $table->string('plafond');
            $table->string('tenor');
            $table->string('persentase_margin');
            $table->string('margin');
            $table->string('harga_jual');
            $table->string('harga_jual_terbilang');
            $table->string('angsuran');
            $table->string('denda_per_hari');
            $table->string('by_adm');
            $table->string('by_notaris');
            $table->string('by_adm_tab');
            $table->string('by_materai');
            $table->string('by_sp3');
            $table->string('hold_angsuran');
            $table->string('angsuran_npp');
            $table->string('by_npp');
            $table->string('pencairan_nasabah_npp');
            $table->string('saksi_ao');
            $table->string('saksi_legal');
            $table->string('pola_pembayaran');
            $table->string('pola_angsuran');
            $table->string('id_jaminan');
            $table->string('id_asuransi');
            $table->string('lembar_jadang')->nullable();

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
        Schema::dropIfExists('register_akads');
    }
};
