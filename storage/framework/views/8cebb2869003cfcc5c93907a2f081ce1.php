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
                            <h2 class="content-header-title float-start mb-0">Data Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/kabag/ppr">PPR</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/ppr/nasabah">Nasabah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Nasabah
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
                                            <th></th>
                                            <th style="text-align: center">No</th>
                                            <th class="d-none d-md-table-cell">Nama Nasabah</th>
                                            <th style="text-align: center">NIK</th>
                                            <th>Alamat</th>
                                            <th style="text-align: center">No. Telepon/HP</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <?php $__empty_1 = true; $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo e($proposal->form_pribadi_pemohon_nama_lengkap ?? '-'); ?></td>
                                                <td style="text-align: center"><?php echo e($proposal->form_pribadi_pemohon_no_ktp ?? '-'); ?></td>
                                                <td>
                                                    <?php echo e($proposal->form_pribadi_pemohon_alamat_ktp ?? '-'); ?>

                                                    <?php if(!empty($proposal->form_pribadi_pemohon_alamat_ktp_rt) || !empty($proposal->form_pribadi_pemohon_alamat_ktp_rw)): ?>
                                                        RT <?php echo e($proposal->form_pribadi_pemohon_alamat_ktp_rt ?? '-'); ?>,
                                                        RW <?php echo e($proposal->form_pribadi_pemohon_alamat_ktp_rw ?? '-'); ?>

                                                    <?php endif; ?>
                                                    <?php if(!empty($proposal->form_pribadi_pemohon_alamat_ktp_kelurahan) || !empty($proposal->form_pribadi_pemohon_alamat_ktp_kecamatan)): ?>
                                                        , KEL. <?php echo e($proposal->form_pribadi_pemohon_alamat_ktp_kelurahan ?? '-'); ?>

                                                        , KEC. <?php echo e($proposal->form_pribadi_pemohon_alamat_ktp_kecamatan ?? '-'); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center"><?php echo e($proposal->form_pribadi_pemohon_no_handphone ?? '-'); ?></td>
                                                <td style="text-align: center">
                                                    <a href="/kabag/ppr/nasabah/<?php echo e($proposal->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="7" class="text-center">Belum ada data.</td>
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

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/ppr/nasabah/index.blade.php ENDPATH**/ ?>