@extends('analis::layouts.main')

@section('content')
    @php
        $jmlDisburse = $jmlDisburse ?? 0;
    @endphp
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
            <div class="row g-3 match-height">

                        <!-- Statistics Card -->
                        <div class="col-xl-9 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Ultra Mikro</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $pipeline }}</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $proposalUltraMikro }}</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $ditolak }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Ditolak</span>
                                                    </h4>
                                                    <h4 class="fw-bolder mb-0">{{ $batalAkad }}
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
                                                    <h4 class="fw-bolder mb-0">{{ $diterima }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Disetujui</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="activity" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">{{ number_format($jmlDisburse, 0, ',', '.') }}</h2>
                                    <p class="card-text" style="margin-bottom: -7px;">Disburse</p>
                                    <hr />
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    {{-- <h2 class="fw-bolder">{{ number_format($jmlMargin, 0, ',', '.') }}</h2>
                                    <p class="card-text">Margin</p> --}}
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                    <div class="row g-3 match-height mt-2">
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Total Proposal Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartProposal" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Plafond Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartPlafond" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- Dashboard Ecommerce ends -->
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('page-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script type="text/javascript">
        (function () {
            var labelsProposal = {!! json_encode($bulans ?? []) !!};
            var dataProposal = {!! json_encode($hitungPerBulan ?? []) !!};
            var labelsPlafond = {!! json_encode($labelPlafond ?? []) !!};
            var dataPlafond = {!! json_encode($dataPlafond ?? []) !!};

            var ctxProposal = document.getElementById('chartProposal');
            if (ctxProposal) {
                new Chart(ctxProposal, {
                    type: 'bar',
                    data: {
                        labels: labelsProposal,
                        datasets: [{
                            label: 'Proposal Per Bulan',
                            data: dataProposal,
                            backgroundColor: [
                                'rgba(203, 38, 33, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                ticks: {
                                    precision: 0,
                                    beginAtZero: true
                                }
                            }
                        }
                    }
                });
            }

            var ctxPlafond = document.getElementById('chartPlafond');
            if (ctxPlafond) {
                new Chart(ctxPlafond, {
                    type: 'bar',
                    data: {
                        labels: labelsPlafond,
                        datasets: [{
                            label: 'Plafond Per Bulan',
                            data: dataPlafond,
                            backgroundColor: [
                                'rgba(203, 38, 33, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            }
        })();
    </script>
@endpush
