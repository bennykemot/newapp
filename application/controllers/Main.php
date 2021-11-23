<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Master/M_Dropdown','Dropdown');
	}
	

	public function index()
	{
		$data['thang'] = $this->Dropdown->getData_thang_nonAjax();
		//echo json_encode($response);
		$this->load->view('Login/Login',$data);
	}

	public function Home()
	{
		$this->load->view('Home/Home');
	}
}
