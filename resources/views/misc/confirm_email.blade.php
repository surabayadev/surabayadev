@extends('layouts.default')

@section('content')

	<div class="container content">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div style="padding: 100px 0px;">
					<p class="lead">
						Hi <b>{{ $user['username'] }}</b>, terimakasih sudah tertarik untuk bergabung. Kami berharap anda mengkonfirmasi email yg telah kami kirim di: <b>{{ $user['email'] }}</b> terlebih dahulu.
					</p>
				</div>
			</div>
		</div>
	</div>

@endsection
