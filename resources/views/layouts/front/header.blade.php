<!doctype html>
<html
    lang="en"
    class="layout-navbar-fixed layout-wide"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="{{ asset('assets/') }}/"
    data-template="front-pages">

<head>
    @include('layouts.vuexy.head-assets', ['title' => config('app.name'), 'includeVerticalMenu' => false, 'isFront' => true])
    @push('page-css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page-landing.css') }}">
    @endpush
</head>

<body>
    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0" aria-label="Main">
        <div class="container">
            <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
                <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8 ms-0">
                    <button class="navbar-toggler border-0 px-0 me-4" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="icon-base ti tabler-menu-2 icon-lg align-middle text-heading fw-medium"></i>
                    </button>
                    <a href="/" class="app-brand-link">
                        <img src="{{ asset('logo.png') }}" height="50" alt="logo" loading="eager">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link" href="/home">Beranda</a></li>
                        @if (Auth::user())
                            <li class="nav-item"><a class="nav-link" href="/simulasi">Simulasi</a></li>
                        @endif
                    </ul>

                    <ul class="navbar-nav ms-auto align-items-center">
                        @if (Auth::user())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="me-1">{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="/home">Dashboard</a>
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="auth-login-cover.html"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" href="/login">Login</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->
