<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_expert extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function register_user($username, $password, $volunteerid = NULL)
	{
		$salt = $this->make_salt();
		$hashed = $this->hash_password($password, $salt);

		$sql = "INSERT INTO `user` (`id`,  `volunteerid`, `username`, `password`, `salt`) VALUES (NULL, ?, ?, ?, ?)";
		$this->db->query($sql, array($volunteerid, $username, $hashed, $salt));
	}

	function create_volunteer($firstname, $lastname, $location)
	{
		$sql = "INSERT INTO `volunteer` (`id`, `firstname`, `lastname`, `datejoined`, `location`) VALUES (NULL, ?, ?, ?, ?)";
		$this->db->query($sql, array($firstname, $lastname, time(), $location));

		return $this->db->insert_id();

	}

	public function crypt_email($email)
	{
		$key = get_email_crypt_key();

		$pkey = pack('H*', $key);

		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

		$cipher = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $pkey, $email, MCRYPT_MODE_CBC, $iv);

		return rawurlencode(base64_encode($iv . $cipher));
	}

	public function decrypt_email($cipher)
	{
		$key = get_email_crypt_key();

		//$cipher = urldecode($cipher);

		$pkey = pack('H*', $key);

		$cipher_raw = base64_decode($cipher);

		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$iv_dec = substr($cipher_raw, 0, $iv_size);

		$cipher_raw = substr($cipher_raw, $iv_size);

		return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $pkey, $cipher_raw, MCRYPT_MODE_CBC, $iv_dec);


	}

	public function authenticate_user($username, $password)
	{
		$sql = "SELECT DISTINCT `salt` FROM `user` WHERE `username` = ?";
		$result = $this->db->query($sql, array($username));

		if($result->num_rows() != 1)
		{
			return NULL;
		}

		$rdata = $result->result_array();

		$salt = $rdata[0]['salt'];

		$hashed = $this->hash_password($password, $salt);

		$sql = "select distinct `id`, `username`, `volunteerid`, `volunteer`.`firstname` from `user` join `volunteer` ON `user`.`volunteerid` = `volunteer`.`id` WHERE `username` = ? AND `password` = ?";
		
		$result = $this->db->query($sql, array($username, $hashed));

		if($result->num_rows() == 1)
		{
			return $result->result_array();
		}

		return NULL;

	}

	public function activate_account($email)
	{
		$sql = "UPDATE `user` SET `emailvalidated` = 1 WHERE `username` = ?";
		$this->db->query($sql, array($email));
	}

	public function check_username_available($username)
	{
		$sql = "SELECT DISTINCT `id` FROM `user` WHERE `username` = ?";
		$result = $this->db->query($sql, array($username));

		if($result->num_rows() > 0)
			return false;
		return true;
	}

	private function make_salt()
	{
		return mcrypt_create_iv( 16, MCRYPT_DEV_URANDOM);
	}

	private function hash_password($password, $salt)
	{
		for($i=0; $i<5; $i++)
			$password = sha1($salt . $password);

		return $password;
	}



}

?>