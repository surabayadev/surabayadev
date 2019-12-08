@section('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    /* Tell Quill not to scroll */
    #quill-container {
        min-height: 200px;
    }
    
    #quill-container .ql-editor {
        font-size: 18px;
        overflow-y: visible;
    }
    
    /* Specify our own scrolling container */
    #scrolling-container {
        /* padding-bottom: 50px; */
        height: 100%;
        min-height: 100%;
        overflow-y: auto;
    }

    /* For editor content */
    .ql-editor p {
        margin-bottom: 1rem;
    }
</style>
@stop

@section('foot')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
{{-- <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script> --}}
<script>
    // // Begin Editor
    // var quill = new Quill('#quill-container', {
    //     theme: 'snow'
    // });
    
    // var form = document.querySelector('form[id="main-form"]');
    // form.onsubmit = function(e) {
    //     var editorVal = document.querySelector('#quill-container').children[0].innerHTML
    //     document.querySelector('textarea[name=content]').value = editorVal
    // };
    // // End Editor


    // Begin Date Range Picker
    var elStartDate = document.querySelector('input[name=start_date]');
    var elEndDate = document.querySelector('input[name=end_date]');
    var configDate = {
        altInput: true,
        altFormat: "F j, Y - H:i",
        enableTime: true,
        dateFormat: "Y-m-d H:i:s",
    };

    flatpickr(elStartDate, configDate);
    flatpickr(elEndDate, configDate);
    // End Date Range Picker


    // Begin Select2
    $(document).ready(function() {
        $('.select2-multiple').select2();
    });
    // End Select2
</script>
@stop

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Event Details</h6>
</div>
<div class="card-body">
    <div class="form-group row">
        {!! Form::label('name', 'Name*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('name', null, ['class' => 'form-control', 'style' => 'font-size: 18px;']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('slug', 'Slug*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">{{ str_finish(route('event.index'), '/') }}</span>
                </div>
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' =>
                'iki-contoh-prend']) !!}
            </div>
            <small class="form-text text-muted">Slug should be alpha-dash-numeric and lowercased are allowed.</small>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('status', 'Status*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-4">
            <div class="form-check form-check-inline">
                {!! Form::radio('status', App\Models\Event::STATUS_HIDE, null, ['class' => 'form-check-input', 'id' => 'status_hide']) !!}
                <label class="form-check-label" for="status_hide">Hide</label>
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('status', App\Models\Event::STATUS_PUBLISH, true, ['class' => 'form-check-input', 'id' => 'status_publish']) !!}
                <label class="form-check-label" for="status_publish">Publish</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('participant_limit', 'Participant Limit*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-4">
            {!! Form::number('participant_limit', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('start_date', 'Waktu Mulai*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-4 col-sm-8">
            {!! Form::text('start_date', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('end_date', 'Waktu Selesai*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-4 col-sm-8">
            {!! Form::text('end_date', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('city', 'City*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('address', 'Address*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('cover', 'Cover', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            <div class="mb-2">
                {!! Form::label('cover', 'Cover Url', ['class' => 'font-italic']) !!}
                {!! Form::text('cover', null, ['class' => 'form-control']) !!}
            </div>
            <div>
                <label class="font-italic">Upload File (comingsoon)</label>
                <div class="custom-file mb-3">
                    {!! Form::file('cover', ['class' => 'custom-file-input', 'disabled' => true]) !!}
                    <label class="custom-file-label">Choose file...</label>
                </div>
            </div>
            @if (@$event->cover)
                {!! Form::hidden('current_cover', $event->cover) !!}
                <div class="mb-2">
                    <img src="{{ get_image($event->cover) }}" class="img-thumbnail">
                </div>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('description', null, ['rows' => 7, 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Speakers*</h6>
</div>
<div class="card-body">
    <div class="form-group row">
        {!! Form::label('speakers', 'Speaker', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-8">
            @php
            $valSpeakers = !empty($event) ? $event->getSpeakers()->pluck('id') : null ;
            @endphp
            {!! Form::select('speakers[]', $userDropdown, $valSpeakers, ['class' => 'form-control select2-multiple', 'multiple' => true]) !!}
        </div>
    </div>
</div>
{{-- <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Content</h6>
</div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-md-10" style="min-height: 300px;">
            {!! Form::textarea('content', null, ['class' => 'form-control d-none']) !!}
            <div id="scrolling-container" class="pb-5 pt-2">
                <div id="quill-container">{!! @$event->content !!}</div>
            </div>
        </div>
    </div>
</div> --}}
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Photos</h6>
</div>
<div class="card-body">
    <div class="form-group row">
        {!! Form::label('ig_hashtag', 'Instagram Hashtag', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">#</span>
                </div>
                {!! Form::text('ig_hashtag', null, ['class' => 'form-control '. (object_get(@$event, 'ig_hashtag_status') == 'failed' ? 'is-invalid' : '')]) !!}
                @if (object_get(@$event, 'ig_hashtag_status') == 'failed')
                    <div class="invalid-feedback">Failed fetch photos in IG with this hashtag..</div>
                @endif
            </div>
            <small class="form-text text-muted">Pengambilan gambar dari instagram hashtag dilakukan melalui proses di background (cron), biasanya delay sampai 1-3 menit</small>
        </div>
    </div>
    <div>
        @if (!optional(@$event->photos)->isEmpty())
        <div class="container">
            <div class="row">
                @if (@$event)
                @foreach ($event->photos as $p)
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <a href="{{ $p->source_link }}" target="_blank" class="thumb"
                            style="display: block; overflow: hidden; width: 100%; height: 170px; margin-bottom: 20px; position: relative; justify-content: center;">
                            <img src="{{ $p->thumbnail }}" class="img-responsive">
                        </a>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
        @elseif (optional(@$event)->ig_hashtag_status == 'pending')
            <p class="text-center text-mute"><i class="fas fa-spinner fa-spin"></i> Fetching Instagram Hashtag Photos...</p>
        @elseif (optional(@$event)->ig_hashtag_status == 'success')
            <p class="text-center text-mute"> Fetching success but there is no photos in this hashtag...</p>
        @endif
    </div>
</div>

<div class="card-footer text-center">
    <a href="{{ route('admin.event.index') }}" class="btn btn-secondary mr-3">&laquo; Back</a>
    <button type="submit" class="btn btn-lg btn-primary">Save &raquo;</button>
</div>