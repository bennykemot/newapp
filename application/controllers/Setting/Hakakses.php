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
		//$satker = $this->uri->segment(4);
		//$userId = $this->uri->segment(5);
		//$roleId = $this->uri->segment(6);

		$jumlah = $this->Hakakses->Jum();
		$config['base_url'] = base_url().'Setting/Hakakses/Page/0';

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

		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);

		if($from == 1){
			$from = 0;
		};

		$data['hakakses'] = $this->Hakakses->Master($config['per_page'],$from);

		$this->load->view('Setting/Hakakses/Master',$data);
	}
	
	public function Action(){
		$Trigger = $this->input->post('Trigger');
		if($Trigger == "C"){
			$kdrole = $this->input->post('kdrole');
			$menu = $this->input->post('menu');
			$create = $this->input->post('create');
			$read = $this->input->post('read');
			$update = $this->input->post('update');
			$delete = $this->input->post('delete');

			$data_hakakses = array(
				'role_id' => $kdrole,
				'hak_menu' => $menu,
				'hak_c' => $create,
				'hak_r' => $read,
				'hak_u' => $update,
				'hak_d' => $delete
			);

			$this->HakAkses->CRUD($data_hakakses,'t_hakakses',$Trigger);

			
		}else if($Trigger == "D"){
			$id = $this->input->post('id');
			$where = array('id' => $id);
			$this->HakAkses->CRUD($where,'t_hakakses',$Trigger);

		}else if($Trigger == "R"){
			$id = $this->input->post('id');

			$output = $this->HakAkses->CRUD($id,'t_hakakses',$Trigger);
			echo json_encode($output);

		}else if($Trigger == "U"){
			$kdrole = $this->input->post('kdrole');
			$menu = $this->input->post('menu');
			$create = $this->input->post('create');
			$read = $this->input->post('read');
			$update = $this->input->post('update');
			$delete = $this->input->post('delete');

		
		}
	}

}
