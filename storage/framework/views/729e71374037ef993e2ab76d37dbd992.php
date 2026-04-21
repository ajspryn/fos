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
                            <h2 class="content-header-title float-start mb-0">Data Proses Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/umkm">UMKM</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Komite</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Diproses Komite
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
                                        <th style="text-align: center">Nama nasabahh</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $komites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
                                                ->where('umkm_pembiayaan_id', $komite->id)
                                                ->orderby('created_at', 'desc')
                                                ->first();
                                        ?>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($komite->nasabahh->nama_nasabah); ?></td>
                                            <td><?php echo e($komite->nasabahh->alamat); ?></td>
                                            <td style="text-align: center"><?php echo e($komite->keteranganusaha->nama_usaha); ?></td>
                                            <td style="text-align: center"><?php echo e(number_format($komite->nominal_pembiayaan, 0, ',', '.')); ?></td>
                                            <td style="text-align: center"><?php echo e($komite->tgl_pembiayaan); ?></td>
                                            <td style="text-align: center">
                                                <?php if($history && $history?->statushistory?->id ?? '' == 5): ?>
                                                    <span class="badge rounded-pill badge-light-success"><?php echo e($history?->statushistory?->keterangan ?? ''); ?> <?php echo e($history?->jabatan?->keterangan ?? ''); ?></span>
                                                <?php elseif($history && ($history?->statushistory?->id ?? '' == 3 || $history?->statushistory?->id ?? '' == 4)): ?>
                                                    <span class="badge rounded-pill badge-light-info"><?php echo e($history?->statushistory?->keterangan ?? ''); ?> <?php echo e($history?->jabatan?->keterangan ?? ''); ?></span>
                                                <?php elseif($history && $history?->statushistory?->id ?? '' == 6): ?>
                                                    <span class="badge rounded-pill badge-light-danger"><?php echo e($history?->statushistory?->keterangan ?? ''); ?> <?php echo e($history?->jabatan?->keterangan ?? ''); ?></span>
                                                <?php else: ?>
                                                    <span class="badge rounded-pill badge-light-warning"><?php echo e($history?->statushistory?->keterangan); ?> <?php echo e($history?->jabatan?->keterangan); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/umkm/komite/<?php echo e($komite->id); ?>" class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('umkm::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Umkm/Resources/views/komite/index.blade.php ENDPATH**/ ?>