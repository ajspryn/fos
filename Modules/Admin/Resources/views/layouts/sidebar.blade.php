<!-- BEGIN: Main Menu-->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/admin" class="app-brand-link">
            <img src="{{ asset('logo.png') }}" height="50" alt="">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('admin') ? 'active' : '' }}">
            <a href="/admin" class="menu-link">
                <i data-feather="home" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/monitoring*') ? 'active' : '' }}">
            <a href="/admin/monitoring" class="menu-link">
                <i data-feather="activity" class="menu-icon tf-icons"></i>
                <div data-i18n="Monitoring Pengajuan">Monitoring Pengajuan</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Analitik</span>
        </li>

        <li class="menu-item {{ Request::is('admin/ao-performance*') ? 'active' : '' }}">
            <a href="/admin/ao-performance" class="menu-link">
                <i data-feather="trending-up" class="menu-icon tf-icons"></i>
                <div>Performa AO</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('admin/activity-log*') ? 'active' : '' }}">
            <a href="/admin/activity-log" class="menu-link">
                <i data-feather="list" class="menu-icon tf-icons"></i>
                <div>Log Aktivitas</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">User & Bobot</span>
        </li>

        <li class="menu-item {{ Request::is('admin/user*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="user" class="menu-icon tf-icons"></i>
                <div data-i18n="User">User</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/user') ? 'active' : '' }}">
                    <a href="/admin/user" class="menu-link">
                        <div data-i18n="Role User">Role User</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pengaturan</span>
        </li>

        <li class="menu-item {{ Request::is('admin/skpd*') || Request::is('admin/parameterbobot*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="settings" class="menu-icon tf-icons"></i>
                <div data-i18n="SKPD">SKPD</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/parameterbobot*') ? 'active' : '' }}">
                    <a href="/admin/parameterbobot" class="menu-link">
                        <div data-i18n="Parameter Bobot">Parameter Bobot</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/akad') ? 'active' : '' }}">
                    <a href="/admin/skpd/akad" class="menu-link"><div data-i18n="Akad">Akad</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/instansi') ? 'active' : '' }}">
                    <a href="/admin/skpd/instansi" class="menu-link"><div data-i18n="Instansi">Instansi</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/golongan') ? 'active' : '' }}">
                    <a href="/admin/skpd/golongan" class="menu-link"><div data-i18n="Golongan">Golongan</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/jaminan') ? 'active' : '' }}">
                    <a href="/admin/skpd/jaminan" class="menu-link"><div data-i18n="Jaminan">Jaminan</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/penggunaan') ? 'active' : '' }}">
                    <a href="/admin/skpd/penggunaan" class="menu-link"><div data-i18n="Penggunaan">Penggunaan</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/sektorekonomi') ? 'active' : '' }}">
                    <a href="/admin/skpd/sektorekonomi" class="menu-link"><div data-i18n="Sektor Ekonomi">Sektor Ekonomi</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/tanggungan') ? 'active' : '' }}">
                    <a href="/admin/skpd/tanggungan" class="menu-link"><div data-i18n="Tanggungan">Tanggungan</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/skpd/statusperkawinan') ? 'active' : '' }}">
                    <a href="/admin/skpd/statusperkawinan" class="menu-link"><div data-i18n="Status Perkawinan">Status Perkawinan</div></a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('admin/pasar*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="shopping-bag" class="menu-icon tf-icons"></i>
                <div data-i18n="Pasar">Pasar</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/parameterbobot*') ? 'active' : '' }}">
                    <a href="/admin/parameterbobot" class="menu-link"><div data-i18n="Parameter Bobot">Parameter Bobot</div></a>
                </li>
                <li class="menu-item {{ Request::is('admin/pasar/akad') ? 'active' : '' }}"><a href="/admin/pasar/akad" class="menu-link"><div data-i18n="Akad">Akad</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/penggunaan') ? 'active' : '' }}"><a href="/admin/pasar/penggunaan" class="menu-link"><div data-i18n="Penggunaan">Penggunaan</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/sektorekonomi') ? 'active' : '' }}"><a href="/admin/pasar/sektorekonomi" class="menu-link"><div data-i18n="Sektor Ekonomi">Sektor Ekonomi</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/jenisdagang') ? 'active' : '' }}"><a href="/admin/pasar/jenisdagang" class="menu-link"><div data-i18n="Jenis Dagang">Jenis Dagang</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/jaminanrumah') ? 'active' : '' }}"><a href="/admin/pasar/jaminanrumah" class="menu-link"><div data-i18n="Jaminan Rumah">Jaminan Rumah</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/jaminanusaha') ? 'active' : '' }}"><a href="/admin/pasar/jaminanusaha" class="menu-link"><div data-i18n="Jaminan Usaha">Jaminan Usaha</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/jenispasar') ? 'active' : '' }}"><a href="/admin/pasar/jenispasar" class="menu-link"><div data-i18n="Jenis Pasar">Jenis Pasar</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/lamadagang') ? 'active' : '' }}"><a href="/admin/pasar/lamadagang" class="menu-link"><div data-i18n="Lama Usaha / Dagang">Lama Usaha / Dagang</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/sukubangsa') ? 'active' : '' }}"><a href="/admin/pasar/sukubangsa" class="menu-link"><div data-i18n="Suku Bangsa">Suku Bangsa</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/tanggungan') ? 'active' : '' }}"><a href="/admin/pasar/tanggungan" class="menu-link"><div data-i18n="Tanggungan">Tanggungan</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/statusperkawinan') ? 'active' : '' }}"><a href="/admin/pasar/statusperkawinan" class="menu-link"><div data-i18n="Status Perkawinan">Status Perkawinan</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/cashpickup') ? 'active' : '' }}"><a href="/admin/pasar/cashpickup" class="menu-link"><div data-i18n="Cash Pick Up">Cash Pick Up</div></a></li>
                <li class="menu-item {{ Request::is('admin/pasar/nasabah') ? 'active' : '' }}"><a href="/admin/pasar/nasabah" class="menu-link"><div data-i18n="Jenis Nasabah">Jenis Nasabah</div></a></li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('admin/ppr*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="PPR">PPR</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('admin/ppr/fixed_income*') ? 'open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Fixed Income">Fixed Income</div></a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Character">Character</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/tempat_bekerja') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/tempat_bekerja" class="menu-link"><div data-i18n="Tempat Bekerja">Tempat Bekerja</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/konsistensi') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/konsistensi" class="menu-link"><div data-i18n="Konsistensi">Konsistensi</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/kelengkapan_validitas') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/kelengkapan_validitas" class="menu-link"><div data-i18n="Kelengkapan & Validitas Data">Kelengkapan & Validitas Data</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/angsuran_kolektif') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/angsuran_kolektif" class="menu-link"><div data-i18n="Pembayaran Angsuran & Kolektif">Pembayaran Angsuran & Kolektif</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/pengalaman_pembiayaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/pengalaman_pembiayaan" class="menu-link"><div data-i18n="Pengalaman Pembiayaan">Pengalaman Pembiayaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/motivasi') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/motivasi" class="menu-link"><div data-i18n="Motivasi">Motivasi</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/character/referensi') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/character/referensi" class="menu-link"><div data-i18n="Referensi">Referensi</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Capital">Capital</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/pekerjaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/pekerjaan" class="menu-link"><div data-i18n="Pekerjaan">Pekerjaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/pengalaman_pembiayaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/pengalaman_pembiayaan" class="menu-link"><div data-i18n="Pengalaman Riwayat Pembiayaan">Pengalaman Riwayat Pembiayaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/keamanan_bisnis_pekerjaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/keamanan_bisnis_pekerjaan" class="menu-link"><div data-i18n="Keamanan Bisnis/Pekerjaan">Keamanan Bisnis/Pekerjaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/potensi_pertumbuhan_hasil') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/potensi_pertumbuhan_hasil" class="menu-link"><div data-i18n="Potensi Pertumbuhan Hasil">Potensi Pertumbuhan Hasil</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/sumber_pendapatan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/sumber_pendapatan" class="menu-link"><div data-i18n="Sumber Pendapatan">Sumber Pendapatan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/gaji_bersih') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/gaji_bersih" class="menu-link"><div data-i18n="Pendapatan/Gaji Bersih">Pendapatan/Gaji Bersih</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capital/jml_tanggungan_keluarga') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capital/jml_tanggungan_keluarga" class="menu-link"><div data-i18n="Jumlah Tanggungan Keluarga">Jumlah Tanggungan Keluarga</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Capacity">Capacity</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/pekerjaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/pekerjaan" class="menu-link"><div data-i18n="Pekerjaan">Pekerjaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/pengalaman_pembiayaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/pengalaman_pembiayaan" class="menu-link"><div data-i18n="Pengalaman Riwayat Pembiayaan">Pengalaman Riwayat Pembiayaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/keamanan_bisnis_pekerjaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/keamanan_bisnis_pekerjaan" class="menu-link"><div data-i18n="Keamanan Bisnis/Pekerjaan">Keamanan Bisnis/Pekerjaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/potensi_pertumbuhan_hasil') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/potensi_pertumbuhan_hasil" class="menu-link"><div data-i18n="Potensi Pertumbuhan Hasil">Potensi Pertumbuhan Hasil</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/pengalaman_kerja') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/pengalaman_kerja" class="menu-link"><div data-i18n="Pengalaman Kerja">Pengalaman Kerja</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/pendidikan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/pendidikan" class="menu-link"><div data-i18n="Pendidikan">Pendidikan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/usia') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/usia" class="menu-link"><div data-i18n="Usia">Usia</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/sumber_pendapatan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/sumber_pendapatan" class="menu-link"><div data-i18n="Sumber Pendapatan">Sumber Pendapatan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/gaji_bersih') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/gaji_bersih" class="menu-link"><div data-i18n="Pendapatan/Gaji Bersih">Pendapatan/Gaji Bersih</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/capacity/jml_tanggungan_keluarga') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/capacity/jml_tanggungan_keluarga" class="menu-link"><div data-i18n="Jumlah Tanggungan Keluarga">Jumlah Tanggungan Keluarga</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Condition">Condition</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/pekerjaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/pekerjaan" class="menu-link"><div data-i18n="Pekerjaan">Pekerjaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/pengalaman_pembiayaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/pengalaman_pembiayaan" class="menu-link"><div data-i18n="Pengalaman Riwayat Pembiayaan">Pengalaman Riwayat Pembiayaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/keamanan_bisnis_pekerjaan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/keamanan_bisnis_pekerjaan" class="menu-link"><div data-i18n="Keamanan Bisnis/Pekerjaan">Keamanan Bisnis/Pekerjaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/potensi_pertumbuhan_hasil') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/potensi_pertumbuhan_hasil" class="menu-link"><div data-i18n="Potensi Pertumbuhan Hasil">Potensi Pertumbuhan Hasil</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/pengalaman_kerja') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/pengalaman_kerja" class="menu-link"><div data-i18n="Pengalaman Kerja">Pengalaman Kerja</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/pendidikan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/pendidikan" class="menu-link"><div data-i18n="Pendidikan">Pendidikan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/usia') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/usia" class="menu-link"><div data-i18n="Usia">Usia</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/sumber_pendapatan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/sumber_pendapatan" class="menu-link"><div data-i18n="Sumber Pendapatan">Sumber Pendapatan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/gaji_bersih') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/gaji_bersih" class="menu-link"><div data-i18n="Pendapatan/Gaji Bersih">Pendapatan/Gaji Bersih</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/condition_sharia/jml_tanggungan_keluarga') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/condition_sharia/jml_tanggungan_keluarga" class="menu-link"><div data-i18n="Jumlah Tanggungan Keluarga">Jumlah Tanggungan Keluarga</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/fixed_income/collateral*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Collateral">Collateral</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/collateral/marketabilitas') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/collateral/marketabilitas" class="menu-link"><div data-i18n="Marketabilitas">Marketabilitas</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/collateral/kontribusi_pemohon') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/collateral/kontribusi_pemohon" class="menu-link"><div data-i18n="Kontribusi Pemohon">Kontribusi Pemohon</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/collateral/pertumbuhan_agunan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/collateral/pertumbuhan_agunan" class="menu-link"><div data-i18n="Pertumbuhan Agunan">Pertumbuhan Agunan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/collateral/daya_tarik_agunan') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/collateral/daya_tarik_agunan" class="menu-link"><div data-i18n="Daya Tarik Agunan">Daya Tarik Agunan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/fixed_income/collateral/jangka_waktu_likuidasi') ? 'active' : '' }}"><a href="/admin/ppr/fixed_income/collateral/jangka_waktu_likuidasi" class="menu-link"><div data-i18n="Jangka Waktu Likuidasi">Jangka Waktu Likuidasi</div></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income*') ? 'open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Non Fixed Income">Non Fixed Income</div></a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/character*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Character">Character</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/character/tingkat_kepercayaan') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/character/tingkat_kepercayaan" class="menu-link"><div data-i18n="Tingkat Kepercayaan">Tingkat Kepercayaan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/character/pengelolaan_rekening') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/character/pengelolaan_rekening" class="menu-link"><div data-i18n="Pengelolaan Rekening Bank">Pengelolaan Rekening Bank</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/character/reputasi_bisnis') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/character/reputasi_bisnis" class="menu-link"><div data-i18n="Reputasi Bisnis">Reputasi Bisnis</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/character/perilaku_pribadi') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/character/perilaku_pribadi" class="menu-link"><div data-i18n="Perilaku Pribadi Debitur">Perilaku Pribadi Debitur</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/capacity*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Capacity">Capacity</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/capacity/situasi_persaingan') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/capacity/situasi_persaingan" class="menu-link"><div data-i18n="Situasi Pasar dan Persaingan">Situasi Pasar dan Persaingan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/capacity/kaderisasi') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/capacity/kaderisasi" class="menu-link"><div data-i18n="Kaderisasi">Kaderisasi</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/capacity/kualifikasi_komersial') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/capacity/kualifikasi_komersial" class="menu-link"><div data-i18n="Kualifikasi Komersial">Kualifikasi Komersial</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/capacity/kualifikasi_teknis') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/capacity/kualifikasi_teknis" class="menu-link"><div data-i18n="Kualifikasi Teknis">Kualifikasi Teknis</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/condition_sharia*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Condition">Condition</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/condition_sharia/kualitas_produk_jasa') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/condition_sharia/kualitas_produk_jasa" class="menu-link"><div data-i18n="Kualitas Produk dan Jasa">Kualitas Produk dan Jasa</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/condition_sharia/sistem_pembayaran') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/condition_sharia/sistem_pembayaran" class="menu-link"><div data-i18n="Sistem Pembayaran">Sistem Pembayaran</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/condition_sharia/lokasi_usaha') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/condition_sharia/lokasi_usaha" class="menu-link"><div data-i18n="Lokasi Usaha">Lokasi Usaha</div></a></li>
                            </ul>
                        </li>

                        <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/collateral*') ? 'open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle"><div data-i18n="Collateral">Collateral</div></a>
                            <ul class="menu-sub">
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/collateral/marketabilitas') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/collateral/marketabilitas" class="menu-link"><div data-i18n="Marketabilitas">Marketabilitas</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/collateral/kontribusi_pemohon') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/collateral/kontribusi_pemohon" class="menu-link"><div data-i18n="Kontribusi Pemohon">Kontribusi Pemohon</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/collateral/pertumbuhan_agunan') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/collateral/pertumbuhan_agunan" class="menu-link"><div data-i18n="Pertumbuhan Agunan">Pertumbuhan Agunan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/collateral/daya_tarik_agunan') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/collateral/daya_tarik_agunan" class="menu-link"><div data-i18n="Daya Tarik Agunan">Daya Tarik Agunan</div></a></li>
                                <li class="menu-item {{ Request::is('admin/ppr/non_fixed_income/collateral/jangka_waktu_likuidasi') ? 'active' : '' }}"><a href="/admin/ppr/non_fixed_income/collateral/jangka_waktu_likuidasi" class="menu-link"><div data-i18n="Jangka Waktu Likuidasi">Jangka Waktu Likuidasi</div></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('admin/status') ? 'active' : '' }}">
            <a href="/admin/status" class="menu-link">
                <i data-feather="info" class="menu-icon tf-icons"></i>
                <div data-i18n="Status">Status</div>
            </a>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
