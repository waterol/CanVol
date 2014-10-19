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

		$this->Charity_expert->applyreview($reviewdata);

		$_SESSION['message'] = "Review Posted!";

		redirect(base_url() . "charity/" . $_SESSION['currentcharity']);
		
	}
}
