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

	public function Action(){
		$Trigger = $this->input->post('Trigger');

		if($Trigger == "C"){
			$kdmenu = $this->input->post('kdmenu');
			$nmenu = $this->input->post('nmenu');
			$icon = $this->input->post('icon');
			$link = $this->input->post('link');
			$parent_menu = $this->input->post('parent_menu');
			$status = $this->input->post('status');


		$data_menu = array(
			'kode_menu' => $kdmenu,
			'nama_menu' => $nmenu,
			'icon' => $icon,
			'link' => $link,
			'parent_menu' => $parent_menu,
			'status' => $status
		);

		$this->Menu->CRUD($data_menu,'r_menu',$Trigger);

		$where = array('kode_menu' => $kdmenu);
		$cek = $this->Menu->cek($where,'r_menu')->result_array();

		$data = array();
		

		}
	}
}
