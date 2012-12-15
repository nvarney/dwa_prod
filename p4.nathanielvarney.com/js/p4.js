$(document).ready(function() {	
	var options = { 
		type: 'POST',
		url: '/tickets/p_ticket/',
		beforeSubmit: function() {
			$('#results').html("Adding...");
		},
		success: function(response) { 	
			$('#results').html("Your post was added.");
		} 
	}; 
		
	// Using the above options, Ajax'ify the form	
	$('form[name=new-ticket]').ajaxForm(options);
});
