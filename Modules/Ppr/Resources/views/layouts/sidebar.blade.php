<!-- BEGIN: Main Menu-->
@php
$proposal = Modules\Form\Entities\FormPprPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->get()
    ->first();

$proposalppr = Modules\Form\Entities\FormPprPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->whereNull('form_cl')
    ->orWhereNull('form_score')
    ->get()
    ->count();

$komiteppr = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('user_id', Auth::user()->id)
    ->where('status_id', 2)
    ->get()
    ->count();

// $pembiayaan = Modules\Form\Entities\FormPprPembiayaan::select()
//     ->where('id', $id)
//     ->get()
//     ->first();

// $notif_komite = DB::table('ppr_pembiayaan_histories')
//     ->groupBy('form_ppr_pembiayaan_id')
//     ->latest('form_ppr_pembiayaan_id')
//     ->where('status_id', '=', 3)

//     ->get()
//     ->count();

// $notif_komite = DB::table('ppr_pembiayaan_histories')
//     ->latest('id')
//     ->orderBy('created_at', 'DESC')
//     ->groupBy('form_ppr_pembiayaan_id')
//     ->where('status_id', '=', 3)
//     ->paginate(20)

//     ->count();

// $notif_komite = Modules\Ppr\Entities\PprPembiayaanHistory::select()
//     ->latest()
//     ->groupBy('form_ppr_pembiayaan_id')
//     ->having('status_id', 3)
//     ->get()
//     ->count();

// $notif_komite = DB::table('ppr_pembiayaan_histories')
//     ->select('form_ppr_pembiayaan_id', DB::raw('count(*) as total'))
//     ->groupBy('form_ppr_pembiayaan_id')
//     ->get();

// $notif_komite = Modules\Ppr\Entities\PprPembiayaanHistory::select('form_ppr_pembiayaan_id', DB::raw('MAX(form_ppr_pembiayaan_id) AS total'))
//     ->groupBy('form_ppr_pembiayaan_id')
//     ->where([['status_id', '=', 3], ['status_id', '>', 3], ['status_id', '<', 3]])
//     ->get()
//     ->count();

$revisi = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('status_id', 7)
    ->get()
    ->count();
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
            <li class="{{ Request::is('ppr') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Menu Anda</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('ppr/nasabah*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr/nasabah"><i data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="home">Data Nasabah</span></a>
            </li>
            <li class="{{ Request::is('ppr/komite*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/ppr/komite"><i data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="home">Komite</span>
                    @if ($komiteppr > 0)
                        <span class="badge badge-light-success rounded-pill ms-auto me-1">{{ $komiteppr }}</span>
                    @endif
                </a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Proposal</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('ppr/proposal*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/ppr/proposal"><i data-feather="clipboard"></i><span
                                class="menu-title text-truncate" data-i18n="home">Proposal</span>
                            @if ($proposalppr > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalppr }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Request::is('ppr/revisi*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/ppr/revisi"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="home">Revisi Proposal</span>
                            @if ($revisi > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $revisi }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
