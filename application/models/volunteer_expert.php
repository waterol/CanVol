<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volunteer_expert extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_profile($id)
	{
		$sql = "select DISTINCT volunteer.id as id, volunteer.firstname, volunteer.lastname, volunteer.datejoined, volunteer.location, volunteer.description, user.username, charity.name as charityname, charity.id as charityid from volunteer JOIN user on volunteer.id = user.volunteerid LEFT JOIN charity on volunteer.favouritecharity = charity.id WHERE volunteer.id = ?";

		$result = $this->db->query($sql, $id);

		if($result->num_rows() == 1)
		{
			return $result->result_array();
		}

		return null;

	}

	function get_score($volunteerid)
	{
		$sql = "SELECT count(DISTINCT `charityreviewstar`.`id`) as stars FROM `charityreviewstar` JOIN `charityreview` ON `charityreview`.`id` = `charityreviewstar`.`charityreviewid` WHERE `charityreview`.`volunteerid` = ?";

		$result = $this->db->query($sql, $volunteerid);

		if($result->num_rows() == 1)
		{
			$arr = $result->result_array();
			return $arr[0]['stars'];
		}

		return 0;
	}

	function transform_location($location)
	{
		switch($location)
		{
			case "nw":
				return "NorthWest";
			case "sw":
				return "SouthWest";
			case "ne":
				return "NorthEast";
			case "se":
				return "SouthEast";
			case "downtown":
				return "Downtown";

		}


	}

}