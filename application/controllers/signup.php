<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	public function index()
	{
		$this->loadview('signup');
	}
}
