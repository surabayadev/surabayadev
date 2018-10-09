@extends('theme::layout')

@section('content')
    
    <div class="container">
        <section id="event" class="section">
            <h2 class="section-title">Event</h2>
            <p class="lead section-description">Kita menyelenggarakan event exclusive (Seminar, Workshop, Gathering) secara rutin sebulan sekali. Terkadang para member juga menjadwalkan aktifitas kopdar sendiri.</p>

            <div class="section-content">
                <div class="card-columns">
                @for ($i = 0; $i < 6; $i++)
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
            <div class="section-footer text-center">
                <a href="" class="btn btn-success btn-lg">Lihat Event Lainnya &raquo;</a>
            </div>
        </section>
    </div>
    

    <div style="min-height: 500px;"></div>

@stop