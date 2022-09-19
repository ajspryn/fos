@extends('analis::layouts.main')
@php
    $diterima = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
    ->where('status_id',5)
    ->where('jabatan_id', 4)
    ->get()
    ->count();

    $pasars = Modules\Pasar\Entities\PasarPembiayaan::select()->get();

$proposal = 0;
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
        if ($history->status_id == 5 && $history->jabatan_id == 2 || $history->status_id == 4 && $history->jabatan_id == 3  ) {
        $proposal++;
    }
}

    $ditolak = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
    ->where('status_id',6)
    ->get()
    ->count();

    
    $komites = Modules\Pasar\Entities\PasarPembiayaan::select()
    ->whereNotNull('sektor_id')
    ->orderby('updated_at', 'desc')
    ->get();

$review = 0;
foreach ($komites as $komite) {
    $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
        ->where('pasar_pembiayaan_id', $komite->id)
        ->orderby('created_at', 'desc')
        ->get()
        ->first();
    $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
        ->where('id', $history->pasar_pembiayaan_id)
        ->get()
        ->first();
    if ($history->status_id == 7) {
        $review++;
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
                    <div class="row match-height">
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Proposal Anda</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $proposal }}</h4>
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
                        <!--/ Statistics Card -->
                    </div>

                    <div class="row">
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">36.9k</h2>
                                    <p class="card-text">Views</p>
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
                                    <h2 class="fw-bolder">36.9k</h2>
                                    <p class="card-text">Views</p>
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
                                    <h2 class="fw-bolder">36.9k</h2>
                                    <p class="card-text">Views</p>
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
                                    <h2 class="fw-bolder">36.9k</h2>
                                    <p class="card-text">Views</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row match-height">
                        <div class="col-lg-4 col-12">
                            <div class="row match-height">
                                <!-- Bar Chart - Orders -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card">
                                        <div class="card-body pb-50">
                                            <h6>Orders</h6>
                                            <h2 class="fw-bolder mb-1">2,76k</h2>
                                            <div id="statistics-order-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bar Chart - Orders -->

                                <!-- Line Chart - Profit -->
                                <div class="col-lg-6 col-md-3 col-6">
                                    <div class="card card-tiny-line-stats">
                                        <div class="card-body pb-50">
                                            <h6>Profit</h6>
                                            <h2 class="fw-bolder mb-1">6,24k</h2>
                                            <div id="statistics-profit-chart"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Line Chart - Profit -->

                                <!-- Earnings Card -->
                                <div class="col-lg-12 col-md-6 col-12">
                                    <div class="card earnings-card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <h4 class="card-title mb-1">Earnings</h4>
                                                    <div class="font-small-2">This Month</div>
                                                    <h5 class="mb-1">$4055.56</h5>
                                                    <p class="card-text text-muted font-small-2">
                                                        <span class="fw-bolder">68.2%</span><span> more earnings than last
                                                            month.</span>
                                                    </p>
                                                </div>
                                                <div class="col-6">
                                                    <div id="earnings-chart"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Earnings Card -->
                            </div>
                        </div>

                        <!-- Revenue Report Card -->
                        <div class="col-lg-8 col-12">
                            <div class="card card-revenue-budget">
                                <div class="row mx-0">
                                    <div class="col-md-8 col-12 revenue-report-wrapper">
                                        <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card-title mb-50 mb-sm-0">Revenue Report</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center me-2">
                                                    <span
                                                        class="bullet bullet-primary font-small-3 me-50 cursor-pointer"></span>
                                                    <span>Earning</span>
                                                </div>
                                                <div class="d-flex align-items-center ms-75">
                                                    <span
                                                        class="bullet bullet-warning font-small-3 me-50 cursor-pointer"></span>
                                                    <span>Expense</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="revenue-report-chart"></div>
                                    </div>
                                    <div class="col-md-4 col-12 budget-wrapper">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                2020
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">2020</a>
                                                <a class="dropdown-item" href="#">2019</a>
                                                <a class="dropdown-item" href="#">2018</a>
                                            </div>
                                        </div>
                                        <h2 class="mb-25">$25,852</h2>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bolder me-25">Budget:</span>
                                            <span>56,800</span>
                                        </div>
                                        <div id="budget-chart"></div>
                                        <button type="button" class="btn btn-primary">Increase Budget</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Revenue Report Card -->
                    </div> --}}
                </section>
                <!-- Dashboard Ecommerce ends -->
                <div class="row" >
                    <!-- Donut Chart Starts -->
                    <div class="col-lg-4 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Statistik Proposal Perbulan</h4>
                                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                                    <i data-feather="calendar"></i>
                                    <input
                                      type="text"
                                      class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                      placeholder="YYYY-MM-DD"
                                    />
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
                                    <input
                                      type="text"
                                      class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                      placeholder="YYYY-MM-DD"
                                    />
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
                                <h4 class="card-title">Statistik Pasar</h4>
                                <div class="header-right d-flex align-items-center mt-sm-0 mt-1">
                                    <i data-feather="calendar"></i>
                                    <input
                                      type="text"
                                      class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                      placeholder="YYYY-MM-DD"
                                    />
                                  </div>
                            </div>
                            <div class="card-body">
                                <canvas id="myPiechart" width="400" height="400"></canvas>
                            </div>
                            {{-- <div class ="mt-4 text-center small">
                                @foreach($plabels as $label)
                                <span>
                                    <i data-feather='circle'></i> {{ $label }}
                                </span>
                                @endforeach
                            </div> --}}
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script type="text/javascript">
        var _plabels = {!! json_encode($plabels) !!};
        var _pdatapasars = {!! json_encode($pdatapasars) !!};

        var ctx = document.getElementById("myPiechart");
        var myPiechart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: _plabels,
                datasets: [{
                    data: _pdatapasars,
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#EC6B56',' #FFC154'],
                    hoverBackgroundColor: ['#2e59d0', '#17e671', '#2c9faf','#F15E1E',' #FFCF09'],
                    hoverBorderColor: "rgb(234,236,244,1)",
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {

                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderWidth: 1,
                    xpadding: 15,
                    ypadding: 15,
                }
            },
        })
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script type="text/javascript">
        var _ydata = JSON.parse('{!! json_encode($bulans) !!}');
        var _xdata = JSON.parse('{!! json_encode($hitungBulan) !!}');

        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: _ydata,
                datasets: [{
                    label: "Proposal Per Bulan",
                    data: _xdata,
                    backgroundColor: [
                        '#1858AD', '#5cb85c', '#5bc0de','#f0ad4e','#d9534f'
                    ],
                    borderColor: [
                        '#36b9cc', '#7ED8A5', '#B4F6EB','#E7F6B4','#d9534f'
                    ],
                    borderWidth: 1
                }]
            },
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
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script type="text/javascript">
        var _ydata = JSON.parse('{!! json_encode($labelplafonds) !!}');
        var _xdata = JSON.parse('{!! json_encode($dataplafonds) !!}');

        var ctx = document.getElementById('mylineChart');
        var mylineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: _ydata,
                datasets: [{
                    label: -_ydata,
                    data: _xdata,
                    backgroundColor: [
                        '#1858AD', '#5cb85c', '#5bc0de','#f0ad4e','#d9534f'
                    ],
                    borderColor: [
                        '#36b9cc', '#7ED8A5', '#B4F6EB','#E7F6B4','#d9534f'
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
                    beginAtZero: true
                }
            }
        }
        });
    </script>
@endsection
