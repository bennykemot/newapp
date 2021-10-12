<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('Login/Login');
	}

	public function Home()
	{
		$this->load->view('Home/Home');
	}
}
