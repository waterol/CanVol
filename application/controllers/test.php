<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends MY_Controller {

	public function index()
	{
		$this->load->view('test');
	}

	public function signupsucess()
	{
		$this->loadview('signup_success');
	}

	public function signupactivated()
	{
		$this->loadview('signup_activated');
	}
}
