<!-- BEGIN: Main Menu-->
@php
$notif_proposal_pasar = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
    ->where('jabatan_id', 2)
    ->count();
@endphp
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
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Pembiayaan</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">SKPD</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/skpd/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/skpd/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/skpd/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/skpd/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('analis/skpd/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/skpd/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PASAR</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/pasar/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/pasar/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/pasar/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/pasar/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('analis/pasar/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/pasar/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_proposal_pasar }}</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">UMKM</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/umkm/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/umkm/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/umkm/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/umkm/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('analis/umkm/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/umkm/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PPR</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/ppr/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/ppr/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('analis/ppr/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span></a>
                    </li>
                </ul>
            </li>

    </div>
</div>
<!-- END: Main Menu-->
