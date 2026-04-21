<!-- BEGIN: Main Menu-->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="{{ asset('logo.png') }}" height="50" alt="">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('p3k') ? 'active' : '' }}">
            <a href="/p3k" class="menu-link">
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

        <li class="menu-item {{ Request::is('p3k/pipeline*') ? 'active' : '' }}">
            <a href="/p3k/pipeline" class="menu-link">
                <i data-feather="crosshair" class="menu-icon tf-icons"></i>
                <div data-i18n="Pipeline">Pipeline</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('p3k/nasabah*') ? 'active' : '' }}">
            <a href="/p3k/nasabah" class="menu-link">
                <i data-feather="users" class="menu-icon tf-icons"></i>
                <div data-i18n="Data Nasabah">Data Nasabah</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('p3k/komite*') ? 'active' : '' }}">
            <a href="/p3k/komite" class="menu-link">
                <i data-feather="file-text" class="menu-icon tf-icons"></i>
                <div data-i18n="Komite">Komite</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('p3k/proposal*') || Request::is('p3k/revisi*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="Proposal">Proposal</div>
                @if ($proposalP3k + $notifRevisi > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalP3k + $notifRevisi }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('p3k/proposal*') ? 'active' : '' }}">
                    <a href="/p3k/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($proposalP3k > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalP3k }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('p3k/revisi*') ? 'active' : '' }}">
                    <a href="/p3k/revisi" class="menu-link">
                        <div data-i18n="Revisi Proposal">Revisi Proposal</div>
                        @if ($notifRevisi > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $notifRevisi }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
