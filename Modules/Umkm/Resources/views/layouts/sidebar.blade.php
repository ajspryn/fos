<!-- BEGIN: Main Menu-->
{{-- @php
    $notif_proposal=Modules\umkm\Entities\pasarPembiayaan::select()->where('user_id',Auth::user()->id)->where('pasar_sektor_ekonomi_id',null)->get()->count();
@endphp --}}
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                    <img src="../../../logo_sidebar.png" height="30" alt="">
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ Request::is('umkm') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/umkm"><i data-feather="home"></i><span class="menu-title text-truncate"
                        data-i18n="home">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Menu Anda</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="{{ Request::is('umkm/nasabah*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/umkm/nasabah"><i data-feather="users"></i><span class="menu-title text-truncate"
                        data-i18n="home">Data Nasabah</span></a>
            </li>
            <li class="{{ Request::is('umkm/komite*') ? 'active' : 'nav-item' }} "><a class="d-flex align-items-center"
                    href="/umkm/komite"><i data-feather="file-text"></i><span class="menu-title text-truncate"
                        data-i18n="home">Komite</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="#"><i data-feather="clipboard"></i><span
                        class="menu-item text-truncate" data-i18n="Account Settings">Proposal</span></a>
                <ul class="menu-content">
                    <li class="{{ Request::is('umkm/proposal*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/umkm/proposal"><i
                                data-feather="clipboard"></i><span class="menu-title text-truncate"
                                data-i18n="home">Proposal</span></a>
                    </li>
                    <li class="{{ Request::is('umkm/revisi*') ? 'active' : 'nav-item' }} "><a
                            class="d-flex align-items-center" href="/umkm/revisi"><i data-feather="circle"></i><span
                                class="menu-title text-truncate" data-i18n="home">Revisi Proposal</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
