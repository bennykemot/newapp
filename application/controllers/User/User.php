<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Profile/M_Profile','Profile');
	}

	public function index()
	{
		$this->load->view('User/User');
	}
}