@extends('theme::layouts.default')

@section('content')
<!-- Home Headline Begin -->
<section id="home-headline" style="background-image: url({{ asset('img/banner2.jpg') }});">
    <div class="container">
        <h2 class="text-light">#SurabayaDev</h2>
        <h4 class="text-light">SurabayaDev adalah komunitas IT yang
            <br> membantu meningkatkan dan memanfaatkan
            <br> potensi pegiat IT di Surabaya.
        </h4>
    </div>
</section>
<!-- Home Headline End -->


<!-- About Us Begin -->
<section class="container">
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
            <h3 class="text-primary">Tentang Kami</h3>
            <h4>#SURABAYADEV</h4>
            <br><br>
            <p>SurabayaDev adalah komunitas IT yang membantu
                meningkatkan dan memanfaatkan potensi pegiat IT di
                Surabaya untuk mewujudkan kondisi yang saling
                melengkapi keahlian dan semangat kerjasama.
            </p>
            <br>
            <a href="{{ route('site.about') }}">
                <h5>Baca Selanjutnya</h5>
            </a>
        </div>

        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
            <img src="{{asset('img/speaker-2.png')}}" width="100%" alt="" srcset="">
        </div>
    </div>
</section>
<!-- About Us End -->


<!-- Event Begin -->
<section id="home-event">
    <div class="container">
        <h3 class="text-primary">Event</h3>
        <div class="row mt-5">
            <div class="col-md">
                <div class="card card-close">
                    <img src="{{asset('img/poster-1.png')}}" alt="" srcset="">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Introducing of Vue JS</h5>
                        <p class="card-text">30 November 2018</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md">
                <div class="card card-close">
                    <img src="{{asset('img/poster-1.png')}}" alt="" srcset="">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Introducing of Vue JS</h5>
                        <p class="card-text">30 November 2018</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md">
                <div class="card card-close">
                    <img src="{{asset('img/poster-1.png')}}" alt="" srcset="">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Introducing of Vue JS</h5>
                        <p class="card-text">30 November 2018</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="mr-auto ml-auto">
                <a href="./event.html" class="btn btn-outline-primary">Lihat Lainnya</a>
            </div>
        </div>
    </div>
</section>
<!-- Event End -->

<!-- Blog Begin -->
{{-- <section id="home-blog" class="bg-primary">
    <div class="container">
        <h3 class="text-light mb-5">Blog</h3>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-close">
                    <svg class="bd-placeholder-img card-img-bottom" width="100%" height="530"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                    role="img" aria-label="Placeholder: Image cap">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#e7e7e7" /><text x="50%" y="50%" fill="#00000"
                    dy=".3em">Image</text>
                </svg>
                <div class="card-body">
                    <h5 class="card-title text-primary">How To Make App With Flutter</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
                        incidunt dolorem debitis repellendus illum neque dignissimos.
                        corporis vero?</p>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="card card-close">
                    <svg class="bd-placeholder-img card-img-bottom" width="100%" height="200"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                    role="img" aria-label="Placeholder: Image cap">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#e7e7e7" /><text x="50%" y="50%" fill="#00000"
                    dy=".3em">Image</text></svg>
                    <div class="card-body">
                        <h5 class="card-title text-primary">How To Make App With Flutter</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            
                <div class="card card-close">
                    <svg class="bd-placeholder-img card-img-bottom" width="100%" height="200"
                    xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"
                    role="img" aria-label="Placeholder: Image cap">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#e7e7e7" /><text x="50%" y="50%" fill="#00000"
                        dy=".3em">Image</text>
                    </svg>
                    <div class="card-body">
                        <h5 class="card-title text-primary">How To Make App With Flutter</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="ml-auto mr-auto">
                <a href="#" class="btn btn-outline-light">Lihat Lainnya</a>
            </div>
        </div>
    </div>
</section> --}}
<!-- Blog End -->

<!-- Testimoni Begin -->
<section id="home-testimoni">
    <div class="container">
        <h3 class="text-primary">Apa kata mereka ?</h3>
    </div>
    <div id="carouselExampleControls" class="mt-5 d-flex carousel slide" data-ride="carousel">
        <div class="carousel-inner ">
            <div class="w-75 mr-auto ml-auto">
                @for ($i = 0; $i < 3; $i++)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <div class="card d-flex card-close">
                            <div class="card-body text-center mr-auto ml-auto w-75 pl-5 pr-5">
                                <img src="{{asset('img/burisma.png')}}" class="mb-5 mt-5" height="100%" alt="">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus
                                    rhoncus ante a ornare dictum. Cras ultrices urna vel purus lobortis
                                    sagittis. Pellentesque nibh eros, mattis id condimentum id, egestas
                                    ac eros. Phasellus id ornare dui. Pellentesque posuere eleifend
                                    iaculis. Vestibulum eleifend turpis a tempor egestas.
                                </p>
                                <br>
                                <h4>
                                    <b>Tri Rismaharini </b>, Walikota Surabaya
                                </h4>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <img src="{{theme_asset('css/asset/icon/arrow-left.png')}}" alt="" srcset="">
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <img src="{{theme_asset('css/asset/icon/arrow-right.png')}}" alt="" srcset="">
            </a>
            
        </div>
    </div>
</section>
<!-- Testimoni End -->


<!-- Social Media Begin -->
<section>
    <div class="container">
        <h3 class="text-primary">Ayo, gabung ke SurabayaDev</h3>
        <p>Ikuti diskusi dan informasi terbaru seputar acara-acara menarik kami <br>
        di grup Telegram, fanpage Facebook, dan Instagram kami.</p>
        
        <div class="row mt-5">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <a href="" class="btn btn-telegram btn-block">
                    <img src="{{theme_asset('css/asset/icon/telegram.svg')}}" class="mr-3" alt="" srcset="">
                    Telegram
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <a href="" class="btn btn-facebook btn-block">
                    <img src="{{theme_asset('css/asset/icon/facebook.svg')}}" class="mr-3" alt="" srcset="">
                    Facebook
                </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                <a href="" class="btn btn-instagram btn-block">
                    <img src="{{theme_asset('css/asset/icon/instagram.svg')}}" class="mr-3" alt="" srcset="">
                    Instagram
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Social Media End -->


<!-- Sponsored Begin -->
<section>
    <div class="container">
        <h3 class="text-primary">Sponsored By</h3>
        <div class="row mt-5">
            <div class="col-md-4">
                <img src="{{asset('img/sponsor1.png')}}" width="100%" alt="" srcset="">
            </div>
            <div class="col-md-4">
                <img src="{{asset('img/sponsor2.png')}}" width="100%" alt="" srcset="">
            </div>
            <div class="col-md-4">
                <img src="{{asset('img/sponsor3.png')}}" width="100%" alt="" srcset="">
            </div>
            <div class="col-md-4">
                <img src="{{asset('img/sponsor4.png')}}" width="100%" alt="" srcset="">
            </div>
        </div>
    </div>
</section>
<!-- Sponsored End -->
@endsection
