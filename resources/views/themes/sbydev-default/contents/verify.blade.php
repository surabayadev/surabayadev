@extends('theme::layouts.default')

@section('content')
    <section class="bg-gradient-1">
        <div class="container">
            <h1 class="text-light text-center">Verify Your Email Address.</h1>

            <div class="card-close mt-5" id="login-card">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            </div>
        </div>
    </section>
@stop