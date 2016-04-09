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
	<div class="col-lg-12">
		<p class="admin-action-text" id="clan-members-action">
			<span class="label label-default">No status</span>
			<a href="/admin/refresh_clans" class="data-refresh-link" id="refresh-clans-link">Refresh Stored Clans (+ Members)</a>
		</p>
		<p class="admin-action-text" id="leagues-action">
			<span class="label label-default">No status</span>
			<a href="/admin/refresh_leagues" class="data-refresh-link" id="refresh-leagues-link">Refresh Leagues</a>
		</p>
		<p class="admin-action-text" id="locations-action">
			<span class="label label-default">No status</span>
			<a href="/admin/refresh_locations" class="data-refresh-link" id="refresh-locations-link">Refresh Locations</a>
		</p>
	</div>
</div><!-- /.row -->

@stop

@section('scripts')

<script>

$('.data-refresh-link').click(function() {
	var p = $(this).parent();
	var label = p.children('.label');
	label.removeClass('label-default').addClass('label-info');
	label.html('Updating <i class="fa fa-spinner fa-spin status-animation"></i>');
	$.ajax({
		url: $(this).attr('href'),
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			label.removeClass('label-info').addClass('label-success');
			label.html('Complete <i class="fa fa-check status-animation"></i>');
		}
	});
	event.preventDefault();
});

</script>

@stop