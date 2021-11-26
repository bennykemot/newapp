<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Setting/M_Menu','Menu');
	}

	public function index()
	{
		$this->load->view('Setting/Menu/Master');
	}

    public function Master()
	{

		$output = $this->Menu->Master();
		echo json_encode(array("data" => $output));
		//$this->load->view('Setting/Menu/Master', $data);
	}

}