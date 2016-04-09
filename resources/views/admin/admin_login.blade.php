@extends('layouts.admin')

@section('content')

@if(session('authMessage'))
<div class="row">
	<div class="col-lg-6 auth-alert-container">
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			{{ session('authMessage') }}
		</div>
	</div>
</div><!-- /.row -->
@endif

<div class="row">
	<div class="col-lg-offset-1 col-lg-6">
		<form method="post" action="/admin/login" id="admin-login-form">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" 
										placeholder="Username" autofocus="true" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="password">Username</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div><!-- /.col -->
</div><!-- /.row -->

@stop

@section('scripts')

@stop