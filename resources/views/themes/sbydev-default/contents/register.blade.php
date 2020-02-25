@extends('theme::layouts.default')

@section('head')
    {!! htmlScriptTagJsApi(/* $formId - INVISIBLE version only */) !!}
@stop

@section('content')
    <section class="bg-gradient-1" id="register">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 align-self-center">
                    <h1 class="text-light">Daftarkan Dirimu.</h1>
                    <h4 class="text-light">Daftar yuk biar kamu bisa dapetin banyak benefit dari komunitas SurabayaDev.</h4>
                    <h4 class="text-light">Sudah punya akun? <a href="{{ route('login') }}" class="text-white" style="text-decoration: underline;">Klik Disini</a> untuk Login.</h4>
                </div>
                <div class="col-12 col-md-6 mt-4">
                    <div class="card-closed m-auto" id="register-card">
                        {!! Form::open(['method' => 'POST', 'url' => '/register']) !!}
                            <div class="d-flex">
                                <hr align="left" width="30%">
                                <span>Gunakan Social Media</span>
                                <hr align="right" width="30%">
                            </div>

                            <div class="text-center my-3">
                                <a href="{{ route('login.social', 'github') }}" class="btn btn-primary mx-3"><i class="fab fa-github"></i> Github</a>
        
                                <a href="{{ route('login.social', 'facebook') }}" class="btn btn-primary mx-3"><i class="fab fa-facebook"></i> Facebook</a>
                            </div>

                            <div class="d-flex mt-3">
                                <hr align="left" width="30%">
                                <span>Atau Daftar Langsung</span>
                                <hr align="right" width="30%">
                            </div>

                            <div class="form-group">
                                {!! Form::label('name', 'Nama Lengkap') !!}
                                {!! Form::text('name', null, [ 'class' => 'form-control '. ($errors->first('name') ? 'is-invalid' : ''), 'placeholder' => 'ex: Sobirin Rodriguez']) !!}
                                @if ($errors->first('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('phone', 'Telepon') !!}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="addon-tlp">+62</span>
                                    </div>
                                    {!! Form::number('phone', null, [ 'class' => 'form-control '. ($errors->first('phone') ? 'is-invalid' : ''), 'placeholder' => 'ex: 8210000000']) !!}
                                </div>
                                @if ($errors->first('phone'))
                                    <div class="invalid-feedback" style="display: block;">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Alamat Email') !!}
                                {!! Form::email('email', null, ['class' => 'form-control '. ($errors->first('email') ? 'is-invalid' : ''), 'placeholder' => 'ex: sobirin@surabayadev.org']) !!}
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
                            </div>
                            <div class="form-group text-center mt-4">
                                {!! htmlFormSnippet() !!}
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop