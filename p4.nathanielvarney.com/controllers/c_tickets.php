<?php

class tickets_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://yourapp.com/inventory/index/
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
	
	public function p_ticket() {
		# Sanitize the user input
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
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
	}
		
} // end class
