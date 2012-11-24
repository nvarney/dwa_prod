// Padding function
function pad(number, length) {
	var str = '' + number;
	while (str.length < length) {str = '0' + str;}
	return str;
}

// Countdown reset
function countdownReset() {
	var newCount = parseInt($('input[name=startTime]').val())*100;
	if(newCount > 0) {countdownCurrent = newCount;}
	countdownTimer.stop().once();
}

$(document).ready(function() {

	/*-- Functions to set chore timer --*/
	$('#chore-h').keyup(function() {
		var timeval = "Time remaining: " + pad($('#chore-h').val(), 2) + ":" + pad($('#chore-m').val(),2);
		$('#chore-timer').html(timeval);
	});
	
	$('#chore-m').keyup(function() {
		var timeval = "Time remaining: " + pad($('#chore-h').val(), 2) + ":" + pad($('#chore-m').val(),2);
		$('#chore-timer').html(timeval);
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
	
	/*-- Function to start chore timer --*/
	/*-- Thanks to http://jchavannes.com/jquery-timer/demo --*/
	var countdownTimer = "";
	$('#start').click(function() {
		if (countdownTimer == "") {
			var countdownCurrent = (($('#chore-h').val() * 360000) + ($('#chore-m').val() * 6000));
			countdownTimer = $.timer(function() {
				var hour = parseInt (countdownCurrent/360000);
				var min = parseInt(countdownCurrent/6000)-(hour*60);
				var sec = parseInt(countdownCurrent/100)-(hour*360)-(min*60);
				//var micro = pad(countdownCurrent-(sec*100)-(min*6000),2);
				var output = "00"; if(min > 0) {output = pad(min,2);}
				$('#chore-timer').html(pad(hour,2)+":"+output+":"+pad(sec,2));
				if(countdownCurrent == 0) {
					countdownTimer.stop();
					alert('Time\'s up. Let\'s see if everything is finished.');
				} else {
					countdownCurrent-=7;
					if(countdownCurrent < 0) {countdownCurrent=0;}
				}
			}, 60, true);
			$('#start').prop('value','Stop');
		} else {
			countdownTimer.stop();
			countdownTimer = ""
			$('#start').prop('value','Start');
		}
		

	});


});