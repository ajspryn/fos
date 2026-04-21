<!-- BEGIN: Main Menu-->
@php
    $notif_proposal = Modules\Pasar\Entities\PasarPembiayaan::select()
        ->where('AO_id', Auth::user()->id)
        ->where('sektor_id', null)
        ->count();

    $komites = Modules\Pasar\Entities\PasarPembiayaan::select()
        ->where('AO_id', Auth::user()->id)
        ->whereNotNull('sektor_id')
        ->orderby('updated_at', 'desc')
        ->get();
    $notif_revisi = 0;
    foreach ($komites as $komite) {
        $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $komite->id)
            ->orderby('created_at', 'desc')
            ->first();
        if ($history && $history->status_id == 7) {
            $notif_revisi++;
        }
    }
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('logo.png') }}" height="50" alt="Logo">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('pasar') ? 'active' : '' }}">
            <a href="/pasar" class="menu-link">
                <i data-feather="home" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('simulasi') ? 'active' : '' }}">
            <a href="/simulasi" class="menu-link">
                <i data-feather="monitor" class="menu-icon tf-icons"></i>
                <div data-i18n="Simulasi">Simulasi</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Anda</span>
        </li>

        <li class="menu-item {{ Request::is('pasar/nasabah*') ? 'active' : '' }}">
            <a href="/pasar/nasabah" class="menu-link">
                <i data-feather="users" class="menu-icon tf-icons"></i>
                <div data-i18n="Data Nasabah">Data Nasabah</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('pasar/komite*') ? 'active' : '' }}">
            <a href="/pasar/komite" class="menu-link">
                <i data-feather="file-text" class="menu-icon tf-icons"></i>
                <div data-i18n="Komite">Komite</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('pasar/proposal*') || Request::is('pasar/revisi*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="Proposal">Proposal</div>
                @if ($notif_proposal + $notif_revisi > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $notif_proposal + $notif_revisi }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('pasar/proposal*') ? 'active' : '' }}">
                    <a href="/pasar/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($notif_proposal > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $notif_proposal }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('pasar/revisi*') ? 'active' : '' }}">
                    <a href="/pasar/revisi" class="menu-link">
                        <div data-i18n="Revisi Proposal">Revisi Proposal</div>
                        @if ($notif_revisi > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $notif_revisi }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
