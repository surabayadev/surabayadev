@extends('theme::layouts.default')

@section('content')

@if (auth()->user()->hasJoined($event))
    <div class="alert alert-info m-0 text-center text-success">
        <i class="fa fa-check"></i> You are joined this event.
    </div>
@endif

<section id="upcoming" class="bg-gradient-1">
    <div class="container">
        <h4>Upcoming Event</h4>
        <div class="row">
            <div class="col-md-6">
                <h1 class="mt-4">{{ $event->name }}</h1>
                <h4 class="mt-3">{{ $event->created_at->format('l, d F Y') }}</h4>
                <h5>at: {{ $event->address . ' '. $event->city }}</h5>
                <p class="mt-5">
                    {!! $event->content !!}
                </p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5 pt-5">
                <div class="col d-flex justify-content-center">
                    <h3>Speaker</h3>
                </div>
                <div class="row mt-3">
                    @forelse ($speakers as $sp)
                    <div class="col text-center">
                        <a href="{{ route('user.show', $sp->username) }}" class="text-white text-decoration-none">
                            <div class="speaker-photo">
                                {{-- <img src="{{ theme_asset('css/asset/img/dummy.svg') }}"> --}}
                                <img src="{{ avatar($sp->email) }}">
                            </div>
                            <h5 class="mt-4">{{ $sp->name }}</h5>
                            <p>{{ $sp->job }}</p>
                        </a>
                    </div>
                    @empty
                    <div class="col">
                        <h4 class="text-center text-light py-5">To be determined</h4>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        @if (now()->lessThan($event->start_date))
            @if (auth()->user()->hasJoined($event))
                <a href="{{ route('event.cancelJoin', $event->slug) }}" data-method="PUT" data-confirm="Are you sure to cancel?" class="btn btn-danger">
                    &times; &nbsp; Cancel Join
                </a>
            @else
                <a href="{{ route('event.join', $event->slug) }}" data-method="PUT" class="btn btn-light">Join Event</a>
            @endif
            
            &nbsp;&nbsp;
        @endif

        <div class="dropdown d-inline">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Share
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"><i class="fab fa-facebook"></i> &nbsp; Facebook</a>

                <a class="dropdown-item" href="whatsapp://send?text=Hai, coba lihat event keren dari Surabayadev: %0A%0A{{ $event->name }} %0A%0A{{ request()->url() }}" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i> &nbsp; Whatsapp</a>

                <a class="dropdown-item" target="_blank" href="http://twitter.com/share?text=Hai, coba lihat event keren dari Surabayadev: %0A%0A&url={{ request()->url() }}&hashtags=surabayadev"><i class="fab fa-twitter"></i> &nbsp; Twitter</a>
            </div>
        </div>
    </div>
</section>

<section style="padding: 80px 0px 40px 0px;">
    <div class="container">
        <div class="col-md-8 offset-md-2">

            @if ($event->cover)
                <div class="mb-5">
                    <img src="{{ $event->cover }}" alt="{{ $event->name }}" class="img-thumbnail rounded mx-auto d-block">
                </div>
            @endif

            <h3 class="mb-3">
                Fellows already joined ({{ $event->getMembers()->count() }})
            </h3>
            
            <div class="row">
                @forelse ($event->getMembers() as $m)
                    <div class="col-md-2">
                        <a href="{{ route('user.show', $m->username) }}" class="d-block mb-3" title="{{ $m->name }}">
                            <img src="{{ avatar('akiddcode@gmail.com') }}" class="img-thumbnail">
                            <span class="d-block overflow-hidden text-nowrap" style="width: 100%; height: 20px;">{{ $m->name }}</span>
                        </a>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p class="lead text-muted text-center">Be the first to join this event...</p>
                    </div>
                @endforelse

                <div class="col-md-12 mt-3">
                    <a href="" class="btn btn-block btn-secondary">And 8 others</a>
                </div>
            </div>
            
            <p class="mb-5">&nbsp;</p><br>

            <h3 class="mb-3">Documentation</h3>

            <p class="text-muted">Soon...</p>
        </div>
    </div>
</section>

@stop