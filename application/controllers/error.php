<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error extends MY_Controller {

	public function __construct() {        
    	parent::__construct();
    }

	public function h404()
	{
		$this->loadview('errors/404');
	}
}
