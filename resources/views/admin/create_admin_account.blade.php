@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-offset-1 col-lg-6">
		<form method="post" action="/admin/create_admin_account" id="create-admin-account-form">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username" autofocus="true">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="password_confirmation">Confirm Password</label>
				<input type="password" class="form-control" name="password_confirmation" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="display_name">Display Name</label>
				<input type="text" class="form-control" name="display_name" placeholder="Display name">
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" name="admin"> Admin
				</label>
			</div><!-- /.checkbox -->
			<button type="submit" class="btn btn-primary">Create account</button>
		</form>
	</div><!-- /.col -->
</div><!-- /.row -->

@stop