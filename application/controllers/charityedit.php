<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charityedit extends MY_Controller {

	public function index($id)
	{
		$this->loadview('charityedit');
	}
}
