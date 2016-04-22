<!DOCTYPE html>
<html>

@include('layouts.partials.header')

<body>
	<div class="row">
		<div class="container" id="navbar-container">
		
			@include('layouts.navs.default-nav')
		
		</div><!-- /#navbar-container -->
	</div><!-- /.row -->
	<div class="row">
		<div class="container" id="main-content-container">
		
			@yield('content')
		
		</div><!-- /#main-content-container -->
	</div><!-- /.row -->

	@yield('scripts')

	@include('layouts.partials.footer');

</body>
</html>