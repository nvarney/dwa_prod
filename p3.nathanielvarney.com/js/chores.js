$(document).ready(function() {

	/*-- Function to set chore timer --*/
	$('#time').keyup(function() {
	
		// Figure out what message we should enter
		var timeval = $(this).val();
			
		$('#chore-timer').html("Due at: " + timeval);
	});
	
	/*-- Function to set reward --*/
	$('#reward').keyup(function() {
	
		// Figure out what message we should enter
		var rewardval = $(this).val();
			
		$('#chore-reward').html("You will get: " + rewardval);
	});

	/*-- Function to add chore to list --*/
	$('#add-chore').click(function() {
	
		// Figure out what message we should enter
		var choreval = $('#chore').val();
		
		// Add the chore to the list	
		$('#chore-entries').append("<li>" + choreval + "</li>");
		
		// Clear the box for the next chore
		$('#chore').val("");
		
	});











});