<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contactus extends MY_Controller {

	public function index()
	{
		$this->loadview('contactus');
	}

	public function contact()
	{
		$this->load->library('email');

		$this->email->from($_POST['emailaddress'], $_POST['yourname']);
		$this->email->to('liam@canvol.org'); 

		$this->email->subject('E-mail from CanVol.org');
		$this->email->message($_POST['questionsorcomment']);	

		$this->email->send();

		$this->loadview('contactusdone');
	}

}
