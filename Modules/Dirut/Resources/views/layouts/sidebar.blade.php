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
        <li class="menu-item {{ Request::is('dirut') || Request::is('simulasi') || Request::is('dirut/*/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="menu" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirut') ? 'active' : '' }}">
                    <a href="/dirut" class="menu-link">
                        <div data-i18n="Analytic">Analytic</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('simulasi') ? 'active' : '' }}">
                    <a href="/simulasi" class="menu-link">
                        <div data-i18n="Simulasi">Simulasi</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/skpd/create') ? 'active' : '' }}">
                    <a href="/dirut/skpd/create" class="menu-link">
                        <div data-i18n="SKPD">SKPD</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/pasar/create') ? 'active' : '' }}">
                    <a href="/dirut/pasar/create" class="menu-link">
                        <div data-i18n="Pasar">Pasar</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/umkm/create') ? 'active' : '' }}">
                    <a href="/dirut/umkm/create" class="menu-link">
                        <div data-i18n="UMKM">UMKM</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/ppr/create') ? 'active' : '' }}">
                    <a href="/dirut/ppr/create" class="menu-link">
                        <div data-i18n="PPR">PPR</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pembiayaan</span>
        </li>

        {{-- SKPD --}}
        <li class="menu-item {{ Request::is('dirut/skpd*') && !Request::is('dirut/skpd/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="SKPD">SKPD</div>
                @if (isset($proposalSkpd) && $proposalSkpd > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalSkpd }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirut/skpd/nasabah') ? 'active' : '' }}">
                    <a href="/dirut/skpd/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/skpd/komite') ? 'active' : '' }}">
                    <a href="/dirut/skpd/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if (isset($proposalSkpd) && $proposalSkpd > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalSkpd }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/skpd/proposal') ? 'active' : '' }}">
                    <a href="/dirut/skpd/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- PASAR --}}
        <li class="menu-item {{ Request::is('dirut/pasar*') && !Request::is('dirut/pasar/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="PASAR">PASAR</div>
                @if (isset($data) && $data > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $data }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirut/pasar/nasabah') ? 'active' : '' }}">
                    <a href="/dirut/pasar/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/pasar/komite') ? 'active' : '' }}">
                    <a href="/dirut/pasar/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if (isset($data) && $data > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $data }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/pasar/proposal') ? 'active' : '' }}">
                    <a href="/dirut/pasar/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- UMKM --}}
        <li class="menu-item {{ Request::is('dirut/umkm*') && !Request::is('dirut/umkm/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="UMKM">UMKM</div>
                @if (isset($b) && $b > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $b }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirut/umkm/nasabah') ? 'active' : '' }}">
                    <a href="/dirut/umkm/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/umkm/komite') ? 'active' : '' }}">
                    <a href="/dirut/umkm/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if (isset($b) && $b > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $b }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/umkm/proposal') ? 'active' : '' }}">
                    <a href="/dirut/umkm/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- PPR --}}
        <li class="menu-item {{ Request::is('dirut/ppr*') && !Request::is('dirut/ppr/create') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="circle" class="menu-icon tf-icons"></i>
                <div data-i18n="PPR">PPR</div>
                @if (isset($proposalppr) && $proposalppr > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalppr }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dirut/ppr/nasabah') ? 'active' : '' }}">
                    <a href="/dirut/ppr/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/ppr/komite') ? 'active' : '' }}">
                    <a href="/dirut/ppr/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if (isset($proposalppr) && $proposalppr > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalppr }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('dirut/ppr/proposal') ? 'active' : '' }}">
                    <a href="/dirut/ppr/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
<!-- END: Main Menu-->
