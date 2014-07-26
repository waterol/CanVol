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
		$this->db->query($sql, array($volunteerid, $username, $password, $salt));
	}

	private function make_salt()
	{
		return openssl_random_pseudo_bytes(16);
	}

	private function hash_password($password, $salt)
	{
		for($i=0; $i<5; $i++)
			$password = sha1($salt . $password);

		return $password;
	}

}

?>