@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header text-center">Ubah Password</h1>
	</div>
</div>
<div class="col-md-8 col-md-offset-2">
	<form action="{{ action('UsersController@ubahpassword') }}" method="post">
		{{csrf_field()}}
		<div class="form-group">
			<input type="password" name="password_lama" placeholder="Masukkan Passwod Lama" class="form-control" required>
		</div>
		<div class="form-group">
			<input type="password" name="password_baru" placeholder="Masukkan Passwod Baru" class="form-control" required>
		</div>
		<div class="form-group">
			<input type="password" id="password_confirm" name="new_password_confirm" placeholder="Konfirmasi Passwod Baru" class="form-control" required>
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit"> Ganti Password</button>
		</div>
	</form>
</div>
@endsection