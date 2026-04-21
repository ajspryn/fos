<?php $__env->startSection('content'); ?>
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

                    
                    <div class="row mb-2">
                        <div class="col-xl-4 col-md-6 col-12 mb-2 mb-md-0">
                            <div class="card h-100 mb-0">
                                <div class="card-body d-flex flex-column justify-content-center" style="background:linear-gradient(118deg,#ff9f43,rgba(255,159,67,.7));border-radius:inherit;">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <h5 class="text-white mb-25"><?php echo e(Auth::user()->name); ?></h5>
                                            <p class="text-white font-small-3 mb-0">Direktur Bisnis</p>
                                        </div>
                                        <div class="avatar bg-white p-50">
                                            <div class="avatar-content">
                                                <i data-feather="bar-chart-2" class="text-warning font-medium-3"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white rounded p-1">
                                        <p class="mb-25 text-body font-small-3 fw-bold">Total Pengajuan Masuk</p>
                                        <h2 class="mb-0 text-warning fw-bolder"><?php echo e($b + $proposalskpd + $data + $proposalppr); ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card card-statistics h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Statistik</h4>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-row">
                                                <div class="avatar bg-light-info me-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="clipboard" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="my-auto">
                                                    <h4 class="fw-bolder mb-0"><?php echo e($b + $proposalskpd + $data + $proposalppr); ?></h4>
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
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($pipelineumkm + $pipelineskpd + $pipelinepasar); ?></h2>
                                    <p class="card-text mb-0">Pipeline</p>
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
                                    <h2 class="fw-bolder"><?php echo e(number_format($disburseskpd + $disburseumkm + $disbursepasar + $disburseppr)); ?></h2>
                                    <p class="card-text mb-0">Disburse</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="x-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($ditolak + $batalAkad); ?></h2>
                                    <p class="card-text mb-0">Ditolak + Batal</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($diterima); ?></h2>
                                    <p class="card-text mb-0">Disetujui</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row g-3">
                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Total Proposal Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartProposal" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Per Segmen</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartSegmen" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Total Disburse Per Bulan</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartDisburse" width="100" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <!-- Charts Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    <!-- Chart Proposal Per Bulan -->
    <script>
        var labelProposal = JSON.parse('<?php echo json_encode($bulans); ?>');
        var dataProposal = JSON.parse('<?php echo json_encode($hitungPerBulan); ?>');

        var ctx = document.getElementById('chartProposal');
        var chartProposal = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelProposal,
                datasets: [{
                    label: "Total Proposal Per Bulan",
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
    <!-- /Chart Proposal Per Bulan -->

    <!-- Chart Proposal Per Segmen -->
    <script>
        var labelSegmen = JSON.parse('<?php echo json_encode($labelSegmen); ?>');
        var dataSegmen = JSON.parse('<?php echo json_encode($dataSegmen); ?>');

        var ctx = document.getElementById('chartSegmen');
        var chartSegmen = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labelSegmen,
                datasets: [{
                    label: "Proposal Per Segmen",
                    data: dataSegmen,
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
    <!-- /Chart Proposal Per Segmen -->

    <!-- Chart Disburse -->
    <script>
        var labelDisburse = JSON.parse('<?php echo json_encode($labelDisburse); ?>');
        var dataDisburse = JSON.parse('<?php echo json_encode($dataDisburse); ?>');

        var ctx = document.getElementById('chartDisburse');
        var chartDisburse = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelDisburse,
                datasets: [{
                    label: "Total Disburse Per Bulan",
                    data: dataDisburse,
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
                        },
                        tooltipTemplate: "<%= addCommas(value) %>"
                    }
                }
            }
        });

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
    <!-- /Chart Disburse -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dirut::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Dirut/Resources/views/index.blade.php ENDPATH**/ ?>