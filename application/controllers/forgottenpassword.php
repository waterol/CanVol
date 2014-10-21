<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forgottenpassword extends MY_Controller {

	public function index()
	{
		require('./blog/wp-blog-header.php');
		$this->loadview('forgottenpassword');
	}
}
