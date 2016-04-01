@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-4">
		<h1>{{ $clan->name }}</h1>
	</div>
</div><!-- /.row -->
<div class="row">
	<div class="col-lg-6">
		<div id="clan-details-container" class="well">
			<img src="{{ $clan->badge_small }}" />
			<p>Tag: {{ $clan->tag }}</p>
			<p>Type: {{ $clan->type }}</p>
			<p>Description: {{ $clan->description }}</p>
			<p>War frequency: {{ $clan->warFrequency }}</p>
			<p>Level: {{ $clan->clanLevel }}</p>
			<p>War wins: {{ $clan->warWins }}</p>
			<p>Win streak: {{ $clan->warWinStreak }}</p>
			<p>Clan points: {{ $clan->clanPoints }}</p>
			<p>Trophies required for entry: {{ $clan->requiredTrophies }}</p>
			<p>Number of members: {{ $clan->members }}</p>
		</div>
	</div><!-- /.column -->
	<div class="col-lg-6">
		<div id="clan-members-container">
			<h3>Clan members placeholder</h3>
		</div><!-- /#clan-members-container -->
	</div><!-- /.column -->
</div><!-- /.row -->

@stop