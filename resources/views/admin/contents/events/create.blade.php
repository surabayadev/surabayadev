@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Create Event
    </h1>
</div>

<div class="card shadow mb-4">
    {!! Form::open(['url' => route('admin.event.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'main-form']) !!}
    @include('admin::contents.events._form')
    {!! Form::close() !!}
</div>

@stop