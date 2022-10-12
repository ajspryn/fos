@extends('ppr::layouts.main')
@php

$proposal = Modules\Form\Entities\FormPprPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->where(function ($query) {
        $query
            ->whereNull('dilengkapi_ao')
            ->orWhereNull('form_cl')
            ->orWhereNull('form_score');
    })
    ->get()
    ->count();

$ditolak = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('user_id', Auth::user()->id)
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

$diterima = Modules\Akad\Entities\Pembiayaan::select()
    ->where('ao_id', Auth::user()->id)
    ->where('status', 'Selesai Akad')
    ->get()
    ->count();
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
                        <!-- Medal Card -->
                        @php
                            $targetNominal = 1500000000;
                            
                            $cair = 0;
                            foreach ($targets as $target) {
                                $hargaJual = $target->form_permohonan_nilai_ppr_dimohon;
                            
                                $cair = $cair + $hargaJual;
                            }
                            
                            $pprs = Modules\Form\Entities\FormPprPembiayaan::select()
                                ->where('user_id', auth::user()->id)
                                ->get();
                            
                            $pipeline = 0;
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
                                if ($history->status_id != 5 || $history->jabatan_id != 4) {
                                    if ($history->status_id != 9) {
                                        $pipeline++;
                                    }
                                }
                            }
                        @endphp
                        <div class="col-xl-4 col-md-6 col-12">
                            <div class="card card-congratulation-medal">
                                @if ($cair < $targetNominal)
                                    <div class="card-body -ml-6 rounded bg-danger">
                                        <h5 style="color: white">{{ Auth::user()->name }}</h5>
                                        <p class="card-text font-small-3" style="color: white">Kamu Belum Mencapai Target!
                                        </p>
                                        <h3 class="mb-75 mt-2 pt-50">
                                            <a href="#"></a>
                                        </h3>
                                        <div class="col-xl-12 col-md-6 col-12">
                                            <div class="card-body -ml-6 rounded bg-white">
                                                <span class="fw-bolder">Disburse VS Target </span>
                                                <span class="fw-bolder"><br />{{ number_format($cair) }} VS
                                                    {{ number_format($targetNominal) }}</span>
                                            </div>
                                        </div>
                                        <iframe
                                            src="https://github.com/anars/blank-audio/blob/master/250-milliseconds-of-silence.mp3"
                                            allow="autoplay" id="audio" style="display: none"></iframe>
                                        <audio id="player" autoplay>
                                            <source src="https://github.com/devyFatmawati/audio/blob/main/info.mp3?raw=true"
                                                type="audio/mp3">
                                        </audio>
                                    </div>
                                @else
                                    <div class="card-body">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <p class="card-text font-small-3">Selamat, Kamu Sudah Mencapai Target!</p>
                                        <h3 class="mb-75 mt-2 pt-50">
                                            <a href="#"></a>
                                        </h3>
                                        <div class="col-xl-12 col-md-6 col-12">
                                            <div class="card-body -ml-6 rounded bg-success">
                                                <span class="fw-bolder" style="color: white"> Disburse VS Target </span>
                                                <span class="fw-bolder" style="color: white"> <br>{{ number_format($cair) }}
                                                    VS {{ number_format($targetNominal) }}
                                                </span>
                                            </div>
                                        </div>
                                        <img src="../../../app-assets/images/illustration/badge.svg"
                                            class="congratulation-medal" alt="Medal Pic" />
                                    </div>
                                @endif
                            </div>


                        </div>
                        <!--/ Medal Card -->
                        <!-- Statistics Card -->
                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Proposal Anda</h4>
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
                    <div class="row match-height">
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
            </div>
        </div>
    </div>
    <!-- END: Content-->

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
