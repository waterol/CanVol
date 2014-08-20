<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charity extends MY_Controller {

	public function index()
	{
		$this->loadview('charityprofile');
	}

	public function generateCalendar()
	{
		$this->load->view('democalendar');
		
	}
}
