
@extends('akad::layouts.main')
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

$proposalpasar = 0;
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
        $proposalpasar++;
    }
}

$umkms = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
    ->where('status_id', 3)
    ->get();

$proposalumkm = 0;
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
        $proposalumkm++;
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
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    {{-- <div class="row match-height">>
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik </h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0"></p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="clipboard" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">
                                                        {{ $b + $proposalskpd + $data + $proposalppr }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Pengajuan</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="x-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $tolak }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Ditolak</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-warning me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="alert-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">0</h4>
                                                    <p class="card-text font-small-3 mb-0">Review</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="check-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $diterima }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Disetujui</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div> --}}

                    <div class="row">
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="clipboard" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ $proposalskpd+$proposalpasar+$proposalumkm+  $proposalppr}}</h2>
                                    <p class="card-text">Proposal Akad</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text">AKad Selesai</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text">Komite</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text">Disburse</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
