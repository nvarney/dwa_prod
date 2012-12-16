<?php

class inventory_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://yourapp.com/inventory/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_inventory_index');
			
		# Now set the <title> tag
			$this->template->title = "Computer Inventory";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
	  	# Build a query of the computers
		$q1 = "SELECT * FROM computers WHERE location = 'Helpdesk'";
		$q2 = "SELECT * FROM computers WHERE location = 'Returned'";		
	      		
	    $active = DB::instance(DB_NAME)->select_rows($q1);
	    $returned = DB::instance(DB_NAME)->select_rows($q2);
			
		# Pass data to the view
			$this->template->content->active = $active;
			$this->template->content->returned = $returned;
			
	      		
		# Render the view
			echo $this->template;

	}
	
		public function remove($serial_number) {
		# Prepare our data array to be inserted
		$data = Array(
			"modified" => Time::now(),
			"user_id" => $this->user->user_id,
			"user_id_followed" => $user_id_followed
			);
		
		# Do the insert
		DB::instance(DB_NAME)->insert('users_users', $data);
	
		# Send them back
		Router::redirect("/posts/users");
	
	}
		
} // end class
