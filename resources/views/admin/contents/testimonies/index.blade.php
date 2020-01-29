@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Manage Testimonies <a href="{{ route('admin.testimonies.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
    </h1>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 40px;">No</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = $testimonies->firstItem();
                    @endphp
                    @forelse ($testimonies as $testi)

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if ($testi->user)
                                <a href="{{ route('admin.user.edit', $testi->user_id) }}" class="text-decoration-none">
                            @else
                                <a class="text-decoration-none">
                            @endif
                                    {{ $testi->offsetGet('name') }}
                                </a>
                            <small class="d-block text-muted">{{ $testi->offsetGet('username') }}</small>
                            <span class="d-block">{{ $testi->offsetGet('email') }}</span>
                        </td>
                        <td>{{ $testi->content }}</td>
                        <td>
                            @if ($testi->status === 0)
                                <span class="text-muted">Hidden</span>
                                @else
                                <span class="text-success">Published</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.testimonies.edit', $testi->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.testimonies.destroy', $testi->id) }}" class="btn btn-sm btn-danger" data-method="delete" data-confirm="Are you sure?"><i class="fa fa-trash"></i></a>
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

        {!! $testimonies->appends([])->links() !!}
    </div>
</div>
@stop