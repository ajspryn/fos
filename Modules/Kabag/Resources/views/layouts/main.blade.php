@extends('layouts.vuexy.app')

@section('navbar')
    @include('layouts.vuexy.navbar')
@endsection

@section('sidebar')
    @include('kabag::layouts.sidebar')
@endsection

@push('page-css')
    <style>
        /* Kabag views still contain legacy Vuexy wrappers; ensure their overlays don't block clicks */
        .kabag-page .content-overlay,
        .kabag-page .header-navbar-shadow {
            display: none !important;
        }

        /* Failsafe: if Vuexy layout overlays get stuck, they can dim the page and intercept all clicks */
        .layout-overlay,
        .content-backdrop,
        .sidenav-overlay,
        .drag-target {
            display: none !important;
            pointer-events: none !important;
        }

        /* Kabag-only UI polish: spacing between cards and sections */
        .kabag-page .card {
            margin-bottom: 1.25rem !important;
        }

        .kabag-page .row {
                --bs-gutter-x: 1.25rem;
                --bs-gutter-y: 1.25rem;
        }

        .kabag-page .content-header {
            margin-bottom: 1rem;
        }

        .kabag-page section {
            margin-top: 1rem;
            margin-bottom: 1.5rem;
        }

        .kabag-page .content-wrapper.container-xxl.p-0 {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            padding-top: 0.5rem !important;
        }

        @media (min-width: 768px) {
            .kabag-page .content-wrapper.container-xxl.p-0 {
                padding-left: 1.5rem !important;
                padding-right: 1.5rem !important;
            }
        }
    </style>
@endpush

@section('content')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="kabag-page">
        @yield('content')
    </div>
@endsection
