<!DOCTYPE html>
<html>

@include('layouts.partials.header_admin')

<body>
	@include('layouts.navs.default-nav_admin')

	<div class="col-lg-offset-2 col-lg-10 main">

		@yield('content')

	</div><!-- /.main -->


	@yield('scripts')

	<script>

	var activeNavLink = $('meta[name="active-nav-link"]').attr('content');
	$('#nav-link-' + activeNavLink).addClass('active');

	</script>

	@include('layouts.partials.footer_admin');

</body>
</html>