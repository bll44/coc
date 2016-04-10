<!DOCTYPE html>
<html>

@include('layouts.partials.header')

<body>

	<div class="row">
		<div class="col-lg-offset-3 col-lg-6">

			@yield('content')
		
		</div><!-- /.col -->
	</div><!-- /.row -->

	@yield('scripts')

	@include('layouts.partials.footer');

</body>
</html>