@extends('theme::layout')

@section('scripts')
    <script type="text/javascript">
        {{-- Make header banner faded-autoplay with 2 seconds --}}
        $(window).on('load', function() {
            var bItems = $('.banner-item')
            var bItemsTotal = bItems.length
            var i = 0

            if(!bItems.first().hasClass('show')) {
                bItems.first().addClass('show')
            }

            var bannerAutoplay = function () {
                // hide last item
                $(bItems).last().removeClass('show')
                
                // hide previous item
                if (i !== 0) {
                    $(bItems[i-1]).removeClass('show')
                }

                // show current item
                if (!$(bItems[i]).hasClass('show')) {
                    $(bItems[i]).addClass('show')
                }

                i++

                // reset counter
                if (i == bItemsTotal) {
                    i = 0
                }
            }
            
            var bannerInterval = setInterval(bannerAutoplay, 3000)
        });
    </script>
@stop

@section('content')
    <div class="sby-banner">
        <div class="banner-inner">
            @foreach ($banners as $banner)
                <div class="banner-item fade" style="background: #fff url('{{ $banner }}') center center / cover no-repeat fixed;">
                    <img class="w-100" src="{{ $banner }}" alt="First slide">
                </div>
            @endforeach
            <div class="banner-caption">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 d-flex align-content-center flex-wrap">
                            <h2 class="banner-title">#SurabayaDev</h2>
                            <p class="banner-description">SurabayaDev adalah komunitas IT yang membantu meningkatkan dan memanfaatkan potensi pegiat IT di Indonesia khususnya Surabaya untuk muwujudkan kondisi yang saling melengkapi keahlian, semangat kerjasama, dan kolaborasi.</p>
                        </div>
                        <div class="col-md-4 d-flex align-content-center flex-wrap">
                            <div class="card bg-light">
                                <div class="card-body">
                                    {!! Form::open([]) !!}
                                        <div class="form-group">
                                            {!! Form::label('username', 'Username') !!}
                                            {!! Form::text('username', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Pick your username']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email', 'Email address') !!}
                                            {!! Form::email('email', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'you@surabayadev.org']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('password', 'Password') !!}
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Create a password']) !!}
                                            <small class="form-text text-muted">Make sure it's at least 7 characters, including a number, and a lowercase letter.</small>
                                        </div>
                                        {{-- <div class="form-group">
                                            {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password']) !!}
                                        </div> --}}
                                        <button class="btn btn-success btn-lg btn-block sby-btn-lg">Create SurabayaDev Account</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div>
            </div><!-- /.banner-caption -->
        </div>
    </div>
    <br/><br/>
    

    <section id="event" class="section">
        <div class="container">
            <h2 class="section-title">Event</h2>
            <p class="lead section-description">Kita menyelenggarakan event exclusive (Seminar, Workshop, Gathering) secara rutin sebulan sekali. Terkadang para member juga menjadwalkan aktifitas kopdar sendiri.</p>

            <div class="section-content">
                <div class="section-subcontent">
                    <h3 class="section-subtitle">Upcoming Event</h3>
                    <div class="card featured w-50" style="margin: 0px auto 50px;">
                        <img class="card-img-top" src="{{ asset('storage/upcoming-event.jpeg') }}" style="">
                        <div class="card-body">
                            <h5 class="card-title">How to be Web Developer</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="text-center">
                                <a href="#" class="btn btn-success btn-lg">Join Event &raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-subcontent">
                    <h3 class="section-subtitle">Past Events</h3>
                    <div class="card-columns">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="card">
                                <img class="card-img-top" src="{{ asset('img/event2.jpg') }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer text-muted text-right">
                                    <a href="#" class="card-link"><i class="fa fa-share-square"></i> Share</a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="section-footer text-center">
                <a href="" class="btn btn-secondary">Lihat Event Lainnya &raquo;</a>
            </div>
        </div>
    </section><!-- /#event -->


    <section id="join-telegram" class="section section-telegram">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fab fa-telegram-plane fa-10x" style="font-size: 20rem; line-height: 0.7;"></i>
                </div>
                <div class="col-md-8">
                    <div>
                        <h2 class="section-title">Join Official <b>Telegram Group</b></h2>
                        <p class="lead section-description">Untuk sharing membahas topik seputar IT dan curhat-curhat hal lain2</p>
                        <a href="https://t.me/surabayadev" target="_blank" class="btn btn-lg btn-dark">Join Telegram &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <div style="min-height: 500px;"></div>

@stop