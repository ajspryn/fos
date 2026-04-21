@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
@endpush

@push('page-js')
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/auth-login.js') }}"></script>
@endpush

@section('content')
<div class="card mb-0">
    <div class="card-body">
        <div class="text-center mb-2">
            <a href="/" class="brand-logo d-inline-flex align-items-center justify-content-center mb-1">
                <img src="{{ asset('logo.png') }}" height="110" alt="logo" class="form-logo">
            </a>
            <h3 class="fw-bolder mb-25">BPRS BTB</h3>
            <p class="text-muted mb-0">Sistem Pembiayaan Terintegrasi</p>
        </div>

        <h4 class="card-title mb-1">Selamat Datang!</h4>
        <p class="card-text mb-2">Silakan masukkan email/username dan password Anda untuk melanjutkan.</p>

        <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-1">
                <label for="login-email" class="form-label">Email / Username</label>
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i data-feather="mail"></i></span>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" placeholder="email atau username" aria-describedby="login-email" name="email" value="{{ old('email') }}" required autofocus tabindex="1" />
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-1">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="login-password">Password</label>
                    @if (Route::has('password.request'))
                        <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                    @endif
                </div>
                <div class="input-group input-group-merge form-password-toggle">
                    <input type="password" class="form-control @error('password') is-invalid @enderror form-control-merge" id="login-password" tabindex="2" placeholder="••••••••••" aria-describedby="login-password" name="password" required autocomplete="current-password" />
                    <span class="input-group-text cursor-pointer" style="position: relative; z-index: 10;" onclick="(function(btn){var inp=document.getElementById('login-password');if(!inp)return;var show=inp.type==='password';inp.type=show?'text':'password';var svg=btn.querySelector('svg');if(svg&&window.feather){svg.outerHTML=feather.icons[show?'eye-off':'eye'].toSvg({width:16,height:16});}})(this)"><i data-feather="eye"></i></span>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-1 d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="remember-me">Ingat Saya</label>
                </div>
                <a href="/" class="small text-muted">Kembali ke Beranda</a>
            </div>

            <button type="submit" class="btn btn-primary w-100" tabindex="4">
                <i data-feather="log-in" class="me-50"></i>Masuk
            </button>
        </form>

        <div class="mt-2 text-center text-muted small">
            Butuh bantuan? Hubungi admin cabang Anda.
        </div>
    </div>
</div>
@endsection
