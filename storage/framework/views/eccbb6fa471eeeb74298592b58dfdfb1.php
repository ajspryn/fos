<?php $__env->startSection('content'); ?>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0"><?php echo e($segmentLabel ?? 'Proposal'); ?></h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e($indexUrl ?? '/kabag'); ?>"><?php echo e($segmentLabel ?? 'Proposal'); ?></a></li>
                                    <li class="breadcrumb-item active">Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section id="proposal-detail">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap align-items-center justify-content-between gap-1 mb-2">
                        <div>
                            <h4 class="mb-0"><?php echo e($title ?? 'Detail Proposal'); ?></h4>
                            <?php if(!empty($history)): ?>
                                <?php ($statusText = trim(collect([
                                    optional($history->statushistory)->keterangan,
                                    optional($history->jabatan)->keterangan,
                                ])->filter()->implode(' '))); ?>
                                <?php if($statusText): ?>
                                    <span class="badge rounded-pill badge-light-info"><?php echo e($statusText); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo e($indexUrl ?? '/kabag'); ?>" class="btn btn-outline-secondary">Kembali</a>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ringkasan Nasabah</h5>
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <?php $__currentLoopData = ($detailsNasabah ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <dt class="col-5 text-muted"><?php echo e($label); ?></dt>
                                        <dd class="col-7"><?php echo e($value ?? '-'); ?></dd>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ringkasan Pembiayaan</h5>
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <?php $__currentLoopData = ($detailsPembiayaan ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <dt class="col-5 text-muted"><?php echo e($label); ?></dt>
                                        <dd class="col-7"><?php echo e($value ?? '-'); ?></dd>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/proposal/show.blade.php ENDPATH**/ ?>