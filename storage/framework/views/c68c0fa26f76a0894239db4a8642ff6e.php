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
                            <h2 class="content-header-title mb-0">Data Proses Komite</h2>
                            <div class="breadcrumb-wrapper mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Data Proses Komite</h5>
                                <form method="GET" action="/p3k/komite" class="d-flex gap-1">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama / NIK..." value="<?php echo e($search ?? ''); ?>" style="width:220px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                    <?php if($search ?? null): ?><a href="/p3k/komite" class="btn btn-outline-secondary btn-sm">Reset</a><?php endif; ?>
                                </form>
                            </div>
                            <div class="card-datatable table-responsive pt-0">
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">NIK</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Bon Murabahah</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $history = $histories[$proposal->id] ?? null;
                                            $bonMurabahahFile = $bonMurabahah[$proposal->id] ?? null;
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($proposal->nasabah->nama_nasabah); ?></td>
                                            <td><?php echo e($proposal->nasabah->no_ktp); ?></td>
                                            <td style="text-align: center">Rp<?php echo e(number_format($proposal->nominal_pembiayaan, 0, ',', '.')); ?></td>
                                            <td style="text-align: center" value="<?php echo e($history?->statushistory?->id ?? ''); ?>, <?php echo e($history?->jabatan?->jabatan_id ?? ''); ?>">
                                                <?php
                                                    $statusId = $history?->statusHistory?->id ?? '' ?? null;
                                                    switch ($statusId) {
                                                            case 5:
                                                            case 9:
                                                                $statusClass = 'bg-success';
                                                            break;
                                                            case 4:
                                                                $statusClass = 'bg-info';
                                                            break;
                                                            case 10:
                                                            case 6:
                                                                $statusClass = 'bg-danger';
                                                            break;
                                                            default:
                                                                $statusClass = 'bg-warning';
                                                    }
                                                ?>

                                                <?php if($statusId == 10): ?>
                                                    <a class="badge rounded-pill <?php echo e($statusClass); ?>" data-bs-toggle="modal" data-bs-target="#modalCatatanAkadBatal-<?php echo e($history->id); ?>">
                                                        <?php echo e($history?->statusHistory?->keterangan ?? ''); ?><?php if(!empty($history?->jabatan?->keterangan ?? '')): ?> <?php echo e($history?->jabatan?->keterangan ?? ''); ?><?php endif; ?>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill <?php echo e($statusClass); ?>">
                                                        <?php echo e($history?->statusHistory?->keterangan ?? ''); ?><?php if(!empty($history?->jabatan?->keterangan ?? '')): ?> <?php echo e($history?->jabatan?->keterangan ?? ''); ?><?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <?php if($bonMurabahahFile): ?>
                                                    <a class="badge rounded-pill bg-success" data-bs-toggle="modal" data-bs-target="#bonMurabahah-<?php echo e($history->id); ?>">Sudah Terlampir</a>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill bg-danger">Belum Terlampir</span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/p3k/komite/<?php echo e($proposal->id); ?>" class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forBon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $histForBon = $histories[$forBon->id] ?? null;
                                            $bon = $bonMurabahah[$forBon->id] ?? null;
                                        ?>
                                        
                                        <?php if($bon && $histForBon): ?>
                                            <div class="modal fade" id="bonMurabahah-<?php echo e($histForBon->id); ?>" tabindex="-1"
                                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-transparent">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                                            <h1 class="text-center mb-1" id="addNewCardTitle">
                                                                Bon Murabahah
                                                            </h1>
                                                            <div class="card-body">
                                                                <p class="text-center">Diupload pada tanggal
                                                                    <?php echo e(date_format($bon->created_at, 'd F Y')); ?>

                                                                </p>
                                                                <img src="<?php echo e(asset('storage/' . $bon->foto)); ?>"
                                                                    class="d-block w-100" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forCatatanModal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $historyCatatan = $histories[$forCatatanModal->id] ?? null;
                                        ?>
                                        <!-- Modal Catatan Akad Batal -->
                                        <?php if($historyCatatan): ?>
                                            <div class="modal fade" id="modalCatatanAkadBatal-<?php echo e($historyCatatan->id); ?>"
                                                tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-transparent">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                                            <h5 class="text-center">Catatan</h5>
                                                            <br />
                                                            <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan"><?php echo e($historyCatatan->catatan); ?></textarea>
                                                            <br />
                                                            <div class="row">
                                                                <div class="col-md-6" style="width:150px; margin:0 auto;">
                                                                    <button type="button" class="btn btn-primary w-100"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <!-- /Modal Catatan Akad Batal -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                    </table>
                                </div>
                                <div class="px-2 pb-2">
                                    <?php echo e($proposals->links()); ?>

                                </div>
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

<?php echo $__env->make('p3k::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/P3k/Resources/views/komite/index.blade.php ENDPATH**/ ?>