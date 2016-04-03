@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<p>Select a clan to view its members</p>
		@foreach($clans as $clan)
		<p><a href="/members/list/{{ urlencode($clan->tag) }}">{{ $clan->name }}</a></p>
		@endforeach
	</div>
</div><!-- /.row -->

@stop