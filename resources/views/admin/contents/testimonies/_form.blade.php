@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@stop

@section('foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $noUser = $('#noUser')
    $single = $('.select2-single').select2()
    $single.on('change', function (e) {
        if (e.target.value) {
            $noUser.addClass('d-none').removeClass('d-block')
        } else {
            $noUser.addClass('d-block').removeClass('d-none')
        }
    })
    $single.trigger('change')
});
</script>
@stop

<div class="card-body">
    <div class="form-group row">
        {!! Form::label('user_id', 'User', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-8">
            @php
            $valUser = (!empty($testimony) && !empty($testimony->user_id)) ? $testimony->user_id : null ;
            @endphp
            {!! Form::select('user_id', $userDropdown, $valUser, ['class' => 'form-control select2-single', 'placeholder' => '&laquo; Manually Fill User Data &raquo;']) !!}
        </div>
    </div>

    <div id="noUser">
        <div class="form-group row">
            {!! Form::label('name', 'Name*', ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Sobirin Rodriguez', 'style' => 'font-size: 18px;']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('email', 'Email*', ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('job', 'Job', ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('job', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('avatar', 'Avatar URL', ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-9">
                {!! Form::textarea('avatar', null, ['class' => 'form-control', 'rows' => 3]) !!}
            </div>
        </div>
    </div>
    
    <hr>

    <div class="form-group row">
        {!! Form::label('status', 'Status*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-4">
            <div class="form-check form-check-inline">
                {!! Form::radio('status', App\Models\Testimony::STATUS_HIDE, null, ['class' => 'form-check-input', 'id' => 'status_hide']) !!}
                <label class="form-check-label" for="status_hide">Hide</label>
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('status', App\Models\Testimony::STATUS_PUBLISH, true, ['class' => 'form-check-input', 'id' => 'status_publish']) !!}
                <label class="form-check-label" for="status_publish">Publish</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('content', 'Content*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 6]) !!}
        </div>
    </div>
</div>

<div class="card-footer text-center">
    <a href="{{ route('admin.testimonies.index') }}" class="btn btn-secondary mr-3">&laquo; Back</a>
    <button type="submit" class="btn btn-lg btn-primary">Save &raquo;</button>
</div>