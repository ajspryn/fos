@extends('layouts.app')

@section('content')
<div class="card mb-0">
    <div class="card-body">
        <h4 class="card-title mb-1">{{ __('Confirm Password') }}</h4>
        <p class="card-text mb-2">{{ __('Please confirm your password before continuing.') }}</p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-1">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">
                {{ __('Confirm Password') }}
            </button>

            @if (Route::has('password.request'))
                <div class="text-center mt-1">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
