<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MappingApp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
		$this->load->model('Anggaran/M_Mappingapp','Mappingapp');
	}

	public function index()
	{
		$this->load->view('Anggaran/Mappingapp/manage');
	}

	public function getMappingApp()
    {
		$kdsatker = $_POST['kdsatker'];
        $list = $this->Mappingapp->get_datatables($kdsatker);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['kode'] = $customers->kode;
			$row['jumlah'] = $customers->jumlah;
			$row['uraian'] = $customers->nmsatker;
			$row['kdlevel'] = $customers->kdlevel;
            $row['kdindex'] = $customers->kdindex;

			$row['kdprogram'] = $customers->kdprogram;
			$row['kdgiat'] = $customers->kdgiat;

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Mappingapp->count_all($kdsatker),
                        "recordsFiltered" => $this->Mappingapp->count_filtered($kdsatker),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function getMappingApp_detail()
    {
		$id_r_mak = $_POST['id_r_mak'];
        $list = $this->Mappingapp->get_datatables_detail($id_r_mak);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['id'] = $customers->id;
            $row['nama_app'] = $customers->nama_app;
			$row['jumlah'] = $customers->jumlah;
			$row['id_r_mak'] = $customers->id_r_mak;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Mappingapp->count_all_detail($id_r_mak),
                        "recordsFiltered" => $this->Mappingapp->count_filtered_detail($id_r_mak),
                        "data" => $data,
                );
        echo json_encode($output);
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
