<?php

class index_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://p4.nathanielvarney.com/index. Not used in production (/ goes to /tickets)
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "HSPH Helpdesk";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		# Render the view
			echo $this->template;

	}
	
	/*-------------------------------------------------------------------------------------------------
	Using login code from p2. In real production, this would be linked in to LDAP, but for this project
	I am just using a local database.
	-------------------------------------------------------------------------------------------------*/
	public function p_login() {
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
			FROM users 
			WHERE email = '".$_POST['emailUsername']."' 
			AND password = '".$_POST['password']."'";
		
		$token = DB::instance(DB_NAME)->select_field($q);	
					
		# If we didn't get a token back, login failed
		if(!$token) {
				
			# Send them back to the home page
			Router::redirect("/");
			
		# But if we did, login succeeded! 
		} else {
				
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+2 weeks'), '/');
			
			# Send them to the main page - or wherever you want them to go
			Router::redirect("/inventory");			
		}
	}
	
	
	
		
} // end class
