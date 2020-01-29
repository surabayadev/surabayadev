@extends('theme::layouts.default')

@section('content')

@if (optional(auth()->user())->can('join', $event))
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
                <h4 class="mt-3">
                    <span class="d-block"><i class="fa fa-clock"></i> Start at: {{ $event->start_date->format('l, d F Y') }}</span>
                    <span class="d-block"><i class="fa fa-clock"></i> End at: {{ $event->end_date->format('l, d F Y') }}</span>
                </h4>
                <h5>at: {{ $event->address . ' '. $event->city }}</h5>
                <p class="mt-5">
                    {{-- {!! $event->renderDescription() !!} --}}
                    {!! $event->content !!}
                </p>

                <div class="mt-5">
                    @if (now()->lessThan($event->start_date))
                        @if (optional(auth()->user())->hasJoined($event))
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
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-5 pt-5">
                @if ($event->cover)
                <div class="mb-5">
                    <img src="{{ $event->cover }}" alt="{{ $event->name }}" class="img-thumbnail rounded mx-auto d-block">
                </div>
                @endif

                <div class="col d-flex justify-content-center">
                    <h3>Speaker</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="d-flex flex-wrap justify-content-center text-center">
                            @forelse ($speakers as $sp)
                                <a href="{{ route('user.show', $sp->username) }}" class="speaker-photo d-inline-block mb-1 mx-1 text-white text-decoration-none" style="width: 120px;">
                                    <img src="{{ avatar($sp) }}" style="width: 100%;">
                                    <h5 class="mt-1">{{ $sp->name }}</h5>
                                    <p>{{ $sp->job }}</p>
                                </a>
                            @empty
                                <h4 class="text-center text-light py-5">To be determined</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section style="padding: 80px 0px 40px 0px;">
    <div class="container">
        <div class="col-md-8 offset-md-2">

            <h3 class="mb-3">
                Fellows already joined ({{ $event->getMembers()->count() }})
            </h3>
            
            <div class="row">
                <div class="col-md-12">
                    @forelse ($event->getMembers() as $m)
                        <a href="{{ route('user.show', $m->username) }}" class="d-inline-block mb-3 mx-1" title="{{ $m->name }}" data-toggle="tooltip" title="{{ $m->name }}" style="width: 100px; height: 100px;">
                            <img src="{{ avatar(App\Models\User::find(8)) }}" class="img-thumbnail rounded-circle">
                            <span class="d-block text-truncate text-center" style="width: 100%; height: 20px;">{{ $m->name }}</span>
                        </a>
                    @empty
                        <p class="lead text-muted text-center">Be the first to join this event...</p>
                    @endforelse

                    <div class="mt-3">
                        <a href="" class="btn btn-block btn-secondary">And 8 others</a>
                    </div>
                </div>

            </div>
            
            <p class="mb-5">&nbsp;</p><br>

            <h3 class="mb-3">Documentation</h3>

            <p class="text-muted">Soon...</p>
        </div>
    </div>
</section>

@stop