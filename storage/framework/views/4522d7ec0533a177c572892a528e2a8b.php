<?php $__env->startSection('content'); ?>
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
                                    <li class="breadcrumb-item"><a href="/kabag/skpd/proposal">SKPD</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/skpd/proposal">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Pengajuan
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
                                        <th style="text-align: center">Instansi</th>
                                        <th style="text-align: center">Golongan</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php $__empty_1 = true; $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php ($history = $histories[$proposal->id] ?? null); ?>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(optional($proposal->nasabah)->nama_nasabah); ?></td>
                                            <td>
                                                <?php echo e(optional($proposal->nasabah)->alamat); ?>

                                                <?php echo e(optional($proposal->nasabah)->rt ? ', ' . $proposal->nasabah->rt : ''); ?>

                                                <?php echo e(optional($proposal->nasabah)->rw ? ', ' . $proposal->nasabah->rw : ''); ?>

                                                <?php echo e(optional($proposal->nasabah)->desa_kelurahan ? ', ' . $proposal->nasabah->desa_kelurahan : ''); ?>

                                                <?php echo e(optional($proposal->nasabah)->kecamatan ? ', ' . $proposal->nasabah->kecamatan : ''); ?>

                                                <?php echo e(optional($proposal->nasabah)->kabkota ? ', ' . $proposal->nasabah->kabkota : ''); ?>

                                                <?php echo e(optional($proposal->nasabah)->provinsi ? ', ' . $proposal->nasabah->provinsi : ''); ?>

                                            </td>
                                            <td style="text-align: center"><?php echo e(optional($proposal->instansi)->nama_instansi); ?></td>
                                            <td style="text-align: center"><?php echo e(optional($proposal->golongan)->nama_golongan); ?></td>
                                            <td style="text-align: center">Rp. <?php echo e(number_format($proposal->nominal_pembiayaan)); ?></td>
                                            <td style="text-align: center">
                                                <a href="/kabag/skpd/proposal/<?php echo e($proposal->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data.</td>
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

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/skpd/proposal/index.blade.php ENDPATH**/ ?>