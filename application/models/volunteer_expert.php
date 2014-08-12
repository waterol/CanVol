<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volunteer_expert extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_profile($id)
	{
		$sql = "select DISTINCT volunteer.id as id, volunteer.firstname, volunteer.lastname, volunteer.datejoined, volunteer.location, volunteer.description, user.username, charity.name, charity.id as charityid from volunteer JOIN user on volunteer.id = user.volunteerid JOIN charity on volunteer.favouritecharity = charity.id WHERE volunteer.id = ?";

		$result = $this->db->query($sql, $id);

		if($result->num_rows() == 1)
		{
			return $result->result_array();
		}

		return null;

	}

}