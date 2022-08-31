<?php

namespace Modules\Ppr\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PprDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        //PPR Character Tempat Bekerja
        DB::table('ppr_character_tempat_bekerjas')->insert([
            'id' => 1,
            'kode' => 'CTB1',
            'keterangan' => 'Jarak bekerja dengan bank pemberi PPR Syariah >100 Km',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_tempat_bekerjas')->insert([
            'id' => 2,
            'kode' => 'CTB2',
            'keterangan' => 'Jarak bekerja dengan bank pemberi PPR Syariah >75 s/d 100 Km',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_tempat_bekerjas')->insert([
            'id' => 3,
            'kode' => 'CTB3',
            'keterangan' => 'Jarak bekerja dengan bank pemberi PPR Syariah >50 s/d 75 Km',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_tempat_bekerjas')->insert([
            'id' => 4,
            'kode' => 'CTB4',
            'keterangan' => 'Jarak bekerja dengan bank pemberi PPR Syariah 25 s/d 50 Km',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_tempat_bekerjas')->insert([
            'id' => 5,
            'kode' => 'CTB5',
            'keterangan' => 'Jarak bekerja dengan bank pemberi PPR Syariah <25 Km',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Character Konsistensi
        DB::table('ppr_character_konsistensis')->insert([
            'id' => 1,
            'kode' => 'CK1',
            'keterangan' => 'Tidak berkenan memberikan informasi',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_konsistensis')->insert([
            'id' => 2,
            'kode' => 'CK2',
            'keterangan' => 'Sebagian atau seluruh informasi tidak sesuai dengan kondisi',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_konsistensis')->insert([
            'id' => 3,
            'kode' => 'CK3',
            'keterangan' => 'Sebagian informasi kurang sesuai dengan kondisi',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_konsistensis')->insert([
            'id' => 4,
            'kode' => 'CK4',
            'keterangan' => 'Informasi sesuai kondisi, tetapi baru disampaikan bila diminta',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_konsistensis')->insert([
            'id' => 5,
            'kode' => 'CK5',
            'keterangan' => 'Informasi sesuai kondisi dan disampaikan secara informatif',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Character Kelengkapan & Validitas Data
        DB::table('ppr_character_kelengkapan_validitas')->insert([
            'id' => 1,
            'kode' => 'CKV1',
            'keterangan' => 'Verifikasi dokumen meragukan (palsu)',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_kelengkapan_validitas')->insert([
            'id' => 2,
            'kode' => 'CKV2',
            'keterangan' => 'Dokumen tidak lengkap dan tidak ada deviasi',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_kelengkapan_validitas')->insert([
            'id' => 3,
            'kode' => 'CKV3',
            'keterangan' => 'Dokumen tidak lengkap, namun ada deviasi',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_kelengkapan_validitas')->insert([
            'id' => 4,
            'kode' => 'CKV4',
            'keterangan' => 'Dokumen lengkap',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_kelengkapan_validitas')->insert([
            'id' => 5,
            'kode' => 'CKV5',
            'keterangan' => '100% lengkap dan sudah verifkasi dengan yang asli dan tidak ada dokumen yang kadaluarsa',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Character Pembayaran Angsuran & Kolektif
        DB::table('ppr_character_angsuran_kolektifs')->insert([
            'id' => 1,
            'kode' => 'CPAK1',
            'keterangan' => 'Gaji dibayarkan tidak melalui rekening Bank',
            'rating' => '1',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_angsuran_kolektifs')->insert([
            'id' => 2,
            'kode' => 'CPAK2',
            'keterangan' => 'Gaji tidak dibayarkan melalui BTB, pembayaran dilakukan sendiri oleh nasabah',
            'rating' => '2',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_angsuran_kolektifs')->insert([
            'id' => 3,
            'kode' => 'CPAK3',
            'keterangan' => 'Gaji tidak dibayarkan melalui BTB, pembayaran dan pemotongan dilakukan oleh juru bayar',
            'rating' => '3',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_angsuran_kolektifs')->insert([
            'id' => 4,
            'kode' => 'CPAK4',
            'keterangan' => 'Giro Instansi ditransferkan langsung, pembayaran dan pemotongan dilakukan oleh juru bayar',
            'rating' => '4',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_angsuran_kolektifs')->insert([
            'id' => 5,
            'kode' => 'CPAK5',
            'keterangan' => 'Gaji dibayarkan melalui BTB',
            'rating' => '5',
            'bobot' => '0.20',
        ]);

        //PPR Character Pengalaman Pembiayaan
        DB::table('ppr_character_pengalaman_pembiayaans')->insert([
            'id' => 1,
            'kode' => 'CPP1',
            'keterangan' => 'Masih terdapat tunggakan, ada dokumen yang belum dipenuhi tanpa ada penjelasan dari Bank',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_pengalaman_pembiayaans')->insert([
            'id' => 2,
            'kode' => 'CPP2',
            'keterangan' => 'Sering menunggak/sering terlambat bayar/terlambat memenuhi kelengkapan dokumen',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_pengalaman_pembiayaans')->insert([
            'id' => 3,
            'kode' => 'CPP3',
            'keterangan' => 'Debitur baru, tidak memiliki riwayat pembiayaan',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_pengalaman_pembiayaans')->insert([
            'id' => 4,
            'kode' => 'CPP4',
            'keterangan' => 'Ada dengan kolektibilitas dalam pengawasan khusus DPD maks. 7 hari',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_character_pengalaman_pembiayaans')->insert([
            'id' => 5,
            'kode' => 'CPP5',
            'keterangan' => 'Ada dengan kolektibilitas lancar',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Character Motivasi
        DB::table('ppr_character_motivasis')->insert([
            'id' => 1,
            'kode' => 'CM1',
            'keterangan' => 'Nasbah memiliki >2 rumah dengan status kepemilikan sendiri',
            'rating' => '1',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_motivasis')->insert([
            'id' => 2,
            'kode' => 'CM2',
            'keterangan' => 'Nasabah mempunyai tempat tinggal tetap dengan status kepemilikan sendiri',
            'rating' => '2',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_motivasis')->insert([
            'id' => 3,
            'kode' => 'CM3',
            'keterangan' => 'Nasabah mempunyai tempat tinggal tetap dengan status kepemilikan orangtua/mertua/rumah dinas',
            'rating' => '3',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_motivasis')->insert([
            'id' => 4,
            'kode' => 'CM4',
            'keterangan' => 'Selama ini tinggal menumpang dengan saudara/kerabat, Rumah pertama',
            'rating' => '4',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_character_motivasis')->insert([
            'id' => 5,
            'kode' => 'CM5',
            'keterangan' => 'Selama ini tinggal di kontrakan/sewa, Rumah pertama',
            'rating' => '5',
            'bobot' => '0.20',
        ]);

        //PPR Character Referensi
        DB::table('ppr_character_referensis')->insert([
            'id' => 1,
            'kode' => 'CR1',
            'keterangan' => 'Debitur tidak memiliki kebiasaan hidup mewah dan tidak mempunyai permasalahan pribadi yang akan mempengaruhi pembayaran',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_referensis')->insert([
            'id' => 2,
            'kode' => 'CR2',
            'keterangan' => 'BTB tidak memiliki informasi mengenai gaya hidup dan riwayat pribadi',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_referensis')->insert([
            'id' => 3,
            'kode' => 'CR3',
            'keterangan' => 'Nasabah baru',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_referensis')->insert([
            'id' => 4,
            'kode' => 'CR4',
            'keterangan' => 'Nasabah tidak memiliki gaya hidup mewah',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_character_referensis')->insert([
            'id' => 5,
            'kode' => 'CR5',
            'keterangan' => 'Debitur tidak memiliki kebiasaan hidup mewah dan tidak mempunyai permasalahan pribadi yang akan mempengaruhi pembayaran',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Capital Pekerjaan
        DB::table('ppr_capital_pekerjaans')->insert([
            'id' => 1,
            'kode' => 'CAPP1',
            'keterangan' => 'Kepemilikan Perusahaan Perseorangan (tidak berbadan hukum)',
            'rating' => '1',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pekerjaans')->insert([
            'id' => 2,
            'kode' => 'CAPP2',
            'keterangan' => 'Kepemilikan Perseroan Terbatas/Instansi/Yayasan yang belum didaftarkan pada MENKUNHAM',
            'rating' => '2',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pekerjaans')->insert([
            'id' => 3,
            'kode' => 'CAPP3',
            'keterangan' => 'Kepemilikan Perseroan Terbatas/Instansi/Yayasan yang didaftarkan pada MENKUNHAM',
            'rating' => '3',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pekerjaans')->insert([
            'id' => 4,
            'kode' => 'CAPP4',
            'keterangan' => 'Kepemilikan Perusahaan BUMN dan BUMD',
            'rating' => '4',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pekerjaans')->insert([
            'id' => 5,
            'kode' => 'CAPP5',
            'keterangan' => 'Kepemilikan instansi Pemerintah, TNI Polri, Perusahaan yang sudah Go Public',
            'rating' => '5',
            'bobot' => '0.08',
        ]);

        //PPR Capital Pengalaman Riwayat Pembiayaan
        DB::table('ppr_capital_pengalaman_pembiayaans')->insert([
            'id' => 1,
            'kode' => 'CAPRP1',
            'keterangan' => 'Pembiayaan macet',
            'rating' => '1',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pengalaman_pembiayaans')->insert([
            'id' => 2,
            'kode' => 'CAPRP2',
            'keterangan' => 'Masih ada tunggakan',
            'rating' => '2',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pengalaman_pembiayaans')->insert([
            'id' => 3,
            'kode' => 'CAPRP3',
            'keterangan' => 'Pernah menunggak, namun tunggakan angsuran telah dilunasi',
            'rating' => '3',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pengalaman_pembiayaans')->insert([
            'id' => 4,
            'kode' => 'CAPRP4',
            'keterangan' => 'Debitur baru, tidak memiliki riwayat pembiayaan',
            'rating' => '4',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capital_pengalaman_pembiayaans')->insert([
            'id' => 5,
            'kode' => 'CAPRP5',
            'keterangan' => 'Pembayaran angsuran selalu ditepati dan tidak menunggak',
            'rating' => '5',
            'bobot' => '0.08',
        ]);

        //PPR Capital Keamanan Bisnis/Pekerjaan
        DB::table('ppr_capital_keamanan_bisnis_pekerjaans')->insert([
            'id' => 1,
            'kode' => 'CAPKP1',
            'keterangan' => 'Non-Staff',
            'rating' => '1',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capital_keamanan_bisnis_pekerjaans')->insert([
            'id' => 2,
            'kode' => 'CAPKP2',
            'keterangan' => 'Staff',
            'rating' => '2',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capital_keamanan_bisnis_pekerjaans')->insert([
            'id' => 3,
            'kode' => 'CAPKP3',
            'keterangan' => 'Supervisor',
            'rating' => '3',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capital_keamanan_bisnis_pekerjaans')->insert([
            'id' => 4,
            'kode' => 'CAPKP4',
            'keterangan' => 'Posisi di Manajer ke atas',
            'rating' => '4',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capital_keamanan_bisnis_pekerjaans')->insert([
            'id' => 5,
            'kode' => 'CAPKP5',
            'keterangan' => 'Pengurus termasuk Pemilik Perusahaan (BOD)',
            'rating' => '5',
            'bobot' => '0.12',
        ]);

        //PPR Capital Potensi Pertumbuhan Hasil
        DB::table('ppr_capital_potensi_pertumbuhan_hasils')->insert([
            'id' => 1,
            'kode' => 'CAPPH1',
            'keterangan' => 'Nilai aset perusahaan tempat bekerja <10 Miliar',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capital_potensi_pertumbuhan_hasils')->insert([
            'id' => 2,
            'kode' => 'CAPPH2',
            'keterangan' => 'Nilai aset perusahaan tempat bekerja >10 > s/d 50 Miliar Miliar',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capital_potensi_pertumbuhan_hasils')->insert([
            'id' => 3,
            'kode' => 'CAPPH3',
            'keterangan' => 'Nilai aset perusahaan tempat bekerja >50 s/d 100 Miliar',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capital_potensi_pertumbuhan_hasils')->insert([
            'id' => 4,
            'kode' => 'CAPPH4',
            'keterangan' => 'Nilai aset perusahaan tempat bekerja >100 Miliar',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capital_potensi_pertumbuhan_hasils')->insert([
            'id' => 5,
            'kode' => 'CAPPH5',
            'keterangan' => 'Instansi Pemerintah, TNI Polri, Perusahaan yang sudah Go Public',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Capital Sumber Pendapatan
        DB::table('ppr_capital_sumber_pendapatans')->insert([
            'id' => 1,
            'kode' => 'CAPSP1',
            'keterangan' => 'Tidak ada pendapatan',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capital_sumber_pendapatans')->insert([
            'id' => 2,
            'kode' => 'CAPSP2',
            'keterangan' => 'Mempunyai pendapatan, tetapi tidak mencukupi',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capital_sumber_pendapatans')->insert([
            'id' => 3,
            'kode' => 'CAPSP3',
            'keterangan' => 'Pemohon saja (suami/istri saja)',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capital_sumber_pendapatans')->insert([
            'id' => 4,
            'kode' => 'CAPSP4',
            'keterangan' => 'Pemohon saja (suami/istri + penghasilan tambahan)',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capital_sumber_pendapatans')->insert([
            'id' => 5,
            'kode' => 'CAPSP5',
            'keterangan' => 'Suami istri join income',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Capital Pendapatan/Gaji Bersih
        DB::table('ppr_capital_gaji_bersihs')->insert([
            'id' => 1,
            'kode' => 'CAPGB1',
            'keterangan' => 'Pendapatan Bersih < 1 kali angsuran',
            'rating' => '1',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capital_gaji_bersihs')->insert([
            'id' => 2,
            'kode' => 'CAPGB2',
            'keterangan' => 'Pendapatan Bersih 1 kali angsuran',
            'rating' => '2',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capital_gaji_bersihs')->insert([
            'id' => 3,
            'kode' => 'CAPGB3',
            'keterangan' => 'Pendapatan Bersih 1 s/d 2 kali angsuran',
            'rating' => '3',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capital_gaji_bersihs')->insert([
            'id' => 4,
            'kode' => 'CAPGB4',
            'keterangan' => 'Pendapatan Bersih 2 s/d 3 kali angsuran',
            'rating' => '4',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capital_gaji_bersihs')->insert([
            'id' => 5,
            'kode' => 'CAPGB5',
            'keterangan' => 'Pendapatan Bersih >3 kali angsuran',
            'rating' => '5',
            'bobot' => '0.20',
        ]);

        //PPR Capital Jumlah Tanggungan Keluarga
        DB::table('ppr_capital_jml_tanggungan_keluargas')->insert([
            'id' => 1,
            'kode' => 'CAPJTK1',
            'keterangan' => '>3 anak ditambah dengan istri/suami + orang tua + saudara',
            'rating' => '1',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capital_jml_tanggungan_keluargas')->insert([
            'id' => 2,
            'kode' => 'CAPJTK2',
            'keterangan' => '3 anak ditambah dengan istri/suami + orang tua',
            'rating' => '2',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capital_jml_tanggungan_keluargas')->insert([
            'id' => 3,
            'kode' => 'CAPJTK3',
            'keterangan' => '3 anak ditambah dengan istri/suami',
            'rating' => '3',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capital_jml_tanggungan_keluargas')->insert([
            'id' => 4,
            'kode' => 'CAPJTK4',
            'keterangan' => '1 s/d 2 anak ditambah dengan istri/suami',
            'rating' => '4',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capital_jml_tanggungan_keluargas')->insert([
            'id' => 5,
            'kode' => 'CAPJTK5',
            'keterangan' => '1 anak atau 1 istri/suami',
            'rating' => '5',
            'bobot' => '0.07',
        ]);

        //PPR Capacity Pekerjaan
        DB::table('ppr_capacity_pekerjaans')->insert([
            'id' => 1,
            'kode' => 'CTYP1',
            'keterangan' => 'Freelance',
            'rating' => '1',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pekerjaans')->insert([
            'id' => 2,
            'kode' => 'CTYP2',
            'keterangan' => 'Pegawai kontrak dengan masa kerja <5 tahun',
            'rating' => '2',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pekerjaans')->insert([
            'id' => 3,
            'kode' => 'CTYP3',
            'keterangan' => 'Pegawai kontrak dengan masa kerja >5 tahun',
            'rating' => '3',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pekerjaans')->insert([
            'id' => 4,
            'kode' => 'CTYP4',
            'keterangan' => 'Pegawai tetap dengan masa kerja <2 tahun',
            'rating' => '4',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pekerjaans')->insert([
            'id' => 5,
            'kode' => 'CTYP5',
            'keterangan' => 'Pegawai tetap dengan masa kerja >2 tahun',
            'rating' => '5',
            'bobot' => '0.08',
        ]);

        //PPR Capacity Pengalaman Riwayat Pembiayaan
        DB::table('ppr_capacity_pengalaman_pembiayaans')->insert([
            'id' => 1,
            'kode' => 'CTYRP1',
            'keterangan' => 'Pembiayaan macet',
            'rating' => '1',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pengalaman_pembiayaans')->insert([
            'id' => 2,
            'kode' => 'CTYRP2',
            'keterangan' => 'Masih ada tunggakan',
            'rating' => '2',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pengalaman_pembiayaans')->insert([
            'id' => 3,
            'kode' => 'CTYRP3',
            'keterangan' => 'Pernah menunggak, namun tunggakan angsuran telah dilunasi',
            'rating' => '3',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pengalaman_pembiayaans')->insert([
            'id' => 4,
            'kode' => 'CTYRP4',
            'keterangan' => 'Debitur baru, tidak memiliki riwayat pembiayaan',
            'rating' => '4',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_capacity_pengalaman_pembiayaans')->insert([
            'id' => 5,
            'kode' => 'CTYRP5',
            'keterangan' => 'Pembayaran angsuran selalu ditepati dan tidak menunggak',
            'rating' => '5',
            'bobot' => '0.08',
        ]);

        //PPR Capacity Keamanan Bisnis/Pekerjaan
        DB::table('ppr_capacity_keamanan_bisnis_pekerjaans')->insert([
            'id' => 1,
            'kode' => 'CTYKB1',
            'keterangan' => 'Non-Staff',
            'rating' => '1',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capacity_keamanan_bisnis_pekerjaans')->insert([
            'id' => 2,
            'kode' => 'CTYKB2',
            'keterangan' => 'Staff',
            'rating' => '2',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capacity_keamanan_bisnis_pekerjaans')->insert([
            'id' => 3,
            'kode' => 'CTYKB3',
            'keterangan' => 'Supervisor',
            'rating' => '3',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capacity_keamanan_bisnis_pekerjaans')->insert([
            'id' => 4,
            'kode' => 'CTYKB4',
            'keterangan' => 'Posisi di Manajer Media/Prospek Bisnis Cukup',
            'rating' => '4',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_capacity_keamanan_bisnis_pekerjaans')->insert([
            'id' => 5,
            'kode' => 'CTYKB5',
            'keterangan' => 'Pengurus termasuk Pemilik Perusahaan (BOD)',
            'rating' => '5',
            'bobot' => '0.12',
        ]);

        //PPR Capacity Potensi Pertumbuhan Hasil
        DB::table('ppr_capacity_potensi_pertumbuhan_hasils')->insert([
            'id' => 1,
            'kode' => 'CTYPH1',
            'keterangan' => 'Menempati jabatan saat ini >8 tahun',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_potensi_pertumbuhan_hasils')->insert([
            'id' => 2,
            'kode' => 'CTYPH2',
            'keterangan' => 'Menempati jabatan saat ini >4 s/d 8 tahun',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_potensi_pertumbuhan_hasils')->insert([
            'id' => 3,
            'kode' => 'CTYPH3',
            'keterangan' => 'Karir cukup dan menempati jabatan yang saat ini telah >1 s/d 4 tahun',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_potensi_pertumbuhan_hasils')->insert([
            'id' => 4,
            'kode' => 'CTYPH4',
            'keterangan' => 'Karir bagus, namun tidak ada kesempatan promosi',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_potensi_pertumbuhan_hasils')->insert([
            'id' => 5,
            'kode' => 'CTYPH5',
            'keterangan' => 'Karir bagus kemungkinan untuk promosi',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Capacity Pengalaman Kerja
        DB::table('ppr_capacity_pengalaman_kerjas')->insert([
            'id' => 1,
            'kode' => 'CTYPK1',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini < 1 tahun',
            'rating' => '1',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_capacity_pengalaman_kerjas')->insert([
            'id' => 2,
            'kode' => 'CTYPK2',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini > 1 s/d 2 tahun',
            'rating' => '2',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_capacity_pengalaman_kerjas')->insert([
            'id' => 3,
            'kode' => 'CTYPK3',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini > 2 s/d 5 tahun',
            'rating' => '3',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_capacity_pengalaman_kerjas')->insert([
            'id' => 4,
            'kode' => 'CTYPK4',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini > 5 s/d 8 tahun',
            'rating' => '4',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_capacity_pengalaman_kerjas')->insert([
            'id' => 5,
            'kode' => 'CTYPK5',
            'keterangan' => '>8 tahun di Perusahaan BUMN, dengan Kinerja Baik',
            'rating' => '5',
            'bobot' => '0.05',
        ]);

        //PPR Capacity Pendidikan
        DB::table('ppr_capacity_pendidikans')->insert([
            'id' => 1,
            'kode' => 'CTYPD1',
            'keterangan' => 'Tidak sekolah',
            'rating' => '1',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_capacity_pendidikans')->insert([
            'id' => 2,
            'kode' => 'CTYPD2',
            'keterangan' => 'SD sederajat',
            'rating' => '2',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_capacity_pendidikans')->insert([
            'id' => 3,
            'kode' => 'CTYPD3',
            'keterangan' => 'SMP sederajat',
            'rating' => '3',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_capacity_pendidikans')->insert([
            'id' => 4,
            'kode' => 'CTYPD4',
            'keterangan' => 'SMA sederajat',
            'rating' => '4',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_capacity_pendidikans')->insert([
            'id' => 5,
            'kode' => 'CTYPD5',
            'keterangan' => 'S1 ke atas',
            'rating' => '5',
            'bobot' => '0.09',
        ]);

        //PPR Capacity Usia
        DB::table('ppr_capacity_usias')->insert([
            'id' => 1,
            'kode' => 'CTYU1',
            'keterangan' => '> 55 tahun',
            'rating' => '1',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_capacity_usias')->insert([
            'id' => 2,
            'kode' => 'CTYU2',
            'keterangan' => '> 50 – 55 tahun',
            'rating' => '2',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_capacity_usias')->insert([
            'id' => 3,
            'kode' => 'CTYU3',
            'keterangan' => '> 38 – 50 tahun',
            'rating' => '3',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_capacity_usias')->insert([
            'id' => 4,
            'kode' => 'CTYU4',
            'keterangan' => '> 35 – 38 tahun',
            'rating' => '4',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_capacity_usias')->insert([
            'id' => 5,
            'kode' => 'CTYU5',
            'keterangan' => '> 21 – 35 tahun',
            'rating' => '5',
            'bobot' => '0.06',
        ]);

        //PPR Capacity Sumber Pendapatan
        DB::table('ppr_capacity_sumber_pendapatans')->insert([
            'id' => 1,
            'kode' => 'CTYSP1',
            'keterangan' => 'Tidak ada pendapatan',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capacity_sumber_pendapatans')->insert([
            'id' => 2,
            'kode' => 'CTYSP2',
            'keterangan' => 'Mempunyai pendapatan, tetapi tidak mencukupi',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capacity_sumber_pendapatans')->insert([
            'id' => 3,
            'kode' => 'CTYSP3',
            'keterangan' => 'Pemohon saja (suami/istri saja)',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capacity_sumber_pendapatans')->insert([
            'id' => 4,
            'kode' => 'CTYSP4',
            'keterangan' => 'Pemohon saja (suami/istri + penghasilan tambahan)',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_capacity_sumber_pendapatans')->insert([
            'id' => 5,
            'kode' => 'CTYSP5',
            'keterangan' => 'Suami istri join income',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Capacity Pendapatan/Gaji Bersih
        DB::table('ppr_capacity_gaji_bersihs')->insert([
            'id' => 1,
            'kode' => 'CTYGB1',
            'keterangan' => 'Pendapatan Bersih < 1 kali angsuran',
            'rating' => '1',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capacity_gaji_bersihs')->insert([
            'id' => 2,
            'kode' => 'CTYGB2',
            'keterangan' => 'Pendapatan Bersih 1 kali angsuran',
            'rating' => '2',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capacity_gaji_bersihs')->insert([
            'id' => 3,
            'kode' => 'CTYGB3',
            'keterangan' => 'Pendapatan Bersih 1 s/d 2 kali angsuran',
            'rating' => '3',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capacity_gaji_bersihs')->insert([
            'id' => 4,
            'kode' => 'CTYGB4',
            'keterangan' => 'Pendapatan Bersih 2 s/d 3 kali angsuran',
            'rating' => '4',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_capacity_gaji_bersihs')->insert([
            'id' => 5,
            'kode' => 'CTYGB5',
            'keterangan' => 'Pendapatan Bersih >3 kali angsuran',
            'rating' => '5',
            'bobot' => '0.20',
        ]);

        //PPR Capacity Jumlah Tanggungan Keluarga
        DB::table('ppr_capacity_jml_tanggungan_keluargas')->insert([
            'id' => 1,
            'kode' => 'CTYTK1',
            'keterangan' => '>3 anak ditambah dengan istri/suami + orang tua + saudara',
            'rating' => '1',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capacity_jml_tanggungan_keluargas')->insert([
            'id' => 2,
            'kode' => 'CTYTK2',
            'keterangan' => '3 anak ditambah dengan istri/suami + orang tua',
            'rating' => '2',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capacity_jml_tanggungan_keluargas')->insert([
            'id' => 3,
            'kode' => 'CTYTK3',
            'keterangan' => '3 anak ditambah dengan istri/suami',
            'rating' => '3',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capacity_jml_tanggungan_keluargas')->insert([
            'id' => 4,
            'kode' => 'CTYTK4',
            'keterangan' => '2 anak ditambah dengan istri/suami',
            'rating' => '4',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_capacity_jml_tanggungan_keluargas')->insert([
            'id' => 5,
            'kode' => 'CTYTK5',
            'keterangan' => 'Tidak ada tanggungan',
            'rating' => '5',
            'bobot' => '0.07',
        ]);

        //PPR Condition & Sharia Pekerjaan
        DB::table('ppr_condition_sharia_pekerjaans')->insert([
            'id' => 1,
            'kode' => 'CSP1',
            'keterangan' => 'Perusahaan trend menurun',
            'rating' => '1',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pekerjaans')->insert([
            'id' => 2,
            'kode' => 'CSP2',
            'keterangan' => 'Kondisi tidak stabil, ada pengurangan pegawai',
            'rating' => '2',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pekerjaans')->insert([
            'id' => 3,
            'kode' => 'CSP3',
            'keterangan' => 'Kondisi stabil, ada pengurangan pegawai',
            'rating' => '3',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pekerjaans')->insert([
            'id' => 4,
            'kode' => 'CSP4',
            'keterangan' => 'Kondisi stabil, tidak ada pengurangan pegawai dalam jangka waktu 1 s/d 2 tahun',
            'rating' => '4',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pekerjaans')->insert([
            'id' => 5,
            'kode' => 'CSP5',
            'keterangan' => 'Kondisi trend naik, tidak ada pengurangan pegawai dalam jangka waktu > 2 tahun',
            'rating' => '5',
            'bobot' => '0.08',
        ]);

        //PPR Condition & Sharia Pengalaman Riwayat Pembiayaan
        DB::table('ppr_condition_sharia_pengalaman_pembiayaans')->insert([
            'id' => 1,
            'kode' => 'CSRP1',
            'keterangan' => 'Pembiayaan macet',
            'rating' => '1',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_pembiayaans')->insert([
            'id' => 2,
            'kode' => 'CSRP2',
            'keterangan' => 'Masih ada tunggakan',
            'rating' => '2',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_pembiayaans')->insert([
            'id' => 3,
            'kode' => 'CSRP3',
            'keterangan' => 'Pernah menunggak, namun tunggakan angsuran telah dilunasi',
            'rating' => '3',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_pembiayaans')->insert([
            'id' => 4,
            'kode' => 'CSRP4',
            'keterangan' => 'Debitur baru, tidak memiliki riwayat pembiayaan',
            'rating' => '4',
            'bobot' => '0.08',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_pembiayaans')->insert([
            'id' => 5,
            'kode' => 'CSRP5',
            'keterangan' => 'Pembayaran angsuran selalu ditepati dan tidak menunggak',
            'rating' => '5',
            'bobot' => '0.08',
        ]);

        //PPR Condition & Sharia Keamanan Bisnis/Pekerjaan
        DB::table('ppr_condition_sharia_keamanan_bisnis_pekerjaans')->insert([
            'id' => 1,
            'kode' => 'CSKB1',
            'keterangan' => 'Non-Staff',
            'rating' => '1',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_condition_sharia_keamanan_bisnis_pekerjaans')->insert([
            'id' => 2,
            'kode' => 'CSKB2',
            'keterangan' => 'Staff',
            'rating' => '2',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_condition_sharia_keamanan_bisnis_pekerjaans')->insert([
            'id' => 3,
            'kode' => 'CSKB3',
            'keterangan' => 'Supervisor',
            'rating' => '3',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_condition_sharia_keamanan_bisnis_pekerjaans')->insert([
            'id' => 4,
            'kode' => 'CSKB4',
            'keterangan' => 'Posisi di Manajer Media/Prospek Bisnis Cukup',
            'rating' => '4',
            'bobot' => '0.12',
        ]);

        DB::table('ppr_condition_sharia_keamanan_bisnis_pekerjaans')->insert([
            'id' => 5,
            'kode' => 'CSKB5',
            'keterangan' => 'Pengurus termasuk Pemilik Perusahaan (BOD)',
            'rating' => '5',
            'bobot' => '0.12',
        ]);

        //PPR Condition & Sharia Potensi Pertumbuhan Hasil
        DB::table('ppr_condition_sharia_potensi_pertumbuhan_hasils')->insert([
            'id' => 1,
            'kode' => 'CSPH1',
            'keterangan' => 'Menempati jabatan saat ini >8 tahun',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_potensi_pertumbuhan_hasils')->insert([
            'id' => 2,
            'kode' => 'CSPH2',
            'keterangan' => 'Menempati jabatan saat ini >4 s/d 8 tahun',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_potensi_pertumbuhan_hasils')->insert([
            'id' => 3,
            'kode' => 'CSPH3',
            'keterangan' => 'Karir cukup dan menempati jabatan yang saat ini telah >1 s/d 4 tahun',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_potensi_pertumbuhan_hasils')->insert([
            'id' => 4,
            'kode' => 'CSPH4',
            'keterangan' => 'Karir bagus, namun tidak ada kesempatan promosi',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_potensi_pertumbuhan_hasils')->insert([
            'id' => 5,
            'kode' => 'CSPH5',
            'keterangan' => 'Karir bagus kemungkinan untuk promosi',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Condition & Sharia Pengalaman Kerja
        DB::table('ppr_condition_sharia_pengalaman_kerjas')->insert([
            'id' => 1,
            'kode' => 'CSPK1',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini < 1 tahun',
            'rating' => '1',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_kerjas')->insert([
            'id' => 2,
            'kode' => 'CSPK2',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini > 1 s/d 2 tahun',
            'rating' => '2',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_kerjas')->insert([
            'id' => 3,
            'kode' => 'CSPK3',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini > 2 s/d 5 tahun',
            'rating' => '3',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_kerjas')->insert([
            'id' => 4,
            'kode' => 'CSPK4',
            'keterangan' => 'Pada Perusahaan/Instansi/Industri yang sama saat ini > 5 s/d 8 tahun',
            'rating' => '4',
            'bobot' => '0.05',
        ]);

        DB::table('ppr_condition_sharia_pengalaman_kerjas')->insert([
            'id' => 5,
            'kode' => 'CSPK5',
            'keterangan' => '>8 tahun di Perusahaan BUMN, dengan Kinerja Baik',
            'rating' => '5',
            'bobot' => '0.05',
        ]);

        //PPR Condition & Sharia Pendidikan
        DB::table('ppr_condition_sharia_pendidikans')->insert([
            'id' => 1,
            'kode' => 'CSPD1',
            'keterangan' => 'Tidak sekolah',
            'rating' => '1',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_condition_sharia_pendidikans')->insert([
            'id' => 2,
            'kode' => 'CSPD2',
            'keterangan' => 'SD sederajat',
            'rating' => '2',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_condition_sharia_pendidikans')->insert([
            'id' => 3,
            'kode' => 'CSPD3',
            'keterangan' => 'SMP sederajat',
            'rating' => '3',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_condition_sharia_pendidikans')->insert([
            'id' => 4,
            'kode' => 'CSPD4',
            'keterangan' => 'SMA sederajat',
            'rating' => '4',
            'bobot' => '0.09',
        ]);

        DB::table('ppr_condition_sharia_pendidikans')->insert([
            'id' => 5,
            'kode' => 'CSPD5',
            'keterangan' => 'S1 ke atas',
            'rating' => '5',
            'bobot' => '0.09',
        ]);

        //PPR Condition & Sharia Usia
        DB::table('ppr_condition_sharia_usias')->insert([
            'id' => 1,
            'kode' => 'CSU1',
            'keterangan' => '> 55 tahun',
            'rating' => '1',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_condition_sharia_usias')->insert([
            'id' => 2,
            'kode' => 'CSU2',
            'keterangan' => '> 50 – 55 tahun',
            'rating' => '2',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_condition_sharia_usias')->insert([
            'id' => 3,
            'kode' => 'CSU3',
            'keterangan' => '> 38 – 50 tahun',
            'rating' => '3',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_condition_sharia_usias')->insert([
            'id' => 4,
            'kode' => 'CSU4',
            'keterangan' => '> 35 – 38 tahun',
            'rating' => '4',
            'bobot' => '0.06',
        ]);

        DB::table('ppr_condition_sharia_usias')->insert([
            'id' => 5,
            'kode' => 'CSU5',
            'keterangan' => '> 21 – 35 tahun',
            'rating' => '5',
            'bobot' => '0.06',
        ]);

        //PPR Condition & Sharia Sumber Pendapatan
        DB::table('ppr_condition_sharia_sumber_pendapatans')->insert([
            'id' => 1,
            'kode' => 'CSSP1',
            'keterangan' => 'Tidak ada pendapatan',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_condition_sharia_sumber_pendapatans')->insert([
            'id' => 2,
            'kode' => 'CSSP2',
            'keterangan' => 'Mempunyai pendapatan, tetapi tidak mencukupi',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_condition_sharia_sumber_pendapatans')->insert([
            'id' => 3,
            'kode' => 'CSSP3',
            'keterangan' => 'Pemohon saja (suami/istri saja)',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_condition_sharia_sumber_pendapatans')->insert([
            'id' => 4,
            'kode' => 'CSSP4',
            'keterangan' => 'Pemohon saja (suami/istri + penghasilan tambahan)',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_condition_sharia_sumber_pendapatans')->insert([
            'id' => 5,
            'kode' => 'CSSP5',
            'keterangan' => 'Suami istri join income',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Condition & Sharia Pendapatan/Gaji Bersih
        DB::table('ppr_condition_sharia_gaji_bersihs')->insert([
            'id' => 1,
            'kode' => 'CSGB1',
            'keterangan' => 'Pendapatan Bersih < 1 kali angsuran',
            'rating' => '1',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_condition_sharia_gaji_bersihs')->insert([
            'id' => 2,
            'kode' => 'CSGB2',
            'keterangan' => 'Pendapatan Bersih 1 kali angsuran',
            'rating' => '2',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_condition_sharia_gaji_bersihs')->insert([
            'id' => 3,
            'kode' => 'CSGB3',
            'keterangan' => 'Pendapatan Bersih 1 s/d 2 kali angsuran',
            'rating' => '3',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_condition_sharia_gaji_bersihs')->insert([
            'id' => 4,
            'kode' => 'CSGB4',
            'keterangan' => 'Pendapatan Bersih 2 s/d 3 kali angsuran',
            'rating' => '4',
            'bobot' => '0.20',
        ]);

        DB::table('ppr_condition_sharia_gaji_bersihs')->insert([
            'id' => 5,
            'kode' => 'CSGB5',
            'keterangan' => 'Pendapatan Bersih >3 kali angsuran',
            'rating' => '5',
            'bobot' => '0.20',
        ]);

        //PPR Condition & Sharia Jumlah Tanggungan Keluarga
        DB::table('ppr_condition_sharia_jml_tanggungan_keluargas')->insert([
            'id' => 1,
            'kode' => 'CSJTK1',
            'keterangan' => '>3 anak ditambah dengan istri/suami + orang tua + saudara',
            'rating' => '1',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_condition_sharia_jml_tanggungan_keluargas')->insert([
            'id' => 2,
            'kode' => 'CSJTK2',
            'keterangan' => '3 anak ditambah dengan istri/suami + orang tua',
            'rating' => '2',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_condition_sharia_jml_tanggungan_keluargas')->insert([
            'id' => 3,
            'kode' => 'CSJTK3',
            'keterangan' => '3 anak ditambah dengan istri/suami',
            'rating' => '3',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_condition_sharia_jml_tanggungan_keluargas')->insert([
            'id' => 4,
            'kode' => 'CSJTK4',
            'keterangan' => '2 anak ditambah dengan istri/suami',
            'rating' => '4',
            'bobot' => '0.07',
        ]);

        DB::table('ppr_condition_sharia_jml_tanggungan_keluargas')->insert([
            'id' => 5,
            'kode' => 'CSJTK5',
            'keterangan' => 'Tidak ada tanggungan',
            'rating' => '5',
            'bobot' => '0.07',
        ]);

        //PPR Collateral Marketabilitas
        DB::table('ppr_collateral_marketabilitas')->insert([
            'id' => 1,
            'kode' => 'CLTM1',
            'keterangan' => 'Agunan sulit dijual',
            'rating' => '1',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_marketabilitas')->insert([
            'id' => 2,
            'kode' => 'CLTM2',
            'keterangan' => 'Agunan bisa dijual, tetapi membutuhkan waktu relatif lama',
            'rating' => '2',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_marketabilitas')->insert([
            'id' => 3,
            'kode' => 'CLTM3',
            'keterangan' => 'Agunan cukup mudah dijual',
            'rating' => '3',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_marketabilitas')->insert([
            'id' => 4,
            'kode' => 'CLTM4',
            'keterangan' => 'Daya jual agunan cukup tinggi',
            'rating' => '4',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_marketabilitas')->insert([
            'id' => 5,
            'kode' => 'CLTM5',
            'keterangan' => 'Agunan sangat mudah dijual setiap saat',
            'rating' => '5',
            'bobot' => '0.30',
        ]);

        //PPR Collateral Kontribusi Pemohon = FTV
        DB::table('ppr_collateral_kontribusi_pemohons')->insert([
            'id' => 1,
            'kode' => 'CLTKP1',
            'keterangan' => 'Agunan mengcover < 50%A',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_kontribusi_pemohons')->insert([
            'id' => 2,
            'kode' => 'CLTKP2',
            'keterangan' => 'Agunan mengcover > 50% s/d 60%',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_kontribusi_pemohons')->insert([
            'id' => 3,
            'kode' => 'CLTKP3',
            'keterangan' => 'Agunan mengcover > 60% s/d 80%',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_kontribusi_pemohons')->insert([
            'id' => 4,
            'kode' => 'CLTKP4',
            'keterangan' => 'Agunan mengcover > 80% s/d 100%',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_kontribusi_pemohons')->insert([
            'id' => 5,
            'kode' => 'CLTKP5',
            'keterangan' => 'Agunan mengcover > 100%',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Collateral Pertumbuhan Agunan
        DB::table('ppr_collateral_pertumbuhan_agunans')->insert([
            'id' => 1,
            'kode' => 'CLTPA1',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 5 tahun',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_pertumbuhan_agunans')->insert([
            'id' => 2,
            'kode' => 'CLTPA2',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 4 tahun',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_pertumbuhan_agunans')->insert([
            'id' => 3,
            'kode' => 'CLTPA3',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 3 tahun',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_pertumbuhan_agunans')->insert([
            'id' => 4,
            'kode' => 'CLTPA4',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 2 tahun',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_pertumbuhan_agunans')->insert([
            'id' => 5,
            'kode' => 'CLTPA5',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 1 tahun',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Collateral Daya Tarik Agunan
        DB::table('ppr_collateral_daya_tarik_agunans')->insert([
            'id' => 1,
            'kode' => 'CLTDTA1',
            'keterangan' => 'Tidak ada akses',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_daya_tarik_agunans')->insert([
            'id' => 2,
            'kode' => 'CLTDTA2',
            'keterangan' => 'Akses motor',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_daya_tarik_agunans')->insert([
            'id' => 3,
            'kode' => 'CLTDTA3',
            'keterangan' => 'Akses satu mobil',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_daya_tarik_agunans')->insert([
            'id' => 4,
            'kode' => 'CLTDTA4',
            'keterangan' => 'Akses satu mobil + dapat dilalui angkutan umum',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_daya_tarik_agunans')->insert([
            'id' => 5,
            'kode' => 'CLTDTA5',
            'keterangan' => 'Akses mobil dua arah',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Collateral Jangka Waktu Likuidasi
        DB::table('ppr_collateral_jangka_waktu_likuidasis')->insert([
            'id' => 1,
            'kode' => 'CLTJWL1',
            'keterangan' => '>5 tahun',
            'rating' => '1',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_jangka_waktu_likuidasis')->insert([
            'id' => 2,
            'kode' => 'CLTJWL2',
            'keterangan' => '>2 tahun s/d 5 tahun',
            'rating' => '2',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_jangka_waktu_likuidasis')->insert([
            'id' => 3,
            'kode' => 'CLTJWL3',
            'keterangan' => '>1 tahun s/d 2 tahun',
            'rating' => '3',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_jangka_waktu_likuidasis')->insert([
            'id' => 4,
            'kode' => 'CLTJWL4',
            'keterangan' => '>6 bulan s/d 1 tahun',
            'rating' => '4',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_jangka_waktu_likuidasis')->insert([
            'id' => 5,
            'kode' => 'CLTJWL5',
            'keterangan' => '1 bulan s/d 6 bulan',
            'rating' => '5',
            'bobot' => '0.30',
        ]);


        //Non Fixed Income

        //PPR Character Tingkat Kepercayaan
        DB::table('ppr_character_nf_tingkat_kepercayaans')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_tingkat_kepercayaans')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_tingkat_kepercayaans')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_tingkat_kepercayaans')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_tingkat_kepercayaans')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.25',
        ]);

        //PPR Character Pengelolaan Rekening Bank
        DB::table('ppr_character_nf_pengelolaan_rekenings')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_pengelolaan_rekenings')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_pengelolaan_rekenings')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_pengelolaan_rekenings')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_pengelolaan_rekenings')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.25',
        ]);

        //PPR Character Reputasi Bisnis
        DB::table('ppr_character_nf_reputasi_bisnis')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_reputasi_bisnis')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_reputasi_bisnis')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_reputasi_bisnis')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_reputasi_bisnis')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.25',
        ]);

        //PPR Character Perilaku Pribadi Debitur
        DB::table('ppr_character_nf_perilaku_pribadis')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_perilaku_pribadis')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_perilaku_pribadis')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_perilaku_pribadis')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.25',
        ]);

        DB::table('ppr_character_nf_perilaku_pribadis')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.25',
        ]);

        //PPR Capacity Situasi Pasar dan Persaingan
        DB::table('ppr_capacity_nf_situasi_persaingans')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_situasi_persaingans')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_situasi_persaingans')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_situasi_persaingans')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_situasi_persaingans')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.14',
        ]);

        //PPR Capacity Kaderisasi
        DB::table('ppr_capacity_nf_kaderisasis')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kaderisasis')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kaderisasis')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kaderisasis')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kaderisasis')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.14',
        ]);

        //PPR Capacity Kualifikasi Komersial
        DB::table('ppr_capacity_nf_kualifikasi_komersials')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_komersials')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_komersials')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_komersials')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_komersials')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.14',
        ]);

        //PPR Capacity Kualifikasi Teknis
        DB::table('ppr_capacity_nf_kualifikasi_teknis')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_teknis')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_teknis')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_teknis')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_capacity_nf_kualifikasi_teknis')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Condition & Sharia Kualitas Produk dan Jasa
        DB::table('ppr_condition_sharia_nf_kualitas_produk_jasas')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_nf_kualitas_produk_jasas')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_nf_kualitas_produk_jasas')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_nf_kualitas_produk_jasas')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_condition_sharia_nf_kualitas_produk_jasas')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Condition & Sharia Sistem Pembayaran
        DB::table('ppr_condition_sharia_nf_sistem_pembayarans')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_sistem_pembayarans')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_sistem_pembayarans')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_sistem_pembayarans')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_sistem_pembayarans')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.14',
        ]);

        //PPR Condition & Sharia Lokasi Usaha
        DB::table('ppr_condition_sharia_nf_lokasi_usahas')->insert([
            'id' => 1,
            'kode' => '1',
            'keterangan' => 'Sangat Kurang',
            'rating' => '1',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_lokasi_usahas')->insert([
            'id' => 2,
            'kode' => '2',
            'keterangan' => 'Kurang',
            'rating' => '2',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_lokasi_usahas')->insert([
            'id' => 3,
            'kode' => '3',
            'keterangan' => 'Cukup Baik',
            'rating' => '3',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_lokasi_usahas')->insert([
            'id' => 4,
            'kode' => '4',
            'keterangan' => 'Baik',
            'rating' => '4',
            'bobot' => '0.14',
        ]);

        DB::table('ppr_condition_sharia_nf_lokasi_usahas')->insert([
            'id' => 5,
            'kode' => '5',
            'keterangan' => 'Sangat Baik',
            'rating' => '5',
            'bobot' => '0.14',
        ]);

        //PPR Collateral Marketabilitas
        DB::table('ppr_collateral_nf_marketabilitas')->insert([
            'id' => 1,
            'kode' => 'CLTM1',
            'keterangan' => 'Agunan sulit dijual',
            'rating' => '1',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_marketabilitas')->insert([
            'id' => 2,
            'kode' => 'CLTM2',
            'keterangan' => 'Agunan bisa dijual, tetapi membutuhkan waktu relatif lama',
            'rating' => '2',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_marketabilitas')->insert([
            'id' => 3,
            'kode' => 'CLTM3',
            'keterangan' => 'Agunan cukup mudah dijual',
            'rating' => '3',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_marketabilitas')->insert([
            'id' => 4,
            'kode' => 'CLTM4',
            'keterangan' => 'Daya jual agunan cukup tinggi',
            'rating' => '4',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_marketabilitas')->insert([
            'id' => 5,
            'kode' => 'CLTM5',
            'keterangan' => 'Agunan sangat mudah dijual setiap saat',
            'rating' => '5',
            'bobot' => '0.30',
        ]);

        //PPR Collateral Kontribusi Pemohon = FTV
        DB::table('ppr_collateral_nf_kontribusi_pemohons')->insert([
            'id' => 1,
            'kode' => 'CLTKP1',
            'keterangan' => 'Agunan mengcover < 50%A',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_kontribusi_pemohons')->insert([
            'id' => 2,
            'kode' => 'CLTKP2',
            'keterangan' => 'Agunan mengcover > 50% s/d 60%',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_kontribusi_pemohons')->insert([
            'id' => 3,
            'kode' => 'CLTKP3',
            'keterangan' => 'Agunan mengcover > 60% s/d 80%',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_kontribusi_pemohons')->insert([
            'id' => 4,
            'kode' => 'CLTKP4',
            'keterangan' => 'Agunan mengcover > 80% s/d 100%',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_kontribusi_pemohons')->insert([
            'id' => 5,
            'kode' => 'CLTKP5',
            'keterangan' => 'Agunan mengcover > 100%',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Collateral Pertumbuhan Agunan
        DB::table('ppr_collateral_nf_pertumbuhan_agunans')->insert([
            'id' => 1,
            'kode' => 'CLTPA1',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 5 tahun',
            'rating' => '1',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_nf_pertumbuhan_agunans')->insert([
            'id' => 2,
            'kode' => 'CLTPA2',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 4 tahun',
            'rating' => '2',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_nf_pertumbuhan_agunans')->insert([
            'id' => 3,
            'kode' => 'CLTPA3',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 3 tahun',
            'rating' => '3',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_nf_pertumbuhan_agunans')->insert([
            'id' => 4,
            'kode' => 'CLTPA4',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 2 tahun',
            'rating' => '4',
            'bobot' => '0.10',
        ]);

        DB::table('ppr_collateral_nf_pertumbuhan_agunans')->insert([
            'id' => 5,
            'kode' => 'CLTPA5',
            'keterangan' => 'Cukup Baik dan Prospek hunian ramai dalam waktu 1 tahun',
            'rating' => '5',
            'bobot' => '0.10',
        ]);

        //PPR Collateral Daya Tarik Agunan
        DB::table('ppr_collateral_nf_daya_tarik_agunans')->insert([
            'id' => 1,
            'kode' => 'CLTDTA1',
            'keterangan' => 'Tidak ada akses',
            'rating' => '1',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_daya_tarik_agunans')->insert([
            'id' => 2,
            'kode' => 'CLTDTA2',
            'keterangan' => 'Akses motor',
            'rating' => '2',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_daya_tarik_agunans')->insert([
            'id' => 3,
            'kode' => 'CLTDTA3',
            'keterangan' => 'Akses satu mobil',
            'rating' => '3',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_daya_tarik_agunans')->insert([
            'id' => 4,
            'kode' => 'CLTDTA4',
            'keterangan' => 'Akses satu mobil + dapat dilalui angkutan umum',
            'rating' => '4',
            'bobot' => '0.15',
        ]);

        DB::table('ppr_collateral_nf_daya_tarik_agunans')->insert([
            'id' => 5,
            'kode' => 'CLTDTA5',
            'keterangan' => 'Akses mobil dua arah',
            'rating' => '5',
            'bobot' => '0.15',
        ]);

        //PPR Collateral Jangka Waktu Likuidasi
        DB::table('ppr_collateral_nf_jangka_waktu_likuidasis')->insert([
            'id' => 1,
            'kode' => 'CLTJWL1',
            'keterangan' => '>5 tahun',
            'rating' => '1',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_jangka_waktu_likuidasis')->insert([
            'id' => 2,
            'kode' => 'CLTJWL2',
            'keterangan' => '>2 tahun s/d 5 tahun',
            'rating' => '2',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_jangka_waktu_likuidasis')->insert([
            'id' => 3,
            'kode' => 'CLTJWL3',
            'keterangan' => '>1 tahun s/d 2 tahun',
            'rating' => '3',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_jangka_waktu_likuidasis')->insert([
            'id' => 4,
            'kode' => 'CLTJWL4',
            'keterangan' => '>6 bulan s/d 1 tahun',
            'rating' => '4',
            'bobot' => '0.30',
        ]);

        DB::table('ppr_collateral_nf_jangka_waktu_likuidasis')->insert([
            'id' => 5,
            'kode' => 'CLTJWL5',
            'keterangan' => '1 bulan s/d 6 bulan',
            'rating' => '5',
            'bobot' => '0.30',
        ]);
    }
}
