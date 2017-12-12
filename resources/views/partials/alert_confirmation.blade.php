<div class="alert alert-warning text-center" style="margin: 0px; border-radius: 0px;">
	Silahkan konfirmasi email <b>{{ auth()->user()['email'] }}</b> terlebih dahulu. <a href="{{ route('resendEmail') }}">Kirim ulang konfirmasi email</a>
</div>
