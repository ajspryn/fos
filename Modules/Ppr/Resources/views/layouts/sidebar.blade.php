<!-- BEGIN: Main Menu-->
@php
$proposal = Modules\Form\Entities\FormPprPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->get()
    ->first();

$notif_proposal = Modules\Form\Entities\FormPprPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->whereNull('form_cl')
    ->orWhereNull('form_score')
    ->get()
    ->count();

// $pembiayaan = Modules\Form\Entities\FormPprPembiayaan::select()
//     ->where('id', $id)
//     ->get()
//     ->first();

$komite = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('status_id', 3)
    ->get();

// $notif_komite = Modules\Ppr\Entities\PprPembiayaanHistory::select()
//     ->where(['form_ppr_pembiayaan_id', $pembiayaan], ['status_id', 3])
//     ->count();

$notif_komite = Modules\Ppr\Entities\PprPembiayaanHistory::select('form_ppr_pembiayaan_id as pembiayaan_count, status_id')
    ->where('status_id', 3)
    ->groupBy('form_ppr_pembiayaan_id')
    ->get()
    ->count();

$revisi = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('status_id', 7)
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
            <li class="{{ Request::is('ppr') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Menu Anda</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('ppr/nasabah*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr/nasabah"><i data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="home">Data Nasabah</span></a>
            </li>
            <li class="{{ Request::is('ppr/komite*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr/komite"><i data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="home">Komite</span><span
                        class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_komite }}</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Proposal</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('ppr/proposal*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/ppr/proposal"><i data-feather="clipboard"></i><span
                                class="menu-title text-truncate" data-i18n="home">Proposal</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_proposal }}</span></a>
                    </li>
                    <li class="{{ Request::is('ppr/revisi*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/ppr/revisi"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="home">Revisi Proposal</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1">{{ $revisi }}</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
