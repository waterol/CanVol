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

		$_SESSION['currentcharity'] = $id;

		$this->loaddata();

		$this->loadview('charity', $this->data);
	}

	private function loaddata()
	{
		$profile = $this->Charity_expert->get_profile($_SESSION['currentcharity']);

		if($profile != null)
			$this->data['profile'] = $profile[0];
		else
		{
			redirect(base_url());
			exit();
		}

		// Determine profile image path
		if(file_exists("userimages/charityimage/" . $_SESSION['currentcharity'] .".jpg"))
			$this->data['profile']['portraitpath'] = "userimages/charityimage/" . $_SESSION['currentcharity'] . ".jpg";
		else
			$this->data['profile']['portraitpath'] = "img/defaultcharityportrait.png";

		// Get average score
		$this->data['profile']['rating'] = $this->Charity_expert->get_score($_SESSION['currentcharity']);

		if($this->data['profile']['rating'] == 0)
			$this->data['profile']['rating'] = "??";

		// get reviews
		$this->data['reviews'] = $this->Charity_expert->get_reviews($_SESSION['currentcharity']);

		// get images
		$this->data['images'] = $this->Charity_expert->get_images($_SESSION['currentcharity']);

		if(array_key_exists('message', $_SESSION))
		{
			$this->data['message'] = $_SESSION['message'];

			unset($_SESSION['message']);
		}

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
			redirect(base_url() . "browsecharities");
			exit();
		}

		// Validation
		$this->form_validation->set_rules('rating', 'Rating', 'trim|required|xss_clean|greater_than[-1]|less_than[5]');
		$this->form_validation->set_rules('review', 'Review', 'trim|required|xss_clean');
		$this->form_validation->set_rules('hours', 'Hours', 'trim|required|xss_clean|greater_than[-1]|less_than[500]');
		$this->form_validation->set_rules('experienceimage[]', 'Image 1', 'trim|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->loaddata();
			$this->loadview('charity', $this->data);
			return;
		}

		// Data loading
		$reviewdata['volunteerid'] = $_SESSION['volunteerid'];
		$reviewdata['charityid'] = $_SESSION['currentcharity'];
		$reviewdata['datestamp'] = time();
		$reviewdata['rating'] = $_POST['rating'];
		$reviewdata['review'] = $_POST['review'];
		$reviewdata['hours'] = $_POST['hours'];

		$reviewid = $this->Charity_expert->applyreview($reviewdata);

		// upload images
		$filearray = array();
		
		if(!empty($_FILES))
		{
			$_MYFILES = array();
			$_FILES = $_FILES['experienceimage'];
			foreach(array_keys($_FILES['name']) as $i) { // loop over 0,1,2,3 etc...
			   foreach(array_keys($_FILES) as $j) { // loop over 'name', 'size', 'error', etc...
			      $_MYFILES[$i][$j] = $_FILES[$j][$i]; // "swap" keys and copy over original array values
			   }
			}

			foreach($_MYFILES as $file)
			{
				print_r($file);
				if($file['name'] == "")
					continue; 

				$filename = $this->doupload($file);

				$imagedata['volunteerid'] = $_SESSION['volunteerid'];
				$imagedata['charityid'] = $_SESSION['currentcharity'];
				$imagedata['charityreviewid'] = $reviewid;
				$imagedata['imagepath'] = $filename;

				$this->Charity_expert->addimagetoreview($imagedata);
			}
		}

		$_SESSION['message'] = "Review Posted!";

		redirect(base_url() . "charity/" . $_SESSION['currentcharity']);
		
	}

	private function doUpload($file)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", @$file["name"]);
		$extension = tolower(end($temp));
		$genname = $this->random_string(30) . "." . $extension;

		if (((@$file["type"] == "image/jpeg")
		|| (@$file["type"] == "image/jpg")
		|| (@$file["type"] == "image/pjpeg")
		|| (@$file["type"] == "image/x-png")
		|| (@$file["type"] == "image/png"))
		&& (@$file["size"] < 5000000)
		&& in_array($extension, $allowedExts)) {
		  if ($file["error"] > 0) {
		    die($file["error"]);

		  } else {
		      move_uploaded_file($file["tmp_name"], "userimages/volunteerimages/" . $genname);
		  }
		} else {
		  print_r($file);
		  die("Picture must be under 5 MB, and must be a JPG or PNG! Please go back and try again.");
		}

		return $genname;
	}

	private function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}
}
