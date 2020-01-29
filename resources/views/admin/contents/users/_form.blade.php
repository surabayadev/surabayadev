<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Personal Details</h6>
</div>
<div class="card-body">
    @if (!empty($user))
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Gravatar Photo</label>
            <div class="col-sm-9">
                <img src="{{ avatar($user) }}" alt="">
            </div>
        </div>
    @endif

    <div class="form-group row">
        {!! Form::label('name', 'Name*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Sobirin Rodriguez', 'style' => 'font-size: 18px;']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('username', 'Username*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">{{ str_finish(route('user.show', ''), '/') }}</span>
                </div>
                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'sobirin-rodriguez']) !!}
            </div>
            <small class="form-text text-muted">Username should be alpha-dash-numeric and lowercased are allowed.</small>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('email', 'Email*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('password', 'Password*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            {!! Form::text('password', '', ['class' => 'form-control', 'placeholder' => 'Min: 6']) !!}

            @if (empty($isProfile))
                @if (!empty($user))
                    <small class="form-text text-danger">You are about to update user password, <b>Better leave this input blank!</b></small>
                @endif

                <small class="form-text text-muted">User can change this password in their profile page.</small>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('role_id', 'Role*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-6">
            {!! Form::select('role_id', [
                3 => 'Member',
                2 => 'Editor / Organizer',
            ], null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('gender', 'Gender*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="form-check form-check-inline">
                {!! Form::radio('gender', 'm', true, ['class' => 'form-check-input', 'id' => 'gender-male']) !!}
                <label class="form-check-label" for="gender-male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                {!! Form::radio('gender', 'f', null, ['class' => 'form-check-input', 'id' => 'gender-female']) !!}
                <label class="form-check-label" for="gender-female">Female</label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('phone', 'Phone*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">+62</span>
                </div>
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('province', 'Province*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            {!! Form::text('province', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('city', 'City*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('address', 'Address*', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => 3]) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('job', 'Job', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            {!! Form::text('job', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('company', 'Company', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            {!! Form::text('company', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold">Socials</h6>
</div>
<div class="card-body">
    <div class="form-group row">
        {!! Form::label('website', 'Website', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' =>
                'https://sobirin-rodriguez.com']) !!}
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('github', 'Github', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://github.com/</span>
                </div>
                {!! Form::text('github', null, ['class' => 'form-control', 'placeholder' =>
                'sobirin-rodriguez']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('linkedin', 'Linkedin', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://linkedin.com/</span>
                </div>
                {!! Form::text('linkedin', null, ['class' => 'form-control', 'placeholder' =>
                'sobirin-rodriguez']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://facebook.com/</span>
                </div>
                {!! Form::text('facebook', null, ['class' => 'form-control', 'placeholder' =>
                'sobirin-rodriguez']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('instagram', 'Instagram', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://instagram.com/</span>
                </div>
                {!! Form::text('instagram', null, ['class' => 'form-control', 'placeholder' =>
                'sobirin-rodriguez']) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('twitter', 'Twitter', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">https://twitter.com/</span>
                </div>
                {!! Form::text('twitter', null, ['class' => 'form-control', 'placeholder' =>
                'sobirin-rodriguez']) !!}
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-center">
    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary mr-3">&laquo; Back</a>
    <button type="submit" class="btn btn-lg btn-primary">Save &raquo;</button>
</div>