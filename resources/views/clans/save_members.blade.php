@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-lg-6" id="save-member-list">
		<h3>Would you also like to save the {{ $clan->name }} clan members?</h3>
		<h3>
			<a href="/clans/members/save?option=yes&clan={{ urlencode($clan->tag) }}">Yes</a> 
			or 
			<a href="/clans/members/save?option=no&clan={{ urlencode($clan->tag) }}">No</a>
		</h3>
	</div><!-- /#save-member-list -->
</div><!-- /.row -->

<div class="row">	
	<div class="col-lg-4">
		<div class="panel-group" id="clan-member-accordion" role="tablist" aria-multiselectable="true">
		@foreach($clanMembers as $cm)
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading{{ str_replace('#', '', $cm['tag']) }}">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ str_replace('#', '', $cm['tag']) }}" aria-expanded="true" aria-controls="collapse{{ str_replace('#', '', $cm['tag']) }}">
							{{ $cm['name'] }}
						</a>
					</h4>
				</div>
				<div id="collapse{{ str_replace('#', '', $cm['tag']) }}" class="panel-collapse collapse" role="tabpanel" 
										aria-labelledby="heading{{ str_replace('#', '', $cm['tag']) }}">
					<div class="panel-body">
						<p>Tag: <span>{{ $cm['tag'] }}</span></p>
						<p>Name: <span>{{ $cm['name'] }}</span></p>
						<p>Role: <span>{{ $cm['role'] }}</span></p>
						<p>Experience Level: <span>{{ $cm['expLevel'] }}</span></p>
						<p>League: <span>{{ $cm['league']['name'] }}</span></p>
						<p>Trophy Count: <span>{{ $cm['trophies'] }}</span></p>
						<p>Current Clan Rank: <span>{{ $cm['clanRank'] }}</span></p>
						<p>Current donations: <span>{{ $cm['donations'] }}</span></p>
						<p>Current donations received: <span>{{ $cm['donationsReceived'] }}</span></p>
					</div><!-- /.panel-body -->
				</div><!-- /.panel-collapse -->
			</div><!-- /.panel -->
		@endforeach
		</div><!-- /.panel-group -->
	</div><!-- /.column -->
</div><!-- /.row -->


@stop