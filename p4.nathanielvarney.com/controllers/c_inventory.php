<?php

class inventory_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://p4.nathanielvarney.com/inventory
	Displays a list of computers actively in the inventory and checked out
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# If user is blank, they're not logged in, show message and don't do anything else
		# User should not arrive
		if(!$this->user) {
		
			# Send them to the index page to try again
			Router::redirect("/index");	
		}
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_inventory_index');
			
		# Now set the <title> tag
			$this->template->title = "Computer Inventory";
	
		/* If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);  */ 
	      		
	  	# Build a query of the computers
		$q1 = "SELECT * FROM computers WHERE location = 'Helpdesk' ORDER BY computers.modified DESC";
		$q2 = "SELECT * FROM computers WHERE location = 'Returned' ORDER BY computers.modified DESC";		
	      		
	    $active = DB::instance(DB_NAME)->select_rows($q1);
	    $returned = DB::instance(DB_NAME)->select_rows($q2);
			
		# Pass data to the view
			$this->template->content->active = $active;
			$this->template->content->returned = $returned;
			
	      		
		# Render the view
			echo $this->template;

	}
	
	/*-------------------------------------------------------------------------------------------------
	Changes the location of the computer in the database to "Returned" thereby moving it to the 
	returned computers list on page refresh.
	-------------------------------------------------------------------------------------------------*/
	public function return_pc($serial_number) {

		# Prepare our data array to be inserted
		$data = Array(
			"modified" => Time::now(),
			"location" => "Returned",
			);
		
		# Match to serial number
		$where_condition="WHERE serial = \"".$serial_number."\"";
		
		# Do the insert
		DB::instance(DB_NAME)->update('computers', $data, $where_condition);
	
		# Send them back
		Router::redirect("/inventory");

		
	
	}
	
	/*-------------------------------------------------------------------------------------------------
	Deletes the token and directs the user to a success page.
	Useful if the database is accessed on a shared computer.
	-------------------------------------------------------------------------------------------------*/
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
		
		# Send them to the logout success page
		$this->template->content = View::instance('v_inventory_logout_success');
		$this->template->title = "Logout Successful!";
		echo $this->template;

	}
		
} // end class
