@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-4">
		<h1>{{ $clan->name }}</h1>
		<button type="button" class="btn btn-info btn-sm" id="toggle-clan-details-btn">Show Details</button>
	</div>
</div><!-- /.row -->
<div class="row">
	<div class="col-lg-6">
		<div id="clan-details-container" class="well no-display">
			<img src="{{ $clan->badge_small }}" />
			<p>Tag: #{{ $clan->tag }}</p>
			<p>Type: {{ $clan->type }}</p>
			<p>Description: {{ $clan->description }}</p>
			<p>War frequency: {{ $clan->warFrequency }}</p>
			<p>Level: {{ $clan->clanLevel }}</p>
			<p>War wins: {{ $clan->warWins }}</p>
			<p>Win streak: {{ $clan->warWinStreak }}</p>
			<p>Clan points: {{ $clan->clanPoints }}</p>
			<p>Trophies required for entry: {{ $clan->requiredTrophies }}</p>
			<p>Number of members: {{ $clan->members }}</p>
			<p><button type="button" class="btn btn-link" data-toggle="modal" data-target="#clanMembersModal">View Members</button></p>
		</div>
	</div>
</div><!-- /.row -->

<div class="row">
	<div class="col-lg-4">
		<p>Would you like to save this Clan and all of its information?</p>
	</div>
</div>
<div class="row">
	<div class="col-lg-2">
		<p><a href="/clans/save?option=yes" class="btn btn-primary btn-block">Yes</a></p>
		<p><a href="/clans/save?option=no" class="btn btn-default btn-block">No</a></p>
	</div>
</div><!-- /.row -->

@include('clans/modals/clan_members_modal')

@stop

@section('scripts')

<script>

$('#toggle-clan-details-btn').click(function(event) {
	if($('#clan-details-container').hasClass('no-display'))	{
		$('#clan-details-container').removeClass('no-display');
		$('#toggle-clan-details-btn').text('Hide Details');
	} else {
		$('#toggle-clan-details-btn').text('Show Details');
		$('#clan-details-container').addClass('no-display');
	}
	event.preventDefault();
});

</script>

@stop