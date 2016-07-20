<?php
Class Registration_model extends CI_Model
{

	function __construct() 
	{
		// Call the Model constructor
		 
		parent::__construct();

		//Load database connection
		
		$this->load->database();
	}
    /*------------------------------- Start function for insert details -----------------------------------------*/
	function POST($table,$data)
	{
		$this->db->insert($table,$data);
		return true;
	}
}



