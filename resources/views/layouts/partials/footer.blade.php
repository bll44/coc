<footer>
<script>
// adds the csrf token to all ajax requests
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
</footer>