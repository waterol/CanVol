<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profileedit extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->model("Volunteer_expert");
    	$this->load->model("Charity_expert");
	}

	public function index($id)
	{
		if($id == 0)
		{
			redirect(base_url());
			exit();
		}

		if($_SESSION['volunteerid'] != $id)
		{
			redirect(base_url() . "profile/" . $id);
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

		$this->data['charities'] = $this->Charity_expert->get_all_charities();
		
		$this->data['profile']['location'] = $this->Volunteer_expert->transform_location($this->data['profile']['location']);

		$this->data['profile']['stars'] = $this->Volunteer_expert->get_score($id);

		if(file_exists("userimages/profileimage/" . $id .".jpg"))
			$this->data['profile']['portraitpath'] = "userimages/profileimage/" . $id . ".jpg";
		else
			$this->data['profile']['portraitpath'] = "img/defaultportrait.png";

		$this->loadview('profileedit', $this->data);
	}

	public function save()
	{

	}
}
