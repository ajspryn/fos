<!-- BEGIN: Main Menu-->
@php
$proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->where('skpd_sektor_ekonomi_id', null)
    ->get()
    ->count();
@endphp
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
            <li class="{{ Request::is('kabag') ? 'active' : '' }} "><a class="d-flex align-items-center"
                    href="/kabag"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Pembiayaan</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">SKPD</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('kabag/skpd/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/kabag/skpd/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('kabag/skpd/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/kabag/skpd/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('kabag/skpd/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/kabag/skpd/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1"></span></a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PASAR</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('kabag/pasar/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/kabag/pasar/nasabah"><span
                                class="menu-item text-truncate" data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('kabag/pasar/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/kabag/pasar/komite"><span
                                class="menu-item text-truncate" data-i18n="Security">Komite</span></a>
                    </li>
                    <li class="{{ Request::is('kabag/pasar/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/kabag/pasar/proposal"><span
                                class="menu-item text-truncate" data-i18n="Security">Proposal</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1"></span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="User">UMKM</span></a>
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
                        data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="User">KPR</span></a>
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

    </div>
</div>
<!-- END: Main Menu-->

<!-- END: Main Menu-->
