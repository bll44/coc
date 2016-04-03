@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<p><a href="/admin/refresh_clans" id="refresh-clans-link">Refresh Stored Clans (+ Members)</a></p>
		<p><a href="/admin/refresh_leagues" id="refresh-leagues-link">Refresh Leagues</a></p>
		<p><a href="/admin/refresh_locations" id="refresh-locations-link">Refresh Locations</a></p>
	</div>
</div>

@stop

@section('scripts')

<script>

$('#refresh-clans-link').click(function() {
	$.ajax({
		url: $(this).attr('href'),
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			console.log(data.message);
		}
	});
	event.preventDefault();
});

$('#refresh-leagues-link').click(function() {
	$.ajax({
		url: $(this).attr('href'),
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			console.log(data.message);
		}
	});
	event.preventDefault();
});

$('#refresh-locations-link').click(function() {
	$.ajax({
		url: $(this).attr('href'),
		type: 'GET',
		dataType: 'json',
		success: function(data) {
			console.log(data.message);
		}
	});
	event.preventDefault();
});

</script>

@stop