@extends('dirbis::layouts.main')
@php

    // $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
    //     ->where('user_id', Auth::user()->id)
    //     ->where('skpd_sektor_ekonomi_id', null)
    //     ->get()
    //     ->count();

    $proposals = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
        ->latest()
        ->groupBy('skpd_pembiayaan_id')
        ->where('status_id', 3)
        ->get();

    $proposalskpd = 0;
    foreach ($proposals as $proposal) {
        $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
            ->where('id', $proposal->skpd_pembiayaan_id)
            ->first();
        $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
            ->where('skpd_pembiayaan_id', $proposal_skpd->id)
            ->orderby('created_at', 'desc')
            ->first();
        if (
            ($history->jabatan_id == 3 && $history->status_id == 5) ||
            ($history->jabatan_id == 4 && $history->status_id == 4)
        ) {
            $proposalskpd++;
        }
    }

    $pasars = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
        ->latest()
        ->groupBy('pasar_pembiayaan_id')
        ->where('status_id', 3)
        ->get();

    $data = 0;
    foreach ($pasars as $pasar) {
        $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
            ->where('id', $pasar->pasar_pembiayaan_id)
            ->first();

        $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
            ->where('pasar_pembiayaan_id', $proposal_pasar->id)
            ->orderby('created_at', 'desc')
            ->first();
        if (
            ($history->jabatan_id == 3 && $history->status_id == 5) ||
            ($history->jabatan_id == 4 && $history->status_id == 4)
        ) {
            $data++;
        }
    }

    $umkms = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
        ->latest()
        ->groupBy('umkm_pembiayaan_id')
        ->where('status_id', 3)
        ->get();

    $b = 0;
    foreach ($umkms as $umkm) {
        $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
            ->where('id', $umkm->umkm_pembiayaan_id)
            ->first();

        $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $proposal_umkm->id)
            ->orderby('created_at', 'desc')
            ->first();

        if (
            ($history->jabatan_id == 3 && $history->status_id == 5) ||
            ($history->jabatan_id == 4 && $history->status_id == 4)
        ) {
            $b++;
        }
    }

    $pprs = Modules\Ppr\Entities\PprPembiayaanHistory::select()
        ->latest()
        ->groupBy('form_ppr_pembiayaan_id')
        ->where('status_id', 3)
        ->get();

    $proposalppr = 0;
    foreach ($pprs as $ppr) {
        $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
            ->where('id', $ppr->form_ppr_pembiayaan_id)
            ->first();

        $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
            ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
            ->orderBy('created_at', 'desc')
            ->first();
        if (
            ($history->jabatan_id == 3 && $history->status_id == 5) ||
            ($history->jabatan_id == 4 && $history->status_id == 4)
        ) {
            $proposalppr++;
        }
    }

    $diterima = Modules\Akad\Entities\Pembiayaan::select()
        ->whereYear('created_at', date('Y'))
        ->where('status', 'Selesai Akad')
        ->count();

    //Total disburse, margin, & selesai akad
    $jmlDisburse = 0;
    $jmlMargin = 0;
    $jmlProposalSelesai = 0;
    foreach ($proposalSelesais as $proposalSelesai) {
        $plafond = $proposalSelesai->plafond;
        $jmlDisburse = $jmlDisburse + $plafond;

        $margin = $proposalSelesai->margin;
        $jmlMargin = $jmlMargin + $margin;

        $jmlProposalSelesai++;
    }
@endphp
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-9 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Tahun {{ date('Y') }}</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0"></p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-1" style="margin: auto; margin-top:-25px;">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="git-commit" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">
                                                        {{ $jmlPipeline }}
                                                    </h4>
                                                    <p class="card-text font-small-3 mb-0">Pipeline</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <br />
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
                                                        {{ $proposalPengajuan }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Pengajuan</span>
                                                    </h4>
                                                    <h4 class="fw-bolder mb-0">
                                                        {{ $approvedDirbis }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Disetujui</span>
                                                    </h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $ditolak }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Ditolak</span>
                                                    </h4>
                                                    <h4 class="fw-bolder mb-0">{{ $proposalBatal }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Batal
                                                            Akad</span>
                                                    </h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $review }}</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $jmlProposalSelesai }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Selesai Akad</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-8">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1" style="margin-top:50px;">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ 'Rp ' . number_format($jmlDisburse, 0, ',', '.') }}</h2>
                                    <p class="card-text" style="margin-bottom: -7px;">Disburse</p>
                                    {{-- <hr />
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ number_format($jmlMargin, 0, ',', '.') }}</h2>
                                    <p class="card-text">Margin</p> --}}
                                </div>
                            </div>
                        </div>

                        <!--/ Statistics Card -->
                    </div>

                    <!-- Charts -->
                    <div class="row match-height">
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Total Proposal Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartProposal" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Proposal Per Segmen</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartSegmen" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Total Disburse Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartDisburse" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- Charts Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    <!-- Chart Proposal Per Bulan -->
    <script>
        var labelProposal = JSON.parse('{!! json_encode($bulans) !!}');
        var dataProposal = JSON.parse('{!! json_encode($hitungPerBulan) !!}');

        var ctx = document.getElementById('chartProposal');
        var chartProposal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelProposal,
                datasets: [{
                    label: "Total Proposal Per Bulan",
                    data: dataProposal,
                    backgroundColor: [
                        'rgba(203, 38, 33, 0.7)'
                    ],
                    borderColor: [
                        'rgba(203, 38, 33, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            precision: 0,
                            beginAtZero: true,
                            callback: (yValue) => {
                                return Math.floor(yValue);
                            }
                        }
                    }
                }
            }
        });
    </script>
    <!-- /Chart Proposal Per Bulan -->

    <!-- Chart Proposal Per Segmen -->
    <script>
        var labelSegmen = JSON.parse('{!! json_encode($labelSegmen) !!}');
        var dataSegmen = JSON.parse('{!! json_encode($dataSegmen) !!}');

        var ctx = document.getElementById('chartSegmen');
        var chartSegmen = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labelSegmen,
                datasets: [{
                    label: "Proposal Per Segmen",
                    data: dataSegmen,
                    backgroundColor: [
                        'rgba(203, 38, 33, 0.7)',
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(203, 38, 33, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'start',
                        labels: {
                            boxWidth: 20,
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
    <!-- /Chart Proposal Per Segmen -->

    <!-- Chart Disburse -->
    <script>
        var labelDisburse = JSON.parse('{!! json_encode($labelDisburse) !!}');
        var dataDisburse = JSON.parse('{!! json_encode($dataDisburse) !!}');

        var ctx = document.getElementById('chartDisburse').getContext('2d');

        var gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(175, 10, 6, 1)');
        gradient.addColorStop(1, 'rgba(225, 81, 77, 0)');

        var chartDisburse = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labelDisburse,
                datasets: [{
                    label: "Total Disburse Per Bulan",
                    fill: true,
                    data: dataDisburse,
                    backgroundColor: gradient,
                    borderColor: [
                        'rgb(225, 81, 77)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            precision: 0,
                            beginAtZero: true,
                        },
                    }
                }
            }
        });
    </script>
    <!-- /Chart Disburse -->
@endsection
