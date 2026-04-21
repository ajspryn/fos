@extends('dirbis::layouts.main')

@section('content')
    @php
        $diterima = Modules\Akad\Entities\Pembiayaan::whereYear('created_at', date('Y'))
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
                ($history->jabatan_id == 2 && $history->status_id == 5) ||
                ($history->jabatan_id == 2 && $history->status_id == 4)
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

            if ($history->status_id != 5 || $history->jabatan_id != 2) {
                if ($history->status_id < 9) {
                    $pipeline++;
                }
            }
        }

        $p3kApprovedsKabag = Modules\P3k\Entities\P3kPembiayaan::select()->whereYear('created_at', date('Y'))->get();

        $approvedKabag = 0;
        foreach ($p3kApprovedsKabag as $p3kApprovedKabag) {
            $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
                ->where('p3k_pembiayaan_id', $p3kApprovedKabag->id)
                ->latest()
                ->first();

            if ($history->status_id == 5 && $history->jabatan_id == 2) {
                if ($history->status_id < 9) {
                    $approvedKabag++;
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
                                    {{-- <form id="yearForm" method="POST" action="/dirbis/p3k/create">
                                        @csrf --}}
                                    <h4 class="card-title">
                                        Statistik P3K Tahun
                                        <select id="selectYear" name="tahun" class="form-control"
                                            style="display: inline-block; width: auto; vertical-align: middle;"
                                            onchange="filterData()">
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </h4>
                                    <input type="hidden" id="inputYear" name="inputYear">
                                    {{-- <button type="submit">Submit</button> --}}
                                    {{-- </form> --}}
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
                                                <div class="my-auto pipeline">
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
                                                    <h4 class="fw-bolder mb-0 pengajuan">{{ $proposalP3k }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Pengajuan</span>
                                                    </h4>
                                                    <h4 class="fw-bolder mb-0 disetujui">{{ $approvedKabag }}
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
                                                    <h4 class="fw-bolder mb-0 ditolak">{{ $ditolak }}
                                                        <span
                                                            style="font-weight: normal; font-size:12px; vertical-align:middle;">
                                                            Ditolak</span>
                                                    </h4>
                                                    <h4 class="fw-bolder mb-0 batalAkad">{{ $batalAkad }}
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
                                                    <h4 class="fw-bolder mb-0 review">{{ $review }}</h4>
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
                                                    <h4 class="fw-bolder mb-0 selesaiAkad">{{ $diterima }}</h4>
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

                        {{-- <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                                <div class="avatar-content">
                                    <i data-feather="git-commit" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto pipeline">
                                <h4 class="fw-bolder mb-0">{{ $pipeline }}</h4>
                                <p class="card-text font-small-3 mb-0">Pipeline</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-info me-2">
                                <div class="avatar-content">
                                    <i data-feather="clipboard" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto pengajuan">
                                <h4 class="fw-bolder mb-0">{{ $proposalP3k }} <span
                                        style="font-weight: normal; font-size:12px; vertical-align:middle;">Pengajuan</span>
                                </h4>
                                <h4 class="fw-bolder mb-0">{{ $approvedKabag }} <span
                                        style="font-weight: normal; font-size:12px; vertical-align:middle;">Disetujui</span>
                                </h4>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-danger me-2">
                                <div class="avatar-content">
                                    <i data-feather="x-circle" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto ditolak">
                                <h4 class="fw-bolder mb-0">{{ $ditolak }} <span
                                        style="font-weight: normal; font-size:12px; vertical-align:middle;">Ditolak</span>
                                </h4>
                                <h4 class="fw-bolder mb-0 batalAkad">{{ $batalAkad }} <span
                                        style="font-weight: normal; font-size:12px; vertical-align:middle;">Batal
                                        Akad</span></h4>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-warning me-2">
                                <div class="avatar-content">
                                    <i data-feather="alert-circle" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto review">
                                <h4 class="fw-bolder mb-0">{{ $review }}</h4>
                                <p class="card-text font-small-3 mb-0">Review</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-success me-2">
                                <div class="avatar-content">
                                    <i data-feather="check-circle" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto selesaiAkad">
                                <h4 class="fw-bolder mb-0">{{ $diterima }}</h4>
                                <p class="card-text font-small-3 mb-0">Selesai Akad</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="avatar bg-light-primary me-2">
                                <div class="avatar-content">
                                    <i data-feather="trending-up" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="my-auto disburse">
                                <h2 class="fw-bolder mb-0">Rp {{ number_format($jmlDisburse, 0, ',', '.') }}</h2>
                                <p class="card-text font-small-3 mb-0">Disburse</p>
                            </div>
                        </div> --}}


                        <!--/ Statistics Card -->
                    </div>

                    <div class="row match-height">

                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Total Proposal Per Bulan</h4>
                                </div>
                                <div class="card-body">
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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Total Disburse Per Bulan</h4>
                                </div>
                                <div class="card-body">
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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Dinas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-4">
                                        <select id="dinasFilter" class="form-select" onchange="filterData()">
                                            <option value="top5" selected>Top 5</option>
                                            <option value="top10">Top 10</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>

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
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Unit Kerja</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-4">
                                        <select id="unitKerjaFilter" class="form-select" onchange="filterData()">
                                            <option value="top5" selected>Top 5</option>
                                            <option value="top10">Top 10</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Placeholder for the chart -->
                                            <canvas id="chartUnitKerja" width="400" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Proposal by Batch Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <canvas id="chartProposalBatch" width="400" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Disburses by Batch Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <canvas id="chartDisburseBatch" width="400" height="200"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Total Disburse Per Bulan</h4>
                                </div>
                                <div class="card-body">
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
                        </div> --}}
                        {{-- <div class="col-xl-6 col-md-4 col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Disburse Per Bulan</h4>
                                </div>
                                <div class="card-body">
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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <!-- Charts Script -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();

            // Set the current year as the value of the select input for years
            var selectYearInput = document.getElementById('selectYear');
            if (selectYearInput) {
                selectYearInput.value = currentYear; // Set the default value to the current year
                selectYearInput.max = currentYear; // Optionally set the max attribute to the current year
            }

            // Trigger the data filtering once the page has loaded and the year has been set
            filterData();
        });

        document.addEventListener('DOMContentLoaded', function() {
            filterData(); // Initial data load
        });

        var chartProposal; // Global variable for the proposal chart
        var chartDisburse; // Global variable for the disburse chart
        var chartDinas; // Global variable for the dinas chart
        var chartUnitKerja; // Global variable for the unit kerja chart
        var chartProposalBatch; // Global variable for the proposal batch chart
        var chartDisburseBatch; // Global variable for the disburse batch chart

        function filterData() {
            var selectYearInput = document.getElementById('selectYear');
            var year = selectYearInput ? selectYearInput.value : new Date()
                .getFullYear(); // Get the selected year or default to current year

            var dinasFilter = document.getElementById('dinasFilter').value;
            var unitKerjaFilter = document.getElementById('unitKerjaFilter').value;

            $.ajax({
                url: '/dirbis/p3k/filter-by-year', // Endpoint that returns the data
                type: 'GET',
                data: {
                    tahun: year,
                    dinasFilter: dinasFilter,
                    unitKerjaFilter: unitKerjaFilter
                },
                success: function(response) {
                    // Destroy existing charts if they exist before creating new ones
                    if (chartProposal) {
                        chartProposal.destroy();
                    }
                    if (chartDisburse) {
                        chartDisburse.destroy();
                    }
                    if (chartProposalBatch) {
                        chartProposalBatch.destroy();
                    }
                    if (chartDisburseBatch) {
                        chartDisburseBatch.destroy();
                    }

                    console.log("Data received for charts:", response);
                    populateChart(response, 'chartProposal', 0); // Populate proposals chart
                    populateChart(response, 'chartDisburse', 1); // Populate disburse chart

                    // Populate batch charts
                    if (response.proposalsBatchData) {
                        populateBatchChart(response.proposalsBatchData, 'chartProposalBatch');
                    } else {
                        console.error("proposalsBatchData is undefined in the response.");
                    }

                    if (response.disburseBatchData) {
                        populateBatchChart(response.disburseBatchData, 'chartDisburseBatch');
                    } else {
                        console.error("disburseBatchData is undefined in the response.");
                    }

                    // Update the statistical data on the page
                    updateStatisticalData(response);

                    // Populate pie charts
                    if (chartDinas) {
                        chartDinas.destroy();
                    }
                    populatePieChart(response.pLabelDinas, response.pDataDinas, 'chartDinas');

                    if (chartUnitKerja) {
                        chartUnitKerja.destroy();
                    }
                    populatePieChart(response.pLabelUnitKerja, response.pDataUnitKerja, 'chartUnitKerja');
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });

            // Also load data for Dinas chart
            loadDinasData(year);

            // Also load data for Dinas chart
            loadUnitKerjaData(year);

            //Set year value
            var inputYearElement = document.getElementById("inputYear");
            if (inputYearElement) {
                inputYearElement.value = year;
            }
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
                    populatePieChart(response.pLabelDinas, response.pDataDinas, 'chartDinas');
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching Dinas data:", error);
                }
            });
        }

        function loadUnitKerjaData(year) {
            $.ajax({
                url: '/dirbis/p3k/filter-by-year', // Endpoint that returns the data
                type: 'GET',
                data: {
                    tahun: year
                },
                success: function(response) {
                    // Destroy existing Dinas chart if it exists
                    if (chartUnitKerja) {
                        chartUnitKerja.destroy();
                    }
                    // Populate pie chart
                    populatePieChart(response.pLabelUnitKerja, response.pDataUnitKerja, 'chartUnitKerja');
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching Unit Kerja data:", error);
                }
            });
        }

        function updateStatisticalData(data) {
            updateElementTextContent('.pengajuan', data.pengajuan);
            updateElementTextContent('.disetujui', data.approvedKabag);
            updateElementTextContent('.ditolak', data.ditolak);
            updateElementTextContent('.batalAkad', data.batalAkad);
            updateElementTextContent('.review', data.review);
            updateElementTextContent('.selesaiAkad', data.diterima);
            updateElementTextContent('.disburse', 'Rp ' + number_format(data.jml_disburse, 0, ',', '.'));
        }

        function updateElementTextContent(selector, text) {
            var element = document.querySelector(selector);
            if (element && element.childNodes.length > 0) {
                element.childNodes[0].textContent = text;
            } else {
                console.warn(`Element with selector "${selector}" not found or has no child nodes.`);
            }
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
                            'rgba(142, 26, 23, 0.7)',
                            'rgba(203, 38, 33, 0.7)',
                            'rgba(255, 203, 202, 0.7)',
                            'rgba(255, 151, 148, 0.7)',
                            'rgba(255, 82, 77, 0.7)',
                            'rgba(197, 38, 32, 0.7)'
                        ],
                        borderColor: [
                            'rgba(142, 26, 23, 1)',
                            'rgba(203, 38, 33, 1)',
                            'rgba(255, 203, 202, 1)',
                            'rgba(255, 151, 148, 1)',
                            'rgba(255, 82, 77, 1)',
                            'rgba(197, 38, 32, 1)'

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
                        datalabels: {
                            display: true,
                            color: 'white',
                            formatter: function(value, context) {
                                return value; // Show the raw data value
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });
            if (canvasId === 'chartDinas') {
                chartDinas = chart;
            } else if (canvasId === 'chartUnitKerja') {
                chartUnitKerja = chart;
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
                        legend: false,
                        datalabels: {
                            display: true,
                            anchor: 'end',
                            align: 'top',
                            clip: false,
                            formatter: function(value, context) {
                                if (value === 0) {
                                    return null; // Don't show the label if value is 0
                                }
                                if (value >= 1e9) {
                                    return (value / 1e9).toFixed(1) + 'M'; // Miliar
                                } else if (value >= 1e6) {
                                    return (value / 1e6).toFixed(0) + 'Jt'; // Juta
                                } else if (value >= 1e3) {
                                    return (value / 1e3).toFixed(1) + 'K'; // Ribu
                                }
                                return value; // Return the value if it's less than 1000
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin
            });

            if (canvasId === 'chartProposal') {
                chartProposal = chart;
            } else if (canvasId === 'chartDisburse') {
                chartDisburse = chart;
            }
        }

        // Assuming you have a function to populate batch charts
        function populateBatchChart(data, canvasId) {


            var ctx = document.getElementById(canvasId).getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: data.datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stacked: false // Ensure stacking is off
                        },
                        x: {
                            stacked: false // Ensure stacking is off
                        }
                    },
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        datalabels: {
                            display: true,
                            anchor: 'end',
                            align: 'top',
                            clip: false,
                            formatter: function(value, context) {
                                if (value === 0) {
                                    return null; // Don't show the label if value is 0
                                }
                                if (value >= 1e9) {
                                    return (value / 1e9).toFixed(1) + 'M'; // Billion
                                } else if (value >= 1e6) {
                                    return (value / 1e6).toFixed(0) + 'M'; // Million
                                } else if (value >= 1e3) {
                                    return (value / 1e3).toFixed(0) + 'K'; // Thousand
                                }
                                return value; // Return the value if it's less than 1000
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Register the plugin if needed
            });

            if (canvasId === 'chartProposalBatch') {
                chartProposalBatch = chart;
            } else if (canvasId === 'chartDisburseBatch') {
                chartDisburseBatch = chart;
            }
        }
    </script>




    <!-- End Charts Script -->
@endsection
