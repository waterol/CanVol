<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profileedit extends MY_Controller {

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
			$this->data['profile'] = $profile[0];
		else
		{
			redirect(base_url());
			exit();
		}

		$this->loadview('profileedit', $this->data);
	}
}
