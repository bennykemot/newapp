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
}
