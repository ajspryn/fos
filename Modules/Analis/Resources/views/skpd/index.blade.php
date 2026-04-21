@extends('analis::layouts.main')

@section('content')
    @php
        $cair = $cair ?? 0;
    @endphp
    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row g-3 match-height">

                    <!-- Statistics Card -->
                    <div class="col-xl-12 col-md-6 col-12">
                        <div class="card card-statistics">
                            <div class="card-header">
                                <h4 class="card-title">Statistik</h4>
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
                                                <h4 class="fw-bolder mb-0">{{ $proposalskpd }}</h4>
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
                                                <h4 class="fw-bolder mb-0">{{ $ditolak }}</h4>
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
                                                <h4 class="fw-bolder mb-0">{{ $revisi }}</h4>
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
                </div>

                <div class="row g-3 match-height mt-2">
                    <div class="col-xl-6 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-info p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="eye" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder">{{ $pipeline1 }}</h2>
                                <p class="card-text">Pipeline</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6 col-md-4 col-sm-6">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="avatar bg-light-info p-50 mb-1">
                                    <div class="avatar-content">
                                        <i data-feather="eye" class="font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="fw-bolder">{{ number_format($cair) }}</h2>
                                <p class="card-text">Disburse</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 match-height mt-2">
                    <!-- Donut Chart Starts -->
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Statistik Proposal Perbulan</h4>
                                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                                    <i data-feather="calendar"></i>
                                    <input type="text"
                                        class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="card-body">

                                <canvas id="myChart" width="400" height="400"></canvas>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Statistik Plafond Perbulan</h4>
                                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                                    <i data-feather="calendar"></i>
                                    <input type="text"
                                        class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="card-body">

                                <canvas id="mylineChart" width="400" height="400"></canvas>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Statistik Instansi</h4>
                                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                                    <i data-feather="calendar"></i>
                                    <input type="text"
                                        class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                        placeholder="YYYY-MM-DD" />
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myPiechart" width="400" height="400"></canvas>
                            </div>
                            {{-- <div class ="mt-4 text-center small">
                                @foreach ($plabels as $label)
                                <span>
                                    <i data-feather='circle'></i> {{ $label }}
                                </span>
                                @endforeach
                            </div> --}}
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
            var ctxPie = document.getElementById('myPiechart');
            if (ctxPie) {
                var labelsInstansi = {!! json_encode($plabels) !!};
                var dataInstansi = {!! json_encode($pdatainstansis) !!};

                new Chart(ctxPie, {
                    type: 'pie',
                    data: {
                        labels: labelsInstansi,
                        datasets: [{
                            data: dataInstansi,
                            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#EC6B56', '#FFC154'],
                            hoverBackgroundColor: ['#2e59d0', '#17e671', '#2c9faf', '#F15E1E', '#FFCF09'],
                            hoverBorderColor: 'rgb(234,236,244,1)'
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }

            var ctxLine = document.getElementById('mylineChart');
            if (ctxLine) {
                var labelsPlafond = JSON.parse('{!! json_encode($labelplafonds) !!}');
                var dataPlafond = JSON.parse('{!! json_encode($dataplafonds) !!}');

                new Chart(ctxLine, {
                    type: 'line',
                    data: {
                        labels: labelsPlafond,
                        datasets: [{
                            label: 'Plafond Per Bulan',
                            data: dataPlafond,
                            backgroundColor: ['#1858AD'],
                            borderColor: ['#36b9cc'],
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
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            var ctxBar = document.getElementById('myChart');
            if (ctxBar) {
                var labelsProposal = JSON.parse('{!! json_encode($bulans) !!}');
                var dataProposal = JSON.parse('{!! json_encode($hitungBulan) !!}');

                new Chart(ctxBar, {
                    type: 'bar',
                    data: {
                        labels: labelsProposal,
                        datasets: [{
                            label: 'Proposal Per Bulan',
                            data: dataProposal,
                            backgroundColor: ['#1858AD', '#5cb85c', '#5bc0de', '#f0ad4e', '#d9534f'],
                            borderColor: ['#36b9cc', '#7ED8A5', '#B4F6EB', '#E7F6B4', '#d9534f'],
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
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        })();
    </script>
@endpush
