<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->model("Volunteer_expert");
	}

	public function index($id = 0)
	{
		if($id == 0 && array_key_exists('volunteerid', $_SESSION))
		{
			$id = $_SESSION['volunteerid'];
		}

		if($id == 0 && !array_key_exists('volunteerid', $_SESSION))
		{
			redirect(base_url() . "login");
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
		
		$this->data['profile']['location'] = $this->Volunteer_expert->transform_location($this->data['profile']['location']);

		$this->data['profile']['stars'] = $this->Volunteer_expert->get_score($id);

		$this->data['profile']['hours'] = $this->Volunteer_expert->get_hours($id);

		if(file_exists("userimages/profileimage/" . $id .".jpg"))
			$this->data['profile']['portraitpath'] = "userimages/profileimage/" . $id . ".jpg";
		else
			$this->data['profile']['portraitpath'] = "img/defaultportrait.png";

		$this->loadview('profile', $this->data);
	}
}
