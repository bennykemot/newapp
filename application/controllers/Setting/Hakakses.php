<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hakakses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Setting/M_Hakakses','Hakakses');
	}

	public function index()
	{
		$this->load->view('Setting/Hakakses/Master');
	}

    public function Master()
	{

		$output = $this->Hakakses->Master();
		echo json_encode(array("data" => $output));
		//$this->load->view('Setting/Menu/Master', $data);
	}

}