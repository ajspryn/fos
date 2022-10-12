@extends('kabag::layouts.main')

@section('content')
    @php
        $diterima = Modules\Akad\Entities\Pembiayaan::select()
            ->where('segmen', 'PPR')
            ->where('status', 'Selesai Akad')
            ->get()
            ->count();

        $pprs = Modules\Form\Entities\FormPprPembiayaan::select()->get();
        $proposalppr = 0;
        foreach ($pprs as $ppr) {
            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                ->where('form_ppr_pembiayaan_id', $ppr->id)
                ->latest()
                ->get()
                ->first();

            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                ->where('id', $history->form_ppr_pembiayaan_id)
                ->get()
                ->first();

            if ($history->status_id == 3 && $history->jabatan_id == 1) {
                $proposalppr++;
            }
        }

        $ditolak = Modules\Ppr\Entities\PprPembiayaanHistory::select()
            ->where('status_id', 6)
            ->get()
            ->count();

        $komites = Modules\Form\Entities\FormPprPembiayaan::select()
            ->where('user_id', Auth::user()->id)
            ->whereNotNull('dilengkapi_ao')
            ->latest()
            ->get();

        $review = 0;
        foreach ($komites as $komite) {
            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                ->where('form_ppr_pembiayaan_id', $komite->id)
                ->latest()
                ->get()
                ->first();

            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                ->where('id', $history->form_ppr_pembiayaan_id)
                ->get()
                ->first();

            if ($history->status_id == 7) {
                $review++;
            }
        }

        $pprPipelines = Modules\Form\Entities\FormPprPembiayaan::select()->get();

        $pipeline = 0;
        foreach ($pprPipelines as $pprPipeline) {
            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                ->where('form_ppr_pembiayaan_id', $pprPipeline->id)
                ->latest()
                ->get()
                ->first();

            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                ->where('id', $history->form_ppr_pembiayaan_id)
                ->get()
                ->first();
            if ($history->status_id != 5 || $history->jabatan_id != 4) {
                if ($history->status_id != 9) {
                    $pipeline++;
                }
            }
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
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik PPR</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $proposalppr }}</h4>
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
                                    <h5>Total Proposal Per Bulan</h5>
                                    <canvas id="chartProposal" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5>Plafond Per Bulan</h5>
                                    <canvas id="chartPlafond" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5>Jenis Nasabah</h5>
                                    <canvas id="chartJenisNasabah" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5>NOA Proyek Perumahan</h5>
                                    <canvas id="chartNoaProyekPerumahan" width="100" height="100"
                                        style="margin-top:20px;"></canvas>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    <!-- Charts Script -->
    <!-- Chart Proposal -->
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
    <!-- End Chart Proposal -->

    <!-- Chart Plafond -->
    <script>
        var labelPlafond = JSON.parse('{!! json_encode($labelPlafond) !!}');
        var dataPlafond = JSON.parse('{!! json_encode($dataPlafond) !!}');

        var ctx = document.getElementById('chartPlafond');
        var chartPlafond = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelPlafond,
                datasets: [{
                    label: "Plafond Per Bulan",
                    data: dataPlafond,
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
    <!-- End Chart Plafond -->

    <!-- Chart Jenis Nasabah -->
    <script>
        var labelJenisNasabah = JSON.parse('{!! json_encode($labelJenisNasabah) !!}');
        var dataJenisNasabah = JSON.parse('{!! json_encode($dataJenisNasabah) !!}');

        var ctx = document.getElementById('chartJenisNasabah');
        var chartJenisNasabah = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labelJenisNasabah,
                datasets: [{
                    label: "Jenis Nasabah",
                    data: dataJenisNasabah,
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
    <!-- End Chart Jenis Nasabah -->

    <!-- Chart NOA Proyek Perumahan -->
    <script>
        var dataNoaProyekPerumahan = JSON.parse('{!! json_encode($dataNoaProyekPerumahan) !!}');
        var labelNoaProyekPerumahan = JSON.parse('{!! json_encode($labelNoaProyekPerumahan) !!}');

        var ctx = document.getElementById('chartNoaProyekPerumahan');
        var chartNoaProyekPerumahan = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labelNoaProyekPerumahan,
                datasets: [{
                    label: "NOA Proyek Perumahan",
                    data: dataNoaProyekPerumahan,
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
                        display: false,
                        position: 'right',
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
    <!-- End Chart NOA Proyek Perumahan -->
    <!-- End Charts Script -->
@endsection
