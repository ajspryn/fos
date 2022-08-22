<!-- BEGIN: Main Menu-->
@php
$notif_proposal = Modules\Form\Entities\FormPprPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->whereNull('form_cl')
    ->orWhereNull('form_score')
    ->get()
    ->count();
@endphp
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                    <img src="../../../logo_sidebar.png" height="30" alt="">
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
            <li class="{{ Request::is('skpd') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/skpd"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Menu Anda</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('skpd/nasabah*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/skpd/nasabah"><i data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="home">Data Nasabah</span></a>
            </li>
            <li class="{{ Request::is('ppr/komite*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr/komite"><i data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="home">Komite</span></a>
            </li>
            <li class="{{ Request::is('ppr/proposal*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr/proposal"><i data-feather="clipboard"></i><span class="menu-title text-truncate"
                        data-i18n="home">Proposal</span><span
                        class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_proposal }}</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
