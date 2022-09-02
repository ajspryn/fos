<!-- BEGIN: Main Menu-->
@php
$notif_proposal = Modules\Pasar\Entities\PasarPembiayaan::select()
    ->where('AO_id', Auth::user()->id)
    ->where('sektor_id', null)
    ->get()
    ->count();
// $notif_revisi = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
//     ->where('user_id', Auth::user()->id)
//     ->where('status_id', 7)
//     ->get()
//     ->count();

$komites = Modules\Pasar\Entities\PasarPembiayaanHistory::select()->where('status_id', 7)->get();
$notif_revisi=0;
foreach ($komites as $komite) {
    $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
    ->where('id', $komite->pasar_pembiayaan_id)
    ->get()
    ->first();

    $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
    ->where('pasar_pembiayaan_id', $proposal_pasar->id)
    ->orderby('created_at', 'desc')
    ->get()
    ->first();
    if ($history->status_id ==7) {
        $notif_revisi++;
    }
}

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
            <li class="{{ Request::is('pasar') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/pasar"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Menu Anda</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('pasar/nasabah*') ? 'active' : 'nav-item' }} "><a
                    class="d-flex align-items-center" href="/pasar/nasabah"><i data-feather="users"></i><span
                        class="menu-title text-truncate" data-i18n="home">Data Nasabah</span></a>
            </li>
            <li class="{{ Request::is('pasar/komite*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/pasar/komite"><i data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="home">Komite</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Proposal</span>
                    @if ($notif_proposal + $notif_revisi > 0)
                        <span
                            class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_proposal + $notif_revisi }}</span>
                    @endif
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('pasar/proposal*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/pasar/proposal"><i
                                data-feather="clipboard"></i><span class="menu-title text-truncate"
                                data-i18n="home">Proposal</span>
                            @if ($notif_proposal > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_proposal }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Request::is('pasar/revisi*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/pasar/revisi"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="home">Revisi Proposal</span>
                            @if ($notif_revisi > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_revisi }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
