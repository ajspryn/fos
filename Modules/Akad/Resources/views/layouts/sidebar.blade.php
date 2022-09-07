@php

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
    if (($history->jabatan_id == 4 && $history->status_id == 5)){
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
        if (($history->jabatan_id == 4 && $history->status_id == 5)){
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

    if (($history->jabatan_id == 4 && $history->status_id == 5)) {
        $b++;
    }
}

$pprs = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('status_id', 3)
    ->get();

$proposalppr = 0;
foreach ($pprs as $ppr) {
    $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
        ->where('id', $ppr->form_ppr_pembiayaan_id)
        ->get()
        ->first();

    $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
        ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
        ->orderBy('created_at', 'desc')
        ->get()
        ->first();
        if (($history->jabatan_id == 4 && $history->status_id == 5)) {
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
            <li class="{{ Request::is('staff') ? 'active' : '' }} "><a class="d-flex align-items-center"
                    href="/staff"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Akad</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('staff/proposal') ? 'active' : '' }} "><a class="d-flex align-items-center"
                href="/staff/proposal"><i
                        data-feather="clipboard"></i><span class="menu-title text-truncate"
                        data-i18n="Pages">Proposal Akad</span></a>
            </li>
            <li class="{{ Request::is('staff/selesai') ? 'active' : '' }} "><a class="d-flex align-items-center"
                href="/staff/selesai"><i
                        data-feather="check-circle"></i><span class="menu-title text-truncate"
                        data-i18n="Pages">Data Selesai </span></a>
            </li>
                

    </div>
</div>
<!-- END: Main Menu-->
