<!-- BEGIN: Main Menu-->
@php

    $proposalPpr = Modules\Form\Entities\FormPprPembiayaan::select()
        ->where('user_id', Auth::user()->id)
        ->where(function ($query) {
            $query
                ->whereNull('dilengkapi_ao')
                ->orWhereNull('form_cl')
                ->orWhereNull('form_score');
        })
        ->get()
        ->count();

    // $komitePpr = Modules\Form\Entities\FormPprPembiayaan::select()
    //     ->where('user_id', Auth::user()->id)
    //     ->whereNotNull(['dilengkapi_ao', 'form_cl', 'form_score'])
    //     ->where('status_id', '>', 8)
    //     ->get()
    //     ->count();

    // $komitePpr = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    //     ->groupBy('form_ppr_pembiayaan_id')
    //     ->latest()
    //     ->where(function ($query) {
    //         $query->where('status_id', '>', 1)->where('status_id', '<', 9);
    //     })
    //     ->get()
    //     ->count();

    $proposals = Modules\Form\Entities\FormPprPembiayaan::select()
        ->where('user_id', Auth::user()->id)
        ->get();

    // $komitePpr = 0;
    // foreach ($proposals as $proposal) {
    //     $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    //         ->where('form_ppr_pembiayaan_id', $proposal->id)
    //         // ->groupBy('form_ppr_pembiayaan_id')
    //         ->latest()
    //         ->get()
    //         ->first();

    //     $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
    //         ->where('id', $history->form_ppr_pembiayaan_id)
    //         ->get()
    //         ->first();

    //     if ($history->status_id > 1 || $history->status_id < 9) {
    //         $komitePpr++;
    //     }
    // }

    $notifRevisi = 0;
    foreach ($proposals as $proposal) {
        $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $proposal->id)
            ->latest()
            ->get()
            ->first();

        $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
            ->where('id', $history->form_ppr_pembiayaan_id)
            ->get()
            ->first();

        if ($history->status_id == 7) {
            $notifRevisi++;
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
                    {{-- @if ($komitePpr > 0)
                        <span class="badge badge-light-success rounded-pill ms-auto me-1">{{ $komitePpr }}</span>
                    @endif --}}
                </a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Proposal</span>
                    @if ($proposalPpr + $notifRevisi > 0)
                        <span
                            class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalPpr + $notifRevisi }}</span>
                    @endif
                </a>
                <ul class="menu-content">
                    <li class="{{ Request::is('ppr/proposal*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/ppr/proposal"><i data-feather="clipboard"></i><span
                                class="menu-title text-truncate" data-i18n="home">Proposal</span>
                            @if ($proposalPpr > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $proposalPpr }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="{{ Request::is('ppr/revisi*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/ppr/revisi"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="home">Revisi Proposal</span>
                            @if ($notifRevisi > 0)
                                <span
                                    class="badge badge-light-success rounded-pill ms-auto me-1">{{ $notifRevisi }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
