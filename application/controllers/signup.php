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
		$volunteerid = $this->User_expert->create_volunteer($_POST['firstname'], $_POST['lastname'], $_POST['quadrant']);

		$this->User_expert->register_user($_POST['email'], $_POST['password'], $volunteerid);

		// Should check for a registration success. 

		// Dispatch email
		$this->load->library('parser');
		$this->load->library('email');

		$emailmodel['firstname'] = $_POST['firstname'];
		$emailmodel['activatelink'] = base_url() . "signup/activate/?k=" . $this->User_expert->crypt_email($_POST['email']);


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
		$email = $this->User_expert->decrypt_email($_GET['k']);	

		$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

		if (preg_match($pattern, trim($email)) === 1) {
			$this->User_expert->activate_account(trim($email));

			$this->loadview('signup_activated', $this->data);
		}
		else
		{
			$this->loadview('signup_activation_failed', $this->data);
		}

		

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
		if(!$this->User_expert->check_username_available($username))
		{
			$this->form_validation->set_message('username_available', 'Sorry, this e-mail is already in use. If this is you, you might need to recover your account.');
			return false;
		}

		return true;
	}
}
