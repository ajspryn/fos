<!doctype html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="layout-navbar-fixed layout-compact"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="{{ asset('assets/') }}/"
    data-template="vertical-menu-template">
<head>
    @include('layouts.vuexy.head-assets', ['title' => trim($__env->yieldContent('title', config('app.name'))), 'includeVerticalMenu' => false, 'enableCustomizer' => $enableCustomizer ?? false])
</head>
<body>
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
        <div class="layout-container">
            <div class="layout-page">
                @yield('navbar')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>

                    @hasSection('footer')
                        @yield('footer')
                    @else
                        @include('layouts.vuexy.footer')
                    @endif

                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.vuexy.footer-scripts')
</body>
</html>
