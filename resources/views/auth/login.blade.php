@extends('layouts.default')

@section('content')

	<div class="container content">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="page-header text-center">
					<h1>
						Login to your SurabayaDev Account
					</h1>
				</div>
				<br/>

				{!! Form::open(['method' => 'POST', 'url' => route('login')]) !!}
					<div class="form-group {{ $errors->has('user') ? ' has-error' : '' }}">
						{!! Form::label('user', 'Username or Email', ['class' => 'control-label']) !!}
						{!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'your Username or Email']) !!}

						@if ($errors->has('user'))
							<span class="help-block">
								<strong>{{ $errors->first('user') }}</strong>
							</span>
						@endif
					</div>
					<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
						{!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Your password']) !!}

						@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>
					<hr/>
					<div class="form-group">
						<button class="btn btn-success btn-block btn-lg" style="font-weight: bold;">
							Login
						</button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
