<head>
	<title>CoC Clans</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	@if(isset($activeNavLink))
	<meta name="active-nav-link" content="{{ $activeNavLink }}">
	@endif

	<link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="/bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="/font-awesome-4.5.0/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="/css/custom.css">

	<script type="text/javascript" src="/js/jquery-2.2.2.min.js"></script>
	<script type="text/javascript" src="/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>