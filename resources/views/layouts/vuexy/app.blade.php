<!doctype html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="layout-navbar-fixed layout-menu-fixed layout-compact"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="{{ asset('assets/') }}/"
    data-template="vertical-menu-template">
<head>
    @include('layouts.vuexy.head-assets', ['title' => trim($__env->yieldContent('title', config('app.name')))])
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @yield('sidebar')

            <div class="layout-page">
                @yield('navbar')

                <div class="content-wrapper">
                    @yield('content')

                    @hasSection('footer')
                        @yield('footer')
                    @else
                        @include('layouts.vuexy.footer')
                    @endif

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    @include('layouts.vuexy.footer-scripts')
</body>
</html>
