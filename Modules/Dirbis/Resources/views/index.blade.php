@extends('dirbis::layouts.main')
@php
$proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
    ->where('user_id', Auth::user()->id)
    ->where('skpd_sektor_ekonomi_id', null)
    ->get()
    ->count();

$proposals = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
    ->where('status_id', 3)
    ->get();

$proposalskpd = 0;
foreach ($proposals as $proposal) {
    $proposal_skpd = Modules\Skpd\Entities\SkpdPembiayaan::select()
        ->where('id', $proposal->skpd_pembiayaan_id)
        ->get()
        ->first();
    $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
        ->where('skpd_pembiayaan_id', $proposal_skpd->id)
        ->orderby('created_at', 'desc')
        ->get()
        ->first();
    if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
        $proposalskpd++;
    }
}

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

$umkms = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
    ->where('status_id', 3)
    ->get();

$b = 0;
foreach ($umkms as $umkm) {
    $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
        ->where('id', $umkm->umkm_pembiayaan_id)
        ->get()
        ->first();

    $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
        ->where('umkm_pembiayaan_id', $proposal_umkm->id)
        ->orderby('created_at', 'desc')
        ->get()
        ->first();

    if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
        $b++;
    }
}

$pprs = Modules\Ppr\Entities\PprPembiayaanHistory::select()
    ->where('status_id', 3)
    ->get();

$proposalppr = 0;
foreach ($pprs as $ppr) {
    $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
        ->where('id', $ppr->form_ppr_pembiayaan_id)
        ->get()
        ->first();

    $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
        ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
        ->orderBy('created_at', 'desc')
        ->get()
        ->first();
    if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
        $proposalppr++;
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
                    <div class="row match-height">>
                        <!-- Statistics Card -->
                        <div class="col-xl-12 col-md-6 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik </h4>
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
                                                    <h4 class="fw-bolder mb-0">
                                                        {{ $b + $proposalskpd + $data + $proposalppr }}</h4>
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
                                                    <h4 class="fw-bolder mb-0">{{ $tolak }}</h4>
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

                    {{-- @php
                        $propPprs = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                            ->where('status_id', 5)
                            ->get();

                        $jmlProposalPpr = 0;
                        foreach ($propPprs as $propPpr) {
                            $prop_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                ->where('id', $propPpr->form_ppr_pembiayaan_id)
                                ->get()
                                ->first();
                            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                ->where('form_ppr_pembiayaan_id', $prop_ppr->id)
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->first();
                            if (($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 4 && $history->status_id == 4)) {
                                $jmlProposalPpr++;
                            }
                        }
                    @endphp --}}
                    <div class="row match-height">
                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5>Total Proposal Per Bulan</h5>
                                    <canvas id="chartProposal" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $disbursepasar = 0;
                        foreach ($cairpasars as $cairpasar) {
                            $tenor = $cairpasar->tenor;
                            $harga = $cairpasar->harga;
                            $rate = $cairpasar->rate;
                            $margin = ($rate * $tenor) / 100;

                            $harga1 = $harga * $margin;
                            $harga_jual = $harga1 + $harga;

                            $disbursepasar = $disbursepasar + $harga_jual;
                        }

                        $disburseumkm = 0;
                        foreach ($cairumkms as $cairumkm) {
                            $tenor = $cairumkm->tenor;
                            $harga = $cairumkm->nominal_pembiayaan;
                            $rate = $cairumkm->rate;
                            $margin = ($rate * $tenor) / 100;

                            $harga1 = $harga * $margin;
                            $harga_jual = $harga1 + $harga;

                            $disburseumkm = $disburseumkm + $harga_jual;
                        }

                        $disburseskpd = 0;
                        foreach ($cairskpds as $cairskpd) {
                            $tenor = $cairskpd->tenor;
                            $harga = $cairskpd->nominal_pembiayaan;
                            $rate = $cairskpd->rate;
                            $margin = ($rate * $tenor) / 100;

                            $harga1 = $harga * $margin;
                            $harga_jual = $harga1 + $harga;

                            $disburseskpd = $disburseskpd + $harga_jual;
                        }

                        $disburseppr = 0;
                        foreach ($cairpprs as $cairppr) {
                            $harga = $cairppr->form_permohonan_harga_jual;

                            $disburseppr = $disburseppr + $harga;
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
                                    <h2 class="fw-bolder">0</h2>
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
                                    <h2 class="fw-bolder">
                                        {{ number_format($disburseskpd + $disburseumkm + $disbursepasar + $disburseppr) }}
                                    </h2>
                                    <p class="card-text">Disburse</p>
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

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        var labelProposal = JSON.parse('{!! json_encode($bulans) !!}');
        var dataProposal = JSON.parse('{!! json_encode($jmlProposalPpr) !!}');

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
@endsection
