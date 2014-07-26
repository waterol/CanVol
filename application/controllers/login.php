<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {        
    	parent::__construct();
	}

	public function index()
	{
		$this->loadview('login');
	}

	public function dologin()
	{
		// process form

		$this->load->model("User_expert");
		$result = $this->User_expert->authenticate_user("sean", "examplepassword");

		print_r($result);

	}
	
}
