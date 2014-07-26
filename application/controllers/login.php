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
		if(!array_key_exists('username', $_POST) || $_POST['username'] == "")
		{
			$data['loginerror'] = "Please enter a username";
			$this->loadview('login', $data);
			return;
		}

		if(!array_key_exists('password', $_POST) || $_POST['password'] == "")
		{
			$data['loginerror'] = "Please enter a password";
			$this->loadview('login', $data);
			return;
		}

		$this->load->model("User_expert");
		$result = $this->User_expert->authenticate_user($_POST['username'], $_POST['password']);

		if($result != NULL)
		{
			echo("<p>The login was successful ^_^</p><p>Normally, I would redirect you to your profile...</p>");

			echo("<p>Logged in user details:</p>");
			print_r($result);
		}
		else
		{
			$data['loginerror'] = "Bad username or password";
			$this->loadview('login', $data);
			return;
		}

	}
	
}
