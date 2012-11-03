/* Function to hide messages and errors */
function hideMessage() { 
	document.getElementById("message").style.display="none"; 
} 

/* Function to set the timer to 5 seconds and then hide the message */
function startTimer() { 
	var tim = window.setTimeout("hideMessage()", 5000); 
} 