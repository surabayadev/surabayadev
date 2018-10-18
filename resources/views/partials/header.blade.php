<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">
				<img alt="Brand" src="{{ asset('img/logo-horizontal.png') }}" style="height: 100%;">
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="{{ route('event') }}">Events</a></li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="label label-success" style="position: relative; top: -10px;">new</span> Official Merchandise <span class="caret"></span></a>
					<ul class="dropdown-menu">
            			<li><a href="{{ url('/preorder/polo') }}">Polo</a></li>
            			<li><a href="{{ url('/preorder/paketpolo') }}">Paket Polo</a></li>
            			<li role="separator" class="divider"></li>
            			<li><a href="{{ url('/preorder/kaos') }}">Kaos</a></li>
            			<li><a href="{{ url('/preorder/paketkaos') }}">Paket Kaos</a></li>
            			<li role="separator" class="divider"></li>
            			<li><a href="{{ url('/preorder/mug') }}">Paket Mug</a></li>
        			</ul>
				</li>
				{{-- <li><a href="{{ route('member') }}">Anggota</a></li> --}}
			</ul>

			{{-- <ul class="nav navbar-nav navbar-right">
				@if (! auth()->check())
					<li><a href="{{ route('register') }}">Daftar</a></li>
					<li><a href="{{ route('login') }}">Login</a></li>
				@else
	        		<li class="dropdown">
	        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()['name'] ?: auth()->user()['username'] }} <span class="caret"></span></a>
	        			<ul class="dropdown-menu">
	        				<li><a href="#">Edit Profile</a></li>
	        				<li><a href="{{ route('logout') }}">Logout</a></li>
	    				</ul>
					</li>
				@endif
				<!-- <li class="dropdown">
        			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bahasa (Indonesia) <span class="caret"></span></a>
        			<ul class="dropdown-menu">
        				<li><a href="#">Indonesia</a></li>
        				<li><a href="#">English</a></li>
    				</ul>
				</li> -->
    		</ul> --}}
		</div>
	</div>
</nav>
