@extends('admin::layouts.default') 
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        Manage Event
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
    </h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 d-inline font-weight-bold">
            Total All Events: {{ $eventCount }}
        </h6>
    </div>
    <div class="card-body">
        {!! Form::model(request()->all(), ['method' => 'GET', 'class' => 'form-inline mb-4 justify-content-center']) !!}
            <div class="mr-2">
                {!! Form::select('status', [
                    'all' => 'Status: All',
                    App\Models\Event::STATUS_PUBLISH => 'Status: Publish',
                    App\Models\Event::STATUS_HIDE => 'Status: Hide',
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
                        <th>Participants</th>
                        <th>Status</th>
                        <th style="width: 205px;">Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Participants</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                    $no = $events->firstItem();
                    @endphp
                    @forelse ($events as $evt)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if ($evt->ig_hashtag)
                                <a href="https://www.instagram.com/explore/tags/{{ $evt->ig_hashtag }}" target="_blank" class="text-decoration-none @if($evt->ig_hashtag_status == 'success') text-success @elseif($evt->ig_hashtag_status == 'failed') text-danger @else  @endif" data-toggle="tooltip" title="Fetch Photos: {{ $evt->ig_hashtag_status }}">
                                    <i class="fab fa-instagram {{ $evt->ig_hashtag_status == 'pending' ? 'fa-spin' : '' }}"></i>
                                </a>
                            @endif
                            {{ $evt->name }}
                        </td>
                        <td>
                            {{ $evt->getMembers()->count() }} (max: {{ $evt->participant_limit }})
                        </td>
                        <td>{!! $evt->getStatusText($evt, true) !!}</td>
                        <td>
                            <span class="badge" title="{{ date_formatted($evt->start_date, false) }}">
                                <i class="fa fa-clock text-success"></i> {{ date_formatted($evt->start_date) }}
                            </span>
                            <span class="badge" title="{{ date_formatted($evt->end_date, false) }}">
                                <i class="fa fa-clock text-danger"></i> {{ date_formatted($evt->end_date) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.event.participants', $evt->id) }}" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" title="Participants"><i class="fa fa-users"></i></a>
                            <a href="{{ route('admin.event.edit', $evt->id) }}" class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                            <a href="{{ route('admin.event.destroy', $evt->id) }}" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" title="Delete" data-method="DELETE" data-confirm="Are you sure?"><i class="fa fa-trash"></i></a>
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

        {!! $events->appends([
            'status' => request('status'),
            'search' => request('search'),
        ])->links() !!}
    </div>
</div>
@stop