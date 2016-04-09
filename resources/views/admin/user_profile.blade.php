@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h2>
			{{ Auth::user()->display_name }} <button type="button" class="btn btn-primary btn-sm" id="edit-profile-btn">Edit profile</button>
		</h2>
	</div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<p>Username: {{ Auth::user()->username }}</p>
		<p>Display name: {{ Auth::user()->display_name }}</p>
		<p>Email address: {{ Auth::user()->email }}</p>
		<p>Is Admin: <?php echo Auth::user()->admin ? 'Yes' : 'No' ?></p>
	</div><!-- /.col -->
</div><!-- /.row -->

@stop

@section('scripts')

<script>



</script>

@stop