<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charity_expert extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_all_charities()
	{
		$sql = "select * from charity";

		$result = $this->db->query($sql);

		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}

		return null;

	}

}