@extends('layouts.app')

@section('content')
<div class="card mb-0">
    <div class="card-body">
        <h4 class="card-title mb-1">{{ __('Reset Password') }}</h4>
        <p class="card-text mb-2">{{ __('Enter your email to receive a reset link.') }}</p>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-1">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>
</div>
@endsection
