<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item me-auto">
            <a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
            <img src="../../../logo_form.png" height="30" alt="">
            </a>
        </li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class="{{ Request::is('admin')? "active":"" }} "><a class="d-flex align-items-center" href="/admin"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="home">Dashboard</span></a>
          </li>
          <li class=" navigation-header"><span data-i18n="Forms &amp; Tables">Forms &amp; Tables</span><i data-feather="more-horizontal"></i>
          </li>
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">User</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center" href="app-user-list.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">List</span></a>
              </li>
              <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="View">View</span></a>
                <ul class="menu-content">
                  <li><a class="d-flex align-items-center" href="app-user-view-account.html"><span class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="app-user-view-security.html"><span class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="app-user-view-billing.html"><span class="menu-item text-truncate" data-i18n="Billing &amp; Plans">Billing &amp; Plans</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="app-user-view-notifications.html"><span class="menu-item text-truncate" data-i18n="Notifications">Notifications</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="app-user-view-connections.html"><span class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Pages">Pengaturan</span></a>
            <ul class="menu-content">
              <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">SKPD</span></a>
                <ul class="menu-content">
                  <li class="{{ Request::is('/admin/skpd/parameterbobot*')? "active":"" }}" ><a class="d-flex align-items-center" href="/admin/parameterbobot"><span class="menu-item text-truncate" data-i18n="Account">Parameter Bobot</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/akad')? "active":"" }}" ><a class="d-flex align-items-center" href="/admin/skpd/akad"><span class="menu-item text-truncate" data-i18n="Account">Akad</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/instansi')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/intansi"><span class="menu-item text-truncate" data-i18n="Security">Instansi</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/golongan')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/golongan"><span class="menu-item text-truncate" data-i18n="Security">Golongan</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/jaminan')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/jaminan"><span class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Jaminan</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/penggunaan')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/penggunaan"><span class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Penggunaan</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/sektorekonomi')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/sektorekonomi"><span class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Sektor Ekonomi</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/tanggungan')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/tanggungan"><span class="menu-item text-truncate" data-i18n="Notifications">Tanggungan</span></a>
                  </li>
                  <li class="{{ Request::is('admin/skpd/statusperkawinan')? "active":"" }}"><a class="d-flex align-items-center" href="/admin/skpd/statusperkawinan"><span class="menu-item text-truncate" data-i18n="Notifications">Status Perkawinan</span></a>
                  </li>
                </ul>
              </li>
              <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Pasar / UMKM</span></a>
                <ul class="menu-content">
                  <li><a class="d-flex align-items-center" href="page-account-settings-account.html"><span class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-security.html"><span class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-billing.html"><span class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Billings &amp; Plans</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-notifications.html"><span class="menu-item text-truncate" data-i18n="Notifications">Notifications</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-connections.html"><span class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                  </li>
                </ul>
              </li>
              <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Account Settings">Property</span></a>
                <ul class="menu-content">
                  <li><a class="d-flex align-items-center" href="page-account-settings-account.html"><span class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-security.html"><span class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-billing.html"><span class="menu-item text-truncate" data-i18n="Billings &amp; Plans">Billings &amp; Plans</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-notifications.html"><span class="menu-item text-truncate" data-i18n="Notifications">Notifications</span></a>
                  </li>
                  <li><a class="d-flex align-items-center" href="page-account-settings-connections.html"><span class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                  </li>
                </ul>
              </li>
        </ul>
      </div>
    </div>
    <!-- END: Main Menu-->
