<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.vuexy.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php if($role->jabatan_id == 0): ?>
        <?php echo $__env->make('admin::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($role->jabatan_id == 1): ?>
        <?php if($role->divisi_id == 1): ?>
            <?php echo $__env->make('skpd::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif($role->divisi_id == 2): ?>
            <?php echo $__env->make('pasar::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif($role->divisi_id == 3): ?>
            <?php echo $__env->make('umkm::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif($role->divisi_id == 4): ?>
            <?php echo $__env->make('ppr::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif($role->divisi_id == 5): ?>
            <?php echo $__env->make('akad::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php elseif($role->divisi_id == 6): ?>
            <?php echo $__env->make('p3k::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
    <?php elseif($role->jabatan_id == 2): ?>
        <?php echo $__env->make('kabag::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($role->jabatan_id == 3): ?>
        <?php echo $__env->make('analis::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($role->jabatan_id == 4): ?>
        <?php echo $__env->make('dirbis::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php elseif($role->jabatan_id == 5): ?>
        <?php echo $__env->make('dirut::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <a href="javascript:;" data-bs-target="#editPhoto" data-bs-toggle="modal">
                                                <img class="img-fluid rounded mt-3 mb-2"
                                                    src="<?php echo e(Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('app-assets/images/avatars/1.png')); ?>" height="110"
                                                    width="110" alt="User avatar" />
                                            </a>
                                            <div class="user-info text-center">
                                                <h4><?php echo e($user->name); ?></h4>
                                                <?php if($role->jabatan_id == 0): ?>
                                                    <span class="badge bg-light-secondary">Admin</span>
                                                <?php elseif($role->jabatan_id == 1): ?>
                                                    <?php if($role->divisi_id == 5): ?>
                                                        <span class="badge bg-light-secondary">Staff Akad</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-light-secondary">AO</span>
                                                    <?php endif; ?>
                                                <?php elseif($role->jabatan_id == 2): ?>
                                                    <span class="badge bg-light-secondary">Kabag</span>
                                                <?php elseif($role->jabatan_id == 3): ?>
                                                    <span class="badge bg-light-secondary">Analis</span>
                                                <?php elseif($role->jabatan_id == 4): ?>
                                                    <span class="badge bg-light-secondary">Direktur Bisnis</span>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($role->jabatan_id == 1 && $role->divisi_id != 5): ?>
                                        <div class="d-flex justify-content-around my-2 pt-75">
                                            <?php
                                                $proposal_diajukan = 0;
                                                if ($role->divisi_id == 1) {
                                                    $proposal_diajukan = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 2) {
                                                    $proposal_diajukan = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                        ->where('AO_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 3) {
                                                    $proposal_diajukan = Modules\Umkm\Entities\UmkmPembiayaan::select()
                                                        ->where('AO_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 4) {
                                                    $proposal_diajukan = Modules\Form\Entities\FormPprPembiayaan::select()
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 6) {
                                                    $proposal_diajukan = Modules\P3k\Entities\P3kPembiayaan::select()
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                }
                                                
                                                if ($role->divisi_id == 1 && $role->jabatan_id == 1) {
                                                    $proposal_disetujuis = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                        ->where('status_id', 3)
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 2) {
                                                    $proposal_disetujuis = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                        ->where('status_id', 3)
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 3) {
                                                    $proposal_disetujuis = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
                                                        ->where('status_id', 3)
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 4) {
                                                    $proposal_disetujuis = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                        ->where('status_id', 3)
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                } elseif ($role->divisi_id == 6) {
                                                    $proposal_disetujuis = Modules\P3k\Entities\P3kPembiayaanHistory::select()
                                                        ->where('status_id', 3)
                                                        ->where('user_id', $user->id)
                                                        ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                        ->get();
                                                }
                                                
                                                $i = 0;
                                                if ($role->divisi_id == 1 && $role->jabatan_id != 1) {
                                                    //kondisi selain staff proposal
                                                    foreach ($proposal_disetujuis as $proposal_disetujui) {
                                                        if ($role->divisi_id == 1) {
                                                            $proposal_notif = Modules\Skpd\Entities\SkpdPembiayaan::select()
                                                                ->where('id', $proposal_disetujui->skpd_pembiayaan_id)
                                                                ->where('user_id', $user->id)
                                                                ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                                ->get()
                                                                ->first();
                                                            $history = Modules\Skpd\Entities\SkpdPembiayaanHistory::select()
                                                                ->where('skpd_pembiayaan_id', $proposal_notif->id)
                                                                ->orderby('created_at', 'desc')
                                                                ->get()
                                                                ->first();
                                                        } elseif ($role->divisi_id == 2) {
                                                            $proposal = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                                ->where('AO_id', $user->id)
                                                                ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                                ->get()
                                                                ->first();
                                                            $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                                ->where('pasar_pembiayaan_id', $proposal->id)
                                                                ->orderby('created_at', 'desc')
                                                                ->get()
                                                                ->first();
                                                        } elseif ($role->divisi_id == 3) {
                                                            $proposal = Modules\Umkm\Entities\UmkmPembiayaan::select()
                                                                ->where('AO_id', $user->id)
                                                                ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                                ->get()
                                                                ->first();
                                                            $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
                                                                ->where('umkm_pembiayaan_id', $proposal->id)
                                                                ->orderby('created_at', 'desc')
                                                                ->get()
                                                                ->first();
                                                        } elseif ($role->divisi_id == 4) {
                                                            $proposal = Modules\Form\Entities\FormPprPembiayaan::select()
                                                                ->where('user_id', $user->id)
                                                                ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                                ->get()
                                                                ->first();
                                                            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                                ->where('form_ppr_pembiayaan_id', $proposal->id)
                                                                ->orderby('created_at', 'desc')
                                                                ->get()
                                                                ->first();
                                                        } elseif ($role->divisi_id == 6) {
                                                            $proposal = Modules\P3k\Entities\P3kPembiayaan::select()
                                                                ->where('user_id', $user->id)
                                                                ->whereyear('created_at', Carbon\Carbon::now()->format('Y'))
                                                                ->get()
                                                                ->first();
                                                            $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
                                                                ->where('p3k_pembiayaan_id', $proposal->id)
                                                                ->orderby('created_at', 'desc')
                                                                ->get()
                                                                ->first();
                                                        }
                                                
                                                        if ($history->status_id == 5 || $history->jabatan_id == 4) {
                                                            $i++;
                                                        }
                                                    }
                                                } else {
                                                }
                                            ?>
                                            <div class="d-flex align-items-start me-2">
                                                <span class="badge bg-light-primary p-75 rounded">
                                                    <i data-feather="briefcase" class="font-medium-2"></i>
                                                </span>
                                                <div class="ms-75">
                                                    <h4 class="mb-0"><?php echo e($proposal_diajukan->count()); ?></h4>
                                                    <small>Proposal Diajukan</small>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start">
                                                <span class="badge bg-light-primary p-75 rounded">
                                                    <i data-feather="check" class="font-medium-2"></i>
                                                </span>
                                                <div class="ms-75">
                                                    <h4 class="mb-0"><?php echo e($i); ?></h4>
                                                    <small>Proposal Disetujui</small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Nama : </span>
                                                <span><?php echo e(Auth::user()->name); ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Email:</span>
                                                <span><?php echo e(Auth::user()->email); ?></span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Status:</span>
                                                <span class="badge bg-light-success">Active</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Role:</span>
                                                <?php if($role->role_id == 1): ?>
                                                    <span>Admin</span>
                                                <?php elseif($role->role_id == 2): ?>
                                                    <span>User</span>
                                                <?php endif; ?>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Divisi:</span>
                                                <?php if($role->divisi_id == 0): ?>
                                                    <span>Admin</span>
                                                <?php elseif($role->divisi_id == 1): ?>
                                                    <span>SKPD</span>
                                                <?php elseif($role->divisi_id == 2): ?>
                                                    <span>Pasar</span>
                                                <?php elseif($role->divisi_id == 3): ?>
                                                    <span>UMKM</span>
                                                <?php elseif($role->divisi_id == 4): ?>
                                                    <span>PPR</span>
                                                <?php elseif($role->divisi_id == 6): ?>
                                                    <span>P3K</span>
                                                <?php endif; ?>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">Jabatan:</span>
                                                <?php if($role->jabatan_id == 0): ?>
                                                    <span>Admin</span>
                                                <?php elseif($role->jabatan_id == 1): ?>
                                                    <?php if($role->divisi_id == 5): ?>
                                                        <span>Staff Akad</span>
                                                    <?php else: ?>
                                                        <span>AO</span>
                                                    <?php endif; ?>
                                                <?php elseif($role->jabatan_id == 2): ?>
                                                    <span>Kabag</span>
                                                <?php elseif($role->jabatan_id == 3): ?>
                                                    <span>Analis</span>
                                                <?php elseif($role->jabatan_id == 4): ?>
                                                    <span>Direktur Bisnis</span>
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="javascript:;" class="btn btn-primary me-1" data-bs-target="#editUser"
                                                data-bs-toggle="modal">
                                                Edit Profile
                                            </a>
                                            <a href="javascript:;" class="btn btn-outline-danger suspend-user"
                                                data-bs-target="#editPassword" data-bs-toggle="modal">Reset Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <?php if($role->jabatan_id == 1 && $role->divisi_id == 1): ?>
                                <!-- Project table -->
                                <div class="card">
                                    <h4 class="card-header">Data Nasabah</h4>
                                    <div class="table-responsive">
                                        <table class="table datatable-project">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">Peringkat</th>
                                                    <th style="text-align: center">Nama Dinas</th>
                                                    <th class="text-nowrap" style="text-align: center">NOA</th>
                                                    <th style="text-align: center">Plafond</th>
                                                    <th style="text-align: center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data_debiturs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_debitur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $instansi = Modules\Admin\Entities\SkpdInstansi::select()
                                                            ->where('id', $data_debitur->skpd_instansi_id)
                                                            ->get()
                                                            ->first();
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($instansi->nama_instansi); ?></td>
                                                        <td style="text-align: center"><?php echo e($data_debitur->noa); ?></td>
                                                        <td>Rp. <?php echo e(number_format($data_debitur->plafond)); ?></td>
                                                        <td style="text-align: center"></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Project table -->
                            <?php endif; ?>

                            <?php if($role->jabatan_id == 1 && $role->divisi_id == 2): ?>
                                <!-- Project table -->
                                <div class="card">
                                    <h4 class="card-header">Data Nasabah</h4>
                                    <div class="table-responsive">
                                        <table class="table datatable-project">
                                            <thead>

                                                <tr>
                                                    <th style="text-align: center">Peringkat</th>
                                                    <th style="text-align: center">Nama Pasar</th>
                                                    <th class="text-nowrap" style="text-align: center">NOA</th>
                                                    <th style="text-align: center">Plafond</th>
                                                    <th style="text-align: center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data_debitur_pasars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_debitur_pasar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $pasar = Modules\Admin\Entities\PasarJenisPasar::select()
                                                            ->where('id', $data_debitur_pasar->jenispasar_id)
                                                            ->get()
                                                            ->first();
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($pasar->nama_pasar); ?></td>
                                                        <td style="text-align: center"><?php echo e($data_debitur_pasar->noa); ?></td>
                                                        <td style="text-align: center">Rp.
                                                            <?php echo e(number_format($data_debitur_pasar->plafond)); ?></td>
                                                        <td style="text-align: center"></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Project table -->
                            <?php endif; ?>
                            <?php if($role->jabatan_id == 1 && $role->divisi_id == 3): ?>
                                <!-- Project table -->
                                <div class="card">
                                    <h4 class="card-header">Data Nasabah</h4>
                                    <div class="table-responsive">
                                        <table class="table datatable-project">
                                            <thead>

                                                <tr>
                                                    <th style="text-align: center">Peringkat</th>
                                                    <th style="text-align: center">Jenis Penggunaan</th>
                                                    <th class="text-nowrap" style="text-align: center">NOA</th>
                                                    <th style="text-align: center">Plafond</th>
                                                    <th style="text-align: center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data_debiturumkms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_debiturumkm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                        <td style="text-align: center">
                                                            <?php echo e($data_debiturumkm->penggunaan_id); ?></td>
                                                        <td style="text-align: center"><?php echo e($data_debiturumkm->noa); ?></td>
                                                        <td style="text-align: center">Rp.
                                                            <?php echo e(number_format($data_debiturumkm->plafond)); ?></td>
                                                        <td style="text-align: center"></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Project table -->
                            <?php endif; ?>

                            <?php if($role->jabatan_id == 1 && $role->divisi_id == 4): ?>
                                <!-- Project table -->
                                <div class="card">
                                    <h4 class="card-header">Data Nasabah PPR</h4>
                                    <div class="table-responsive">
                                        <table class="table datatable-project">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">Peringkat</th>
                                                    <th style="text-align: center">Nama Proyek Perumahan</th>
                                                    <th class="text-nowrap" style="text-align: center">NOA</th>
                                                    <th style="text-align: center">Plafond</th>
                                                    <th style="text-align: center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $dataNasabahPprs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataNasabahPpr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $proyekPerumahan = Modules\Form\Entities\FormPprPembiayaan::select()
                                                            ->where('id', $dataNasabahPpr->proyek_perumahan)
                                                            ->get()
                                                            ->first();
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($dataNasabahPpr->form_agunan_1_nama_proyek_perumahan); ?>

                                                        </td>
                                                        <td style="text-align: center"><?php echo e($dataNasabahPpr->noa); ?></td>
                                                        <td>Rp. <?php echo e(number_format($dataNasabahPpr->plafond)); ?></td>
                                                        <td style="text-align: center"></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Project table -->
                            <?php endif; ?>

                            <?php if($role->jabatan_id == 1 && $role->divisi_id == 6): ?>
                                <!-- Project table -->
                                <div class="card">
                                    <h4 class="card-header">Data Nasabah P3K</h4>
                                    <div class="table-responsive">
                                        <table class="table datatable-project">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">Peringkat</th>
                                                    <th style="text-align: center">Nama Unit Kerja</th>
                                                    <th class="text-nowrap" style="text-align: center">NOA</th>
                                                    <th style="text-align: center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $dataNasabahP3ks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataNasabahP3k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $proyekPerumahan = Modules\Form\Entities\FormPprPembiayaan::select()
                                                            ->where('id', $dataNasabahP3k->nama_unit_kerja)
                                                            ->get()
                                                            ->first();
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                        <td><?php echo e($dataNasabahP3k->nama_unit_kerja); ?>

                                                        </td>
                                                        <td style="text-align: center"><?php echo e($dataNasabahP3k->noa); ?></td>
                                                        <td style="text-align: center"></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /Project table -->
                            <?php endif; ?>
                        </div>
                        <!--/ User Content -->
                    </div>
                </section>
                <!-- Edit User Modal -->
                <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit User</h1>
                                    
                                </div>
                                <form action="/profile/<?php echo e($user->id); ?>" method="POST">
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="code" value="1">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Nama</label>
                                        <input type="text" id="modalEditUserFirstName" name="name"
                                            class="form-control" placeholder="John" value="<?php echo e(Auth::user()->name); ?>"
                                            data-msg="Masukan Nama Anda" required />
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label" for="modalEditUserName">Email</label>
                                        <input type="text" id="modalEditUserName" name="email" class="form-control"
                                            value="<?php echo e(Auth::user()->email); ?>" data-msg="Masukan Nama Anda" required />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit User Modal -->
                <!-- Edit Password Modal -->
                <div class="modal fade" id="editPassword" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit Password</h1>
                                    
                                </div>
                                <form id="editUserForm" method="POST" class="row gy-1 pt-75"
                                    action="/profile/<?php echo e($user->id); ?>">
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="code" value="2">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Password
                                            Lama</label>
                                        <input type="password" id="modalEditUserFirstName" name="password_lama"
                                            class="form-control" data-msg="Masukan Password Lama" required />
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserLastName">Password Baru</label>
                                        <input type="password" id="modalEditUserLastName" name="password_baru"
                                            class="form-control" data-msg="Masukan Password Baru" required />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit Password Modal -->
                <!-- Edit foto Modal -->
                <div class="modal fade" id="editPhoto" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body pb-5 px-sm-5 pt-50">
                                <div class="text-center mb-2">
                                    <h1 class="mb-1">Edit Photo</h1>
                                    
                                </div>
                                <form action="/profile/<?php echo e($user->id); ?>" method="POST"
                                    enctype="multipart/form-data">
                                    <?php echo method_field('PUT'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="code" value="3">
                                    <div class="col-12 col-md-6">
                                        <label class="form-label" for="modalEditUserFirstName">Input Foto Baru</label>
                                        <input type="file" id="modalEditUserFirstName" name="foto"
                                            class="form-control" data-msg="Masukan Foto" required />
                                        <input type="hidden" id="EditUserFirstName" name="foto_lama"
                                            value="<?php echo e(Auth::user()->foto); ?>" class="form-control" />
                                    </div>
                                    <div class="col-12 text-center mt-2 pt-50">
                                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            Discard
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Edit foto Modal -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vuexy.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/resources/views/profile.blade.php ENDPATH**/ ?>