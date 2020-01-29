@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Manage User
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
    </h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 d-inline font-weight-bold">
            Total All Users: {{ $userCount }}
        </h6>
        <h6 class="ml-3 d-inline font-weight-bold">
            Editor: {{ $editorCount }}
        </h6>
        <h6 class="ml-3 d-inline font-weight-bold">
            Member: {{ $memberCount }}
        </h6>
    </div>
    <div class="card-body">
        {!! Form::model(request()->all(), ['method' => 'GET', 'class' => 'form-inline mb-4 justify-content-center']) !!}
            <div class="mr-2">
                {!! Form::select('verification', [
                    'all' => 'Verification: All',
                    'verified' => 'Verification: Verified',
                    'pending' => 'Verification: Pending',
                ], null, ['class' => 'form-control']) !!}
            </div>
            {{-- <div class="mr-2">
                {!! Form::select('status', [
                    'all' => 'Status: All',
                    'active' => 'Status: Active',
                    'pending' => 'Status: Pending',
                    'block' => 'Status: Block',
                ], null, ['class' => 'form-control']) !!}
            </div> --}}
            <div class="mr-2">
                {!! Form::select('role', [
                    'all' => 'Role: All',
                    'member' => 'Role: Member',
                    'organizer' => 'Role: Organizer',
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Verified</th>
                        <th>Register at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Verified</th>
                        <th>Register at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                    $no = $users->firstItem();
                    @endphp
                    @forelse ($users as $u)

                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', $u->id) }}" class="text-decoration-none">
                                {{ $u->name }}
                                <b data-toggle="tooltip" title="{{ $u->gender == 'm' ? 'Male' : 'Female' }}">{!! $u->gender == 'm' ? '&#9794;' : '&#9792;' !!}</b>
                            </a>
                            <small class="d-block text-muted">{{ $u->username }}</small>
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->role->display_name }}</td>
                        {{-- <td>{!! $u->getStatusText($u, true) !!}</td> --}}
                        <td>
                            @if ($u->email_verified_at)
                                <span class="badge badge-success">Verified</span>
                            @else
                                <span class="badge badge-secondary">Pending</span>
                            @endif
                        </td>
                        <td><span title="{{ date_formatted($u->created_at, false) }}">{{ date_formatted($u->created_at) }}</span></td>
                        <td>
                            <a href="{{ route('admin.user.edit', $u->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('admin.user.destroy', $u->id) }}" class="btn btn-danger btn-sm" data-method="delete" data-confirm="Are you sure?">Delete</a>
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

        {!! $users->appends([
            'verification' => request('verification'),
            'status' => request('status'),
            'role' => request('role'),
            'search' => request('search'),
        ])->links() !!}
    </div>
</div>
@stop