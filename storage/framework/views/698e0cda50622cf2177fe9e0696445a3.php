<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/umkm/proposal">UMKM</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/umkm/proposal">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Proposal
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
                                        <th style="text-align: center">No</th>
                                        <th class="d-none d-md-table-cell" style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>                                        
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $__empty_1 = true; $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php ($history = $histories[$proposal->id] ?? null); ?>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(optional($proposal->nasabahh)->nama_nasabah); ?></td>
                                            <td><?php echo e(optional($proposal->nasabahh)->alamat); ?></td>
                                            <td style="text-align: center"><?php echo e(optional($proposal->keteranganusaha)->nama_usaha); ?></td>
                                            <td style="text-align: center"><?php echo e(number_format($proposal->nominal_pembiayaan)); ?></td>
                                            <td style="text-align: center"><?php echo e($proposal->tgl_pembiayaan); ?></td>
                                            <td style="text-align: center">
                                                <?php ($statusId = optional(optional($history)->statushistory)->id); ?>
                                                <?php if($statusId === 5): ?>
                                                    <span class="badge rounded-pill badge-light-success">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?> <?php echo e(optional($history->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php elseif($statusId === 4): ?>
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?> <?php echo e(optional($history->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php elseif($history): ?>
                                                    <span class="badge rounded-pill badge-light-info">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?> <?php echo e(optional($history->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center"><?php echo e(optional($proposal->user)->name); ?></td>
                                            <td style="text-align: center">
                                                <a href="/kabag/umkm/proposal/<?php echo e($proposal->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/umkm/proposal/index.blade.php ENDPATH**/ ?>