<!-- BEGIN: Main Menu-->
{{-- @php
$notif_proposal_pasar = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
    ->where('jabatan_id', 3)
    ->where('status_id', 5)
    ->count();
@endphp --}}
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
            <li><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Dashboard</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('dirbis') ? 'active' : '' }}"><a class="d-flex align-items-center"
                            href="/dirbis"><i data-feather="bar-chart"></i><span class="menu-item text-truncate"
                                data-i18n="Account">Analytic</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/skpd/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/dirbis/skpd/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">SKPD</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/pasar/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/dirbis/pasar/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">Pasar</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/umkm/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/dirbis/umkm/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">UMKM</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/skpd/ppr') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/skpd/proposal"><i
                                data-feather="home"></i><span class="menu-item text-truncate"
                                data-i18n="Security">PPR</span></a>
                    </li>
                </ul>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Pembiayaan</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">SKPD</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('dirbis/skpd/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/skpd/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/skpd/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/skpd/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/skpd/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/skpd/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PASAR</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('dirbis/pasar/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/pasar/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/pasar/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/pasar/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/pasar/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/pasar/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1"></span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">UMKM</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('dirbis/umkm/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/umkm/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/umkm/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/umkm/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/umkm/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/umkm/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PPR</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('dirbis/ppr/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/ppr/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/ppr/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/ppr/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('dirbis/ppr/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirbis/ppr/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span></a>
                    </li>
                </ul>
            </li>

    </div>
</div>
<!-- END: Main Menu-->
