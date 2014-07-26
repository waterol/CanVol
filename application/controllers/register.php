<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

	public function __construct() {        
    	parent::__construct();
	}

	public function index()
	{
		$this->loadview('register');
	}

	public function doregister()
	{
		// process form


		$this->load->model("User_expert");
		$this->User_expert->register_user("sean", "examplepassword");

	}
}
