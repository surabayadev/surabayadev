@extends('layouts.default')

@section('content')

	<div class="feature">
		<div class="container">
			<div class="jumbotron text-center">
				<h2 style="font-size: 54px; font-weight: 300;">A better way to learn together</h2>
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
							<p class="list-group-item-text">Take a deep breath. On GitHub, project management happens in Issues and Projects, right alongside your code. All you have to do is mention a teammate to get them involved.</p>
						</a>
						<a href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Find the right tools</h4>
							<p class="list-group-item-text">Browse and buy apps from GitHub Marketplace with your GitHub account. Find the tools you like or discover new favorites—then start using them in minutes.</p>
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


	<div class="feature">
		<div class="container">
			<div class="jumbotron text-center">
				<h2 style="font-size: 54px; font-weight: 300;">The Highlights</h2>
				{{-- <p class="lead">SurabayaDev brings developers together to learn through problems, move ideas forward, and learn from each other along the way.</p> --}}
			</div>

			<div class="row">
				<div class="col-md-5" style="background: blue;">
					Circle of Programming language
				</div>
				<div class="col-md-7" style="background: red;">
					<div class="circle">
						<div class="circle-item">
							<h1>26</h1>
						</div>
						<div class="circle-item">
							<h1>72</h1>
						</div>
						<div class="circle-item">
							<h1>169</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="feature">
		<div class="container">
			<div class="jumbotron text-center">
				<h2 style="font-size: 54px; font-weight: 300;">What they say?</h2>
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
			<br/>

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


	<div class="feature">
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


	<div class="feature" style="background: #eee;">
		<div class="container">
			<div class="jumbotron text-center">
				<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est repellat sunt sit neque, ipsum placeat aut consequatur, quis ea sint qui, necessitatibus non recusandae, fuga pariatur sequi quaerat minima mollitia.</p>
			</div>

			<form action="" class="form">
				<div class="row">
					<div class="col-md-3">
						<input type="text" name="username" class="form-control input-lg" placeholder="Pick username">
					</div>
					<div class="col-md-3">
						<input type="text" name="email" class="form-control input-lg" placeholder="Your email address">
					</div>
					<div class="col-md-3">
						<input type="password" name="password" class="form-control input-lg" placeholder="Create a password">
					</div>
					<div class="col-md-3">
						<button class="btn btn-success btn-lg btn-block">Support SurabayaDev</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					{{-- <img src="{{ asset('img/logo-medium.png') }}" style="margin-bottom: 20px;"> --}}
					© 2017 SurabayaDev. All rights reserved. |
					<a href="">Facebook</a> -
					<a href="">Instagram</a> -
					<a href="">Twitter</a>
				</div>
			</div>
		</div>
	</footer>

	{{-- <div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Dashboard</div>

				</div>
			</div>
		</div>
	</div> --}}
@endsection
