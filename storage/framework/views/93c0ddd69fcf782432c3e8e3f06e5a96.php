<?php $__env->startSection('content'); ?>
<div class="app-content content">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h2><?php echo e($title); ?></h2>
        <p>Pembiayaan ID: <?php echo e($historyStatus->p3k_pembiayaan_id ?? '-'); ?></p>
        <p>Status Terakhir: <?php echo e($historyStatus->status_id ?? '-'); ?> | Jabatan: <?php echo e($historyStatus->jabatan_id ?? '-'); ?></p>

        <?php if($historyStatus && $historyStatus->jabatan_id == 4 && $historyStatus->status_id == 5): ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="/dirut/p3k/komite" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="p3k_pembiayaan_id" value="<?php echo e($historyStatus->p3k_pembiayaan_id); ?>">
                    <input type="hidden" name="status_id" value="5">
                    <input type="hidden" name="jabatan_id" value="5">
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <button type="submit" class="btn btn-success w-100">Setujui (Dirut)</button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="/dirut/p3k/komite" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="p3k_pembiayaan_id" value="<?php echo e($historyStatus->p3k_pembiayaan_id); ?>">
                    <input type="hidden" name="status_id" value="7">
                    <input type="hidden" name="jabatan_id" value="5">
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <button type="submit" class="btn btn-warning w-100">Revisi (Dirut)</button>
                </form>
            </div>
        </div>
        <?php else: ?>
        <div class="alert alert-info mt-3">
            Tidak ada aksi yang tersedia untuk status saat ini (status_id=<?php echo e($historyStatus->status_id ?? '-'); ?>, jabatan_id=<?php echo e($historyStatus->jabatan_id ?? '-'); ?>).
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dirut::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Dirut/Resources/views/p3k/komite/lihat.blade.php ENDPATH**/ ?>