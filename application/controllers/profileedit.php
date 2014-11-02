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
		
		$this->data['profile']['stars'] = $this->Volunteer_expert->get_score($id);


		$this->data['profile']['hours'] = $this->Volunteer_expert->get_hours($id);

		if(file_exists("userimages/profileimage/" . $id .".jpg"))
			$this->data['profile']['portraitpath'] = "userimages/profileimage/" . $id . ".jpg";
		else
			$this->data['profile']['portraitpath'] = "img/defaultportrait.png";

		$this->loadview('profileedit', $this->data);
	}

	public function save()
	{
		// assemble results from POST to look more organized
		$save['location'] = $_POST['location'];
		$save['description'] = $_POST['description'];
		$save['favouritecharity'] = $_POST['charityname'];

		$this->Volunteer_expert->update($_SESSION['volunteerid'], $save);

		redirect(base_url() . "profile/" . $_SESSION['volunteerid']);

	}

	public function updateportrait()
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", @$_FILES["newportrait"]["name"]);
		$extension = tolower(end($temp));

		if (((@$_FILES["newportrait"]["type"] == "image/jpeg")
		|| (@$_FILES["newportrait"]["type"] == "image/jpg")
		|| (@$_FILES["newportrait"]["type"] == "image/pjpeg")
		|| (@$_FILES["newportrait"]["type"] == "image/x-png")
		|| (@$_FILES["newportrait"]["type"] == "image/png"))
		&& (@$_FILES["newportrait"]["size"] < 2000000)
		&& in_array($extension, $allowedExts)) {
		  if ($_FILES["newportrait"]["error"] > 0) {
		    die($_FILES["newportrait"]["error"]);

		  } else {
		      move_uploaded_file($_FILES["newportrait"]["tmp_name"], "userimages/profileimage/" . $_SESSION['volunteerid'] . ".jpg");
		  }
		} else {
		  die("Picture must be under 2 MB, and must be a JPG or PNG! Please go back and try again.");
		}

		redirect(base_url() . "profileedit/" . $_SESSION['volunteerid']);
	}
}








