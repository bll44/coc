@extends('layouts/master')

@section('content')

<div class="row">
	<div class="col-lg-6">
		<p><a href="/clans/search">Search Clans</a></p>
	</div><!-- /.column -->
	<div class="col-lg-6">
		@foreach($clans as $clan)
		<p><a href="/clans/view/{{ $clan->tag }}">{{ $clan->name }}</a></p>
		@endforeach
	</div>
</div>

@stop