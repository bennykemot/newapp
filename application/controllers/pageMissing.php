<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pageMissing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
	}

	public function pageMissing()
	{
		$this->load->view('Error404');
	}

}