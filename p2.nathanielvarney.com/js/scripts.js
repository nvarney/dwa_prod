function hideMessage() { 
	document.getElementById("message").style.display="none"; 
} 

function startTimer() { 
	var tim = window.setTimeout("hideMessage()", 5000); 
} 