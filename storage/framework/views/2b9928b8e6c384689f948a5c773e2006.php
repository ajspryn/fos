<!doctype html>
<html
    lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
    class="layout-navbar-fixed layout-menu-fixed layout-compact"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="<?php echo e(asset('assets/')); ?>/"
    data-template="vertical-menu-template">
<head>
    <?php echo $__env->make('layouts.vuexy.head-assets', ['title' => trim($__env->yieldContent('title', config('app.name')))], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php echo $__env->yieldContent('sidebar'); ?>

            <div class="layout-page">
                <?php echo $__env->yieldContent('navbar'); ?>

                <div class="content-wrapper">
                    <?php echo $__env->yieldContent('content'); ?>

                    <?php if (! empty(trim($__env->yieldContent('footer')))): ?>
                        <?php echo $__env->yieldContent('footer'); ?>
                    <?php else: ?>
                        <?php echo $__env->make('layouts.vuexy.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    <?php echo $__env->make('layouts.vuexy.footer-scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH /Users/ajspryn/Project/fos/resources/views/layouts/vuexy/app.blade.php ENDPATH**/ ?>