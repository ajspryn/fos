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
                            <h2 class="content-header-title mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper mt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/p3k">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item active">Proposal
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
                                <h5 class="card-title mb-0">Data Proposal</h5>
                                <form method="GET" action="/p3k/proposal" class="d-flex gap-1">
                                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari nama / NIK..." value="<?php echo e($search ?? ''); ?>" style="width:220px;">
                                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                    <?php if($search ?? null): ?><a href="/p3k/proposal" class="btn btn-outline-secondary btn-sm">Reset</a><?php endif; ?>
                                </form>
                            </div>
                            <div class="card-datatable table-responsive pt-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tanggal Pengajuan</th>
                                            <th style="text-align: center">NIK</th>
                                            <th style="text-align: center">Nama Nasabah</th>
                                            <th style="text-align: center">Alamat</th>
                                            <th style="text-align: center">Unit Kerja</th>
                                            <th style="text-align: center">Nominal Pembiayaan</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e(strftime('%d %B %Y', strtotime($proposal->tanggal_pengajuan))); ?></td>
                                            <td><?php echo e($proposal->nasabah->no_ktp); ?></td>
                                            <td><?php echo e($proposal->nasabah->nama_nasabah); ?></td>
                                            <td><?php echo e($proposal->nasabah->alamat); ?>, RT <?php echo e($proposal->nasabah->rt); ?>/ RW
                                                <?php echo e($proposal->nasabah->rw); ?>, <?php echo e($proposal->nasabah->desa_kelurahan); ?>,
                                                <?php echo e($proposal->nasabah->kecamatan); ?>, <?php echo e($proposal->nasabah->kabkota); ?>,
                                                <?php echo e($proposal->nasabah->provinsi); ?> <?php echo e($proposal->nasabah->kd_pos); ?></td>
                                            <td style="text-align: center">
                                                <?php echo e($proposal->nasabah->pekerjaan->nama_unit_kerja); ?></td>
                                            <td style="text-align: center">Rp
                                                <?php echo e(number_format($proposal->nominal_pembiayaan, 0, ',', '.')); ?></td>
                                            <td style="text-align: center">
                                                <a href="/p3k/proposal/<?php echo e($proposal->id); ?>"
                                                    class="btn btn-outline-info round">Lengkapi</a>
                                            </td>
                                        </tr>
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
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('p3k::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/P3k/Resources/views/proposal/index.blade.php ENDPATH**/ ?>