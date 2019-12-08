@extends('admin::layouts.default') 

@section('content')
<div class="mb-4">
    <h1 class="h3 mb-2 text-gray-800">{{ $title }}</h1>
    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-primary btn-sm mr-2"><i class="fa fa-pencil-alt"></i> Edit</a>
    <a href="{{ route('admin.event.destroy', $event->id) }}" class="btn btn-danger btn-sm" data-method="DELETE" data-confirm="Are you sure?"><i class="fa fa-trash"></i> Delete</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Speakers ({{ $event->getSpeakers()->count() }})</h6>
    </div>
    <div class="card-body">
        @forelse ($event->getSpeakers() as $sp)
            <a href="" class="d-inline-block mx-2" data-toggle="tooltip" title="{{ $sp->name }}" style="width: 100px; height: 100px;">
                <img src="{{ avatar($sp->email) }}" class="img-thumbnail rounded-circle">
                <span class="d-block text-center text-truncate">{{ $sp->name }}</span>
            </a>
        @empty
            To be Determined
        @endforelse
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Organizers ({{ $event->getOrganizers()->count() }})</h6>
    </div>
    <div class="card-body">
        @forelse ($event->getOrganizers() as $org)
            <a href="" class="d-inline-block mx-2" data-toggle="tooltip" title="{{ $org->name }}" style="width: 100px; height: 100px;">
                <img src="{{ avatar($org->email) }}" class="img-thumbnail rounded-circle">
                <span class="d-block text-center text-truncate">{{ $org->name }}</span>
            </a>
        @empty
            To be Determined
        @endforelse
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Members ({{ $event->getMembers()->count() }})</h6>
    </div>
    <div class="card-body">
        @forelse ($event->getMembers() as $m)
            <a href="" class="d-inline-block mx-2" data-toggle="tooltip" title="{{ $m->name }}" style="width: 100px; height: 100px;">
                <img src="{{ avatar($m->email) }}" class="img-thumbnail rounded-circle">
                <span class="d-block text-center text-truncate">{{ $m->name }}</span>
            </a>
        @empty
            To be Determined
        @endforelse
    </div>
</div>
@stop