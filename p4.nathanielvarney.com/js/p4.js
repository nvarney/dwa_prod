$(document).ready(function() {	
	$('#ticket-form').live('click focus mouseover', function() {
		$(this).validate();
	});

});