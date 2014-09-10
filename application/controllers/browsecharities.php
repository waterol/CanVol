<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Browsecharities extends MY_Controller {

	private $data = array();

	public function __construct() {        
    	parent::__construct();

    	$this->load->model("Charity_expert");
	}

	public function index()
	{
		$this->data['charities'] = $this->Charity_expert->get_all_charities_with_meta_data();

		$this->loadview('browsecharities', $this->data);
	}
}
