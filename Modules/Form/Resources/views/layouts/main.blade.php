@extends('layouts.vuexy.app-blank', ['enableCustomizer' => false])

@section('navbar')
	@include('layouts.vuexy.form-header')
@endsection

@section('sidebar')
	
@endsection

@section('content')
	@push('page-css')
		<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/wizard-ex-checkout.css') }}">
	@endpush
	@push('page-js')
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				if (window.flatpickr) {
					document.querySelectorAll('.flatpickr-basic').forEach(function(input) {
						window.flatpickr(input, {
							dateFormat: 'd-m-Y',
							allowInput: true
						});
					});
				}
			});
		</script>
	@endpush
	<div class="form-page">
		@include('form::layouts.banner')
		@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
		<div class="form-shell">
			@yield('content')
		</div>
	</div>
@endsection
