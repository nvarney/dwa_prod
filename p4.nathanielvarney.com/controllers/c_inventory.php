<?php

class inventory_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://yourapp.com/inventory/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# If user is blank, they're not logged in, show message and don't do anything else
		if(!$this->user) {
			echo "Helpdesk staff only. <a href='/tickets'>Return to ticket submission</a>";
			
			# Return will force this method to exit here so the rest of 
			# the code won't be executed and the profile view won't be displayed.
			return false;
		}
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_inventory_index');
			
		# Now set the <title> tag
			$this->template->title = "Computer Inventory";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						"/js/p4_inventory.js"
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
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
	
		public function return_pc($serial_number) {

		# Prepare our data array to be inserted
		$data = Array(
			"modified" => Time::now(),
			"location" => "Returned",
			);
		
		$where_condition="WHERE serial = \"".$serial_number."\"";
		//echo $where_condition;
		
		# Do the insert
		DB::instance(DB_NAME)->update('computers', $data, $where_condition);
	
		# Send them back
		Router::redirect("/inventory");

		
	
	}
		
} // end class
