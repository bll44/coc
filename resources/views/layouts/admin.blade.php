<!DOCTYPE html>
<html>

@include('layouts.partials.header_admin')

<body>
	@include('layouts.navs.default-nav_admin')
	
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li id="nav-link-dashboard"><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Dashboard</a></li>
			<li><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Widgets</a></li>
			<li><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Charts</a></li>
			<li><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Tables</a></li>
			<li><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Forms</a></li>
			<li><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="#"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Icons</a></li>
			<li role="presentation" class="divider"></li>
			<li class="nav-link-login"><a href="/admin/login"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

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