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
			$_SESSION['userid'] = $result[0]['id'];
			$_SESSION['email'] = $result[0]['username'];
			$_SESSION['volunteerid'] = $result[0]['volunteerid'];

			session_write_close();
			
			redirect(base_url());
		}
		else
		{
			$data['loginerror'] = "Bad username or password";
			$this->loadview('login', $data);
			return;
		}

	}

	public function logout()
	{
		$_SESSION = Array();
		session_write_close();

		redirect(base_url());
	}
	
}
