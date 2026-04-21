<!-- BEGIN: Main Menu-->
<?php
    $proposalSkpd = $proposalSkpd ?? 0;
    $komiteSkpd = $komiteSkpd ?? 0;
    $data = $data ?? 0;
    $komite = $komite ?? 0;
    $a = $a ?? 0;
    $b = $b ?? 0;
    $proposalppr = $proposalppr ?? 0;
    $komiteppr = $komiteppr ?? 0;
    $proposalP3k = $proposalP3k ?? 0;
    $komiteP3k = $komiteP3k ?? 0;
    $proposalUltraMikro = $proposalUltraMikro ?? 0;
    $komiteUltraMikro = $komiteUltraMikro ?? 0;
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/kabag" class="app-brand-link">
            <img src="<?php echo e(asset('logo.png')); ?>" height="40" alt="">
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="d-none d-xl-block" data-feather="disc"></i>
            <i class="d-block d-xl-none" data-feather="x"></i>
        </a>
    </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item <?php echo e(Request::is('kabag') ? 'active' : ''); ?>">
                        <a href="/kabag" class="menu-link">
                            <i data-feather="bar-chart" class="menu-icon tf-icons"></i>
                            <div data-i18n="Analytic">Analytic</div>
                        </a>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('simulasi*') ? 'active' : ''); ?>">
                        <a href="/simulasi" class="menu-link">
                            <i data-feather="monitor" class="menu-icon tf-icons"></i>
                            <div data-i18n="Simulasi">Simulasi</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pembiayaan</span>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('kabag/skpd*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i data-feather="briefcase" class="menu-icon tf-icons"></i>
                            <div data-i18n="SKPD">SKPD</div>
                            <?php if($proposalSkpd > 0): ?>
                                <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalSkpd); ?></div>
                            <?php endif; ?>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::is('kabag/skpd/nasabah*') ? 'active' : ''); ?>">
                                <a href="/kabag/skpd/nasabah" class="menu-link">
                                    <div data-i18n="Data Nasabah">Data Nasabah</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/skpd/komite*') ? 'active' : ''); ?>">
                                <a href="/kabag/skpd/komite" class="menu-link">
                                    <div data-i18n="Komite">Komite</div>
                                    <?php if($komiteSkpd > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($komiteSkpd); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/skpd/proposal*') ? 'active' : ''); ?>">
                                <a href="/kabag/skpd/proposal" class="menu-link">
                                    <div data-i18n="Proposal">Proposal</div>
                                    <?php if($proposalSkpd > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalSkpd); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('kabag/pasar*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i data-feather="shopping-bag" class="menu-icon tf-icons"></i>
                            <div data-i18n="Pasar">Pasar</div>
                            <?php if($data > 0): ?>
                                <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($data); ?></div>
                            <?php endif; ?>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::is('kabag/pasar/nasabah*') ? 'active' : ''); ?>">
                                <a href="/kabag/pasar/nasabah" class="menu-link">
                                    <div data-i18n="Data Nasabah">Data Nasabah</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/pasar/komite*') ? 'active' : ''); ?>">
                                <a href="/kabag/pasar/komite" class="menu-link">
                                    <div data-i18n="Komite">Komite</div>
                                    <?php if($komite > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($komite); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/pasar/proposal*') ? 'active' : ''); ?>">
                                <a href="/kabag/pasar/proposal" class="menu-link">
                                    <div data-i18n="Proposal">Proposal</div>
                                    <?php if($data > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($data); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('kabag/umkm*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i data-feather="package" class="menu-icon tf-icons"></i>
                            <div data-i18n="UMKM">UMKM</div>
                            <?php if($a > 0): ?>
                                <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($a); ?></div>
                            <?php endif; ?>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::is('kabag/umkm/nasabah*') ? 'active' : ''); ?>">
                                <a href="/kabag/umkm/nasabah" class="menu-link">
                                    <div data-i18n="Data Nasabah">Data Nasabah</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/umkm/komite*') ? 'active' : ''); ?>">
                                <a href="/kabag/umkm/komite" class="menu-link">
                                    <div data-i18n="Komite">Komite</div>
                                    <?php if($b > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($b); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/umkm/proposal*') ? 'active' : ''); ?>">
                                <a href="/kabag/umkm/proposal" class="menu-link">
                                    <div data-i18n="Proposal">Proposal</div>
                                    <?php if($a > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($a); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('kabag/ppr*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i data-feather="file" class="menu-icon tf-icons"></i>
                            <div data-i18n="PPR">PPR</div>
                            <?php if($proposalppr > 0): ?>
                                <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalppr); ?></div>
                            <?php endif; ?>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::is('kabag/ppr/nasabah*') ? 'active' : ''); ?>">
                                <a href="/kabag/ppr/nasabah" class="menu-link">
                                    <div data-i18n="Data Nasabah">Data Nasabah</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/ppr/komite*') ? 'active' : ''); ?>">
                                <a href="/kabag/ppr/komite" class="menu-link">
                                    <div data-i18n="Komite">Komite</div>
                                    <?php if($komiteppr > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($komiteppr); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/ppr/proposal*') ? 'active' : ''); ?>">
                                <a href="/kabag/ppr/proposal" class="menu-link">
                                    <div data-i18n="Proposal">Proposal</div>
                                    <?php if($proposalppr > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalppr); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('kabag/p3k*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i data-feather="clipboard" class="menu-icon tf-icons"></i>
                            <div data-i18n="P3K">P3K</div>
                            <?php if($proposalP3k > 0): ?>
                                <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalP3k); ?></div>
                            <?php endif; ?>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::is('kabag/p3k/nasabah*') ? 'active' : ''); ?>">
                                <a href="/kabag/p3k/nasabah" class="menu-link">
                                    <div data-i18n="Data Nasabah">Data Nasabah</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/p3k/komite*') ? 'active' : ''); ?>">
                                <a href="/kabag/p3k/komite" class="menu-link">
                                    <div data-i18n="Komite">Komite</div>
                                    <?php if($komiteP3k > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($komiteP3k); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/p3k/proposal*') ? 'active' : ''); ?>">
                                <a href="/kabag/p3k/proposal" class="menu-link">
                                    <div data-i18n="Proposal">Proposal</div>
                                    <?php if($proposalP3k > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalP3k); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item <?php echo e(Request::is('kabag/ultra_mikro*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i data-feather="zap" class="menu-icon tf-icons"></i>
                            <div data-i18n="Ultra Mikro">Ultra Mikro</div>
                            <?php if($proposalUltraMikro > 0): ?>
                                <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalUltraMikro); ?></div>
                            <?php endif; ?>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::is('kabag/ultra_mikro/nasabah*') ? 'active' : ''); ?>">
                                <a href="/kabag/ultra_mikro/nasabah" class="menu-link">
                                    <div data-i18n="Data Nasabah">Data Nasabah</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/ultra_mikro/komite*') ? 'active' : ''); ?>">
                                <a href="/kabag/ultra_mikro/komite" class="menu-link">
                                    <div data-i18n="Komite">Komite</div>
                                    <?php if($komiteUltraMikro > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($komiteUltraMikro); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::is('kabag/ultra_mikro/proposal*') ? 'active' : ''); ?>">
                                <a href="/kabag/ultra_mikro/proposal" class="menu-link">
                                    <div data-i18n="Proposal">Proposal</div>
                                    <?php if($proposalUltraMikro > 0): ?>
                                        <div class="badge bg-label-success rounded-pill ms-auto"><?php echo e($proposalUltraMikro); ?></div>
                                    <?php endif; ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
</aside>
<?php /**PATH /Users/ajspryn/Project/fos/Modules/Kabag/Resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>