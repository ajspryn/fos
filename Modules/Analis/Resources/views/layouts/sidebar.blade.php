@php

    $skpds = Modules\Skpd\Entities\SkpdPembiayaan::select()->get();

    $komiteSkpd = 0;
    foreach ($skpds as $skpd) {
        $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $skpd->id)
            ->latest()
            ->get()
            ->first();

        $komite_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
            ->where('id', $history->skpd_pembiayaan_id)
            ->get()
            ->first();
        if ($history->status_id == 5) {
            $komiteSkpd++;
        }
    }

    $proposalSkpd = 0;
    foreach ($skpds as $skpd) {
        $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $skpd->id)
            ->latest()
            ->get()
            ->first();

        $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
            ->where('id', $history->skpd_pembiayaan_id)
            ->get()
            ->first();
        if (($history->status_id == 5 && $history->jabatan_id == 2) || ($history->status_id == 4 && $history->jabatan_id == 3)) {
            $proposalSkpd++;
        }
    }

    // $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
    //     ->where('user_id', Auth::user()->id)
    //     ->where('skpd_sektor_ekonomi_id', null)
    //     ->get()
    //     ->count();

    // $proposals = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
    //     ->where('status_id', 3)
    //     ->get();

    // $komiteskpd = 0;
    // foreach ($proposals as $proposal) {
    //     $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
    //         ->where('id', $proposal->skpd_pembiayaan_id)
    //         ->get()
    //         ->first();
    //     $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
    //         ->where('skpd_pembiayaan_id', $proposal_skpd->id)
    //         ->orderby('created_at', 'desc')
    //         ->get()
    //         ->first();
    //     if ($history->status_id == 5) {
    //         $komiteskpd++;
    //     }
    // }

    // $proposalskpd = 0;
    // foreach ($proposals as $proposal) {
    //     $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
    //         ->where('id', $proposal->skpd_pembiayaan_id)
    //         ->get()
    //         ->first();
    //     $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
    //         ->where('skpd_pembiayaan_id', $proposal_skpd->id)
    //         ->orderby('created_at', 'desc')
    //         ->get()
    //         ->first();
    //     if (($history->status_id == 5 && $history->jabatan_id == 2) || ($history->status_id == 4 && $history->jabatan_id == 3)) {
    //         $proposalskpd++;
    //     }
    // }

    $pasars = Modules\Pasar\Entities\PasarPembiayaan::select()->get();

    $komite = 0;
    foreach ($pasars as $pasar) {
        $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $pasar->id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
            ->where('id', $history->pasar_pembiayaan_id)
            ->get()
            ->first();
        if ($history->status_id == 5) {
            $komite++;
        }
    }
    $data = 0;
    foreach ($pasars as $pasar) {
        $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $pasar->id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
            ->where('id', $history->pasar_pembiayaan_id)
            ->get()
            ->first();
        if (($history->status_id == 5 && $history->jabatan_id == 2) || ($history->status_id == 4 && $history->jabatan_id == 3)) {
            $data++;
        }
    }

    $umkms = Modules\Umkm\Entities\UmkmPembiayaan::select()->get();

    $b = 0;
    foreach ($umkms as $umkm) {
        $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $umkm->id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
            ->where('id', $history->umkm_pembiayaan_id)
            ->get()
            ->first();
        if ($history->status_id == 5) {
            $b++;
        }
    }

    $a = 0;
    foreach ($umkms as $umkm) {
        $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $umkm->id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();

        $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
            ->where('id', $history->umkm_pembiayaan_id)
            ->get()
            ->first();
        if (($history->status_id == 5 && $history->jabatan_id == 2) || ($history->status_id == 4 && $history->jabatan_id == 3)) {
            $a++;
        }
    }

    $pprs = Modules\Form\Entities\FormPprPembiayaan::select()->get();

    $komiteppr = 0;
    foreach ($pprs as $ppr) {
        $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $ppr->id)
            ->latest()
            ->get()
            ->first();

        $komite_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
            ->where('id', $history->form_ppr_pembiayaan_id)
            ->get()
            ->first();
        if ($history->status_id == 5) {
            $komiteppr++;
        }
    }

    $proposalppr = 0;
    foreach ($pprs as $ppr) {
        $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $ppr->id)
            ->latest()
            ->get()
            ->first();

        $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
            ->where('id', $history->form_ppr_pembiayaan_id)
            ->get()
            ->first();
        if (($history->status_id == 5 && $history->jabatan_id == 2) || ($history->status_id == 4 && $history->jabatan_id == 3)) {
            $proposalppr++;
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
            <li><a class="d-flex align-items-center" href="#"><i data-feather="menu"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Dashboard</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis') ? 'active' : '' }}"><a class="d-flex align-items-center"
                            href="/analis"><i data-feather="bar-chart"></i><span class="menu-item text-truncate"
                                data-i18n="Account">Analytic</span></a>
                    </li>
                    <li class="{{ Request::is('analis/skpd/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/analis/skpd/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">SKPD</span></a>
                    </li>
                    <li class="{{ Request::is('analis/pasar/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/analis/pasar/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">Pasar</span></a>
                    </li>
                    <li class="{{ Request::is('analis/umkm/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/analis/umkm/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">UMKM</span></a>
                    </li>
                    <li class="{{ Request::is('analis/ppr/create') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/create"><i data-feather="home"></i><span
                                class="menu-title text-truncate" data-i18n="home">PPR</span></a>
                    </li>
                </ul>
            </li>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Pembiayaan</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">SKPD</span>
                    @if ($proposalSkpd > 0)
                        <span class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalSkpd }}</span>
                    @endif
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/skpd/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/skpd/nasabah"><i
                                data-feather="users"></i><span class="menu-item text-truncate" data-i18n="Account">Data
                                Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/skpd/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/skpd/komite"><i
                                data-feather="clipboard"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Komite</span>
                            @if ($komiteSkpd > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $komiteSkpd }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Request::is('analis/skpd/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/skpd/proposal"><i
                                data-feather="file-text"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Proposal</span>
                            @if ($proposalSkpd > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalSkpd }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PASAR</span>
                    @if ($data > 0)
                        <span class="badge badge-light-success rounded-pill ms-auto me-1">{{ $data }}</span>
                    @endif
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/pasar/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/pasar/nasabah"><i
                                data-feather="users"></i><span class="menu-item text-truncate"
                                data-i18n="Account">Data Nasabah</span>

                        </a>
                    </li>
                    <li class="{{ Request::is('analis/pasar/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/pasar/komite"><i
                                data-feather="clipboard"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Komite</span><span
                                class="badge badge-light-success rounded-pill ms-auto me-1">{{ $komite }}</span></a>
                    </li>
                    <li class="{{ Request::is('analis/pasar/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/pasar/proposal"><i
                                data-feather="file-text"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Proposal</span>
                            @if ($data > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $data }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">UMKM</span>
                    @if ($a > 0)
                        <span class="badge badge-light-success rounded-pill ms-auto me-1">{{ $a }}</span>
                    @endif
                </a>
                <ul class="menu-content">

                    <li class="{{ Request::is('analis/umkm/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/umkm/nasabah"><i
                                data-feather="users"></i><span class="menu-item text-truncate"
                                data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/umkm/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/umkm/komite"><i
                                data-feather="clipboard"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Komite</span>
                            <span
                                class="badge badge-light-success rounded-pill ms-auto me-1">{{ $b }}</span></a>
                    </li>
                    <li class="{{ Request::is('analis/umkm/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/umkm/proposal"><i
                                data-feather="file-text"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Proposal</span>
                            @if ($a > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $a }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">PPR</span>
                    @if ($proposalppr > 0)
                        <span class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalppr }}</span>
                    @endif
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('analis/ppr/nasabah') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/nasabah"><i
                                data-feather="users"></i><span class="menu-item text-truncate"
                                data-i18n="Account">Data Nasabah</span></a>
                    </li>
                    <li class="{{ Request::is('analis/ppr/komite') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/komite"><i
                                data-feather="clipboard"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Komite</span>
                            @if ($komiteppr > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $komiteppr }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Request::is('analis/ppr/proposal') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/analis/ppr/proposal"><i
                                data-feather="file-text"></i><span class="menu-item text-truncate"
                                data-i18n="Security">Proposal</span>
                            @if ($proposalppr > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalppr }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

    </div>
</div>
<!-- END: Main Menu-->
