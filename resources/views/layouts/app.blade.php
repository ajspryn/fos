<!doctype html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="layout-wide customizer-hide"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="{{ asset('assets/') }}/"
    data-template="vertical-menu-template">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.vuexy.head-assets', ['title' => config('app.name'), 'includeVerticalMenu' => false])
    @push('page-css')
        <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
    @endpush
    @stack('page-css')
</head>
<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts.vuexy.footer-scripts')
</body>
</html>
