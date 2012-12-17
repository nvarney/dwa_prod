$(document).ready(function() {	

	// Hide elements we don't want seen yet
	//$('#other-issue-text').hide();

	// Display other issue element while checked
	
	// Validate form before submitting
	$("#ticket-form").validate();

});

$('#page1').bind('pageinit', function(event) {
	$("#ticket-form").validate();
});