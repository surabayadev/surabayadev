@extends('theme::layouts.default')

@section('content')
    <section class="bg-gradient-1">
        <div class="container">
            <h1 class="text-light text-center">Login Yuk.</h1>
            <h4 class="text-light text-center">Biar kamu bisa akses fitur di website Surabaya Dev.</h4>
            <!-- Login Card Begin -->
            <div class="card-close mt-5" id="login-card">
                {!! Form::open(['method' => 'POST', 'url' => route('login')]) !!}
                    
                    {{-- <div class="form-group">
                        {!! Form::label('email', 'Alamat Email') !!}
                        {!! Form::email('email', null, ['class' => 'form-control '. ($errors->first('email') ? 'is-invalid' : ''), 'placeholder' => 'ex: sobirin@surabayadev.org', 'autofocus' => true]) !!}
                        @if ($errors->first('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control '. ($errors->first('email') ? 'is-invalid' : '')]) !!}
                        @if ($errors->first('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif

                        <span id="passwordHelpBlock" class="form-text text-muted mt-3">
                            <a href="{{ route('password.request') }}">Lupa Password</a>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Login</button> --}}
                    
                    {{-- <div class="d-flex mt-3">
                        <hr align="left" width="30%"> <span>Gunakan Social Media</span>
                        <hr align="right" width="30%">
                    </div> --}}

                    <div class="text-center my-3">
                        <a href="{{ route('login.social', 'github') }}" class="btn btn-primary mx-1"><i class="fab fa-github"></i> Github</a>
                        <a href="{{ route('login.social', 'facebook') }}" class="btn btn-primary mx-1"><i class="fab fa-facebook"></i> Facebook</a>
                    </div>

                    {{-- <div class="d-flex mt-3">
                        <hr align="left" width="30%"> <span>Atau</span>
                        <hr align="right" width="30%">
                    </div>

                    <a href="{{ route('register') }}" class="btn btn-secondary btn-block mt-2">Daftar Akun Baru</a> --}}
                {!! Form::close() !!}
            </div>
            <!-- Login Card End -->
        </div>
    </section>
@stop