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
                                    <li class="breadcrumb-item"><a href="/analis/p3k">P3K</a>
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
                            <div class="card-datatable table-responsive pt-0">
                                <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Unit</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon
                                        </th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $proposal_p3k = $proposal->p3kPembiayaan;
                                            $history = $proposal; // Since it's already a P3kPembiayaanHistory record
                                        ?>

                                        <?php if(($history->status_id == 11 && $history->jabatan_id == 1) || ($history->status_id == 4 && $history->jabatan_id == 3)): ?>
                                            <tr>
                                                <td></td>
                                                <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                <td style="text-align: center">
                                                    <?php echo e(strtoupper(strftime('%d %B %Y', strtotime($proposal_p3k->tanggal_pengajuan)))); ?>

                                                </td>
                                                <td style="text-align: center"><?php echo e($proposal_p3k->nasabah->no_ktp); ?></td>
                                                <td style="text-align: center"><?php echo e($proposal_p3k->nasabah->nama_nasabah); ?>

                                                </td>
                                                <td style="text-align: center">
                                                    <?php echo e($proposal_p3k->nasabah->pekerjaan->nama_unit_kerja); ?></td>
                                                <td style="text-align: center">
                                                    Rp<?php echo e(number_format($proposal_p3k->nominal_pembiayaan, 0, ',', '.')); ?>

                                                </td>
                                                <td style="text-align: center"><?php echo e($proposal_p3k->tenor); ?> Bulan</td>
                                                <td>
                                                    <a href="/analis/p3k/komite/<?php echo e($proposal_p3k->id); ?>"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
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

<?php echo $__env->make('analis::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Analis/Resources/views/p3k/proposal/index.blade.php ENDPATH**/ ?>