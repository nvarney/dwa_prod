<?php
class users_controller extends base_controller {

	public function __construct() {
		parent::__construct();
		# echo "users_controller construct called<br><br>";
	} 
	
	public function index() {
		echo "Welcome to the users's department";
	}
	
	public function signup($error = NULL) {
		# echo "This is the signup page";
		# Setup view
			$this->template->content = View::instance('v_users_signup');
			$this->template->content->error = $error;
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
	
	public function login($error = NULL) {
		#echo "This is the login page";

		# Setup view
		$this->template->content = View::instance('v_users_login');
		$this->template->title   = "Login";
		
		# Pass data to the view
		$this->template->content->error = $error;
		
		# Render template
		echo $this->template;

	}
	
	public function p_login() {
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		
		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token 
			FROM users 
			WHERE email = '".$_POST['email']."' 
			AND password = '".$_POST['password']."'";
		
		$token = DB::instance(DB_NAME)->select_field($q);	
					
		# If we didn't get a token back, login failed
		if(!$token) {
				
			# Send them back to the login page
			Router::redirect("/users/login/error");
			
		# But if we did, login succeeded! 
		} else {
				
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+2 weeks'), '/');
			
			# Send them to the main page - or wherever you want them to go
			Router::redirect("/");			
		}
	
	}
	
	public function logout() {
		# echo "This is the logout page";
		
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
		
		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = Array("token" => $new_token);
		
		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
		
		# Delete their token cookie - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');
		
		# Send them back to the main landing page
		Router::redirect("/");

	}
	
	public function profile() {
		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Login</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return false;
		}
		
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile of".$this->user->first_name;
			
		/* Example of loading specific client files with a view (not needed here)
		# Load CSS / JS
		$client_files = Array(
			"/css/users.css",
			"/js/users.js",
			);
	
        $this->template->client_files = Utils::load_client_files($client_files);  
		*/

		# Pass information to the view
		$this->template->content->user_name = $user_name;
				
		# Render template
		echo $this->template;
	}
	
	public function update_info($error = NULL){
		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Login</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the info update page view won't be displayed.
			return false;
		}
		
		# Setup view
			$this->template->content = View::instance('v_users_update_info');
			$this->template->content->error = $error;
			$this->template->title   = "Update Account Information";
		
		# Render template
			echo $this->template;	
	}
	
	public function p_update_info(){
		# Generate array for data
		$data = Array();
		
		# Testing check if information was added
		if ($_POST['first_name'] != ""){
			$data['first_name'] = $_POST['first_name'];
			# echo "You entered ".$_POST['first_name'];
		}
		
		if ($_POST['last_name'] != ""){
			$data['last_name'] = $_POST['last_name'];
			# echo "You entered ".$_POST['last_name'];
		}

		if ($_POST['email'] != ""){
			$data['email'] = $_POST['email'];
			# echo "You entered ".$_POST['email'];
		}
		
		if ($_POST['password'] != ""){
			$data['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		}
		
		if ($_POST['password_check'] != ""){
			$data['password'] = sha1(PASSWORD_SALT.$_POST['password_check']);
		}
		
		if ($_POST['user_image_url'] != ""){
			$data['user_image_url'] = $_POST['user_image_url'];
		}
		
		# Check if any updates were made
		if (empty($data)) {
			# Inform user and return to home
			echo "No updates have been made.";
			Router::redirect("/");	
			
		} else {
			# Add timestamp for update
			$data['modified'] = Time::now();
		
			# Update the DB with changes
			DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
			
			# Update the user that the changes were successful then return to home
			echo "Updates successfully applied.";
			Router::redirect("/");
		}
	
	}
		
} # end of the class