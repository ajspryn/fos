@include('layouts.form.header')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@yield('content')

@include('layouts.form.footer')
