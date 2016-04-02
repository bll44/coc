<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">CoC.App</a>
		</div><!-- /.navbar-header -->
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li id="nav-link-home"><a href="/">Home</a></li>
				<li id="nav-link-clans"><a href="/clans">Clans</a></li>
			</ul><!-- /.nav navbar-nav -->
		</div><!-- /#navbar-collapse-1 -->
	</div><!-- /.container -->
</nav>
<script>

var activeNavLink = $('meta[name="active-nav-link"]').attr('content');
$('#nav-link-' + activeNavLink).addClass('active');

</script>