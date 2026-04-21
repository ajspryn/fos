@include('layouts.front.header')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
@yield('content')

@include('layouts.front.footer')
