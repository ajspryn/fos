<!-- BEGIN: Main Menu-->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="<?php echo e(asset('logo.png')); ?>" height="28" alt="">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item <?php echo e(Request::is('/home') ? 'active' : ''); ?>">
            <a href="/" class="menu-link">
                <i data-feather="home" class="menu-icon tf-icons"></i>
                <div data-i18n="Home">Home</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Request::is('simulasi') ? 'active' : ''); ?>">
            <a href="/simulasi" class="menu-link">
                <i data-feather="bar-chart-2" class="menu-icon tf-icons"></i>
                <div data-i18n="Simulasi">Simulasi</div>
            </a>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
<?php /**PATH /Users/ajspryn/Project/fos/Modules/Simulasi/Resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>