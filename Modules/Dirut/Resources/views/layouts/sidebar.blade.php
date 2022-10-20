@php
    $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
        ->where('user_id', Auth::user()->id)
        ->where('skpd_sektor_ekonomi_id', null)
        ->get()
        ->count();
    
    $proposals = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
        ->where('status_id', 3)
        ->get();
    
    $proposalskpd = 0;
    foreach ($proposals as $proposal) {
        $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
            ->where('id', $proposal->skpd_pembiayaan_id)
            ->get()
            ->first();
        $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $proposal_skpd->id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();
        if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
            $proposalskpd++;
        }
    }
    
    $pasars = Modules\Pasar\Entities\PasarPembiayaan::select()->get();
    
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
        if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
            $data++;
        }
    }
    
    $umkms = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
        ->where('status_id', 3)
        ->get();
    
    $b = 0;
    foreach ($umkms as $umkm) {
        $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
            ->where('id', $umkm->umkm_pembiayaan_id)
            ->get()
            ->first();
    
        $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $proposal_umkm->id)
            ->orderby('created_at', 'desc')
            ->get()
            ->first();
    
        if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
            $b++;
        }
    }
    
    $pprs = Modules\Form\Entities\FormPprPembiayaan::select()->get();
    
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
        if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
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
                    <li class="{{ Request::is('dirut') ? 'active' : '' }}"><a class="d-flex align-items-center"
                            href="/dirut"><i data-feather="bar-chart"></i><span class="menu-item text-truncate"
                                data-i18n="Account">Analytic</span></a>
                    </li>
                    <li class="{{ Request::is('dirut/skpd/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/dirut/skpd/create"><i data-feather="home"></i><span
                                class="menu-title text-truncate" data-i18n="home">SKPD</span></a>
                    </li>
                    <li class="{{ Request::is('dirut/pasar/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/dirut/pasar/create"><i
                                data-feather="home"></i><span class="menu-title text-truncate"
                                data-i18n="home">Pasar</span></a>
                    </li>
                    <li class="{{ Request::is('dirut/umkm/create') ? 'active' : '' }} "><a
                            class="d-flex align-items-center" href="/dirut/umkm/create"><i data-feather="home"></i><span
                                class="menu-title text-truncate" data-i18n="home">UMKM</span></a>
                    </li>
                    <li class="{{ Request::is('dirut/ppr/create') ? 'active' : '' }}"><a
                            class="d-flex align-items-center" href="/dirut/ppr/create"><i data-feather="home"></i><span
                                class="menu-title text-truncate" data-i18n="home">PPR</span></a>
                    </li>
                </ul>

    </div>
</div>
<!-- END: Main Menu-->
