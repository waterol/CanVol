<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends MY_Controller {

	public function index()
	{
		$this->loadview('contactus');
	}
}
