<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		# echo "users_controller construct called<br><br>";
	} 
	
	public function index() {
		echo "Welcome to the users's department";
	}
	
	public function signup() {
		# echo "This is the signup page";
		# Setup view
			$this->template->content = View::instance('v_users_signup');
			$this->template->title   = "Signup";
			
		# Render template
			echo $this->template;
	}
	
	public function p_signup() {
		
		# Dump out the results of POST to see what the form submitted
		# print_r($_POST);
		
		# Encrypt the password	
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);	
		
		# More data we want stored with the user	
		$_POST['created'] = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
		
		# Insert this user into the database
		$user_id = DB::instance(DB_NAME)->insert("users", $_POST);
		
		# For now, just confirm they've signed up - we can make this fancier later
		echo "You're signed up";
	}
	
	public function login() {
		echo "This is the login page";
	}
	
	public function logout() {
		echo "This is the logout page";
	}
	
	public function profile($user_name = NULL) {
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile";

		# Load CSS / JS
		$client_files = Array(
				"/css/users.css",
				"/js/users.js",
	            );
	
        $this->template->client_files = Utils::load_client_files($client_files);  

		# Pass information to the view
		$this->template->content->user_name = $user_name;
				
		# Render template
		echo $this->template;
	}
		
} # end of the class