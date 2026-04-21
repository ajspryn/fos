<!doctype html>
<html
    lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    class="layout-wide customizer-hide"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="<?php echo e(asset('assets/')); ?>/"
    data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->make('layouts.vuexy.head-assets', ['title' => config('app.name'), 'includeVerticalMenu' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php $__env->startPush('page-css'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/css/pages/page-auth.css')); ?>">
    <?php $__env->stopPush(); ?>
    <?php echo $__env->yieldPushContent('page-css'); ?>
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('layouts.vuexy.footer-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH /Users/ajspryn/Project/fos/resources/views/layouts/app.blade.php ENDPATH**/ ?>