@php

    $proposals = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
        ->where('status_id', 3)
        ->groupBy('skpd_pembiayaan_id')
        ->latest()
        ->get();

    $proposalSkpd = 0;
    foreach ($proposals as $proposal) {
        $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
            ->where('id', $proposal->skpd_pembiayaan_id)
            ->first();

        if (!$proposal_skpd) {
            continue;
        }

        $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $proposal_skpd->id)
            ->orderby('created_at', 'desc')
            ->first();

        if (!$history) {
            continue;
        }
        if ($history->jabatan_id == 4 && $history->status_id == 5 && $history->cek_staff_akad == 'Belum') {
            $proposalSkpd++;
        }
    }

    $pasars = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
        ->where('status_id', 3)
        ->groupBy('pasar_pembiayaan_id')
        ->latest()
        ->get();

    $proposalPasar = 0;
    foreach ($pasars as $pasar) {
        $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
            ->where('id', $pasar->pasar_pembiayaan_id)
            ->first();

        if (!$proposal_pasar) {
            continue;
        }

        $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $proposal_pasar->id)
            ->orderby('created_at', 'desc')
            ->first();

        if (!$history) {
            continue;
        }
        if ($history->jabatan_id == 4 && $history->status_id == 5 && $history->cek_staff_akad == 'Belum') {
            $proposalPasar++;
        }
    }

    $umkms = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
        ->where('status_id', 3)
        ->groupBy('umkm_pembiayaan_id')
        ->latest()
        ->get();

    $proposalUmkm = 0;
    foreach ($umkms as $umkm) {
        $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
            ->where('id', $umkm->umkm_pembiayaan_id)
            ->first();

        if (!$proposal_umkm) {
            continue;
        }

        $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $proposal_umkm->id)
            ->orderby('created_at', 'desc')
            ->first();

        if (!$history) {
            continue;
        }

        if ($history->jabatan_id == 4 && $history->status_id == 5 && $history->cek_staff_akad == 'Belum') {
            $proposalUmkm++;
        }
    }

    $pprs = Modules\Ppr\Entities\PprPembiayaanHistory::select()
        ->where('status_id', 3)
        ->groupBy('form_ppr_pembiayaan_id')
        ->latest()
        ->get();

    $proposalPpr = 0;
    foreach ($pprs as $ppr) {
        $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
            ->where('id', $ppr->form_ppr_pembiayaan_id)
            ->first();

        if (!$proposal_ppr) {
            continue;
        }

        $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$history) {
            continue;
        }
        if ($history->jabatan_id == 4 && $history->status_id == 5 && $history->cek_staff_akad == 'Belum') {
            $proposalPpr++;
        }
    }

    $p3ks = Modules\P3k\Entities\P3kPembiayaanHistory::select()
        ->where('status_id', 3)
        ->groupBy('p3k_pembiayaan_id')
        ->latest()
        ->get();

    $proposalP3k = 0;
    foreach ($p3ks as $p3k) {
        $proposal_p3k = Modules\P3k\Entities\P3kPembiayaan::select()
            ->where('id', $p3k->p3k_pembiayaan_id)
            ->first();

        if (!$proposal_p3k) {
            continue;
        }

        $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
            ->where('p3k_pembiayaan_id', $proposal_p3k->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$history) {
            continue;
        }
        if ($history->jabatan_id == 4 && $history->status_id == 5 && $history->cek_staff_akad == 'Belum') {
            $proposalP3k++;
        }
    }

    $proposalAkad = $proposalSkpd + $proposalPasar + $proposalUmkm + $proposalPpr + $proposalP3k;
@endphp
<!-- BEGIN: Main Menu-->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <img src="{{ asset('logo.png') }}" height="50" alt="logo_sidebar" loading="lazy">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('staff') ? 'active' : '' }}">
            <a href="/staff" class="menu-link">
                <i data-feather="home" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Akad</span>
        </li>

        <li class="menu-item {{ Request::is('staff/proposal') ? 'active' : '' }}">
            <a href="/staff/proposal" class="menu-link">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="Proposal Akad">Proposal Akad</div>
                @if ($proposalAkad > 0)
                    <div class="badge bg-label-success rounded-pill ms-auto">{{ $proposalAkad }}</div>
                @endif
            </a>
        </li>
        <li class="menu-item {{ Request::is('staff/selesai') ? 'active' : '' }}">
            <a href="/staff/selesai" class="menu-link">
                <i data-feather="check-circle" class="menu-icon tf-icons"></i>
                <div data-i18n="Data Selesai">Data Selesai</div>
            </a>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
