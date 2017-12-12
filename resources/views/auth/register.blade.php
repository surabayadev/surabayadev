@extends('layouts.default')

@section('content')

	<div class="container content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="page-header text-center">
					<h1>
						Join SurabayaDev Community
						<p><small>The best way to learn together</small></p>
					</h1>
				</div>
				<br/>

				{!! Form::open(['method' => 'POST', 'url' => route('register')]) !!}
					<div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
						{!! Form::label('username', 'Username', ['class' => 'control-label']) !!}
						{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Pick username']) !!}

						@if ($errors->has('username'))
							<span class="help-block">
								<strong>{{ $errors->first('username') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
						{!! Form::label('email', 'Email Address', ['class' => 'control-label']) !!}
						{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Pick email']) !!}

						@if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>
					<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
						{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Create a password']) !!}

						@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>

					<hr/>
					<div class="form-group">
						<button class="btn btn-success btn-block btn-lg" style="font-weight: bold;">
							Support SurabayaDev
						</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
