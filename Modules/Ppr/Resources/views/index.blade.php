@extends('ppr::layouts.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="dashboard-ecommerce">

                    {{-- Row 1: Welcome Card + Statistik Proposal --}}
                    <div class="row mb-2">
                        <div class="col-xl-4 col-md-6 col-12 mb-2 mb-md-0">
                            <div class="card h-100 mb-0">
                                @if ($cair < $targetNominal)
                                    <div class="card-body" style="background:linear-gradient(118deg,#ea5455,rgba(234,84,85,.7));border-radius:inherit;">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <div>
                                                <h5 class="text-white mb-25">{{ Auth::user()->name }}</h5>
                                                <p class="text-white font-small-3 mb-0">Kamu Belum Mencapai Target Bulan Ini!</p>
                                            </div>
                                            <div class="avatar bg-white p-50">
                                                <div class="avatar-content">
                                                    <i data-feather="target" class="text-danger font-medium-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded p-1 mb-1">
                                            <p class="mb-25 text-body font-small-3 fw-bold">Disburse VS Target</p>
                                            <h5 class="mb-0 text-danger fw-bolder">
                                                {{ number_format($cair) }}
                                                <small class="text-body fw-normal font-small-3"> / {{ number_format($targetNominal) }}</small>
                                            </h5>
                                        </div>
                                        @php($pct = min(round($cair / $targetNominal * 100), 100))
                                        <div class="progress mb-25" style="height:6px;background:rgba(255,255,255,0.3);">
                                            <div class="progress-bar bg-white" role="progressbar" style="width:{{ $pct }}%"></div>
                                        </div>
                                        <small class="text-white">{{ $pct }}% dari target</small>
                                    </div>
                                @else
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <div>
                                                <h5 class="mb-25">{{ Auth::user()->name }}</h5>
                                                <p class="card-text font-small-3 text-success">Selamat, Target Tercapai! 🎉</p>
                                            </div>
                                            <div class="avatar bg-light-success p-50">
                                                <div class="avatar-content">
                                                    <i data-feather="award" class="text-success font-medium-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-light-success rounded p-1 mb-1">
                                            <p class="mb-25 text-success font-small-3 fw-bold">Disburse VS Target</p>
                                            <h5 class="mb-0 text-success fw-bolder">
                                                {{ number_format($cair) }}
                                                <small class="text-body fw-normal font-small-3"> / {{ number_format($targetNominal) }}</small>
                                            </h5>
                                        </div>
                                        <img src="{{ asset('app-assets/images/illustration/badge.svg') }}"
                                            class="congratulation-medal" alt="Medal Pic" />
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Proposal Anda</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    {{-- Pipeline featured stat --}}
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="avatar bg-light-info me-2">
                                            <div class="avatar-content">
                                                <i data-feather="git-commit" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h4 class="fw-bolder mb-0">{{ $pipeline }}</h4>
                                            <p class="card-text font-small-3 mb-0">Pipeline</p>
                                        </div>
                                    </div>
                                    <hr class="my-1" />
                                    <div class="row mt-1">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="clipboard" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $proposal }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Pengajuan</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="x-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0">{{ $ditolak }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Ditolak</p>
                                                    <h4 class="fw-bolder mb-0 mt-25">{{ $batalAkad }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Batal Akad</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
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
                                        <div class="col-xl-3 col-sm-6 col-12">
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
                    </div>

                    {{-- Row 2: 4 Charts in 2x2 grid --}}
                    <div class="row g-3">
                        <div class="col-lg-6 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Total Proposal Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartProposal"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Plafond Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartPlafond"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Jenis Nasabah</h4>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <canvas id="chartJenisNasabah"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">NOA Proyek Perumahan</h4>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <canvas id="chartNoaProyekPerumahan"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    {{-- Bar Chart: Proposal Per Bulan --}}
    <script>
        (function () {
            var ctx = document.getElementById('chartProposal');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($bulans) !!},
                    datasets: [{
                        label: 'Proposal Per Bulan',
                        data: {!! json_encode($hitungPerBulan) !!},
                        backgroundColor: 'rgba(115,103,240,0.8)',
                        borderRadius: 4,
                        borderSkipped: false
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        })();
    </script>

    {{-- Bar Chart: Plafond Per Bulan --}}
    <script>
        (function () {
            var ctx = document.getElementById('chartPlafond');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labelPlafond) !!},
                    datasets: [{
                        label: 'Plafond Per Bulan',
                        data: {!! json_encode($dataPlafond) !!},
                        backgroundColor: 'rgba(40,199,111,0.8)',
                        borderRadius: 4,
                        borderSkipped: false
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        })();
    </script>

    {{-- Pie Chart: Jenis Nasabah --}}
    <script>
        (function () {
            var ctx = document.getElementById('chartJenisNasabah');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($labelJenisNasabah) !!},
                    datasets: [{
                        data: {!! json_encode($dataJenisNasabah) !!},
                        backgroundColor: ['#7367f0', '#28c76f', '#00cfe8', '#ea5455', '#ff9f43'],
                        hoverBackgroundColor: ['#6254e8', '#24b263', '#00b8d4', '#e73d3e', '#ff8f20'],
                    }]
                },
                options: {
                    plugins: { legend: { position: 'bottom', labels: { padding: 12, usePointStyle: true } } }
                }
            });
        })();
    </script>

    {{-- Doughnut Chart: NOA Proyek Perumahan --}}
    <script>
        (function () {
            var ctx = document.getElementById('chartNoaProyekPerumahan');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode($labelNoaProyekPerumahan) !!},
                    datasets: [{
                        data: {!! json_encode($dataNoaProyekPerumahan) !!},
                        backgroundColor: ['#7367f0', '#28c76f', '#00cfe8', '#ea5455', '#ff9f43'],
                        hoverBackgroundColor: ['#6254e8', '#24b263', '#00b8d4', '#e73d3e', '#ff8f20'],
                    }]
                },
                options: {
                    plugins: { legend: { position: 'bottom', labels: { padding: 12, usePointStyle: true } } }
                }
            });
        })();
    </script>
@endsection
