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
                            <h2 class="content-header-title float-start mb-0">Data Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/komite">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/pasar/komite">Komite</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Komite
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
                                            <th style="text-align: center">Nama Kios / Los</th>
                                            <th style="text-align: center">Alamat Pasar</th>
                                            <th style="text-align: center">Nominal Pembiayaan</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Bon Murabahah</th>
                                            <th style="text-align: center">AO Yang Menangani</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $__empty_1 = true; $__currentLoopData = $komites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php ($history = $histories[$komite->id] ?? null); ?>
                                            <?php ($bon = $bonmurabahah[$komite->id] ?? null); ?>
                                            <?php ($modalId = 'bon-' . $komite->id); ?>

                                            <tr>
                                                <td></td>
                                                <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e(optional($komite->nasabahh)->nama_nasabah); ?></td>
                                                <td><?php echo e(optional($komite->nasabahh)->alamat); ?></td>
                                                <td style="text-align: center"><?php echo e(optional($komite->keteranganusaha)->nama_usaha); ?></td>
                                                <td style="text-align: center"><?php echo e(optional(optional($komite->keteranganusaha)->jenispasar)->nama_pasar); ?></td>
                                                <td style="text-align: center"><?php echo e(number_format($komite->harga)); ?></td>
                                                <td style="text-align: center"><?php echo e($komite->tgl_pembiayaan); ?></td>
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
                                                <td style="text-align: center">
                                                    <?php if($bon): ?>
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#<?php echo e($modalId); ?>">
                                                            Telah Terlampir
                                                        </button>

                                                        <div class="modal fade" id="<?php echo e($modalId); ?>" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-transparent">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                        <h1 class="text-center mb-1" id="addNewCardTitle">Bon Murabahah</h1>
                                                                        <p class="text-center">Lampiran Foto Bon Murabahah</p>
                                                                        <div class="card-body">
                                                                            <img src="<?php echo e(asset('storage/' . $bon->foto)); ?>" class="d-block w-100" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        Belum Terlampir
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center"><?php echo e(optional($komite->user)->name); ?></td>
                                                <td style="text-align: center">
                                                    <a href="/kabag/pasar/komite/<?php echo e($komite->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="12" class="text-center">Tidak ada data.</td>
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
            <!--/ foto kk  -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/pasar/komite/index.blade.php ENDPATH**/ ?>