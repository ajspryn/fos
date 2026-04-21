<!-- BEGIN: Main Menu-->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <img src="{{ asset('logo.png') }}" height="50" alt="Logo">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('skpd') ? 'active' : '' }}">
            <a href="/skpd" class="menu-link">
                <i data-feather="home" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Anda</span>
        </li>

        <li class="menu-item {{ Request::is('skpd/nasabah*') ? 'active' : '' }}">
            <a href="/skpd/nasabah" class="menu-link">
                <i data-feather="users" class="menu-icon tf-icons"></i>
                <div data-i18n="Data Nasabah">Data Nasabah</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('skpd/komite*') ? 'active' : '' }}">
            <a href="/skpd/komite" class="menu-link">
                <i data-feather="file-text" class="menu-icon tf-icons"></i>
                <div data-i18n="Komite">Komite</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('skpd/proposal*') || Request::is('skpd/revisi*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="Proposal">Proposal</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('skpd/proposal*') ? 'active' : '' }}">
                    <a href="/skpd/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($notif_proposal > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $notif_proposal }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('skpd/revisi*') ? 'active' : '' }}">
                    <a href="/skpd/revisi" class="menu-link">
                        <div data-i18n="Revisi Proposal">Revisi Proposal</div>
                        @if ($revisi > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $revisi }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
