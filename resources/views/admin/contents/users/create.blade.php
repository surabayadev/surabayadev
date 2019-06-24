@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        {{ $title }}
    </h1>
</div>

<div class="card shadow mb-4">
    {!! Form::open(['url' => route('admin.user.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'main-form']) !!}
    @include('admin::contents.users._form')
    {!! Form::close() !!}
</div>

@stop