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

	/*-- Hide the pause button --*/
	$('#pause').hide();
	
	/*-- Hide chore entry --*/
	$('#chore-entry').hide();

	/*-- Functions to set chore timer --*/
   $(function() {
        $( "#hour-slider" ).slider({
            orientation: "horizontal",
            min: 0,
            max: 24,
            value: 0,
            slide: function( event, ui ) {
                $( "#chore-h" ).val( ui.value );
                var timeval = "Time remaining: " + pad($('#chore-h').val(), 2) + ":" + pad($('#chore-m').val(),2);
				$('#chore-timer').html(timeval);
            }
        });
        $( "#chore-h" ).val( $( "#hour-slider" ).slider( "value" ) );
        $( "#min-slider" ).slider({
            orientation: "horizontal",
            min: 0,
            max: 55,
            step: 5,
            value: 0,
            slide: function( event, ui ) {
                $( "#chore-m" ).val( ui.value );
                var timeval = "Time remaining: " + pad($('#chore-h').val(), 2) + ":" + pad($('#chore-m').val(),2);
				$('#chore-timer').html(timeval);
            }
        });
        
        $( "#chore-m" ).val( $( "#min-slider" ).slider( "value" ) );      
    });
	
	/*-- Function to set reward --*/
	$('#reward').keyup(function() {
	
		// Figure out what message we should enter
		var rewardval = $(this).val();
			
		$('#chore-reward').html("<h2> Your reward: </h2><br>" + rewardval);
	});

	/*-- Function to show chore add box --*/
	$('#add-chore').click(function() {
		$('#chore-entry').show();
	});
	
	/*-- Function to clear chore description box --*/
	$('#chore-desc').click(function() {
		$('#chore-desc').html("");
	});
	
	/*-- Function to add chore to list --*/
	$('#chore-submit').click(function() {
		// variable for holding our chore string
		var chorestring = "";
		
		// Add chore name
		chorestring = "<li>"+$('#chore-name').val()+"<br>";
		
		// Split chore description
		var chore = $('#chore-desc').val().split("\n");
		
		// Add chore description
		$.each(chore, function() {
			chorestring = chorestring + this + "<br>";
		});
		
		// Add chore end
			chorestring = chorestring + "</li>";
		
		// Add the chore to the list	
		$('#chore-entries').append(chorestring);
		
		// Clear the box for the next chore
		$('#chore-name').val("");
		$('#chore-desc').val("");
		
		
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
				var sec = parseInt(countdownCurrent/100)-(hour*3600)-(min*60);
				//var micro = pad(countdownCurrent-(sec*100)-(min*6000),2);
				//var output = "00"; if(min > 0) {output = pad(min,2);}
				$('#chore-timer').html("Time remaining: "+pad(hour,2)+":"+pad(min,2)+":"+pad(sec,2));
				if(countdownCurrent == 0) {
					countdownTimer.stop();
					alert('Time\'s up. Let\'s see if everything is finished.');
				} else {
					countdownCurrent-=7;
					if(countdownCurrent < 0) {countdownCurrent=0;}
				}
			}, 70, true);
			$('#start').prop('value','Stop');
			$('#pause').show();
			$('#pause').click(function() {
				countdownTimer.toggle();
			});
		} else {
			countdownTimer.stop();
			countdownTimer = ""
			$('#start').prop('value','Start');
			$('#pause').hide();
		}
	});
	

});