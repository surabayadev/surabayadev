@section('head')
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
  height: 100%;
  min-height: 100%;
  overflow-y: auto;
}
</style>
@stop

@section('foot')
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
var quill = new Quill('#quill-container', {
    theme: 'snow'
  });
</script>
@stop

<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Details</h6>
</div>
<div class="card-body">
    <div class="form-group row">
        {!! Form::label('title', 'Title*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('title', null, ['class' => 'form-control', 'style' => 'font-size: 18px;']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('slug', 'Slug*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">{{ str_finish(route('blog.index'), '/') }}</span>
                </div>
                {!! Form::text('slug', null, ['class' => 'form-control', 'style' => 'font-size: 18px;', 'placeholder' => 'iki-contoh-prend']) !!}
            </div>
            <small class="form-text text-muted">Slug should be alpha-dash-numeric and lowercased are allowed.</small>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('category_id', 'Category*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('category_id', $categoryDropdown, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('status', 'Status*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-4">
            {!! Form::select('status', [
            App\Models\Blog::STATUS_PUBLISH => 'Publish',
            App\Models\Blog::STATUS_HIDE => 'Hide',
            ], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('excerpt', 'Excerpt', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-8">
            {!! Form::textarea('excerpt', null, ['rows' => 4, 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Featured Cover (optional)</h6>
</div>
<div class="card-body">
    <div class="form-group row">
        {!! Form::label('cover', 'Cover', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            <div class="custom-file mb-3">
                {!! Form::file('cover', ['class' => 'custom-file-input']) !!}
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            @if (@$blog->cover)
                <div class="mb-2">
                    <img src="{{ $blog->cover }}" class="img-thumbnail">
                </div>
            @endif
        </div>
    </div>
</div>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Content</h6>
</div>
<div class="card-body">
    <div class="row justify-content-center">
        <div class="col-md-10" style="min-height: 300px;">
            {!! Form::textarea('content', null, ['class' => 'form-control d-none']) !!}
            <div id="scrolling-container">
                <div id="quill-container">{{ @$blog->content }}</div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center">
    <button type="submit" class="btn btn-lg btn-primary">Submit &raquo;</button>
</div>