<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browsecharities extends MY_Controller {

	public function index()
	{
		$this->loadview('browsecharities');
	}
}
