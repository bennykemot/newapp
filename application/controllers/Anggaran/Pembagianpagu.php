<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembagianpagu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
		$this->load->model('Anggaran/M_Pembagianpagu','Pembagianpagu');
	}

	public function index()
	{
		$this->load->view('Anggaran/Pembagianpagu/manage');
	}

	public function getPembagianPagu()
    {
		$kdsatker = $_POST['kdsatker'];
        $list = $this->Pembagianpagu->get_datatables($kdsatker);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['thang'] = $customers->thang;
            $row['kdsatker'] = $customers->kdsatker;
            $row['kdprogram'] = $customers->kdprogram;
            $row['kdgiat'] = $customers->kdgiat;
            $row['kdoutput'] = $customers->kdoutput;
            $row['kdsoutput'] = $customers->kdsoutput;
			$row['kdkmpnen'] = $customers->kdkmpnen;
            $row['username'] = $customers->username;
            $row['id'] = $customers->id;

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pembagianpagu->count_all($kdsatker),
                        "recordsFiltered" => $this->Pembagianpagu->count_filtered($kdsatker),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function Action()
    {

        $Trigger = $this->input->post('Trigger');
        if($Trigger == "C"){
            $nama_user = $this->input->post('nama_user');
            $kdsatker = $this->input->post('kdsatker');
            $kdprogram = $this->input->post('kdprogram');
            $kdgiat = $this->input->post('kdgiat');
            $kdoutput = $this->input->post('kdoutput');
            $kdsoutput = $this->input->post('kdsoutput');
            $kdkomponen = $this->input->post('kdkomponen');
            $trigger = $this->input->post('Trigger');

            $data = array(
                'thang' => '2021',
                'user_id' => $nama_user,
                'kdsatker' => $kdsatker,
                'kddept' => "089",
                'kdunit' => "01",
                'kdprogram' => $kdprogram,
                'kdgiat' => $kdgiat,
                'kdoutput' => $kdoutput,
                'kdsoutput' => $kdsoutput,
                'kdkmpnen' => $kdkomponen
                
                );
            $this->Pembagianpagu->CRUD($data,'d_bagipagu', $Trigger);
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->Pembagianpagu->CRUD($where,'d_bagipagu', $Trigger);

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            $where = array('id' => $id);
            $output = $this->Pembagianpagu->CRUD($where,'d_bagipagu', $Trigger);
            echo json_encode($output);
            
        }
        
    }
}
