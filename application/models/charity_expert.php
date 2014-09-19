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

	function get_all_charities_with_meta_data()
	{
		$sql = "select charity.id, name, location, agegroup_min, agegroup_max, focus, quadrant, avg(rating) as score, count(charityreview.id) as reviewcount from charity left join charityreview on charityreview.charityid = charity.id group by charity.id, charity.name, charity.location";

		$result = $this->db->query($sql);

		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}

		return null;
	}

	function create_charity($name)
	{

		$sql = "INSERT INTO `charity` (`id`, `name`) VALUES (NULL, ?)";
		$this->db->query($sql, array($name));
		return $this->db->insert_id();
	}

	function get_profile($id)
	{
		$sql = "select * from charity where id = ?";

		$result = $this->db->query($sql, $id);

		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}

		return null;
	}


	function get_reviews($id)
	{
		$sql = "select distinct charityreview.id, volunteer.firstname, volunteer.lastname, charityreview.datestamp, charityreview.rating, charityreview.review, charityreview.hours from charityreview join volunteer on volunteer.id = charityreview.volunteerid where charityid = ? order by datestamp desc";

		$result = $this->db->query($sql, $id);

		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}

		return null;
	}

	function get_profile_by_name($name)
	{
		$sql = "select * from charity where name = ?";

		$result = $this->db->query($sql, $name);

		if($result->num_rows() > 0)
		{
			return $result->result_array();
		}

		return null;
	}

	function get_score($id)
	{
		// do some maths
		$sql = "select avg(rating) as score from charityreview where charityid = ?";

		$result = $this->db->query($sql, $id);
		return round($result->row()->score * 25);

	}

	function applyreview($reviewdata)
	{
		$this->db->insert('charityreview', $reviewdata); 

	}

}