<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotaDinas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->model('Transaksi/M_SuratTugas','SuratTugas');
	}

	public function index()
	{

		$this->load->view('Transaksi/NotaDinas/manage');
	}
}