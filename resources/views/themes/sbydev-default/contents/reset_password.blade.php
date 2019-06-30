@extends('theme::layouts.default')

@section('content')
    <section class="bg-gradient-1">
        <div class="container">
            <h1 class="text-light text-center">Reset Password</h1>
            <p class="text-light text-center lead">Update your new password prend</p>
            <div class="card-close mt-5" id="login-card">
                {!! Form::open(['method' => 'POST', 'url' => route('password.update')]) !!}
                    {!! Form::hidden('token', $token) !!}
                    {!! Form::hidden('email', $email) !!}

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control '. ($errors->first('password') ? 'is-invalid' : '')]) !!}
                        
                        @if ($errors->first('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control '. ($errors->first('password_confirmation') ? 'is-invalid' : '')]) !!}
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update Password</button>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop