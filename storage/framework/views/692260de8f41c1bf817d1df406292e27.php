<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row"></div>
            <div class="content-body">
                <section id="dashboard-ecommerce">

                    
                    <div class="row mb-2">
                        <div class="col-xl-4 col-md-6 col-12 mb-2 mb-md-0">
                            <div class="card h-100 mb-0">
                                <?php if($cair < $targetNominal): ?>
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
                                                <?php echo e(number_format($cair, 0, ',', '.')); ?>

                                                <small class="text-body fw-normal font-small-3"> / <?php echo e(number_format($targetNominal, 0, ',', '.')); ?></small>
                                            </h5>
                                        </div>
                                        <?php ($pct = min(round($cair / max($targetNominal, 1) * 100), 100)); ?>
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
                                                <?php echo e(number_format($cair, 0, ',', '.')); ?>

                                                <small class="text-body fw-normal font-small-3"> / <?php echo e(number_format($targetNominal, 0, ',', '.')); ?></small>
                                            </h5>
                                        </div>
                                        <img src="<?php echo e(asset('app-assets/images/illustration/badge.svg')); ?>"
                                            class="congratulation-medal" alt="Medal Pic" />
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-xl-8 col-md-6 col-12">
                            <div class="card h-100 mb-0">
                                <div class="card-header">
                                    <h4 class="card-title">Disburse Bulan Ini</h4>
                                </div>
                                <div class="card-body d-flex align-items-center">
                                    <div class="w-100">
                                        <?php ($pct = min(round($cair / max($targetNominal, 1) * 100), 100)); ?>
                                        <div class="d-flex justify-content-between mb-25">
                                            <span class="fw-bold">Rp <?php echo e(number_format($cair, 0, ',', '.')); ?></span>
                                            <span class="text-muted">Target: Rp <?php echo e(number_format($targetNominal, 0, ',', '.')); ?></span>
                                        </div>
                                        <div class="progress mb-25" style="height:10px;">
                                            <div class="progress-bar <?php echo e($pct >= 100 ? 'bg-success' : 'bg-primary'); ?>" role="progressbar" style="width:<?php echo e($pct); ?>%"></div>
                                        </div>
                                        <small class="text-muted"><?php echo e($pct); ?>% dari target bulan ini</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row g-3">
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($pipeline); ?></h2>
                                    <p class="card-text mb-0">Pipeline</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="file-text" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($proposal); ?></h2>
                                    <p class="card-text mb-0">Pengajuan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="edit" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($review); ?></h2>
                                    <p class="card-text mb-0">Revisi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="x-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($ditolak); ?></h2>
                                    <p class="card-text mb-0">Ditolak</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($selesaiAkad); ?></h2>
                                    <p class="card-text mb-0">Selesai Akad</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-6">
                            <div class="card text-center mb-0">
                                <div class="card-body">
                                    <div class="avatar bg-light-secondary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="slash" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="fw-bolder"><?php echo e($batalAkad); ?></h2>
                                    <p class="card-text mb-0">Batal Akad</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('p3k::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/P3k/Resources/views/index.blade.php ENDPATH**/ ?>