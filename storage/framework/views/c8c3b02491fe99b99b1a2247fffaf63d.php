<?php $__env->startSection('content'); ?>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dirbis">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirbis/umkm">UMKM</a></li>
                                    <li class="breadcrumb-item active">Proposal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama Nasabah</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Usaha</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $proposal_umkm = Modules\Umkm\Entities\UmkmPembiayaan::select()
                                                ->where('id', $proposal->umkm_pembiayaan_id)
                                                ->first();

                                            $history = null;
                                            if ($proposal_umkm) {
                                                $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
                                                    ->where('umkm_pembiayaan_id', $proposal_umkm->id)
                                                    ->latest()
                                                    ->first();
                                            }
                                        ?>

                                        <?php if(!$proposal_umkm || !$history || !$history->statushistory || !$history->jabatan) continue; ?>
                                        <?php if(!$proposal_umkm->nasabahh || !$proposal_umkm->keteranganusaha || !$proposal_umkm->user) continue; ?>

                                        <?php if(
                                            $history->jabatan_id == 1 ||
                                                $history->jabatan_id == 2 ||
                                                $history->jabatan_id == 0 ||
                                                ($history->jabatan_id == 3 && $history->status_id == 4)
                                        ): ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($proposal_umkm->nasabahh->nama_nasabah); ?></td>
                                                <td><?php echo e($proposal_umkm->nasabahh->alamat); ?></td>
                                                <td style="text-align: center"><?php echo e($proposal_umkm->keteranganusaha->nama_usaha); ?></td>
                                                <td style="text-align: center"><?php echo e(number_format($proposal_umkm->nominal_pembiayaan)); ?></td>
                                                <td style="text-align: center"><?php echo e($proposal_umkm->tgl_pembiayaan); ?></td>
                                                <td style="text-align: center"
                                                    value="<?php echo e($history->statushistory->id); ?> ,<?php echo e($history->jabatan->jabatan_id); ?> ">
                                                    <?php if($history->statushistory->id == 5): ?>
                                                        <span class="badge rounded-pill badge-light-success">
                                                            <?php echo e($history->statushistory->keterangan); ?>

                                                            <?php echo e($history->jabatan->keterangan); ?>

                                                        </span>
                                                    <?php elseif($history->statushistory->id == 4 || $history->statushistory->id == 7): ?>
                                                        <span class="badge rounded-pill badge-light-warning">
                                                            <?php echo e($history->statushistory->keterangan); ?>

                                                            <?php echo e($history->jabatan->keterangan); ?>

                                                        </span>
                                                    <?php elseif($history->statushistory->id == 6): ?>
                                                        <span class="badge rounded-pill badge-light-danger">
                                                            <?php echo e($history->statushistory->keterangan); ?>

                                                            <?php echo e($history->jabatan->keterangan); ?>

                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge rounded-pill badge-light-info">
                                                            <?php echo e($history->statushistory->keterangan); ?>

                                                            <?php echo e($history->jabatan->keterangan); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: center"><?php echo e($proposal_umkm->user->name); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>
                </div>

<?php echo $__env->make('dirbis::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Dirbis/Resources/views/umkm/proposal/index.blade.php ENDPATH**/ ?>