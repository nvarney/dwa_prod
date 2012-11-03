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
		
		# Redirect to the login page with a message
		Router::redirect("/users/login/Signup successful, please login."); 
	}
	
	public function login($message = NULL) {
		#echo "This is the login page";

		# Setup view
		$this->template->content = View::instance('v_users_login');
		$this->template->title   = "Login";
		
		# Pass data to the view
		$this->template->message = $message;
		
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
			Router::redirect("/users/login/Login failed. Please check your username and password.");
			
		# But if we did, login succeeded! 
		} else {
				
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+2 weeks'), '/');
			
			# Send them to the main page - or wherever you want them to go
			Router::redirect("/");			
		}
	
	}
	
	public function logout($message = NULL) {
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
		Router::redirect("/index/index/You have successfully logged out.");

	}
	
	public function profile($message = NULL) {
		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
			echo "Members only. <a href='/users/login'>Login</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return false;
		}
		
		# Now, lets build our query to grab the posts
			$q = "SELECT * 
				FROM posts 
				JOIN users USING (user_id)
				WHERE posts.user_id IN (".$this->user->user_id.")"; # This is where we use that string of user_ids we created
						
			# Run our query, store the results in the variable $posts
			$posts = DB::instance(DB_NAME)->select_rows($q);
			

		
		# Setup view
		$this->template->content = View::instance('v_users_profile');
		$this->template->message = $message;
		$this->template->title   = "Profile of".$this->user->first_name;
		
		# Pass data to the view
		$this->template->content->posts = $posts;

		# Pass information to the view
		$this->template->content->user_name = $user_name;
				
		# Render template
		echo $this->template;
	}
	
	public function update_info($message = NULL){
		# If user is blank, they're not logged in, redirect to login page
		if(!$this->user) {
			Router::redirect("/users/login/Please login first.");
		}
		
		# Setup view
			$this->template->content = View::instance('v_users_update_info');
			$this->template->message = $message;
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
			
			# Check if email address is of the right form
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				# Send back to signup with appropriate error
				Router::redirect("/users/update_info/Please enter a valid email address.");
			}
		}
		
		if ($_POST['password'] != ""){
			# Check if passwords match
			if ($_POST['password'] != $_POST['password_check']) {
				# Send back to signup with appropriate error
				Router::redirect("/users/update_info/Passwords do not match.");
			}
		
			# Insert the password into the data array	
			$data['password'] = sha1(PASSWORD_SALT.$_POST['password']);
		}
		
		if ($_POST['user_image_url'] != ""){
			$data['user_image_url'] = $_POST['user_image_url'];
		}
		
		# Check if any updates were made
		if (empty($data)) {
			# Inform user and return to home
			Router::redirect("/users/profile/No updates were made.");	
			
		} else {
			# Add timestamp for update
			$data['modified'] = Time::now();
		
			# Update the DB with changes
			DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
			
			# Update the user that the changes were successful then return to home
			Router::redirect("/users/profile/Profile updated.");
		}
	
	}
		
} # end of the class