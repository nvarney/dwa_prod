$(document).ready(function() {	
	
	// This function activates the form validator after the page loads
	$('#ticket-form').live('click focus mouseover', function() {
		$(this).validate();	
	});
	
	// This function hides the appropriate images in the popup window bases on the chosen model number
	$('#model-pop-btn').click(function() {
	if (($('#model').val()=="Dell Optiplex")||($('#model').val()=="Dell Latitude")||($('#model').val()=="Dell Precision")) {
		$('#dellSerial').show();
		$('#lenovoSerial').hide();
		$('#appleSerial').hide();
	} else if (($('#model').val()=="Apple MacBook Pro")||($('#model').val()=="Apple MacBook Air")||($('#model').val()=="Apple iMac")||($('#model').val()=="Apple Mac Mini")||($('#model').val()=="Apple Mac Pro")) {
		$('#dellSerial').hide();
		$('#lenovoSerial').hide();
		$('#appleSerial').show();
	} else { //show lenovo serial image because it's the most generic
		$('#dellSerial').hide();
		$('#lenovoSerial').show();
		$('#appleSerial').hide();
	}

		
	});


});