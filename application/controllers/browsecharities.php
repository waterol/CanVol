<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browsecharities extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->model("Charity_expert");
	}

	public function search()
	{
		if(!isset($_POST['terms']))
			$_POST['terms'] = "";
		
		$this->data['charities'] = $this->Charity_expert->search_charities_with_meta_data($_POST['terms']);

		for($i=0;$i<count($this->data['charities']);$i++)
		{

			// Determine profile image path
			if(file_exists("userimages/charityimage/" . $this->data['charities'][$i]['id'] .".jpg"))
				$this->data['charities'][$i]['portraitpath'] = "userimages/charityimage/" . $this->data['charities'][$i]['id'] . ".jpg";
			else
				$this->data['charities'][$i]['portraitpath'] = "img/defaultcharityportrait.png";
		}

		$this->loadview('browsecharities', $this->data);
	}

	public function index()
	{
		$this->data['charities'] = $this->Charity_expert->get_all_charities_with_meta_data();

		for($i=0;$i<count($this->data['charities']);$i++)
		{

			// Determine profile image path
			if(file_exists("userimages/charityimage/" . $this->data['charities'][$i]['id'] .".jpg"))
				$this->data['charities'][$i]['portraitpath'] = "userimages/charityimage/" . $this->data['charities'][$i]['id'] . ".jpg";
			else
				$this->data['charities'][$i]['portraitpath'] = "img/defaultcharityportrait.png";
		}

		$this->loadview('browsecharities', $this->data);
	}
}
