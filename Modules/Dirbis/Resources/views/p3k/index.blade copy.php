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
                if ($history->status_id < 9) {
                    $pipeline++;
                }
            }
        }

        $p3kApprovedsDirbis = Modules\P3k\Entities\P3kPembiayaan::select()->whereYear('created_at', date('Y'))->get();

        $approvedDirbis = 0;
        foreach ($p3kApprovedsDirbis as $p3kApprovedDirbis) {
            $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
                ->where('p3k_pembiayaan_id', $p3kApprovedDirbis->id)
                ->latest()
                ->first();

            if ($history->status_id == 5 && $history->jabatan_id == 4) {
                if ($history->status_id < 9) {
                    $approvedDirbis++;
                }
            }
        }

        $batalAkad = Modules\Akad\Entities\Pembiayaan::select()
            ->whereYear('created_at', date('Y'))
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
                                    <h4 class="card-title">Statistik P3K Tahun {{ date('Y') }}</h4>
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
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Pengajuan</span>
                                                    </h4>
                                                    <h4 class="fw-bolder mb-0">{{ $approvedDirbis }}
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
                                            <!-- Input month -->
                                            <div class="mb-1">
                                                <select id="selectYear" classs="form-control" onchange="filterData()">
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Placeholder for the chart -->
                                            <canvas id="chartProposal" width="200" height="100"></canvas>
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

    {{-- set current month in input --}}
    <script>
        // Execute when the page is loaded
        window.addEventListener('load', function() {
            // Get the current date
            var currentDate = new Date();

            // Get the current year and month
            var currentYear = currentDate.getFullYear();

            // Set the value of the input field to the current year and month
            var yearInput = currentYear;
            document.getElementById('selectYear').value = yearInput;

            // Trigger the filterData function after setting the value
            filterData();
        });
    </script>

    <!-- Chart Pipeline -->
    <script>
        // Select max month
        // Get the current date
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear(); // Get the current year

        // Set the value and max attribute of the year input field
        var selectYearInput = document.getElementById('selectYear');
        selectYearInput.value = currentYear; // Set the default value to the current year
        selectYearInput.max = currentYear; // Optionally set the max attribute to the current year

        // Initialize the chart
        var chartProposal;

        function filterData() {
            var year = document.getElementById('selectYear').value; // Assume there is a year selector with ID 'selectYear'

            $.ajax({
                url: '/dirbis/p3k/filter-by-year', // Updated to a new route for filtering by year
                type: 'GET',
                data: {
                    tahun: year // Sending only the year
                },
                success: function(response) {
                    // Destroy the existing chart if it exists
                    if (chartProposal) {
                        chartProposal.destroy();
                    }
                    console.log(response);
                    // Populate chart
                    populateChart(response);

                    // Optional: Populate table if needed
                    // populateTable(response);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to fetch data: " + error);
                }
            });
        }

        function populateChart(data) {
            var ctx = document.getElementById('chartProposal').getContext('2d');
            chartProposal = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    indexAxis: 'y',
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });
        }
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
