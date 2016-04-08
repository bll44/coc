<footer>

<script>

$('.nav-link').click(function() {
	$('.nav-link').each(function() {
		$(this).removeClass('active');
	});
	$(this).addClass('active');
});

// adds the csrf token to all ajax requests
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

</script>

</footer>