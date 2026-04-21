<?php $__env->startSection('content'); ?>
    <style>
        .pCenter {
            text-align: center;
        }

        .midJustify {
            vertical-align: middle;
            text-align: justify;
        }

        .midCenter {
            vertical-align: middle;
            text-align: center;
        }
    </style>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/p3k/komite">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item active">Komite
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-datatable table-responsive pt-0">

                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="d-none d-md-table-cell midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $__empty_1 = true; $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php ($pembiayaan = $proposal->p3kPembiayaan); ?>
                                        <?php ($pembiayaanId = $proposal->p3k_pembiayaan_id); ?>

                                        <tr>
                                            <td></td>
                                            <td class="midCenter"><?php echo e($loop->iteration); ?></td>
                                            <td class="midCenter"><?php echo e($pembiayaan && $pembiayaan->tanggal_pengajuan ? \Carbon\Carbon::parse($pembiayaan->tanggal_pengajuan)->format('d-m-Y') : '-'); ?></td>
                                            <td class="midCenter"><?php echo e(optional(optional($pembiayaan)->nasabah)->no_ktp); ?></td>
                                            <td class="midCenter"><?php echo e(optional(optional($pembiayaan)->nasabah)->nama_nasabah); ?></td>
                                            <td class="midCenter">Rp. <?php echo e(number_format((int) (optional($pembiayaan)->nominal_pembiayaan ?? 0), 0, ',', '.')); ?></td>
                                            <td class="midCenter"><?php echo e(optional($pembiayaan)->tenor); ?></td>
                                            <td class="midCenter">
                                                <?php if($proposal->status_id == 5): ?>
                                                    <span class="badge rounded-pill badge-light-success">
                                                        <?php echo e(optional($proposal->statusHistory)->keterangan); ?> <?php echo e(optional($proposal->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php elseif($proposal->status_id == 9): ?>
                                                    <span class="badge rounded-pill badge-light-success"><?php echo e(optional($proposal->statusHistory)->keterangan); ?></span>
                                                <?php elseif($proposal->status_id == 4): ?>
                                                    <span class="badge rounded-pill badge-light-info">
                                                        <?php echo e(optional($proposal->statusHistory)->keterangan); ?> <?php echo e(optional($proposal->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php elseif($proposal->status_id == 10): ?>
                                                    <span class="badge rounded-pill badge-light-danger"><?php echo e(optional($proposal->statusHistory)->keterangan); ?></span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        <?php echo e(optional($proposal->statusHistory)->keterangan); ?> <?php echo e(optional($proposal->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="midCenter"><?php echo e(optional(optional($pembiayaan)->user)->name); ?></td>
                                            <td style="text-align: center">
                                                <a href="/kabag/p3k/komite/<?php echo e($pembiayaanId); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/p3k/komite/index.blade.php ENDPATH**/ ?>