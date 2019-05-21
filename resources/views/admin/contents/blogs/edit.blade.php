@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Edit Blog: {{ $blog->title }}
    </h1>
</div>

<div class="card shadow mb-4">
    {!! Form::model($blog, ['url' => route('admin.blog.update', $blog->id), 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
    @include('admin::contents.blogs._form')
    {!! Form::close() !!}
</div>

@stop