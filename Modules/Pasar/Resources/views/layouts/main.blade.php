@extends('layouts.vuexy.app')

@section('navbar')
    @include('layouts.vuexy.navbar')
@endsection

@section('sidebar')
    @include('pasar::layouts.sidebar')
@endsection

@section('content')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    @yield('content')
@endsection
