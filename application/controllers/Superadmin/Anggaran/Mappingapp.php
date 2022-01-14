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
		$this->load->model('Superadmin/Anggaran/M_Mappingapp','Mappingapp');
	}

    public function Page()
	{

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");
		$data['mapp'] = $this->Mappingapp->getDataList();

        //$data['mapp'] = $this->Mappingapp->getData_Mapping($kdsatker,$thang,$user_id,$role_id,$unit_id);

        // var_dump($data['mapp']);exit;
        //$data['head'] = $this->db->query("SELECT SUM(rupiah) as jumlah, norevisi, tgrevisi from d_pagu WHERE d_pagu.kdsatker = ".$kdsatker." AND d_pagu.thang = ".$thang." ")->result();
		$this->load->view('Superadmin/Anggaran/Mappingapp/manage', $data);
	}

	public function detail(){
		$kdsatker = $this->uri->segment(5);
		$thang = $this->session->userdata("thang");

		$data['Satker'] = $this->Mappingapp->getNamaSatker($kdsatker);
		$data['mapp'] = $this->Mappingapp->getData_Mapping($kdsatker,$thang);

		$this->load->view('Superadmin/Anggaran/Mappingapp/detail',$data);
	}

    public function Tambah()
		{
            $var =  $this->uri->segment(5);

            $kdindex = str_replace("%20", " ", $var);
			$data['getmapp'] = $this->Mappingapp->getDetailApp($kdindex);
            $data['tambahmapp'] = $this->Mappingapp->CRUD($kdindex,'d_detailapp','R');
            $data['readmapp'] = $this->Mappingapp->CRUD($kdindex,'d_detailapp','R-table');

			$this->load->view('Superadmin/Anggaran/Mappingapp/tambah', $data);
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
