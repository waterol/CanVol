<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		require('E:/xampp/htdocs/canvol/blog/wp-blog-header.php');
		$this->loadview('home');
	}
}
