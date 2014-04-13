<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function index()
	{
		$this->loadview('profile');
	}
}
