<?php

class index_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://yourapp.com/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "Hello World";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		# Render the view
			echo $this->template;

	}
	
	public function mail() {

		# Build a multi-dimension array of recipients of this email
		$to[] = Array("name" => "Nathan", "email" => "mrplasma@gmail.com");
		
		# Build a single-dimension array of who this email is coming from
		# note it's using the constants we set in the configuration above)
		$from = Array("name" => APP_NAME, "email" => APP_EMAIL);
		
		# Subject
		$subject = "Test email4";
		
		# You can set the body as just a string of text
		$body = "Hi Judy, this is just a message to confirm your registration at JavaBeans.com";
		
		# OR, if your email is complex and involves HTML/CSS, you can build the body via a View just like we do in our controllers
		# $body = View::instance('e_users_welcome');
		
		# Build multi-dimension arrays of name / email pairs for cc / bcc if you want to 
		$cc  = "";
		$bcc = "";
		
		# With everything set, send the email
		
		if(!$email = Email::send($to, $from, $subject, $body, true, $cc, $bcc)) {
  			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
  			echo "Message sent!";
		}
	
	}
	
	
	
		
} // end class
