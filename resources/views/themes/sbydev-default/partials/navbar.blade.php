<!-- Navbar Begin -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img height="49px" width="132px" src="{{ theme_asset('img/logo-small.png') }}" alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'event.index' ? 'active' : '' }}" href="{{ route('event.index') }}">Event <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'site.blog' ? 'active' : '' }}" href="https://medium.com/surabayadev" target="_blank">Blog</a>
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'site.merchandise' ? 'active' : '' }}" href="#">Merchandise</a>
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'site.about' ? 'active' : '' }}" href="{{ route('site.about') }}">About Us</a>
            </div>
            <ul class="navbar-nav ml-auto">
                @if($profile = auth()->user())
                    <li class="nav-item" style="position: relative;">
                        <a href="#" class="nav-link dropdown-toggle {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" data-toggle="dropdown">{{$profile->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">View Profile</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('profile.password') }}">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                @else
                <a href="{{ route('register') }}" class="btn btn-outline-primary mx-2">Join With Us</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">Login</a>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->


{{-- Alert Begin --}}
@if (count($errors) > 0)
    <div class="m-0 alert alert-danger">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <strong>Wah prend... ada kesalahan</strong>
                    <ul class="mt-3">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@elseif (session('alert'))
    <div class="m-0 alert alert-{{ session('alert.type', 'info') }}">    
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong class="d-block mb-2">{{ session('alert.title') }}</strong>
                    {{ session('alert.content') }}
                </div>
            </div>
        </div>
    </div>
@endif
{{-- Alert End --}}