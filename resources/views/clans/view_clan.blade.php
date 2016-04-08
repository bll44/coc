@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-4">
		<h1>{{ $clan->name }}</h1>
	</div>
	<div class="col-lg-8">
		<h3 class="pull-right">Current Top Donor: <span class="text-danger">{{ $clan->getTopDonator()->name }} ({{ $clan->getTopDonator()->donations }})</span></h3>
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
			<p>Number of members: {{ $clan->memberCount }}</p>
		</div>
	</div><!-- /.column -->
	<div class="col-lg-6">
		<div id="clan-members-container">
			<div class="panel-group" id="clan-member-accordion" role="tablist" aria-multiselectable="true">
				@foreach($members as $member)
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="heading{{ str_replace('#', '', $member->tag) }}">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ str_replace('#', '', $member->tag) }}" aria-expanded="true" aria-controls="collapse{{ str_replace('#', '', $member->tag) }}">
								{{ $member->name }} <span class="text-info">[{{ $member->role }}]</span>
							</a>
						</h4>
					</div>
					<div id="collapse{{ str_replace('#', '', $member->tag) }}" class="panel-collapse collapse" role="tabpanel" 
						aria-labelledby="heading{{ str_replace('#', '', $member->tag) }}">
						<div class="panel-body">
							<p>Tag: <span>{{ $member->tag }}</span></p>
							<p>Name: <span>{{ $member->name }}</span></p>
							<p>Role: <span>{{ $member->role }}</span></p>
							<p>Experience Level: <span>{{ $member->expLevel }}</span></p>
							<p>League: <span>{{ $member->league_id }}</span></p>
							<p>Trophy Count: <span>{{ $member->trophies }}</span></p>
							<p>Clan Rank: <span>{{ $member->clanRank }}</span></p>
							<p>Donations (per season): <span>{{ $member->donations }}</span></p>
							<p>Donations received (per season): <span>{{ $member->donationsReceived }}</span></p>
						</div><!-- /.panel-body -->
					</div><!-- /.panel-collapse -->
				</div><!-- /.panel -->
				@endforeach
			</div><!-- /.panel-group -->
			<div class="pull-right">
				{{ $members->links() }}
			</div>
		</div><!-- /#clan-members-container -->
	</div><!-- /.column -->
</div><!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div id="donations-chart-container"></div><!-- /#donations-graph -->
	</div><!-- /.column -->
</div><!-- /.row -->

@stop

@section('scripts')
<script>
google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
	var donationData = [
		['Clan Members', '# of Donations', '# of Donations Received'],
	];
	
	$.ajax({
		url: '/clans/donation_data/?clanTag={{ urlencode($clan->tag) }}',
		type: 'GET',
		dataType: 'json'
	}).done(function(data) {
		for(var x in data) {
			donationData.push(data[x]);
		}
		var data = google.visualization.arrayToDataTable(donationData);
		var options = {
			title: 'Donation Performance',
			height: 500,
		};

		var chart = new google.visualization.ColumnChart(document.getElementById('donations-chart-container'));
		chart.draw(data, options);
	});
}

</script>

@stop