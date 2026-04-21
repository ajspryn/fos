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
                            <h2 class="content-header-title float-start mb-0">Data Komite</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/ppr">PPR</a></li>
                                    <li class="breadcrumb-item active">Komite</li>
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
                                        <th class="midCenter" style="vertical-align: middle;">Jenis Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $komites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $komite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                ->where('id', $komite->form_ppr_pembiayaan_id ?? null)
                                                ->first();

                                            $history = null;
                                            if ($proposal_ppr) {
                                                $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                    ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
                                                    ->latest()
                                                    ->first();
                                            }
                                        ?>

                                        <?php if(!$proposal_ppr || !$history) continue; ?>
                                        <?php if(!$history->statushistory || !$history->jabatan) continue; ?>
                                        <?php if(!$proposal_ppr->pemohon || !$proposal_ppr->user) continue; ?>

                                        <?php if($history->jabatan_id == 4 || ($history->jabatan_id == 3 && $history->status_id == 5) || ($history->jabatan_id == 1 && $history->status_id >= 9)): ?>
                                            <tr>
                                                <td class="midCenter"><?php echo e($loop->iteration); ?></td>
                                                <td class="midCenter d-none d-md-table-cell"><?php echo e(date_format($proposal_ppr->created_at, 'd-m-Y')); ?></td>
                                                <td class="midCenter"><?php echo e($proposal_ppr->jenis_nasabah); ?></td>
                                                <td class="midCenter"><?php echo e($proposal_ppr->pemohon->form_pribadi_pemohon_no_ktp); ?></td>
                                                <td class="midCenter"><?php echo e($proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap); ?></td>
                                                <td class="midCenter">Rp.<?php echo e(number_format($proposal_ppr->form_permohonan_nilai_ppr_dimohon)); ?></td>
                                                <td class="midCenter">
                                                    <?php echo e($proposal_ppr->form_permohonan_jangka_waktu_ppr); ?> Tahun
                                                    <br />
                                                    (<?php echo e($proposal_ppr->form_permohonan_jml_bulan); ?> Bulan)
                                                </td>
                                                <td class="midCenter" value="<?php echo e($history?->statushistory?->id ?? ''); ?>, <?php echo e($history?->jabatan?->jabatan_id ?? ''); ?>">
                                                    <?php if($history?->statushistory?->id ?? '' == 5): ?>
                                                        <span class="badge rounded-pill badge-light-success">
                                                            <?php echo e($history?->statushistory?->keterangan ?? ''); ?>

                                                            <?php echo e($history?->jabatan?->keterangan ?? ''); ?>

                                                        </span>
                                                    <?php elseif($history?->statushistory?->id ?? '' == 9): ?>
                                                        <span class="badge rounded-pill badge-light-success">
                                                            <?php echo e($history?->statushistory?->keterangan ?? ''); ?>

                                                        </span>
                                                    <?php elseif($history?->statushistory?->id ?? '' == 4): ?>
                                                        <span class="badge rounded-pill badge-light-info">
                                                            <?php echo e($history?->statushistory?->keterangan ?? ''); ?>

                                                            <?php echo e($history?->jabatan?->keterangan ?? ''); ?>

                                                        </span>
                                                    <?php elseif($history?->statushistory?->id ?? '' == 10): ?>
                                                        <span class="badge rounded-pill badge-light-danger">
                                                            <?php echo e($history?->statushistory?->keterangan ?? ''); ?>

                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            <?php echo e($history?->statushistory?->keterangan ?? ''); ?>

                                                            <?php echo e($history?->jabatan?->keterangan ?? ''); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="midCenter"><?php echo e($proposal_ppr->user->name); ?></td>
                                                <td class="midCenter">
                                                    <a href="/dirbis/ppr/komite/<?php echo e($proposal_ppr->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
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

<?php echo $__env->make('dirbis::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Dirbis/Resources/views/ppr/komite/index.blade.php ENDPATH**/ ?>