<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->helper('recaptcha');
    	$this->data['publickey'] = get_recaptcha_public_key();
	}

	public function index()
	{
		$this->loadview('signup', $this->data);
	}

	public function doregister()
	{
		$registersuccess = false;

		// process form
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('yearofbirth', 'Year of Birth', 'trim|required');
		$this->form_validation->set_rules('quadrant', 'City Quadrant', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password (Confirm)', 'trim|required');
		$this->form_validation->set_rules('recaptcha_response_field', 'CAPTCHA', 'required|callback_captcha_check');

		if ($this->form_validation->run() == FALSE)
		{
			$this->loadview('signup', $this->data);
			return;
		}

		$this->load->model("User_expert");
		$userid = $this->User_expert->register_user("sean", "examplepassword");

		if($userid != NULL)
			$registersuccess = $this->User_expert->create_volunteer($userid, $firstname, $lastname, $location);

		if($registersuccess)
		{

		}
	}

	public function captcha_check($dummy)
	{
		$resp = recaptcha_check_answer (get_recaptcha_private_key(),
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

		if(!$resp->is_valid)
		{
			$this->form_validation->set_message('captcha_check', 'The CAPTCHA was wrong, please try again!');
			return false;
		}

		return true;

	}
}
