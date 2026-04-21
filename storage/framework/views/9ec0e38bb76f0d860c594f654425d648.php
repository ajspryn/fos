<!-- BEGIN: Main Menu-->
<?php
    $notif_proposal = Modules\Umkm\Entities\UmkmPembiayaan::select()
        ->where('AO_id', Auth::user()->id)
        ->where('sektor_id', null)
        ->count();

    $komites = Modules\Umkm\Entities\UmkmPembiayaan::select()
        ->where('AO_id', Auth::user()->id)
        ->whereNotNull('sektor_id')
        ->orderby('updated_at', 'desc')
        ->get();
    $notif_revisi = 0;
    foreach ($komites as $komite) {
        $history = Modules\Umkm\Entities\UmkmPembiayaanHistory::select()
            ->where('umkm_pembiayaan_id', $komite->id)
            ->orderby('created_at', 'desc')
            ->first();
        if ($history && $history->status_id == 7) {
            $notif_revisi++;
        }
    }
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <img src="<?php echo e(asset('logo.png')); ?>" height="50" alt="Logo">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <li class="menu-item <?php echo e(Request::is('umkm') ? 'active' : ''); ?>">
            <a href="/umkm" class="menu-link">
                <i data-feather="home" class="menu-icon tf-icons"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Request::is('simulasi') ? 'active' : ''); ?>">
            <a href="/simulasi" class="menu-link">
                <i data-feather="monitor" class="menu-icon tf-icons"></i>
                <div data-i18n="Simulasi">Simulasi</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Menu Anda</span>
        </li>

        <li class="menu-item <?php echo e(Request::is('umkm/nasabah*') ? 'active' : ''); ?>">
            <a href="/umkm/nasabah" class="menu-link">
                <i data-feather="users" class="menu-icon tf-icons"></i>
                <div data-i18n="Data Nasabah">Data Nasabah</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Request::is('umkm/komite*') ? 'active' : ''); ?>">
            <a href="/umkm/komite" class="menu-link">
                <i data-feather="file-text" class="menu-icon tf-icons"></i>
                <div data-i18n="Komite">Komite</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Request::is('umkm/proposal*') || Request::is('umkm/revisi*') ? 'open' : ''); ?>">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                <div data-i18n="Proposal">Proposal</div>
                <?php if($notif_proposal + $notif_revisi > 0): ?>
                    <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($notif_proposal + $notif_revisi); ?></div>
                <?php endif; ?>
            </a>
            <ul class="menu-sub">
                <li class="menu-item <?php echo e(Request::is('umkm/proposal*') ? 'active' : ''); ?>">
                    <a href="/umkm/proposal" class="menu-link">
                        <div data-i18n="Proposal">Proposal</div>
                        <?php if($notif_proposal > 0): ?>
                            <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($notif_proposal); ?></div>
                        <?php endif; ?>
                    </a>
                </li>
                <li class="menu-item <?php echo e(Request::is('umkm/revisi*') ? 'active' : ''); ?>">
                    <a href="/umkm/revisi" class="menu-link">
                        <div data-i18n="Revisi Proposal">Revisi Proposal</div>
                        <?php if($notif_revisi > 0): ?>
                            <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($notif_revisi); ?></div>
                        <?php endif; ?>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- END: Main Menu-->
<?php /**PATH /Users/ajspryn/Project/fos/Modules/Umkm/Resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>