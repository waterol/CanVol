<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Createcharity extends MY_Controller {

	public function index()
	{
		if(!array_key_exists('volunteerid', $_SESSION))
		{
			redirect(base_url() . "login");
			die();
		}

		$this->loadview('createcharity');
	}

	public function docreate()
	{	
		if(!array_key_exists('volunteerid', $_SESSION))
		{
			redirect(base_url() . "login");
			die();
		}

		$this->load->model("Charity_expert");


		if(!is_null($this->Charity_expert->get_profile_by_name($_POST['charityname'])))
		{
			die("Charity already exists!");
		}

		$id = $this->Charity_expert->create_charity($_POST['charityname']);

		redirect(base_url() . "charity/" . $id);



	}
}
