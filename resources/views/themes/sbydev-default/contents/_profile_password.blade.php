<section style="padding: 80px 0px 40px 0px;">
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-5">
                Edit Password
                <a href="{{ route('profile') }}" class="btn btn-sm btn-secondary">View Profile</a>
            </h2>

            {!! Form::open(['method' => 'PUT', 'url' => route('profile.update')]) !!}

                <div class="mb-5">
                    <div class="form-group row">
                        {!! Form::label('password', 'New Password*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::password('password', ['class' => 'form-control '. ($errors->first('password') ? 'is-invalid' : '')]) !!}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        {!! Form::label('password_confirmation', 'Confirm Password*', ['class' => 'col-sm-3 col-form-label']) !!}
                        <div class="col-md-9">
                            {!! Form::password('password_confirmation', ['class' => 'form-control '. ($errors->first('password_confirmation') ? 'is-invalid' : '')]) !!}
                        </div>
                    </div>
                </div>

                <div class="mt-5 pt-4 border-top form-group text-center">
                    <button type="submit" class="btn btn-lg btn-primary">Save Password</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</section>