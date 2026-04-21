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
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/p3k">P3K</a></li>
                                    <li class="breadcrumb-item active">Proposal</li>
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
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="midCenter d-none d-md-table-cell" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Unit</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $nasabah = $proposal->nasabah;
                                            $pekerjaan = optional($nasabah)->pekerjaan;
                                            $tanggalPengajuan = $proposal->tanggal_pengajuan ?? $proposal->created_at;
                                        ?>

                                        <?php if(!$nasabah) continue; ?>

                                        <tr>
                                            <td class="midCenter"><?php echo e($loop->iteration); ?></td>
                                            <td class="midCenter d-none d-md-table-cell">
                                                <?php echo e($tanggalPengajuan ? \Carbon\Carbon::parse($tanggalPengajuan)->format('d-m-Y') : '-'); ?>

                                            </td>
                                            <td class="midCenter"><?php echo e($nasabah->no_ktp ?? '-'); ?></td>
                                            <td class="midCenter"><?php echo e($nasabah->nama_nasabah ?? '-'); ?></td>
                                            <td class="midCenter"><?php echo e($pekerjaan->nama_unit_kerja ?? '-'); ?></td>
                                            <td class="midCenter">Rp<?php echo e(number_format($proposal->nominal_pembiayaan ?? 0, 0, ',', '.')); ?></td>
                                            <td class="midCenter"><?php echo e($proposal->tenor ?? '-'); ?> Bulan</td>
                                            <td class="midCenter">
                                                <a href="/dirbis/p3k/proposal/<?php echo e($proposal->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dirbis::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Dirbis/Resources/views/p3k/proposal/index.blade.php ENDPATH**/ ?>