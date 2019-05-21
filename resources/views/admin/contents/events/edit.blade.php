@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Edit Event "{{ $event->name }}"
    </h1>
</div>

<div class="card shadow mb-4">
    {!! Form::model($event, ['url' => route('admin.event.update', $event->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'main-form']) !!}
    @include('admin::contents.events._form')
    {!! Form::close() !!}
</div>

@stop