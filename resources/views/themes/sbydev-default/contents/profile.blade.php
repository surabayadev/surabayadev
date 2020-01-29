@extends('theme::layouts.default')

@section('content')
    <section id="upcoming" class="bg-gradient-1" style="padding: 40px 0px;">
        <div class="container text-center">
            <div class="speaker-photo">
                <img src="{{ avatar($user) }}" style="width: 200px;">
            </div>
            <h1 class="mt-0">
                {{ $user->name }}
                <small class="text-white-40 d-block mt-1" style="font-size: 1.3rem;">{{ $user->username }}</small>
            </h1>
            <p class="lead">{{ $user->job }}</p>
        </div>
    </section>

    @if (in_array(Route::currentRouteName(), ['profile', 'user.show']))
        @include('theme::contents._profile_show')
    @elseif (Route::currentRouteName() === 'profile.edit')
        @include('theme::contents._profile_edit')
    @elseif (Route::currentRouteName() === 'profile.password')
        @include('theme::contents._profile_password')
    @endif
@stop