@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<p class="admin-action-text" id="clan-members-action">
			<span class="label label-danger">No status</span>
			<a href="/admin/refresh_clans" class="data-refresh-link" id="refresh-clans-link">Refresh Stored Clans (+ Members)</a>
		</p>
		<p class="admin-action-text" id="leagues-action">
			<span class="label label-danger">No status</span>
			<a href="/admin/refresh_leagues" class="data-refresh-link" id="refresh-leagues-link">Refresh Leagues</a>
		</p>
		<p class="admin-action-text" id="locations-action">
			<span class="label label-danger">No status</span>
			<a href="/admin/refresh_locations" class="data-refresh-link" id="refresh-locations-link">Refresh Locations</a>
		</p>
	</div>
</div>

@stop

@section('scripts')

<script>

$('.data-refresh-link').click(function() {
	var p = $(this).parent();
	var label = p.children('.label');
	label.removeClass('label-danger').addClass('label-warning');
	label.html('Updating <i class="fa fa-spinner fa-spin status-animation"></i>');
	$.ajax({
		url: $(this).attr('href'),
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			label.removeClass('label-warning').addClass('label-success');
			label.html('Complete <i class="fa fa-check status-animation"></i>');
		}
	});
	event.preventDefault();
});

// $('#refresh-clans-link').click(function() {
// 	var p = $(this).parent();
	
// 	$.ajax({
// 		url: $(this).attr('href'),
// 		type: 'GET',
// 		dataType: 'json',
// 		success: function(data) {
// 			console.log(data.message);
// 		}
// 	});
// 	event.preventDefault();
// });

// $('#refresh-leagues-link').click(function() {
// 	var p = $(this).parent();
	
// 	$.ajax({
// 		url: $(this).attr('href'),
// 		type: 'GET',
// 		dataType: 'json',
// 		success: function(data) {
// 			console.log(data.message);
// 		}
// 	});
// 	event.preventDefault();
// });

// $('#refresh-locations-link').click(function() {
// 	var p = $(this).parent();

// 	$.ajax({
// 		url: $(this).attr('href'),
// 		type: 'GET',
// 		dataType: 'json',
// 		success: function(data) {
// 			console.log(data.message);
// 		}
// 	});
// 	event.preventDefault();
// });

</script>

@stop