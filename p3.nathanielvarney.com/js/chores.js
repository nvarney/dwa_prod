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
	try {
    	return 'localStorage' in window && window['localStorage'] !== null;
  	} catch (e) {
    	alert("Your browser does not support local storage. Please access this page from a modern browser.");
  	}
});

$(document).ready(function() {

	/*-- Hide the pause button --*/
	$('#pause').hide();
	
	/*-- Hide chore entry (no longer used)--*/
	//$('#chore-entry').hide();

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

	/*-- Function to show chore add box (no longer used)
	$('#add-chore').click(function() {
		$('#chore-entry').show();
	});
	--*/
	
	/*-- Function to clear chore description box --*/
	$('#chore-desc').click(function() {
		$('#chore-desc').html("");
	});
	
	/*-- Function to load saved chores list --*/
	$('#load-chores').click(function() {
		for (var i = 0; i < localStorage.length; i++){
    		$('#saved-chores').append("<input class='loaded-chores' type='button' value='"+localStorage.key(i)+"'>");
		}
		$('#load-chores').hide();
	});	
	
	/* Function to add saved chores to list */
	$('.loaded-chores').live('click', function() {
		var index = $(this).val();
		$('#chore-entries').append(localStorage.getItem(index));
		$(this).hide();
	});
	
	/*-- Function to add chore to list --*/
	$('#chore-submit').click(function() {
		// variable for holding our chore string
		var chorestring = "";
		
		// Add chore name
		chorestring = "<div class='chore'>"+"<input type='checkbox'>"+$('#chore-name').val()+"</div>";
		
		// Split chore description
		var chore = $('#chore-desc').val().split("\n");
		
		// Add chore description
		$.each(chore, function() {
			chorestring = chorestring +"<div class='chore task'>"+"<input type='checkbox'>"+ this + "</div>";
		});
		
		// Add to local storage
		localStorage[$('#chore-name').val()] = chorestring;
		
		// Add the chore to the list	
		$('#chore-entries').append(chorestring);
		
		// Clear the box for the next chore
		$('#chore-name').val("");
		$('#chore-desc').val("");
			
	});
	
	/* Function to grey out completed tasks */
	$('.chore').live('click', function() {
		$(this).css('color', 'grey');
		$(this).css('text-decoration', 'line-through');
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
	
	/*-- Function to print chore list --*/
	/*-- Taken from Susan's awesome card generator--*/
	$('#print-button').click(function() {
		
		// Setup the window we're about to open	    
	    var print_window =  window.open('','_blank','');
	    
	    // Get the content we want to put in that window - this line is a little tricky to understand, but it gets the job done
	    var contents = $('<div>').html($('#right-side').clone()).html();
	    
	    // Build the HTML content for that window, including the contents
	    var html = '<html><head><link rel="stylesheet" href="/css/chores.css" type="text/css"></head><body>' + contents + '</body></html>';
	    
	    // Write to our new window
	    print_window.document.open();
	    print_window.document.write(html);
	    print_window.document.close();
	    		
	});
	

});