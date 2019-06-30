<section style="padding: 80px 0px 40px 0px;">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-5">
                Edit Profile
                <a href="{{ route('profile') }}" class="btn btn-sm btn-secondary">View Profile</a>
            </h2>

            {!! Form::model($user, ['method' => 'PUT', 'url' => route('profile.update')]) !!}

                <div class="mb-5">
                    <h3 class="my-4 pb-2 font-weight-normal border-bottom">Personal Detail</h3>
                    <div class="form-group row">
                        {!! Form::label('name', 'Nama Lengkap*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name', null, ['class' => 'form-control '. ($errors->first('name') ? 'is-invalid' : ''), 'placeholder' => 'Sobirin Rodriguez']) !!}
                        </div>
                    </div>
    
                    <div class="form-group row">
                        {!! Form::label('username', 'Username*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">{{ str_finish(route('user.show', ''), '/') }}</span>
                                </div>
                                {!! Form::text('username', null, ['class' => 'form-control '. ($errors->first('username') ? 'is-invalid' : ''), 'placeholder' => 'sobirin-rodriguez']) !!}
                            </div>
                            <small class="form-text text-muted">Username should be alpha-dash-numeric and lowercased are allowed.</small>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        {!! Form::label('email', 'Alamat Email*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-sm-9">
                            {!! Form::email('email', null, ['class' => 'form-control '. ($errors->first('email') ? 'is-invalid' : ''), 'placeholder' => 'ex: sobirin@surabayadev.org']) !!}
                        </div>
                    </div>
    
                    <div class="form-group row">
                        {!! Form::label('gender', 'Gender*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9 pt-2">
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
                        {!! Form::label('phone', 'Phone*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">+62</span>
                                </div>
                                {!! Form::text('phone', null, ['class' => 'form-control '. ($errors->first('phone') ? 'is-invalid' : '')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('province', 'Province*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('province', null, ['class' => 'form-control '. ($errors->first('province') ? 'is-invalid' : '')]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('city', 'City*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('city', null, ['class' => 'form-control '. ($errors->first('city') ? 'is-invalid' : '')]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('address', 'Address*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('address', null, ['class' => 'form-control '. ($errors->first('address') ? 'is-invalid' : ''), 'rows' => 3]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('job', 'Job', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('job', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        {!! Form::label('status', 'Personal Privacy', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9 pt-2">
                            <div class="form-check form-check-inline">
                                {!! Form::radio('status', \App\Models\User::STATUS_NORMAL, true, ['class' => 'form-check-input', 'id' => 'status-public']) !!}
                                <label class="form-check-label" for="status-public">Public</label>
                            </div>
                            <div class="form-check form-check-inline">
                                {!! Form::radio('status', \App\Models\User::STATUS_PRIVATE, null, ['class' => 'form-check-input', 'id' => 'status-private']) !!}
                                <label class="form-check-label" for="status-private">Private</label>
                            </div>

                            <p class="help-block text-muted"><small>Apakah info privacy anda ditampilkan untuk public?</small></p>
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <h3 class="my-4 pb-2 font-weight-normal border-bottom">Social Links</h3>

                    <div class="form-group row">
                        {!! Form::label('website', 'Website', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' =>
                                'https://sobirin-rodriguez.com']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('github', 'Github', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
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
                        {!! Form::label('linkedin', 'Linkedin', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
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
                        {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
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
                        {!! Form::label('instagram', 'Instagram', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
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
                        {!! Form::label('twitter', 'Twitter', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
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

                <div class="mt-5 pt-4 border-top form-group text-center">
                    <button type="submit" class="btn btn-lg btn-primary">Save Profile</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</section>