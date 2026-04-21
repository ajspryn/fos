<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="dashboard-ecommerce">

                    
                    <div class="row mb-2">
                        <div class="col-xl-4 col-md-6 col-12 mb-2 mb-md-0">
                            <div class="card h-100 mb-0">
                                <?php if($cair < 50000000): ?>
                                    <div class="card-body" style="background:linear-gradient(118deg,#ea5455,rgba(234,84,85,.7));border-radius:inherit;">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <div>
                                                <h5 class="text-white mb-25"><?php echo e(Auth::user()->name); ?></h5>
                                                <p class="text-white font-small-3 mb-0">Kamu Belum Mencapai Target</p>
                                            </div>
                                            <div class="avatar bg-white p-50">
                                                <div class="avatar-content">
                                                    <i data-feather="target" class="text-danger font-medium-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-white rounded p-1 mb-1">
                                            <p class="mb-25 text-body font-small-3 fw-bold">Disburse VS Target</p>
                                            <h5 class="mb-0 text-danger fw-bolder">
                                                <?php echo e(number_format($cair)); ?>

                                                <small class="text-body fw-normal font-small-3"> / 50.000.000</small>
                                            </h5>
                                        </div>
                                        <?php ($pct = min(round($cair / 50000000 * 100), 100)); ?>
                                        <div class="progress mb-25" style="height:6px;background:rgba(255,255,255,0.3);">
                                            <div class="progress-bar bg-white" role="progressbar" style="width:<?php echo e($pct); ?>%"></div>
                                        </div>
                                        <small class="text-white"><?php echo e($pct); ?>% dari target</small>
                                    </div>
                                <?php else: ?>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-1">
                                            <div>
                                                <h5 class="mb-25"><?php echo e(Auth::user()->name); ?></h5>
                                                <p class="card-text font-small-3 text-success">Target Tercapai! 🎉</p>
                                            </div>
                                            <div class="avatar bg-light-success p-50">
                                                <div class="avatar-content">
                                                    <i data-feather="award" class="text-success font-medium-3"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-light-success rounded p-1 mb-1">
                                            <p class="mb-25 text-success font-small-3 fw-bold">Disburse VS Target</p>
                                            <h5 class="mb-0 text-success fw-bolder">
                                                <?php echo e(number_format($cair)); ?>

                                                <small class="text-body fw-normal font-small-3"> / 50.000.000</small>
                                            </h5>
                                        </div>
                                        <img src="<?php echo e(asset('app-assets/images/illustration/badge.svg')); ?>"
                                            class="congratulation-medal" alt="Medal Pic" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Proposal Anda</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-primary me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="clipboard" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?php echo e($proposal); ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Pengajuan</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-danger me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="x-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?php echo e($ditolak); ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Ditolak</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-warning me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="alert-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?php echo e($review); ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Review</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-success me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="check-circle" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?php echo e($diterima); ?></h4>
                                                    <p class="card-text font-small-3 mb-0">Disetujui</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row g-3 mb-2">
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($pipeline1); ?></h2>
                                    <p class="card-text mb-0">Pipeline</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="file-text" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text mb-0">Proposal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder">0</h2>
                                    <p class="card-text mb-0">Komite</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e(number_format($cair)); ?></h2>
                                    <p class="card-text mb-0">Disburse</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row g-3">
                        <div class="col-lg-4 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Proposal Perbulan</h4>
                                    <div class="header-right d-flex align-items-center">
                                        <i data-feather="calendar" class="me-1 font-small-4"></i>
                                        <input type="text"
                                            class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                            placeholder="DD-MM-YYYY" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Plafond Perbulan</h4>
                                    <div class="header-right d-flex align-items-center">
                                        <i data-feather="calendar" class="me-1 font-small-4"></i>
                                        <input type="text"
                                            class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                            placeholder="DD-MM-YYYY" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="mylineChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik Pasar</h4>
                                    <div class="header-right d-flex align-items-center">
                                        <i data-feather="calendar" class="me-1 font-small-4"></i>
                                        <input type="text"
                                            class="form-control flat-picker border-0 shadow-none bg-transparent pe-0"
                                            placeholder="DD-MM-YYYY" />
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myPiechart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    
    <script>
        (function () {
            var ctx = document.getElementById('myPiechart');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($plabels); ?>,
                    datasets: [{
                        data: <?php echo json_encode($pdatapasars); ?>,
                        backgroundColor: ['#7367f0', '#28c76f', '#00cfe8', '#ea5455', '#ff9f43'],
                        hoverBackgroundColor: ['#6254e8', '#24b263', '#00b8d4', '#e73d3e', '#ff8f20'],
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    plugins: { legend: { position: 'bottom', labels: { padding: 15, usePointStyle: true } } }
                }
            });
        })();
    </script>

    
    <script>
        (function () {
            var ctx = document.getElementById('mylineChart');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($labelplafonds); ?>,
                    datasets: [{
                        label: 'Plafond Per Bulan',
                        data: <?php echo json_encode($dataplafonds); ?>,
                        backgroundColor: 'rgba(115,103,240,0.1)',
                        borderColor: '#7367f0',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#7367f0',
                        pointRadius: 4
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        })();
    </script>

    
    <script>
        (function () {
            var ctx = document.getElementById('myChart');
            if (!ctx) return;
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($bulans); ?>,
                    datasets: [{
                        label: 'Proposal Per Bulan',
                        data: <?php echo json_encode($hitungBulan); ?>,
                        backgroundColor: 'rgba(115,103,240,0.8)',
                        borderRadius: 4,
                        borderSkipped: false
                    }]
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        })();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pasar::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Pasar/Resources/views/index.blade.php ENDPATH**/ ?>