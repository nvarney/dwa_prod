<?php

class tickets_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://p4.nathanielvarney.com/tickets or /
	Page that holds the ticket form.
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_tickets_index');
			
		# Now set the <title> tag
			$this->template->title = "New Ticket";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		# Render the view
			echo $this->template;

	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Processes the new ticket request. Validates user input, enters the information into the two 
	databases, and then sends an email to the user with the information they entered.
	-------------------------------------------------------------------------------------------------*/
	public function p_ticket() {
	
		# Sanitize the user input
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		
		# Backup validation in case of javascript failure
		# Not recommended as the page looks terrible without js
		# Check if data was entered
		if (($_POST['name'] == "") || ($_POST['phone'] == "") || ($_POST['serial'] == "")){
			# Send back to signup with appropriate error
			Router::redirect("/tickets");		
		}
		
		# Check if email address is of the right form
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			# Send back to signup with appropriate error
			Router::redirect("/tickets");
		}
		
		# Unix timestamp of when this post was created / modified
		$_POST['ticket_id'] = date('Ymd\-his');
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		# Add the location
		$_POST['location'] = 'Helpdesk';
		
		# Create ticket and computer arrays
		$ticket = $_POST;
		$computer = $_POST;
		
		# Add ticket status
		$ticket['status'] = 'New';
		
		# Remove the unneeded data before submit
		unset($ticket['model'], $ticket['serial']);
		unset($computer['email'], $computer['phone'], $computer['notes']);
		
		# Insert
		DB::instance(DB_NAME)->insert('tickets', $ticket);
		DB::instance(DB_NAME)->insert('computers', $computer);

		# Build a multi-dimension array of recipients of this email
		$to[] = Array("name" => $_POST["name"], "email" => $_POST["email"]);
		
		# Build a single-dimension array of who this email is coming from
		# note it's using the constants we set in the configuration above)
		$from = Array("name" => "HSPH Helpdesk", "email" => APP_EMAIL);
		
		# Subject
		$subject = "Helpdesk Computer Drop Off: ".$_POST["subject"];
		
		# Generate Time
		
		# You can set the body as just a string of text
		$body = "This is confirmation that you have delivered your "
		. $_POST['model']. 
		" with the serial number "
		. $_POST['serial'].
		" to the helpdesk at "
		. date('g\:i a \o\n F d\, Y') . 
		" with the following notes: <br>"
		. $_POST['notes'] .
		"<br><br>Thank you and have a great day!"
		."<br>The Helpdesk<br>(617) 432-4357<br>helpdesk@hsph.harvard.edu";
		
		# OR, if your email is complex and involves HTML/CSS, you can build the body via a View just like we do in our controllers
		# $body = View::instance('e_users_welcome');
		
		# Why not send an email to the test account as well
		# Build multi-dimension arrays of name / email pairs for cc / bcc if you want to 
		$cc  = "";
		$bcc = "nathanielvarney.com@gmail.com";
		
		# With everything set, send the email
		
		if(!$email = Email::send($to, $from, $subject, $body, true, $cc, $bcc)) {
  			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
  			# Load the success page
			$this->template->content = View::instance('v_tickets_p_ticket_success');
			$this->template->title = "Success!";
			echo $this->template;
		}
		
		
	}
		
} // end class
