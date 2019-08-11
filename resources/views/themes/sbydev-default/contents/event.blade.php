@extends('theme::layouts.default')

@section('content')
    <section class="pt-5">
        <div class="container">
            <h3>Event Documentation</h3>
            <div class="mt-4">
                @forelse ($events as $ev)

                    <div class="media mt-4 pb-4 border-bottom">
                        <a href="{{ route('event.show', $ev->slug) }}">
                            <img src="{{ $ev->cover }}" class="align-self-start mr-3 img-thumbnail" alt="{{ $ev->name }}" style="width: 400px;">
                        </a>

                        <div class="media-body">
                            <h5 class="mt-2">
                                <span class="d-block mb-2 text-secondary" style="font-size: 90%;">
                                    {{ date_formatted($ev->start_date) }}
                                    &nbsp; &raquo; &nbsp;
                                    {{ date_formatted($ev->end_date) }}
                                </span>
                                <a href="{{ route('event.show', $ev->slug) }}" class="d-block text-primary">{{ $ev->name }}</a>
                            </h5>
                            <div class="my-2">
                                {{ $ev->description }}
                            </div>
                            <a href="{{ route('event.show', $ev->slug) }}" class="mt-4 btn btn-primary">Read More &raquo;</a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">There is no Event yet</p>
                @endforelse

                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        {{-- <button type="button" class="btn btn-outline-primary">View More</button> --}}
                        {!! $events->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop