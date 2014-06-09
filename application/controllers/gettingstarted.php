<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gettingstarted extends MY_Controller {

	public function index()
	{
		$this->loadview('gettingstarted');
	}
}
