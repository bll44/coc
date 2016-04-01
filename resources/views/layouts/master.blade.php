<!DOCTYPE html>
<html>

@include('layouts/partials/header')

<body>

	<div class="container">
		<div class="row">
			@include('layouts/navs/default-nav')
		</div>
		
		@yield('content')
	
	</div><!-- /.container -->

@yield('scripts')

@include('layouts/partials/footer');

</body>
</html>