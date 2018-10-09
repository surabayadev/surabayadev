@extends('layouts.default')

@section('content')
    
    <br/>
    <div class="container content">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p class="lead text-center">
                    <i class="fa fa-check text-success"></i>
                    Dengan membeli produk dari SurabayaDev saya menerima untuk membuat akun di SurabayaDev
                </p>

                <iframe src="{{ $gform }}" style="width: 100%; height: 1300px; border: none;">Memuat...</iframe>
            </div>
        </div>
    </div>

@endsection
