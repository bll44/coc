@extends('layouts.master')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Clans</h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-5">
				<form action="/clans/search">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="clan_tag">Search by Clan Tag</label>
						<input type="text" name="clan_tag" class="form-control" placeholder="Clan tag" id="clan-tag-search">
					</div>
					<button type="button" class="btn btn-primary" id="clan-search-btn">Search</button>
				</form>
			</div>
		</div><!-- /.row -->
	</div><!-- /.panel-body -->
</div><!-- /.panel -->

@stop

@section('scripts')

<script>

$('#clan-tag-search').on('keydown keyup', function() {
	if($(this).val().length > 0)
		$(this).addClass('transform-up');
	else
		$(this).removeClass('transform-up');
});

$('#clan-search-btn').click(function() {
	var form = $(this).parent();
	var url = form.attr('action');
	
	
	$.ajax({
		url: url,
		type: 'GET',
		dataType: 'json',
		data: formData,
		success: function(data) {
			console.log(data.clan.name);
		}
	});
});

</script>

@stop