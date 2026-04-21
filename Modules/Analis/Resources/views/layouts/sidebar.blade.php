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
        <li class="menu-item {{ Request::is('analis') ? 'active' : '' }}">
            <a href="/analis" class="menu-link">
                <i data-feather="bar-chart" class="menu-icon tf-icons"></i>
                <div data-i18n="Analytic">Analytic</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('simulasi*') ? 'active' : '' }}">
            <a href="/simulasi" class="menu-link">
                <i data-feather="monitor" class="menu-icon tf-icons"></i>
                <div data-i18n="Simulasi">Simulasi</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pengajuan Baru</span>
        </li>

        <li class="menu-item {{ Request::is('analis/skpd/create') ? 'active' : '' }}">
            <a href="/analis/skpd/create" class="menu-link">
                <i data-feather="plus-square" class="menu-icon tf-icons"></i>
                <div data-i18n="SKPD">SKPD</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('analis/pasar/create') ? 'active' : '' }}">
            <a href="/analis/pasar/create" class="menu-link">
                <i data-feather="plus-square" class="menu-icon tf-icons"></i>
                <div data-i18n="Pasar">Pasar</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('analis/umkm/create') ? 'active' : '' }}">
            <a href="/analis/umkm/create" class="menu-link">
                <i data-feather="plus-square" class="menu-icon tf-icons"></i>
                <div data-i18n="UMKM">UMKM</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('analis/ppr/create') ? 'active' : '' }}">
            <a href="/analis/ppr/create" class="menu-link">
                <i data-feather="plus-square" class="menu-icon tf-icons"></i>
                <div data-i18n="PPR">PPR</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('analis/p3k/create') ? 'active' : '' }}">
            <a href="/analis/p3k/create" class="menu-link">
                <i data-feather="plus-square" class="menu-icon tf-icons"></i>
                <div data-i18n="P3K">P3K</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('analis/ultra_mikro/create') ? 'active' : '' }}">
            <a href="/analis/ultra_mikro/create" class="menu-link">
                <i data-feather="plus-square" class="menu-icon tf-icons"></i>
                <div data-i18n="Ultra Mikro">Ultra Mikro</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pembiayaan</span>
        </li>

        <li class="menu-item {{ Request::is('analis/skpd*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="briefcase" class="menu-icon tf-icons"></i>
                <div data-i18n="SKPD">SKPD</div>
                @if ($proposalSkpd > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalSkpd }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('analis/skpd/nasabah*') ? 'active' : '' }}">
                    <a href="/analis/skpd/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/skpd/komite*') ? 'active' : '' }}">
                    <a href="/analis/skpd/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($komiteSkpd > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $komiteSkpd }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/skpd/proposal*') ? 'active' : '' }}">
                    <a href="/analis/skpd/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($proposalSkpd > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalSkpd }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('analis/pasar*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="shopping-bag" class="menu-icon tf-icons"></i>
                <div data-i18n="Pasar">Pasar</div>
                @if ($data > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $data }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('analis/pasar/nasabah*') ? 'active' : '' }}">
                    <a href="/analis/pasar/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/pasar/komite*') ? 'active' : '' }}">
                    <a href="/analis/pasar/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($komite > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $komite }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/pasar/proposal*') ? 'active' : '' }}">
                    <a href="/analis/pasar/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($data > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $data }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('analis/umkm*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="package" class="menu-icon tf-icons"></i>
                <div data-i18n="UMKM">UMKM</div>
                @if ($a > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $a }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('analis/umkm/nasabah*') ? 'active' : '' }}">
                    <a href="/analis/umkm/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/umkm/komite*') ? 'active' : '' }}">
                    <a href="/analis/umkm/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($b > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $b }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/umkm/proposal*') ? 'active' : '' }}">
                    <a href="/analis/umkm/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($a > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $a }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('analis/ppr*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="file" class="menu-icon tf-icons"></i>
                <div data-i18n="PPR">PPR</div>
                @if ($proposalppr > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalppr }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('analis/ppr/nasabah*') ? 'active' : '' }}">
                    <a href="/analis/ppr/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/ppr/komite*') ? 'active' : '' }}">
                    <a href="/analis/ppr/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($komiteppr > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $komiteppr }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/ppr/proposal*') ? 'active' : '' }}">
                    <a href="/analis/ppr/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($proposalppr > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalppr }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('analis/p3k*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="P3K">P3K</div>
                @if ($proposalP3k > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalP3k }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('analis/p3k/nasabah*') ? 'active' : '' }}">
                    <a href="/analis/p3k/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/p3k/komite*') ? 'active' : '' }}">
                    <a href="/analis/p3k/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($komiteP3k > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $komiteP3k }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/p3k/proposal*') ? 'active' : '' }}">
                    <a href="/analis/p3k/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($proposalP3k > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalP3k }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ Request::is('analis/ultra_mikro*') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="zap" class="menu-icon tf-icons"></i>
                <div data-i18n="Ultra Mikro">Ultra Mikro</div>
                @if ($proposalUltraMikro > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalUltraMikro }}</div>
                @endif
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('analis/ultra_mikro/nasabah*') ? 'active' : '' }}">
                    <a href="/analis/ultra_mikro/nasabah" class="menu-link">
                        <div data-i18n="Data Nasabah">Data Nasabah</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/ultra_mikro/komite*') ? 'active' : '' }}">
                    <a href="/analis/ultra_mikro/komite" class="menu-link">
                        <div data-i18n="Komite">Komite</div>
                        @if ($komiteUltraMikro > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $komiteUltraMikro }}</div>
                        @endif
                    </a>
                </li>
                <li class="menu-item {{ Request::is('analis/ultra_mikro/proposal*') ? 'active' : '' }}">
                    <a href="/analis/ultra_mikro/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        @if ($proposalUltraMikro > 0)
                            <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalUltraMikro }}</div>
                        @endif
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
