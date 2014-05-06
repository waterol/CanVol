<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charityprofile extends MY_Controller {

	public function index()
	{
		$this->loadview('charityprofile');
	}

	public function generateCalendar()
	{
		$this->load->view('democalendar');
		
	}
}
