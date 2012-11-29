<?php

class index_controller extends base_controller {

	public function __construct() {
		parent::__construct();
	} 
	
	/*-------------------------------------------------------------------------------------------------
	Access via http://p3.nathanielvarney.com
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "DWA: Project 3";
	
		# If this view needs any JS or CSS files, add their paths to this array so they will get loaded in the head
			$client_files = Array(
						""
	                    );
	    
	    	$this->template->client_files = Utils::load_client_files($client_files);   
	      		
		# Render the view
			echo $this->template;

	}
	
	public function proposal() {
		
		$this->template->content = View::instance('v_index_proposal');
		$this->template->title = "Project 3 Proposal";
		echo $this->template;
	}
	
	public function proposal4() {
		
		$this->template->content = View::instance('v_index_proposal_4');
		$this->template->title = "Project 4 Proposal";
		echo $this->template;
	}
	
	
	
		
} // end class
