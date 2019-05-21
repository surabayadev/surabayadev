@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Manage Blog
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
    </h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">
            <span class="mr-2">All: {{ $blogCounts['all'] }}</span>
            <span class="mr-2">Published: {{ $blogCounts['publish'] }}</span>
            <span class="mr-2">Draft/Hidden: {{ $blogCounts['hide'] }}</span>
        </h6>
    </div>
    <div class="card-body">
        {!! Form::model(request()->all(), ['method' => 'GET', 'class' => 'form-inline mb-3 justify-content-center']) !!}
            <div class="mr-2">
                {!! Form::select('status', [
                    'all' => 'Status: All',
                    App\Models\Blog::STATUS_PUBLISH => 'Status: Publish',
                    App\Models\Blog::STATUS_HIDE => 'Status: Hide',
                ], null, ['class' => 'form-control']) !!}
            </div>
            <div class="mr-2">
                {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
            </div>

            <button type="submit" class="btn btn-primary">Filter &raquo;</button>
        {!! Form::close() !!}

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="width: 430px;">Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                    $no = $blogs->firstItem();
                    @endphp
                    @forelse ($blogs as $b)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $b->title }}</td>
                            <td>
                                @if ($b->category)
                                    <a href="{{ route('admin.category.edit', $b->category->id) }}">{{ $b->category->name }}</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">{!! $b->getStatusText(true) !!}</td>
                            <td>{{ date_formatted($b->created_at) }}</td>
                            <td>
                                <a href="{{ route('admin.blog.edit', 1) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('admin.blog.destroy', 1) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%">There is no data yet...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {!! $blogs->appends([
            'status' => request('status'),
            'search' => request('search'),
        ])->links() !!}
    </div>
</div>

@stop