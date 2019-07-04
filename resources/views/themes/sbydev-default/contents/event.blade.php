@extends('theme::layouts.default')

@section('content')
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