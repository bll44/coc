<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span>CoC</span>_Admin</a>
			@if(Auth::check())
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->username }} <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="/admin/profile/{{ Auth::user()->username }}">
								<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile
							</a>
						</li>
						<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
						<li role="presentation" class="divider"></li>
						<li><a href="/admin/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
					</ul>
				</li>
			</ul>
			@endif
		</div>
	</div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form>
	<ul class="nav menu">
		<li id="nav-link-home"><a href="/"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> CoC Home</a></li>
		<li id="nav-link-dashboard"><a href="/admin"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Dashboard</a></li>
		<li role="presentation" class="divider"></li>
		@if( ! Auth::check())
		<li id="nav-link-login"><a href="/admin/login"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Login Page</a></li>
		@endif
		@if(Auth::check() && Auth::user()->admin)
		<li id="nav-link-create"><a href="/admin/create_admin_account"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Create Admin Account</a></li>
		@endif
	</ul>
</div><!--/.sidebar-->