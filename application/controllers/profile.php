<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->model("Volunteer_expert");
	}

	public function index($id)
	{
		if($id == 0)
		{
			redirect(base_url());
			exit();
		}

		$profile = $this->Volunteer_expert->get_profile($id);

		if($profile != null)
			$data['profile'] = $profile;
		else
		{
			redirect(base_url());
			exit();
		}

		$this->loadview('profile', $this->data);
	}
}
