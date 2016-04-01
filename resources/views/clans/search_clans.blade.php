@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-4">
		<form method="get" action="/clans/searchClanResults">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="clan_tag">Clan Tag</label>
				<input type="text" name="clan_tag" class="form-control" placeholder="Clan Tag" id="clan-tag-search" autofocus="true">
			</div>
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
	</div><!-- /.column -->
</div><!-- /.row -->

@stop

@section('scripts')

<script>

$('#clan-tag-search').on('keyup keydown', function() {
	if($(this).val().length > 0)
		$(this).addClass('transformUp');
	else
		$(this).removeClass('transformUp');
});

</script>

@stop