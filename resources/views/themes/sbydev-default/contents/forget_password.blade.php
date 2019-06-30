@extends('theme::layouts.default')

@section('content')
    <section class="bg-gradient-1">
        <div class="container">
            <h1 class="text-light text-center">Lupa Password</h1>
            <div class="card-close mt-5" id="login-card">
                {!! Form::open(['method' => 'POST', 'url' => route('password.email')]) !!}
                    <div class="form-group">
                        {!! Form::label('email', 'Alamat Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control '. ($errors->first('email') ? 'is-invalid' : ''), 'placeholder' => 'ex: sobirin@surabayadev.org']) !!}
                        @if ($errors->first('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif

                        <span id="passwordHelpBlock" class="form-text text-muted mt-3">
                            <a href="{{ route('login') }}">Saya sudah ingat</a>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Kirim link reset password</button>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@stop