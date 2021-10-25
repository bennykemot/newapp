<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('User/M_User','User');
	}

	public function index()
	{
		$this->load->view('User/User');
	}

	public function User(){
		$user_id = $this->uri->segment(4);

		$data['user'] = $this->User->getUser($user_id);
		// echo json_encode($output);
		$this->load->view('User/User', $data);

	}
}