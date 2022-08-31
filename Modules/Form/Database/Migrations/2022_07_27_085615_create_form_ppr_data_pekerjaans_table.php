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
        Schema::create('form_ppr_data_pekerjaans', function (Blueprint $table) {
            $table->id();

            //Pemohon PPR Syariah
            $table->integer('form_ppr_data_pribadi_id');
            $table->string('form_pekerjaan_pemohon_nama');
            $table->string('form_pekerjaan_pemohon_badan_hukum');
            $table->string('form_pekerjaan_pemohon_alamat');
            $table->integer('form_pekerjaan_pemohon_alamat_kode_pos');
            $table->string('form_pekerjaan_pemohon_no_telp');
            $table->string('form_pekerjaan_pemohon_no_telp_extension')->nullable();
            $table->string('form_pekerjaan_pemohon_facsimile')->nullable();
            $table->string('form_pekerjaan_pemohon_npwp')->nullable();
            $table->string('form_pekerjaan_pemohon_bidang_usaha');
            $table->string('form_pekerjaan_pemohon_bidang_usaha_lain')->nullable();
            $table->string('form_pekerjaan_pemohon_jenis_pekerjaan');
            $table->string('form_pekerjaan_pemohon_jenis_pekerjaan_lain')->nullable();
            $table->string('form_pekerjaan_pemohon_jml_karyawan');
            $table->string('form_pekerjaan_pemohon_departemen');
            $table->string('form_pekerjaan_pemohon_pangkat_gol_jabatan');
            $table->string('form_pekerjaan_pemohon_nip_nrp');
            $table->date('form_pekerjaan_pemohon_mulai_bekerja');
            $table->integer('form_pekerjaan_pemohon_usia_pensiun');
            $table->integer('form_pekerjaan_pemohon_masa_kerja');
            $table->string('form_pekerjaan_pemohon_nama_atasan_langsung');
            $table->string('form_pekerjaan_pemohon_no_telp_atasan_langsung');
            $table->string('form_pekerjaan_pemohon_no_telp_atasan_langsung_extension')->nullable();
            $table->string('form_pekerjaan_pemohon_grup_afiliasi')->nullable();
            $table->string('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan')->nullable();
            $table->string('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan')->nullable();
            $table->string('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun')->nullable();
            $table->string('form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan')->nullable();


            //Istri/suami pemohon PPR Syariah
            $table->string('form_pekerjaan_istri_suami_nama')->nullable();
            $table->string('form_pekerjaan_istri_suami_badan_hukum')->nullable();
            $table->string('form_pekerjaan_istri_suami_alamat')->nullable();
            $table->integer('form_pekerjaan_istri_suami_alamat_kode_pos')->nullable();
            $table->string('form_pekerjaan_istri_suami_no_telp')->nullable();
            $table->string('form_pekerjaan_istri_suami_no_telp_extension')->nullable();
            $table->string('form_pekerjaan_istri_suami_facsimile')->nullable();
            $table->string('form_pekerjaan_istri_suami_npwp')->nullable();
            $table->string('form_pekerjaan_istri_suami_bidang_usaha')->nullable();
            $table->string('form_pekerjaan_istri_suami_bidang_usaha_lain')->nullable();
            $table->string('form_pekerjaan_istri_suami_jenis_pekerjaan')->nullable();
            $table->string('form_pekerjaan_istri_suami_jenis_pekerjaan_lain')->nullable();
            $table->string('form_pekerjaan_istri_suami_jml_karyawan')->nullable();
            $table->string('form_pekerjaan_istri_suami_departemen')->nullable();
            $table->string('form_pekerjaan_istri_suami_pangkat_gol_jabatan')->nullable();
            $table->string('form_pekerjaan_istri_suami_nip_nrp')->nullable();
            $table->date('form_pekerjaan_istri_suami_mulai_bekerja')->nullable();
            $table->integer('form_pekerjaan_istri_suami_usia_pensiun')->nullable();
            $table->integer('form_pekerjaan_istri_suami_masa_kerja')->nullable();
            $table->string('form_pekerjaan_istri_suami_nama_atasan_langsung')->nullable();
            $table->string('form_pekerjaan_istri_suami_no_telp_atasan_langsung')->nullable();
            $table->string('form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension')->nullable();
            $table->string('form_pekerjaan_istri_suami_grup_afiliasi')->nullable();
            $table->string('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_perusahaan')->nullable();
            $table->string('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_jabatan')->nullable();
            $table->string('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_tahun')->nullable();
            $table->string('form_pekerjaan_istri_suami_pengalaman_kerja_terakhir_bulan')->nullable();

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
        Schema::dropIfExists('form_ppr_data_pekerjaans');
    }
};
