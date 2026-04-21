@extends('dirbis::layouts.main')

@section('content')
@php
$diterima = Modules\Akad\Entities\Pembiayaan::select()
->whereYear('created_at', date('Y'))
->where('segmen', 'P3K')
->where('status', 'Selesai Akad')
->count();

$p3ks = Modules\P3k\Entities\P3kPembiayaan::select()->whereYear('created_at', date('Y'))->get();

$proposalP3k = 0;
foreach ($p3ks as $p3k) {
$history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
->where('p3k_pembiayaan_id', $p3k->id)
->latest()
->first();

if (
($history->jabatan_id == 3 && $history->status_id == 5) ||
($history->jabatan_id == 4 && $history->status_id == 4)
) {
$proposalP3k++;
}
}

$ditolak = Modules\P3k\Entities\P3kPembiayaanHistory::select()
->whereYear('created_at', date('Y'))
->where('status_id', 6)
->count();

$komites = Modules\P3k\Entities\P3kPembiayaan::select()
->whereYear('created_at', date('Y'))
// ->where('user_id', Auth::user()->id)
->whereNotNull('dokumen_ideb')
->latest()
->get();

$review = 0;
foreach ($komites as $komite) {
$history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
->where('p3k_pembiayaan_id', $komite->id)
->latest()
->first();

if ($history->status_id == 7) {
$review++;
}
}

$p3kPipelines = Modules\P3k\Entities\P3kPembiayaan::select()->whereYear('created_at', date('Y'))->get();

