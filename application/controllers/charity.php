<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charity extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->model("Charity_expert");
	}

	public function index($id = 0)
	{
    	if($id == 0 && !array_key_exists('currentcharity', $_SESSION))
		{
			redirect(base_url());
			exit();
		}

		if($id == 0 && array_key_exists('currentcharity', $_SESSION))
		{
			//  Want to update browser URL instead of just setting the variable
			redirect(base_url() . "charity/" . $_SESSION['currentcharity']);
			exit();
		}

		$profile = $this->Charity_expert->get_profile($id);

		if($profile != null)
			$this->data['profile'] = $profile[0];
		else
		{
			redirect(base_url());
			exit();
		}

		if(file_exists("userimages/charityprofileimage/" . $id .".jpg"))
			$this->data['profile']['portraitpath'] = "userimages/profileimage/" . $id . ".jpg";
		else
			$this->data['profile']['portraitpath'] = "img/defaultcharityportrait.png";

		$this->data['profile']['rating'] = $this->Charity_expert->get_score($id);


		$_SESSION['currentcharity'] = $id;


		$this->loadview('charity', $this->data);
	}

	public function generateCalendar()
	{
		$this->load->view('democalendar');
		
	}

	public function doReview()
	{
		// can't review a charity without first visiting it
    	if(!array_key_exists('currentcharity', $_SESSION))
		{
			redirect(base_url());
			exit();
		}



		
	}
}
