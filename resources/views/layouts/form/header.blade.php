<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    @include('layouts.vuexy.head-assets', [
        'title' => $title ?? 'Bank Pembiayaan Rakyat Syariah Bogor Tegar Beriman',
        'includeVerticalMenu' => false
    ])
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/horizontal-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/form-file-uploader.min.css') }}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="" data-framework="laravel" data-asset-path="{{ asset('app-assets/') }}">

    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="col-md-6 col-sm-6 col-12">
                <img src="{{ asset('logo_form.png') }}" height="100" class="mt-2 mb-2 form-logo" alt="logo">
            </div>
            <div class="col-md-6 col-sm-6 col-12 text-md-end">
                <img src="{{ asset('logo_form.png') }}" height="100" class="mt-2 mb-2 form-logo" alt="logo">
            </div>
        </div>

        <div class="card bg-primary text-white mb-2 mt-2">
            <div class="card-body text-center">
                <h2 class="mb-0 mt-0 text-white">Formulir Pengajuan Pembiayaan</h2>
            </div>
        </div>
    </div>
