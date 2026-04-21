@php($pageTitle = $title ?? config('app.name'))
@php($includeVerticalMenu = $includeVerticalMenu ?? true)
@php($isFront = $isFront ?? false)
@php($enableCustomizer = ($enableCustomizer ?? false) && config('app.debug'))
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="theme-color" content="#d32f2f">
<title>{{ $pageTitle }}</title>
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/iconify-icons.css') }}">
<script src="{{ asset('assets/vendor/libs/@algolia/autocomplete-js.js') }}"></script>

<!-- BEGIN: Core CSS-->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
@if ($isFront)
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/front-page.css') }}">
@endif
<!-- END: Core CSS-->

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/bs-stepper/bs-stepper.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Page CSS-->
@if ($includeVerticalMenu)
	<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}">
@endif
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ filemtime(public_path('assets/css/style.css')) }}">
<!-- END: Custom CSS-->

<!-- Helpers -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
@if ($enableCustomizer)
<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
@endif
<script src="{{ $isFront ? asset('assets/js/front-config.js') : asset('assets/js/config.js') }}"></script>

@stack('page-css')
