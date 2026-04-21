<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)" aria-label="Toggle menu">
            <i class="icon-base ti tabler-menu-2"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block">
                <a class="nav-link nav-link-style" href="javascript:void(0)" aria-label="Toggle theme">
                    <i class="icon-base ti tabler-moon"></i>
                </a>
            </li>

            @if (Auth::user())
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-online">
                            <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('storage/avatar.png') }}" alt="avatar" class="w-px-40 h-auto rounded-circle" loading="lazy" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="/profile">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : asset('storage/avatar.png') }}" alt="avatar" class="w-px-40 h-auto rounded-circle" loading="lazy" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                        <small class="text-muted">{{ Auth::user()->email }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/profile">
                                <i class="me-2 icon-base ti tabler-user"></i>
                                <span class="align-middle">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="/home">
                                <i class="me-2 icon-base ti tabler-layout-dashboard"></i>
                                <span class="align-middle">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="auth-login-cover.html" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="me-2 icon-base ti tabler-power"></i>
                                <span class="align-middle">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item">
                    <a class="btn btn-primary" href="/login">Login</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
