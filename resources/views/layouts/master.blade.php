<!DOCTYPE html>
<html>

@include('layouts.partials.header')

<body>
	<div class="container">
		@include('layouts.navs.default-nav')

			@yield('content')
		
	</div><!-- /.container -->

	@yield('scripts')

	@include('layouts.partials.footer');

</body>
</html>