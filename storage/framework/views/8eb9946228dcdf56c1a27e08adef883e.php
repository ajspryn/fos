<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.vuexy.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('kabag::layouts.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-css'); ?>
    <style>
        /* Kabag views still contain legacy Vuexy wrappers; ensure their overlays don't block clicks */
        .kabag-page .content-overlay,
        .kabag-page .header-navbar-shadow {
            display: none !important;
        }

        /* Failsafe: if Vuexy layout overlays get stuck, they can dim the page and intercept all clicks */
        .layout-overlay,
        .content-backdrop,
        .sidenav-overlay,
        .drag-target {
            display: none !important;
            pointer-events: none !important;
        }

        /* Kabag-only UI polish: spacing between cards and sections */
        .kabag-page .card {
            margin-bottom: 1.25rem !important;
        }

        .kabag-page .row {
                --bs-gutter-x: 1.25rem;
                --bs-gutter-y: 1.25rem;
        }

        .kabag-page .content-header {
            margin-bottom: 1rem;
        }

        .kabag-page section {
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        .kabag-page .content-wrapper.container-xxl.p-0 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            padding-top: 0.5rem !important;
        }

        @media (min-width: 768px) {
            .kabag-page .content-wrapper.container-xxl.p-0 {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="kabag-page">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.vuexy.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/layouts/main.blade.php ENDPATH**/ ?>