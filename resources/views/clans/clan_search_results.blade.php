@extends('layouts/master')

@section('content')

<div class="row">
{{ session()->get('clan_search_result')->name }}
</div><!-- /.row -->
<div class="row">
<p>Would you like to save this result?</p>
<a href="#" class="btn btn-primary">Yes</a>
<a href="#" class="btn btn-default">No</a>
</div>

@stop