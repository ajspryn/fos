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
                                    <li class="breadcrumb-item"><a href="/kabag">P3K</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/kabag/p3k/nasabah">Data Nasabah</a>
                                    </li>
                                    <li class="breadcrumb-item active">Detail Data Nasabah
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Card -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar-section">
                        <div class="d-flex align-items-center flex-column">
                            <img class="img-fluid rounded mb-75" src="<?php echo e(asset('storage/' . optional($fotoKtp)->foto)); ?>"
                                height="300" width="300" alt="avatar img" />
                            <div class="user-info text-center">
                                <h4><?php echo e($nasabah->nama_nasabah); ?></h4>
                                <span class="badge bg-light-secondary"><?php echo e($nasabah->no_ktp); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around my-2 pt-75">
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="phone" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0"><?php echo e($nasabah->no_hp); ?></h5>
                                <small>No. Handphone</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="home" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0"><?php echo e($nasabah->alamat); ?>, Rt
                                    <?php echo e($nasabah->rt); ?>/<?php echo e($nasabah->rw); ?></h4>
                                    <small><?php echo e($nasabah->desa_kelurahan); ?> ,
                                        <?php echo e($nasabah->kecamatan); ?></small>
                            </div>
                        </div>
                        <div class="d-flex align-items-start me-2">
                            <span class="badge bg-light-primary p-75 rounded">
                                <i data-feather="briefcase" class="font-medium-2"></i>
                            </span>
                            <div class="ms-75">
                                <h5 class="mb-0">
                                    <?php echo e(optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->nama_unit_kerja); ?></h5>
                                <small> <?php echo e(optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->jabatan); ?></small>
                            </div>
                        </div>
                    </div>
                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                    <div class="info-container">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="badge bg-light-primary">Data Diri</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Tempat, Tanggal Lahir :</span>
                                        <span> <?php echo e($nasabah->tempat_lahir); ?>,
                                            <?php echo e(strftime('%d %B %Y', strtotime($nasabah->tgl_lahir))); ?></span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25">Status Pernikahan :</span>
                                        <?php echo e($nasabah->status_pernikahan); ?></span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="badge bg-light-primary">Data Pekerjaan</h5>
                                <ul class="list-unstyled">

                                    <li class="mb-75">
                                        <span class="fw-bolder me-25"> Nama Unit Kerja : </span>
                                        <span> <?php echo e(optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->nama_unit_kerja); ?></span>
                                    </li>
                                    <li class="mb-75">
                                        <span class="fw-bolder me-25"> Jabatan : </span>
                                        <span> <?php echo e(optional(optional(optional($pembiayaan)->nasabah)->pekerjaan)->jabatan); ?></span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /User Card -->
        <!-- Plan Card -->
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <h5 class="badge bg-light-primary">History Pembiayaan Nasabah</h5>
                    <div class="d-flex justify-content-center">
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center; width: 5%;" class="py-1">No.</th>
                                <th style="text-align: center" class="py-1">Tanggal Pembiayaan</th>
                                <th style="text-align: center" class="py-1">
                                    Plafond
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Tenor
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Margin
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Angsuran
                                </th>
                                <th style="text-align: center" class="py-1">
                                    Detail
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="text-align: center">
                                        <?php echo e($loop->iteration); ?></td>
                                    <td style="text-align: center">
                                        <?php echo e(strftime('%d %B %Y', strtotime($data->tanggal_pengajuan))); ?> </td>
                                    <td style="text-align: center">Rp
                                        <?php echo e(number_format($data->nominal_pembiayaan, 0, ',', '.')); ?>

                                    </td>
                                    <td style="text-align: center"><?php echo e($data->tenor); ?> Bulan
                                    </td>
                                    <td style="text-align: center">
                                        <?php echo e(number_format($data->rate, 2, ',', '.')); ?> %
                                    </td>
                                    <td style="text-align: center">Rp <?php echo e(number_format($angsuran, 0, ',', '.')); ?>

                                    </td>
                                    <td style="text-align: center">
                                        <a href="/p3k/komite/<?php echo e($data->id); ?>"
                                            class="btn btn-outline-info round">Detail</a>
                                    </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--/ User Sidebar -->

    <!-- User Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('kabag::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/p3k/nasabah/lihat.blade.php ENDPATH**/ ?>