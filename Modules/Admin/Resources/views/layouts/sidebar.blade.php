<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                    <img src="../../../logo_form.png" height="30" alt="">
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ Request::is('admin') ? 'active' : '' }} "><a class="d-flex align-items-center"
                    href="/admin"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-user-list.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">List</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="View">View</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="app-user-view-account.html"><span
                                        class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-security.html"><span
                                        class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-billing.html"><span
                                        class="menu-item text-truncate" data-i18n="Billing &amp; Plans">Billing &amp;
                                        Plans</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-notifications.html"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Notifications">Notifications</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-connections.html"><span
                                        class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="settings"></i><span class="menu-title text-truncate"
                        data-i18n="Pages">Pengaturan</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Account Settings">SKPD</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('/admin/skpd/parameterbobot*') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/parameterbobot"><span
                                        class="menu-item text-truncate" data-i18n="Account">Parameter Bobot</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/akad') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/akad"><span
                                        class="menu-item text-truncate" data-i18n="Account">Akad</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/instansi') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/intansi"><span
                                        class="menu-item text-truncate" data-i18n="Security">Instansi</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/golongan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/golongan"><span
                                        class="menu-item text-truncate" data-i18n="Security">Golongan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/jaminan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/jaminan"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Billings &amp; Plans">Jaminan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/penggunaan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/penggunaan"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Billings &amp; Plans">Penggunaan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/sektorekonomi') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/sektorekonomi"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Sektor
                                        Ekonomi</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/tanggungan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/tanggungan"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Notifications">Tanggungan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/skpd/statusperkawinan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/skpd/statusperkawinan"><span
                                        class="menu-item text-truncate" data-i18n="Notifications">Status
                                        Perkawinan</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Account Settings">Pasar / UMKM</span></a>
                        <ul class="menu-content">
                            <li class="{{ Request::is('/admin/pasar/parameterbobot*') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/parameterbobot"><span
                                        class="menu-item text-truncate" data-i18n="Account">Parameter Bobot</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/akad') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/akad"><span
                                        class="menu-item text-truncate" data-i18n="Account">Akad</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/penggunaan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/penggunaan"><span
                                        class="menu-item text-truncate" data-i18n="Security">Penggunaan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/sektorekonomi') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/sektorekonomi"><span
                                        class="menu-item text-truncate" data-i18n="Security">Sektor Ekonomi</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/jenisdagang') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/jenisdagang"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Jenis
                                        Dagang</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/jaminanrumah') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/jaminanrumah"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Jaminan
                                        Rumah</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/jaminanusaha') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/jaminanusaha"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Jaminan
                                        Usaha</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/jenispasar') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/jenispasar"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Jenis
                                        Pasar</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/lamadagang') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/lamadagang"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Lama Usaha /
                                        Dagang</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/sukubangsa') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/sukubangsa"><span
                                        class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Suku
                                        Bangsa</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/tanggungan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/tanggungan"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Notifications">Tanggungan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/statusperkawinan') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/statusperkawinan"><span
                                        class="menu-item text-truncate" data-i18n="Notifications">Status
                                        Perkawinan</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/cashpickup') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/cashpickup"><span
                                        class="menu-item text-truncate" data-i18n="Notifications">Cash Pick
                                        Up</span></a>
                            </li>
                            <li class="{{ Request::is('admin/pasar/nasabah') ? 'active' : '' }}"><a
                                    class="d-flex align-items-center" href="/admin/pasar/nasabah"><span
                                        class="menu-item text-truncate" data-i18n="Notifications">Jenis
                                        Nasabah</span></a>
                            </li>
                        </ul>
                    </li>

                    {{-- PPR --}}
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="home"></i><span
                                class="menu-item text-truncate" data-i18n="Account Settings">PPR</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="#"><i
                                        data-feather="file-text"></i><span class="menu-item text-truncate"
                                        data-i18n="Account Settings">Character</span></a>
                                <ul class="menu-content">
                                    <li
                                        class="{{ Request::is('admin/ppr/character/tempat_bekerja') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/tempat_bekerja"><span
                                                class="menu-item text-truncate" data-i18n="Account">Tempat
                                                Bekerja</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/character/konsistensi') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/konsistensi"><span
                                                class="menu-item text-truncate"
                                                data-i18n="Account">Konsistensi</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/character/kelengkapan_validitas') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/kelengkapan_validitas"><span
                                                class="menu-item text-truncate" data-i18n="Account">Kelengkapan &
                                                Validitas Data</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/character/angsuran_kolektif') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/angsuran_kolektif"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pembayaran
                                                Angsuran & Kolektif</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/character/pengalaman_pembiayaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/pengalaman_pembiayaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pengalaman
                                                Pembiayaan</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/character/motivasi') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/motivasi"><span class="menu-item text-truncate"
                                                data-i18n="Account">Motivasi</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/character/referensi') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/character/referensi"><span
                                                class="menu-item text-truncate"
                                                data-i18n="Account">Referensi</span></a>
                                    </li>

                                </ul>
                            </li>

                            <li><a class="d-flex align-items-center" href="#"><i
                                        data-feather="file-text"></i><span class="menu-item text-truncate"
                                        data-i18n="Account Settings">Capital</span></a>
                                <ul class="menu-content">
                                    <li class="{{ Request::is('admin/ppr/capital/pekerjaan') ? 'active' : '' }}"><a
                                            class="d-flex align-items-center"
                                            href="/admin/ppr/capital/pekerjaan"><span class="menu-item text-truncate"
                                                data-i18n="Account">Pekerjaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capital/pengalaman_pembiayaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capital/pengalaman_pembiayaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pengalaman Riwayat
                                                Pembiayaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capital/keamanan_bisnis_pekerjaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capital/keamanan_bisnis_pekerjaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Keamanan
                                                Bisnis/Pekerjaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capital/potensi_pertumbuhan_hasil') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capital/potensi_pertumbuhan_hasil"><span
                                                class="menu-item text-truncate" data-i18n="Account">Potensi
                                                Pertumbuhan Hasil</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capital/sumber_pendapatan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capital/sumber_pendapatan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Sumber
                                                Pendapatan</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/capital/gaji_bersih') ? 'active' : '' }}"><a
                                            class="d-flex align-items-center"
                                            href="/admin/ppr/capital/gaji_bersih"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pendapatan/Gaji
                                                Bersih</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capital/jml_tanggungan_keluarga') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capital/jml_tanggungan_keluarga"><span
                                                class="menu-item text-truncate" data-i18n="Account">Jumlah Tanggungan
                                                Keluarga</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li><a class="d-flex align-items-center" href="#"><i
                                        data-feather="file-text"></i><span class="menu-item text-truncate"
                                        data-i18n="Account Settings">Capacity</span></a>
                                <ul class="menu-content">
                                    <li class="{{ Request::is('admin/ppr/capacity/pekerjaan') ? 'active' : '' }}"><a
                                            class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/pekerjaan"><span class="menu-item text-truncate"
                                                data-i18n="Account">Pekerjaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capacity/pengalaman_pembiayaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/pengalaman_pembiayaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pengalaman Riwayat
                                                Pembiayaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capacity/keamanan_bisnis_pekerjaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/keamanan_bisnis_pekerjaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Keamanan
                                                Bisnis/Pekerjaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capacity/potensi_pertumbuhan_hasil') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/potensi_pertumbuhan_hasil"><span
                                                class="menu-item text-truncate" data-i18n="Account">Potensi
                                                Pertumbuhan Hasil</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capacity/pengalaman_kerja') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/pengalaman_kerja"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pengalaman
                                                Kerja</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/capacity/pendidikan') ? 'active' : '' }}"><a
                                            class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/pendidikan"><span
                                                class="menu-item text-truncate"
                                                data-i18n="Account">Pendidikan</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/capacity/usia') ? 'active' : '' }}"><a
                                            class="d-flex align-items-center" href="/admin/ppr/capacity/usia"><span
                                                class="menu-item text-truncate" data-i18n="Account">Usia</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capacity/sumber_pendapatan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/sumber_pendapatan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Sumber
                                                Pendapatan</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/capacity/gaji_bersih') ? 'active' : '' }}"><a
                                            class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/gaji_bersih"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pendapatan/Gaji
                                                Bersih</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/capacity/jml_tanggungan_keluarga') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/capacity/jml_tanggungan_keluarga"><span
                                                class="menu-item text-truncate" data-i18n="Account">Jumlah Tanggungan
                                                Keluarga</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li><a class="d-flex align-items-center" href="#"><i
                                        data-feather="file-text"></i><span class="menu-item text-truncate"
                                        data-i18n="Account Settings">Condition</span></a>
                                <ul class="menu-content">
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/pekerjaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/pekerjaan"><span
                                                class="menu-item text-truncate"
                                                data-i18n="Account">Pekerjaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/pengalaman_pembiayaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/pengalaman_pembiayaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pengalaman Riwayat
                                                Pembiayaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/keamanan_bisnis_pekerjaan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/keamanan_bisnis_pekerjaan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Keamanan
                                                Bisnis/Pekerjaan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/potensi_pertumbuhan_hasil') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/potensi_pertumbuhan_hasil"><span
                                                class="menu-item text-truncate" data-i18n="Account">Potensi
                                                Pertumbuhan Hasil</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/pengalaman_kerja') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/pengalaman_kerja"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pengalaman
                                                Kerja</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/pendidikan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/pendidikan"><span
                                                class="menu-item text-truncate"
                                                data-i18n="Account">Pendidikan</span></a>
                                    </li>
                                    <li class="{{ Request::is('admin/ppr/condition_sharia/usia') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/usia"><span
                                                class="menu-item text-truncate" data-i18n="Account">Usia</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/sumber_pendapatan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/sumber_pendapatan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Sumber
                                                Pendapatan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/gaji_bersih') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/gaji_bersih"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pendapatan/Gaji
                                                Bersih</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/condition_sharia/jml_tanggungan_keluarga') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/condition_sharia/jml_tanggungan_keluarga"><span
                                                class="menu-item text-truncate" data-i18n="Account">Jumlah Tanggungan
                                                Keluarga</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li><a class="d-flex align-items-center" href="#"><i
                                        data-feather="file-text"></i><span class="menu-item text-truncate"
                                        data-i18n="Account Settings">Collateral</span></a>
                                <ul class="menu-content">
                                    <li
                                        class="{{ Request::is('admin/ppr/collateral/marketabilitas') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/collateral/marketabilitas"><span
                                                class="menu-item text-truncate"
                                                data-i18n="Account">Marketabilitas</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/collateral/kontribusi_pemohon') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/collateral/kontribusi_pemohon"><span
                                                class="menu-item text-truncate" data-i18n="Account">Kontribusi
                                                Pemohon</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/collateral/pertumbuhan_agunan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/collateral/pertumbuhan_agunan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Pertumbuhan
                                                Agunan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/collateral/daya_tarik_agunan') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/collateral/daya_tarik_agunan"><span
                                                class="menu-item text-truncate" data-i18n="Account">Daya Tarik
                                                Agunan</span></a>
                                    </li>
                                    <li
                                        class="{{ Request::is('admin/ppr/collateral/jangka_waktu_likuiditas') ? 'active' : '' }}">
                                        <a class="d-flex align-items-center"
                                            href="/admin/ppr/collateral/jangka_waktu_likuiditas"><span
                                                class="menu-item text-truncate" data-i18n="Account">Jangka Waktu
                                                Likuiditas</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
    </div>
</div>
<!-- END: Main Menu-->
