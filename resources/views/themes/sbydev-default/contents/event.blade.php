@extends('theme::layouts.default')

@section('content')
    <section id="upcoming" class="bg-gradient-1">
        <div class="container">
            <h4>Upcoming Event</h4>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="mt-4">{{ $upcoming->name }}</h1>
                    <h4 class="mt-3">{{ $upcoming->created_at->format('l, d F Y') }}</h4>
                    <h5>at: {{ $upcoming->address . ' '. $upcoming->city }}</h5>
                    <p class="mt-5">
                        {!! $upcoming->content !!}
                    </p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 pt-5">
                    <div class="col d-flex justify-content-center">
                        <h3>Our Speaker</h3>
                    </div>
                    <div class="row mt-5">
                        @forelse ($speakers as $sp)
                            <div class="col text-center">
                                <div class="speaker-photo">
                                    {{-- <img src="{{ theme_asset('css/asset/img/dummy.svg') }}"> --}}
                                    <img src="{{ avatar($sp->email) }}">
                                </div>
                                <h5 class="mt-4">{{ $sp->name }}</h5>
                                <p>{{ $sp->job }}</p>
                            </div>
                        @empty
                            <p class="text-muted">To be determined</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-light mt-4">Join Event</button>
        </div>
    </section>
    <!-- Coming Soon Event End -->

    <section>
        <div class="container">
            <h3>Event Documentation</h3>
            <div class="mt-4">
                @if (!$events->isEmpty())
                    @foreach ($events as $ev)
                        <div class="event-doc mt-5">
                            <h4>{{ $ev->name }}<span class="ml-4 text-primary">{{ date_formatted($ev->created_at) }}</span>
                            </h4>
                            @if (!$ev->photos->isEmpty())
                                <div class="row">
                                    @foreach ($ev->photos as $photo)
                                        <div class="col-6 col-md-2 event-doc-photo">
                                            <a href="">
                                                <img src="{{ $photo->thumbnail }}" alt="{{ $ev->name }}" class="img-thumbnail">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-center text-muted">No photos yet...</p>
                            @endif
                        </div>
                    @endforeach
                @endif

                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary">View More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop