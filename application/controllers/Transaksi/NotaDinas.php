<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotaDinas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->model('Transaksi/M_NotaDinas','NotaDinas');
	}

	public function index()
	{
		$data['NotaDinas']= $this->NotaDinas->getDataNew();
		$this->load->view('Transaksi/NotaDinas/manage',$data);
	}

	public function tambah()
	{
		$this->load->view('Transaksi/NotaDinas/tambah');
	}

	public function getData(){
			$Trigger = $this->input->post('Trigger');
			$id = $this->input->post('id');
            $output = $this->NotaDinas->CRUD($id,'d_surattugas', $Trigger);
            echo json_encode($output);
	}
}