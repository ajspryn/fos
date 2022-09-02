<!-- BEGIN: Main Menu-->
@php
$notif_proposal = Modules\Umkm\Entities\UmkmPembiayaan::select()
    ->where('AO_id', Auth::user()->id)
    ->where('sektor_id', null)
    ->get()
    ->count();

$komites = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
    ->where('status_id', 7)
    ->get();
$notif_revisi = 0;
foreach ($komites as $komite) {
    $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
        ->where('id', $komite->umkm_pembiayaan_id)
        ->get()
        ->first();

    $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
        ->where('umkm_pembiayaan_id', $proposal_umkm->id)
        ->orderby('created_at', 'desc')
        ->get()
        ->first();
    if ($history->status_id == 7) {
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
            <li class="{{ Request::is('umkm') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/umkm"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Menu Anda</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('umkm/nasabah*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/umkm/nasabah"><i data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="home">Data Nasabah</span></a>
            </li>
            <li class="{{ Request::is('umkm/komite*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/umkm/komite"><i data-feather="file-text"></i><span class="menu-title text-truncate"
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
                    <li class="{{ Request::is('umkm/proposal*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/umkm/proposal"><i
                                data-feather="clipboard"></i><span class="menu-title text-truncate"
                                data-i18n="home">Proposal</span>
                            @if ($notif_proposal > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notif_proposal }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Request::is('umkm/revisi*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/umkm/revisi"><i data-feather="circle"></i><span
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
