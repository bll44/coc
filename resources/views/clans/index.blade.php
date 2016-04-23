@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-4">
		<form action="/clans/search?type=tag" id="clan-search-form">
			{{ csrf_field() }}
			<p>Search by...</p>
			<div class="radio">
				<label>
					<input type="radio" name="search_criteria_radio" id="tag_search_radio" value="tag" checked>
					Clan Tag
				</label>
			</div><!-- /.radio -->
			<div class="radio">
				<label>
					<input type="radio" name="search_criteria_radio" id="name_search_radio" value="name">
					Clan Name
				</label>
			</div><!-- /.radio -->
			<div class="form-group">
				<!-- <label for="clan_tag">Search by...</label> -->
				<input type="text" name="search_query" class="form-control" placeholder="Clan tag" id="clan_search">
			</div>
			<button type="button" class="btn btn-primary" id="clan-search-btn">Search</button>
		</form>
	</div><!-- /.col -->
	<div class="col-lg-offset-1 col-lg-7">
		@foreach($clans as $clan)
		<p><a href="/clans/view/{{ urlencode($clan->tag) }}">{{ $clan->name }}</a></p>
		@endforeach
	</div><!-- /.col -->
</div><!-- /.row -->

@stop

@section('scripts')

<script>
	var form = $('#clan-search-form');

	$('#clan-tag-search').on('keydown keyup', function() {
		if($(this).val().length > 0)
			$(this).addClass('transform-up');
		else
			$(this).removeClass('transform-up');
	});

	$('#clan-search-btn').click(function() {
		var url = form.attr('action');
		var formData = { query: $('#clan_search').val() };

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

	$('input[name=search_criteria_radio]').click(function() {
		if($(this).val() === 'tag')
		{
			form.attr('action', '/clans/search?type=tag');
			$('#clan_search').attr('placeholder', 'Clan tag');
		}
		else if($(this).val() === 'name')
		{
			form.attr('action', '/clans/search?type=name');
			$('#clan_search').attr('placeholder', 'Clan name');
		}
	});

</script>

@stop