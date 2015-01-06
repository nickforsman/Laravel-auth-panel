$(document).ready(function() {
	$('button#responder').on('click', function(event) {
		event.preventDefault();
		$('aside').toggleClass('closed-nav');
	});
	$('input:checkbox').change(function() {
		$(this).parent().parent().toggleClass('active');
	});
});