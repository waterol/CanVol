<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->helper('recaptcha');
		$this->load->model("User_expert");

    	$this->data['publickey'] = get_recaptcha_public_key();
	}

	public function index()
	{
		$this->loadview('signup', $this->data);
	}

	public function doregister()
	{
		// process form
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('yearofbirth', 'Year of Birth', 'trim|required');
		$this->form_validation->set_rules('quadrant', 'City Quadrant', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_username_available');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password (Confirm)', 'trim|required');
		$this->form_validation->set_rules('recaptcha_response_field', 'CAPTCHA', 'required|callback_captcha_check');

		if ($this->form_validation->run() == FALSE)
		{
			$this->loadview('signup', $this->data);
			return;
		}

		// perform registration
		$volunteerid = $this->User_expert->register_user($_POST['firstname'], $_POST['lastname'], $_POST['quadrant']);

		$this->User_expert->register_user($_POST['email'], $_POST['password'], $volunteerid);

		// Should check for a registration success. 

		// Dispatch email
		$this->load->library('parser');
		$this->load->library('email');

		$emailmodel['firstname'] = $_POST['firstname'];
		$emailmodel['activatelink'] = base_url() . "signup/activate/?k=" . $this->user_expert->crypt_email($_POST['email']);


		$config['useragent'] = 'canvol.org';
		

		$this->email->initialize($config);

		$mailbody = $this->parser->parse('emails/welcome', $emailmodel, TRUE);

		$this->email->from("hello@canvol.org", "CanVol.org Friendly Welcoming Robot");
		$this->email->to($_POST['email']); 

		$this->email->subject("Welcome to CanVol.org! Please verify your e-mail");
		$this->email->message($mailbody);
		$this->email->send();

		$this->loadview('signup_success', $this->data);
	}

	public function activate()
	{
		echo $this->User_expert->crypt_email("test@example.com");		
		echo "<BR>";
		echo $this->User_expert->decrypt_email($_GET['k']);	

	}

	// callback for form validation
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

	public function username_available($username)
	{
		if(!check_username_availble($username))
		{
			$this->form_validation->set_message('email', 'Sorry, this e-mail is already in use. If this is you, you might need to recover your account.');
			return false;
		}

		return true;
	}
}
