@extends('dirbis::layouts.main')
@php
$datas = Modules\Pasar\Entities\PasarPembiayaan::select()
    ->get();
$diterima = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
    ->where('status_id',5)
    ->where('jabatan_id', 4)
    ->get()
    ->count();

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
    if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
        $data++;
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
                                                    <h4 class="fw-bolder mb-0">{{ $data }}</h4>
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

                    @php
                    $cair = 0;
                            foreach ($target1 as $target) {
                                $harga_jual = $target->harga;
                            
                                $cair = $cair + $harga_jual;
                            
                                $pasars = Modules\Pasar\Entities\PasarPembiayaan::select()->get();
                            }
                                $pipeline1 = 0;
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
                                    if ($history->status_id != 5 || $history->jabatan_id != 4) {
                                        if($history->status_id != 9)
                                        $pipeline1++;
                                    }
                                }
                            
                @endphp
                    <div class="row">
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
                </section>
       
                <div class="row match-height" >
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
            type: 'pie',
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
