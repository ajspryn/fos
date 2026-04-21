<!-- BEGIN: Main Menu-->
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
        <li class="menu-item {{ Request::is('ultra_mikro') ? 'active' : '' }}">
            <a href="/ultra_mikro" class="menu-link">
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

        <li class="menu-item {{ Request::is('ultra_mikro/komite*') ? 'active' : '' }}">
            <a href="/ultra_mikro/komite" class="menu-link">
                <i data-feather="file-text" class="menu-icon tf-icons"></i>
                <div data-i18n="Komite">Komite</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('ultra_mikro/proposal*') || Request::is('ultra_mikro/revisi*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="Proposal">Proposal</div>
                @if ($proposalUltraMikro + $notifRevisi > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalUltraMikro + $notifRevisi }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('ultra_mikro/proposal*') ? 'active' : '' }}">
                    <a href="/ultra_mikro/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($proposalUltraMikro > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalUltraMikro }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('ultra_mikro/revisi*') ? 'active' : '' }}">
                    <a href="/ultra_mikro/revisi" class="menu-link">
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
