<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MappingApp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
        $this->load->library('pagination');
        $this->load->library('session');
		$this->load->model('Anggaran/M_Mappingapp','Mappingapp');
	}

	public function index()
	{
        
	}

    public function Page(){

        $satker = $this->uri->segment(4);

        $jumlah_data = $this->Mappingapp->Jum();
        $config['base_url'] = base_url().'Anggaran/Mappingapp/Page/'.$satker.'';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;

        $config['full_tag_open'] = "<ul id='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li >';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li >';
        $config['last_tag_close'] = '</li>';



        $config['prev_link'] = '<i class="mdi-navigation-chevron-left"></i> Previous';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = 'Next <i class="mdi-navigation-chevron-right"></i>';
        $config['next_tag_open'] = '<li >';
        $config['next_tag_close'] = '</li>';


		$from =  ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$this->pagination->initialize($config);

        $kdsatker =  $satker;
        $data['mapp'] = $this->Mappingapp->getDataNew($kdsatker, $config['per_page'], $from);

        //$data['mapp'] = $this->Page();
        
		$this->load->view('Anggaran/Mappingapp/manage',$data);

    }

    

    public function Action()
    {

        $Trigger = $this->input->post('Trigger');
        $app = $this->input->post('app');
        $output = $this->db->query('select id, nama_app from t_app where id = "'.$app.'"')->result_array();

        
        if($Trigger == "C"){
            $nilai_app = $this->input->post('nilai_app');
            $pkpt = $this->input->post('pkpt');
            $id_r_mak = $this->input->post('kodeindex');

            $data = array(
                'nama_app' => $output[0]['nama_app'],
                'jumlah' => $nilai_app,
                'id_r_mak' => $id_r_mak
                
                );
            $this->Mappingapp->CRUD($data,'d_detailapp', $Trigger);
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->Mappingapp->CRUD($where,'d_detailapp', $Trigger);

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            $where = array('id' => $id);
            $output = $this->Mappingapp->CRUD($where,'d_detailapp', $Trigger);
            echo json_encode($output);
            
        }
        
    }
}
