@extends('layouts.default')

@section('content')

	<div class="jumbotron jumbotron-main" style="margin-top: -20px;">
		<div class="container">
			<div class="col-md-7">
				<h1 class="main-title">#SurabayaDev</h1>
				<p class="lead"><b>SurabayaDev</b> adalah komunitas IT yang membantu meningkatkan dan memanfaatkan potensi pegiat IT di seluruh Indonesia khususnya di kota Surabaya dalam bidang Teknologi, guna mendukung, untuk mewujudkan suatu kondisi yang saling melengkapi dalam rangka peningkatan keahlian, dan semangat kerjasama.</p>
			</div>
			<div class="col-md-5 cta-top-wrapper">
				@if ($user = auth()->user())
					<div class="thumbnail-profile">
						<p class="text-success text-center">
							Thanks for Your Support!
						</p>
						<div class="thumbnail">
							<img src="{{ getImgAvatar($user['email'], 250) }}" alt="{{ $user['username'] }}" style="width: 100%;">
							<div class="caption text-center">
								<h3>
									{{ $user['name'] ?: $user['username'] }}
									@if ($user['profession'])
										<p><small>Web Developer</small></p>
									@endif
								</h3>
								@if ($user['bio'])
									<p>{{ $user['bio'] }}</p>
								@endif
							</div>
						</div>
					</div>
				@else
					<div class="form-cta-top well hidden-xs">
						{!! Form::open(['method' => 'POST', 'url' => route('register')]) !!}
							<div class="form-group">
								{!! Form::label('username', 'Username') !!}
								{!! Form::text('username', null, ['class' => 'form-control input-lg', 'placeholder' => 'Pick username']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('email', 'Email Address') !!}
								{!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Pick email']) !!}
							</div>
							<div class="form-group">
								{!! Form::label('password', 'Password') !!}
								{!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Pick password']) !!}
							</div>

							<hr/>
							<div class="form-group">
								<button class="btn btn-success btn-block btn-lg" style="font-weight: bold;">
									Support SurabayaDev
								</button>
							</div>
						{!! Form::close() !!}
					</div>
				@endif

				@if (!auth()->check())
					<a href="{{ route('register') }}" class="btn btn-success btn-lg visible-xs">Support SurabayaDev</a>
				@endif
			</div>
		</div>
	</div>

	<div class="feature feature-details">
		<div class="container">
			<div class="jumbotron text-center">
				<h2>A better way to learn together</h2>
				<p class="lead">SurabayaDev brings developers together to learn through problems, move ideas forward, and learn from each other along the way.</p>
			</div>
			<div class="row">
				<div class="col-md-7">
					<img src="{{ asset('img/somediscussion.jpg') }}" alt="" style="width: 100%;">
				</div>
				<div class="col-md-5">
					<div class="list-group list-group-box">
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Write better code</h4>
							<p class="list-group-item-text">Collaboration makes perfect. The conversations and code reviews that happen in Pull Requests help your team share the weight of your work and improve the software you build..</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Manage your chaos</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos possimus nesciunt dicta, similique omnis doloribus facilis esse commodi ab quibusdam, a reprehenderit eligendi placeat ad, sit unde odit, est quas.</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Find the right tools</h4>
							<p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, saepe. Temporibus autem atque recusandae voluptatibus quisquam delectus nemo neque perferendis vitae facilis mollitia commodi nam nostrum quae expedita, ea ipsum.</p>
						</a>
						{{-- <a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">List group item heading</h4>
							<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
						</a> --}}
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="feature feature-stats">
		<div class="container">
			<div class="jumbotron text-center">
				<h2>The Highlights</h2>
				{{-- <p class="lead">SurabayaDev brings developers together to learn through problems, move ideas forward, and learn from each other along the way.</p> --}}
			</div>

			<div class="row is-table-row">
				<div class="col-md-4 is-table-row-middle">
					<div class="circle">
						<div class="circle-item">
							<div class="circle-item-inner">
								<span class="circle-title">169</span>
								<span class="circle-subtitle">Beloved Members</span>
							</div>
						</div>
						<div class="circle-item">
							<div class="circle-item-inner">
								<span class="circle-title">72</span>
								<span class="circle-subtitle">Events Created</span>
							</div>
						</div>
						<div class="circle-item">
							<div class="circle-item-inner">
								<span class="circle-title">26</span>
								<span class="circle-subtitle">Participants</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<h3 class="text-center">We cover any <u>Trends of Tech</u></h3>
					<br/> <br/>

					<ul class="tiles">
						<li>
							<img src="{{ asset('/img/javascript.jpg') }}" data-toggle="tooltip" data-placement="bottom" title="Javascript">
							<h4>Javascript</h4>
						</li>
						<li>
							<img src="{{ asset('/img/laravel.svg') }}" data-toggle="tooltip" data-placement="bottom" title="Laravel">
							<h4>Laravel</h4>
						</li>
						<li>
							<img src="https://scontent-sit4-1.xx.fbcdn.net/v/t39.2365-6/11057038_1603675009889853_2020621244_n.png?_nc_eui2=v1%3AAeHChmRoezBCoqx9Hhbty72GGvFXQLWKQkag3rnwEvDONaE4tFxVPPzHFsAmtjxtvmfFWfguSLTOB7t8wmRf-rB7h8YfK6-vKkUoSjezQfu8aw&oh=eabcb1f30a4a8ffd0927950734e27df9&oe=5AC8000B" data-toggle="tooltip" data-placement="bottom" title="React">
							<h4>React</h4>
						</li>
						<li>
							<img src="{{ asset('/img/vuejs.png') }}" data-toggle="tooltip" data-placement="bottom" title="Vue.js">
							<h4>Vue.js</h4>
						</li>
						<li>
							<img src="{{ asset('/img/travis-ci.png') }}" data-toggle="tooltip" data-placement="bottom" title="Continous Integration">
							<h4>Travis CI</h4>
						</li>
						<li>
							<img src="{{ asset('/img/kotlin.jpg') }}" data-toggle="tooltip" data-placement="bottom" title="Kotlin">
							<h4>Kotlin</h4>
						</li>
						<li>
							<img src="{{ asset('/img/php.png') }}" data-toggle="tooltip" data-placement="bottom" title="PHP">
							<h4>PHP</h4>
						</li>
						<li>
							<span style="position: relative; top: 35px;">And many more...</span>
						</li>
						{{-- <li>
							<img src="{{ asset('/img/symfony.png') }}">
							<h4>Symfony</h4>
						</li> --}}
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="feature">
		<div class="container">
			<div class="jumbotron text-center">
				<h2>What they say?</h2>
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis quae, enim dicta minus voluptatem. Sapiente impedit temporibus quisquam odit facilis minima, consequuntur eaque repellat cumque quasi quis aliquam, deleniti adipisci..</p>
			</div>

			<div class="row">
				<div class="col-md-4">
					<div class="media testimony">
						<div class="media-left">
							<a href="#">
								<img class="media-object img-circle" src="https://avatars0.githubusercontent.com/u/3622084?s=460&v=4">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div>Antoni Putra</div>
								<small>Suami Idaman</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo, Cras purus odio.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="media testimony">
						<div class="media-left">
							<a href="#">
								<img class="media-object img-circle" src="https://avatars0.githubusercontent.com/u/3622084?s=460&v=4">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div>Antoni Putra</div>
								<small>Suami Idaman</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo, Cras purus odio.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="media testimony">
						<div class="media-left">
							<a href="#">
								<img class="media-object img-circle" src="https://avatars0.githubusercontent.com/u/3622084?s=460&v=4">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div>Antoni Putra</div>
								<small>Suami Idaman</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo, Cras purus odio.
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="media testimony">
						<div class="media-left">
							<a href="#">
								<img class="media-object img-circle" src="https://avatars0.githubusercontent.com/u/3622084?s=460&v=4">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div>Antoni Putra</div>
								<small>Suami Idaman</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo, Cras purus odio.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="media testimony">
						<div class="media-left">
							<a href="#">
								<img class="media-object img-circle" src="https://avatars0.githubusercontent.com/u/3622084?s=460&v=4">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div>Antoni Putra</div>
								<small>Suami Idaman</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo, Cras purus odio.
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="media testimony">
						<div class="media-left">
							<a href="#">
								<img class="media-object img-circle" src="https://avatars0.githubusercontent.com/u/3622084?s=460&v=4">
							</a>
						</div>
						<div class="media-body">
							<h4 class="media-heading">
								<div>Antoni Putra</div>
								<small>Suami Idaman</small>
							</h4>
							Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo, Cras purus odio.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="feature hidden-xs">
		<div class="container text-center">
			<h3>Thanks to Generous support</h3> <br/><br/>

			<div class="row">
				<div class="col-xs-6 col-md-4">
					<a href="#">
						<img src="{{ asset('img/niagahoster.webp') }}" alt="...">
					</a>
				</div>
				<div class="col-xs-6 col-md-4">
					<a href="#">
						<img src="{{ asset('img/niagahoster.webp') }}" alt="...">
					</a>
				</div>
				<div class="col-xs-6 col-md-4">
					<a href="#">
						<img src="{{ asset('img/niagahoster.webp') }}" alt="...">
					</a>
				</div>
			</div>
		</div>
	</div>


	<div class="feature cta-bottom">
		<div class="cta-bottom-overlay"></div>
		<div class="container">
			<div class="jumbotron text-center">
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est repellat sunt sit neque, ipsum placeat aut consequatur, quis ea sint qui, necessitatibus non recusandae, fuga pariatur sequi quaerat minima mollitia.</p>
			</div>

			@if (!auth()->check())
				{!! Form::open(['method' => 'POST', 'url' => route('register')]) !!}
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::text('username', null, ['class' => 'form-control input-lg', 'placeholder' => 'Pick username']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Pick email']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Create a password']) !!}
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<button class="btn btn-success btn-lg btn-block">Support SurabayaDev</button>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
			@endif
		</div>
	</div>
@endsection
