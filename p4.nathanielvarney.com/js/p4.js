$(document).ready(function() {	
	$('form').validate();
	
	$('form').live('click focus mouseover', function() {
		$(this).validate();
	});

});