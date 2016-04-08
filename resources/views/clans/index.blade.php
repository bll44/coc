@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<p>Search Clans</p>
	</div><!-- /.column -->
	<div class="col-lg-6">
		@foreach($clans as $clan)
		<p><a href="/clans/view/{{ urlencode($clan->tag) }}">{{ $clan->name }}</a></p>
		@endforeach
	</div>
</div><!-- /.row -->
<div class="row">
	<div class="col-lg-4">
		<form class="form-inline" action="/clans/searchClanResults">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="clan_tag"></label>
				<input type="text" name="clan_tag" class="form-control" id="clan-tag-search" placeholder="Clan tag">
			</div>
			<button type="submit" class="btn btn-primary">Search clans</button>
		</form>
	</div>
</div><!-- /.row -->

@stop

@section('scripts')

<script>

$('#clan-tag-search').on('keyup keydown', function() {
	if($(this).val().length > 0)
		$(this).addClass('transform-up');
	else
		$(this).removeClass('transform-up');
});

</script>

@stop