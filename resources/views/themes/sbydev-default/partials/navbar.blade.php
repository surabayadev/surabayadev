<!-- Navbar Begin -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img height="49px" width="132px" src="{{ theme_asset('img/logo-small.png') }}" alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'event.index' ? 'active' : '' }}" href="{{ route('event.index') }}">Event <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'site.blog' ? 'active' : '' }}" href="#">Blog</a>
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'site.merchandise' ? 'active' : '' }}" href="#">Merchandise</a>
                <a class="nav-item nav-link {{ Route::currentRouteName() == 'site.about' ? 'active' : '' }}" href="{{ route('site.about') }}">About Us</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="{{ route('register') }}" class="btn btn-outline-primary mx-2">Join With Us</a>
                <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">Login</a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->