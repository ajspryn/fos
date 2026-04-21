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

        {{-- Dashboard --}}
        <li class="menu-item {{ Request::is('dirbis') || Request::is('simulasi') || Request::is('dirbis/*/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="menu" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirbis') ? 'active' : '' }}">
                    <a href="/dirbis" class="menu-link">
                        <div data-i18n="Analytic">Analytic</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('simulasi') ? 'active' : '' }}">
                    <a href="/simulasi" class="menu-link">
                        <div data-i18n="Simulasi">Simulasi</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/skpd/create') ? 'active' : '' }}">
                    <a href="/dirbis/skpd/create" class="menu-link">
                        <div data-i18n="SKPD">SKPD</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/pasar/create') ? 'active' : '' }}">
                    <a href="/dirbis/pasar/create" class="menu-link">
                        <div data-i18n="Pasar">Pasar</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/umkm/create') ? 'active' : '' }}">
                    <a href="/dirbis/umkm/create" class="menu-link">
                        <div data-i18n="UMKM">UMKM</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/ppr/create') ? 'active' : '' }}">
                    <a href="/dirbis/ppr/create" class="menu-link">
                        <div data-i18n="PPR">PPR</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/p3k/create') ? 'active' : '' }}">
                    <a href="/dirbis/p3k/create" class="menu-link">
                        <div data-i18n="P3K">P3K</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pembiayaan</span>
        </li>

        {{-- SKPD --}}
        <li class="menu-item {{ Request::is('dirbis/skpd*') && !Request::is('dirbis/skpd/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="SKPD">SKPD</div>
                @if ($proposalSkpd > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalSkpd }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirbis/skpd/nasabah') ? 'active' : '' }}">
                    <a href="/dirbis/skpd/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/skpd/komite') ? 'active' : '' }}">
                    <a href="/dirbis/skpd/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($proposalSkpd > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalSkpd }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/skpd/proposal') ? 'active' : '' }}">
                    <a href="/dirbis/skpd/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- PASAR --}}
        <li class="menu-item {{ Request::is('dirbis/pasar*') && !Request::is('dirbis/pasar/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="PASAR">PASAR</div>
                @if ($data > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $data }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirbis/pasar/nasabah') ? 'active' : '' }}">
                    <a href="/dirbis/pasar/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/pasar/komite') ? 'active' : '' }}">
                    <a href="/dirbis/pasar/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($data > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $data }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/pasar/proposal') ? 'active' : '' }}">
                    <a href="/dirbis/pasar/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- UMKM --}}
        <li class="menu-item {{ Request::is('dirbis/umkm*') && !Request::is('dirbis/umkm/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="UMKM">UMKM</div>
                @if ($b > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $b }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirbis/umkm/nasabah') ? 'active' : '' }}">
                    <a href="/dirbis/umkm/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/umkm/komite') ? 'active' : '' }}">
                    <a href="/dirbis/umkm/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($b > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $b }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/umkm/proposal') ? 'active' : '' }}">
                    <a href="/dirbis/umkm/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- PPR --}}
        <li class="menu-item {{ Request::is('dirbis/ppr*') && !Request::is('dirbis/ppr/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="PPR">PPR</div>
                @if ($proposalppr > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalppr }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirbis/ppr/nasabah') ? 'active' : '' }}">
                    <a href="/dirbis/ppr/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/ppr/komite') ? 'active' : '' }}">
                    <a href="/dirbis/ppr/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($proposalppr > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalppr }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/ppr/proposal') ? 'active' : '' }}">
                    <a href="/dirbis/ppr/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- P3K --}}
        <li class="menu-item {{ Request::is('dirbis/p3k*') && !Request::is('dirbis/p3k/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="P3K">P3K</div>
                @if ($proposalP3k > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalP3k }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirbis/p3k/nasabah') ? 'active' : '' }}">
                    <a href="/dirbis/p3k/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/p3k/komite') ? 'active' : '' }}">
                    <a href="/dirbis/p3k/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($proposalP3k > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalP3k }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirbis/p3k/proposal') ? 'active' : '' }}">
                    <a href="/dirbis/p3k/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
<!-- END: Main Menu-->
