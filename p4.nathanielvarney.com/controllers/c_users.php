<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		# echo "users_controller construct called<br><br>";
	} 
	
	public function index() {
		# Changed from class example to redirect to home page
		#echo "Welcome to the users's department";
		Router::redirect("/");
	}
	
	public function signup($message = NULL) {
		# echo "This is the signup page";
		# Setup view
			$this->template->content = View::instance('v_users_signup');
			$this->template->message = $message;
			$this->template->title   = "Signup";
			
		# Render template
			echo $this->template;
	}
	
	public function p_signup() {
		
		# Dump out the results of POST to see what the form submitted
		# print_r($_POST);
		
		# Check if data was entered
		if (($_POST['first_name'] == "") || ($_POST['last_name'] == "") || ($_POST['password'] == "")){
			# Send back to signup with appropriate error
			Router::redirect("/users/signup/Please enter all requested information");		
		}
		
		# Check if email address is of the right form
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			# Send back to signup with appropriate error
			Router::redirect("/users/signup/Please enter a valid email address");
		}
		
		# Check if passwords match
		if ($_POST['password'] != $_POST['password_check']) {
			# Send back to signup with appropriate error
			Router::redirect("/users/signup/Passwords do not match");
		}
		
		# Remove the password check from the array
		unset ($_POST['password_check']);
				
		# Encrypt the password	
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);	
		
		# More data we want stored with the user	
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		# First, set the content of the template with a view file
		$this->template->content = View::instance('v_users_signup_success');
		$this->template->title = "Success!";
		echo $this->template; 
	}
	
		
} # end of the class