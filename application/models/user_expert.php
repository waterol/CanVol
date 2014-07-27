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

		$sql = "select `id`, `username`, `volunteerid` from `user` WHERE `username` = ? AND `password` = ?";
		
		$result = $this->db->query($sql, array($username, $hashed));

		if($result->num_rows() == 1)
		{
			return $result->result_array();
		}

		return NULL;

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