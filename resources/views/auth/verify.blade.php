@extends('layouts.app')

@section('content')
<div class="card mb-0">
    <div class="card-body">
        <h4 class="card-title mb-1">{{ __('Verify Your Email Address') }}</h4>
        <p class="card-text mb-2">{{ __('Before proceeding, please check your email for a verification link.') }}</p>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p class="mb-0">
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </p>
    </div>
</div>
@endsection