$pipeline = 0;
foreach ($p3kPipelines as $p3kPipeline) {
$history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
->where('p3k_pembiayaan_id', $p3kPipeline->id)
->latest()
->first();

if ($history->status_id != 5 || $history->jabatan_id != 4) {
if ($history->status_id < 9) { $pipeline++; } } } $p3kApprovedsDirbis=Modules\P3k\Entities\P3kPembiayaan::select()->whereYear('created_at', date('Y'))->get();

    $approvedDirbis = 0;
    foreach ($p3kApprovedsDirbis as $p3kApprovedDirbis) {
    $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
    ->where('p3k_pembiayaan_id', $p3kApprovedDirbis->id)
    ->latest()
    ->first();

    if ($history->status_id == 5 && $history->jabatan_id == 4) {
    if ($history->status_id < 9) { $approvedDirbis++; } } } $batalAkad=Modules\Akad\Entities\Pembiayaan::select() ->whereYear('created_at', date('Y'))
        ->where('segmen', 'P3K')
        ->where('status', 'Akad Batal')
        ->count();

        //Total Disburse & Margin
        $jmlDisburse = 0;
        $jmlMargin = 0;
        foreach ($proposalSelesais as $proposalSelesai) {
        $plafond = $proposalSelesai->nominal_pembiayaan;
        $jmlDisburse = $jmlDisburse + $plafond;

        $margin = $proposalSelesai->harga_margin;
        $jmlMargin = $jmlMargin + $margin;
        }
        @endphp
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
                            <div class="col-xl-9 col-md-6 col-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <form id="yearForm" method="POST" action="/dirbis/p3k/create">
                                            @csrf
                                            <h4 class="card-title">
                                                Statistik P3K Tahun
                                                <select id="selectYear" name="tahun" class="form-control" style="display: inline-block; width: auto; vertical-align: middle;" onchange="filterData()">
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </select>
                                            </h4>
                                            <input type="hidden" id="inputYear" name="inputYear">
                                            <button type="submit">Submit</button>
                                        </form>
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
                                                        <h4 class="fw-bolder mb-0">{{ $proposalP3k }}
                                                            <span style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                                Pengajuan</span>
                                                        </h4>
                                                        <h4 class="fw-bolder mb-0">{{ $approvedDirbis }}
                                                            <span style="font-weight: normal; font-size:12px; vertical-align:middle;">
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
                                                            <span style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                                Ditolak</span>
                                                        </h4>
                                                        <h4 class="fw-bolder mb-0">{{ $batalAkad }}
                                                            <span style="font-weight: normal; font-size:12px; vertical-align:middle;">
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

                        <div class="row match-height">

                            <div class="col-xl-6 col-md-4 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5>Total Proposal Per Bulan</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Placeholder for the chart -->
                                                {{-- <canvas id="chartProposal" width="200" height="100"></canvas> --}}
                                                <canvas id="chartProposal" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-4 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5>Total Disburse Per Bulan</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Placeholder for the chart -->
                                                <canvas id="chartDisburse" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-4 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5>Dinas1</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Placeholder for the chart -->
                                                <canvas id="chartDinas" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-4 col-sm-6">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5>Total Disburse Per Bulan</h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-1">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Placeholder for the chart -->
                                                <canvas id="dinasChart" width="400" height="200"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5>Disburse Per Bulan</h5>
                                    <canvas id="chartDisburse" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div> --}}
                    </section>
                    <!-- Dashboard Ecommerce ends -->

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

        <!-- Charts Script -->

        <script>
            // Execute when the page is fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                var currentDate = new Date();
                var currentYear = currentDate.getFullYear();

                // Set the current year as the value of the select input for years
                var selectYearInput = document.getElementById('selectYear');
                selectYearInput.value = currentYear; // Set the default value to the current year
                selectYearInput.max = currentYear; // Optionally set the max attribute to the current year

                // Trigger the data filtering once the page has loaded and the year has been set
                filterData();
            });

            document.addEventListener('DOMContentLoaded', function() {
                filterData(); // Initial data load
            });

            var chartProposal; // Global variable for the proposal chart
            var chartDisburse; // Global variable for the disburse chart
            var chartDinas; // Global variable for the Dinas chart

            function filterData() {
                var year = document.getElementById('selectYear').value; // Get the selected year

                $.ajax({
                    url: '/dirbis/p3k/filter-by-year', // Endpoint that returns the data
                    type: 'GET',
                    data: {
                        tahun: year
                    },
                    success: function(response) {
                        // Destroy existing charts if they exist before creating new ones
                        if (chartProposal) {
                            chartProposal.destroy();
                        }
                        if (chartDisburse) {
                            chartDisburse.destroy();
                        }
                        console.log("Data received for charts:", response);
                        populateChart(response, 'chartProposal', 0); // Populate proposals chart
                        populateChart(response, 'chartDisburse', 1); // Populate disburse chart
                        // populatePieChart(response, 'chartDinas', 2);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching data:", error);
                    }
                });

                // Also load data for Dinas chart
                loadDinasData(year);

                //Set year value
                document.getElementById("inputYear").value = year;
            }


            function loadDinasData(year) {
                $.ajax({
                    url: '/dirbis/p3k/filter-by-year', // Endpoint that returns the data
                    type: 'GET',
                    data: {
                        tahun: year
                    },
                    success: function(response) {
                        // Destroy existing Dinas chart if it exists
                        if (chartDinas) {
                            chartDinas.destroy();
                        }
                        // Populate pie chart
                        populatePieChart(response.plabels, response.pdatainstansis, 'chartDinas');
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching Dinas data:", error);
                    }
                });
            }


            function populatePieChart(labels, data, canvasId) {
                var ctx = document.getElementById(canvasId).getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Dinas Chart'
                            }
                        }
                    }
                });
                if (canvasId === 'chartDinas') {
                    chartDinas = chart;
                }
            }

            // Updated to handle both charts by adding parameters for canvas ID and dataset index
            function populateChart(data, canvasId, datasetIndex) {
                var ctx = document.getElementById(canvasId).getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [data.datasets[datasetIndex]] // Use only the specified dataset
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            }
                        }
                    }
                });

                if (canvasId === 'chartProposal') {
                    chartProposal = chart;
                } else if (canvasId === 'chartDisburse') {
                    chartDisburse = chart;
                }
            }
        </script>
        {{-- <script>
        var dinasChart;
        var jabatanChart;

        function loadDinasData(tahun) {
            $.ajax({
                url: `/dirbis/p3k/dinas/data?tahun=${tahun}`,
                type: 'GET',
                success: function(data) {
                    const ctx = document.getElementById('dinasChart').getContext('2d');
                    if (dinasChart) {
                        dinasChart.destroy(); // Destroy existing chart
                    }
                    dinasChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: data.map(item => item.dinas),
                            datasets: [{
                                data: data.map(item => item.count),
                                backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple'],
                                borderColor: 'white'
                            }]
                        },
                        options: {
                            onClick: function(evt, item) {
                                if (item.length > 0) {
                                    const dinas = data[item[0].index].dinas;
                                    loadJabatanData(tahun, dinas);
                                }
                            }
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch Dinas data:', error);
                }
            });
        }

        function loadJabatanData(tahun, dinas) {
            $.ajax({
                url: `/dirbis/p3k/jabatan/data?tahun=${tahun}&dinas=${dinas}`,
                type: 'GET',
                success: function(data) {
                    const ctx = document.getElementById('jabatanChart').getContext('2d');
                    document.getElementById('jabatanChart').style.display = 'block'; // Show the chart
                    if (jabatanChart) {
                        jabatanChart.destroy();
                    }
                    jabatanChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: data.map(item => item.jabatan),
                            datasets: [{
                                data: data.map(item => item.count),
                                backgroundColor: ['red', 'blue', 'green', 'yellow', 'purple'],
                                borderColor: 'white'
                            }]
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch Jabatan data:', error);
                }
            });
        }
    </script> --}}
        <script type="text/javascript">
            var ctx = document.getElementById("dinasChart");
            var dinasChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {
                        !!json_encode($plabels) !!
                    },
                    datasets: [{
                        data: {
                            !!json_encode($pdatainstansis) !!
                        },
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#EC6B56', ' #FFC154'],
                        hoverBackgroundColor: ['#2e59d0', '#17e671', '#2c9faf', '#F15E1E', ' #FFCF09'],
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
            });
        </script>

        {{-- <!-- Chart Proposal -->
    <script>
        var labelProposal = JSON.parse('{!! json_encode($bulans) !!}');
        var dataProposal = JSON.parse('{!! json_encode($hitungPerBulan) !!}');

        var ctx = document.getElementById('chartProposal');
        var chartProposal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelProposal,
                datasets: [{
                    label: "Proposal Per Bulan",
                    data: dataProposal,
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
    <!-- End Chart Proposal -->

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
                    label: "Disburse Per Bulan",
                    data: dataDisburse,
                    fill: true,
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
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <!-- End Chart Disburse --> --}}


        <!-- End Charts Script -->
        @endsection