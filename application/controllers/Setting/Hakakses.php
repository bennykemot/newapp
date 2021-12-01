<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hakakses extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
		$this->load->library("pagination");
		$this->load->model('Setting/M_Hakakses','Hakakses');
	}

	public function index()
	{

	}

    public function Master()
	{
		$output = $this->Hakakses->Master();
		echo json_encode(array("data" => $output));
		//$this->load->view('Setting/Menu/Master', $data);
	}

	public function Page(){
		$satker = $this->uri->segment(4);
		//$userId = $this->uri->segment(5);
		//$roleId = $this->uri->segment(6);

		$jumlah = $this->Hakakses->Jum($satker);
		$config['base_url'] = base_url().'Setting/Hakakses/Page/'.$satker;

		$config['total_rows'] = $jumlah;
		$config['per_page'] = 20;

		$config['first_url'] = '1';
		$config['first_link'] = false;
		$config['last_link'] = false;

		$config['full_tag_open'] = "<ul class='pagination' >";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li >';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li >';
        $config['last_tag_close'] = '</li>';

		$config['prev_link'] = '<i style="font-size: 0px !important" ></i> Previous';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = 'Next <i style="font-size: 0px !important" ></i>';
        $config['next_tag_open'] = '<li >';
        $config['next_tag_close'] = '</li>';

		$from = $this->uri->segment(5);
		$this->pagination->initialize($config);

		if($from == 1){
			$from = 0;
		};

		$data['hakakses'] = $this->Hakakses->Master($satker, $config['per_page'],$from);

		$this->load->view('Setting/Menu/Hakakses/Master',$data);
	}

}
