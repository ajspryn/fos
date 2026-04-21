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
                                    <li class="breadcrumb-item"><a href="/dirut">Dirbis</a></li>
                                    <li class="breadcrumb-item"><a href="/dirut/p3k">P3K</a></li>
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
                                    <?php $__currentLoopData = $proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $proposal_p3k = $proposal->p3kPembiayaan;

                                            $history = null;
                                            if ($proposal_p3k) {
                                                $history = Modules\P3k\Entities\P3kPembiayaanHistory::select()
                                                    ->where('p3k_pembiayaan_id', $proposal_p3k->id)
                                                    ->latest()
                                                    ->first();
                                            }

                                            $nasabah = optional($proposal_p3k)->nasabah;
                                            $tanggalPengajuan = optional($proposal_p3k)->tanggal_pengajuan ?? optional($proposal_p3k)->created_at;
                                        ?>

                                        <?php if(!$proposal_p3k || !$history) continue; ?>
                                        <?php if(!$nasabah) continue; ?>
                                        <?php if(!$history->statushistory || !$history->jabatan) continue; ?>

                                        <tr>
                                            <td class="midCenter"><?php echo e($loop->iteration); ?></td>
                                            <td class="midCenter d-none d-md-table-cell">
                                                <?php echo e($tanggalPengajuan ? \Carbon\Carbon::parse($tanggalPengajuan)->format('d-m-Y') : '-'); ?>

                                            </td>
                                            <td class="midCenter"><?php echo e($nasabah->no_ktp ?? '-'); ?></td>
                                            <td class="midCenter"><?php echo e($nasabah->nama_nasabah ?? '-'); ?></td>
                                            <td class="midCenter">Rp<?php echo e(number_format($proposal_p3k->nominal_pembiayaan ?? 0, 0, ',', '.')); ?></td>
                                            <td class="midCenter"><?php echo e($proposal_p3k->tenor ?? '-'); ?> Bulan</td>
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
                                            <td class="midCenter"><?php echo e(optional($proposal_p3k->user)->name ?? '-'); ?></td>
                                            <td class="midCenter">
                                                <a href="/dirut/p3k/komite/<?php echo e($proposal_p3k->id); ?>" class="btn btn-outline-info btn-sm round">Detail</a>
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

<?php echo $__env->make('dirut::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Dirut/Resources/views/p3k/komite/index.blade.php ENDPATH**/ ?>