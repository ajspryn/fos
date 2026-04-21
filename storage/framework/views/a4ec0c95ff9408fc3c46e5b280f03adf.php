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
                                    <li class="breadcrumb-item"><a href="/kabag/ppr/komite">PPR</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/ppr/komite">Komite</a>
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
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="d-none d-md-table-cell midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jenis Nasabah</th>
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
                                        <?php ($history = $histories[$proposal->id] ?? null); ?>

                                        <tr>
                                            <td></td>
                                            <td class="midCenter"><?php echo e($loop->iteration); ?></td>
                                            <td class="midCenter"><?php echo e(optional($proposal->created_at)->format('d-m-Y')); ?></td>
                                            <td class="midCenter"><?php echo e($proposal->jenis_nasabah); ?></td>
                                            <td class="midCenter"><?php echo e(optional($proposal->pemohon)->form_pribadi_pemohon_no_ktp); ?></td>
                                            <td class="midCenter"><?php echo e(optional($proposal->pemohon)->form_pribadi_pemohon_nama_lengkap); ?></td>
                                            <td class="midCenter">Rp. <?php echo e(number_format($proposal->form_permohonan_nilai_ppr_dimohon)); ?></td>
                                            <td class="midCenter">
                                                <?php echo e($proposal->form_permohonan_jangka_waktu_ppr); ?> Tahun
                                                <br />
                                                (<?php echo e($proposal->form_permohonan_jml_bulan); ?> Bulan)
                                            </td>
                                            <td class="midCenter">
                                                <?php ($statusId = optional(optional($history)->statushistory)->id); ?>
                                                <?php if($statusId === 5): ?>
                                                    <span class="badge rounded-pill badge-light-success">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?> <?php echo e(optional($history->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php elseif($statusId === 9): ?>
                                                    <span class="badge rounded-pill badge-light-success">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?>

                                                    </span>
                                                <?php elseif($statusId === 4): ?>
                                                    <span class="badge rounded-pill badge-light-info">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?> <?php echo e(optional($history->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php elseif($statusId === 10): ?>
                                                    <span class="badge rounded-pill badge-light-danger">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?>

                                                    </span>
                                                <?php elseif($history): ?>
                                                    <span class="badge rounded-pill badge-light-warning">
                                                        <?php echo e(optional($history->statushistory)->keterangan); ?> <?php echo e(optional($history->jabatan)->keterangan); ?>

                                                    </span>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td class="midCenter"><?php echo e(optional($proposal->user)->name); ?></td>
                                            <td style="text-align: center">
                                                <a href="/kabag/ppr/komite/<?php echo e($proposal->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data.</td>
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

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/ppr/komite/index.blade.php ENDPATH**/ ?>