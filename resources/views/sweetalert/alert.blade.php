@php
    /**
     * Compatibility view for legacy `realrashid/sweet-alert` includes.
     *
     * Many layouts call: @include('sweetalert::alert', ['cdn' => '...'])
     * We ignore `cdn` and use local SweetAlert2 assets already shipped in this repo.
     */
    $compatTitle = null;
    $compatText = null;
    $compatIcon = null;

    if (session()->has('success')) {
        $compatTitle = 'Berhasil';
        $compatText = (string) session('success');
        $compatIcon = 'success';
    } elseif (session()->has('error')) {
        $compatTitle = 'Gagal';
        $compatText = (string) session('error');
        $compatIcon = 'error';
    } elseif (session()->has('warning')) {
        $compatTitle = 'Peringatan';
        $compatText = (string) session('warning');
        $compatIcon = 'warning';
    } elseif (session()->has('info')) {
        $compatTitle = 'Info';
        $compatText = (string) session('info');
        $compatIcon = 'info';
    }
@endphp

@once
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endonce

@if ($compatIcon && $compatText)
    <script>
        (function () {
            if (typeof Swal === 'undefined') return;
            try {
                Swal.fire({
                    icon: @json($compatIcon),
                    title: @json($compatTitle),
                    text: @json($compatText),
                    confirmButtonText: 'OK'
                });
            } catch (e) {
                // no-op
            }
        })();
    </script>
@endif
