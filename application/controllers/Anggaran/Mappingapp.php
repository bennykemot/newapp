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

    public function Page()
	{

        
        $kdsatker =  $this->uri->segment(4);
        $thang =  $this->uri->segment(5);
        $userid =  $this->uri->segment(6);
        $roleid =  $this->uri->segment(7);
        $unit_id =  $this->uri->segment(8);
        $data['mapp'] = $this->Mappingapp->getData_Mapping($kdsatker,$thang,$userid,$roleid,$unit_id);
        //$data['head'] = $this->db->query("SELECT SUM(rupiah) as jumlah, norevisi, tgrevisi from d_pagu WHERE d_pagu.kdsatker = ".$kdsatker." AND d_pagu.thang = ".$thang." ")->result();
		$this->load->view('Anggaran/Mappingapp/manage', $data);
	}

    public function Tambah()
		{
            $var =  $this->uri->segment(4);

            $kdindex = str_replace("%20", " ", $var);
            $data['tambahmapp'] = $this->Mappingapp->CRUD($kdindex,'d_detailapp','R');
            $data['readmapp'] = $this->Mappingapp->CRUD($kdindex,'d_detailapp','R-table');

			$this->load->view('Anggaran/Mappingapp/tambah', $data);
		}

    public function Ubah()
		{

			$this->load->view('Anggaran/Mappingapp/ubah');
		}

    

    // public function Page(){

    //     $satker = $this->uri->segment(4);
    //     $userId =  $this->uri->segment(5);
    //     $roleId = $this->uri->segment(6);

    //     $jumlah_data = $this->Mappingapp->Jum($satker,$userId, $roleId);
    //     $config['base_url'] = base_url().'Anggaran/Mappingapp/Page/'.$satker.'/'.$userId.'/'.$roleId;
	// 	$config['total_rows'] = $jumlah_data;
	// 	$config['per_page'] = 20;

    //     $config['first_url'] = '1';
    //     $config['first_link'] = false;
    //     $config['last_link'] = false;

    //     $config['full_tag_open'] = "<ul class='pagination' >";
    //     $config['full_tag_close'] = '</ul>';
    //     $config['num_tag_open'] = '<li >';
    //     $config['num_tag_close'] = '</li>';
    //     $config['cur_tag_open'] = '<li><a class="active" >';
    //     $config['cur_tag_close'] = '</a></li>';
    //     $config['prev_tag_open'] = '<li >';
    //     $config['prev_tag_close'] = '</li>';
    //     $config['first_tag_open'] = '<li >';
    //     $config['first_tag_close'] = '</li>';
    //     $config['last_tag_open'] = '<li >';
    //     $config['last_tag_close'] = '</li>';



    //     $config['prev_link'] = '<i style="font-size: 0px !important" ></i> Previous';
    //     $config['prev_tag_open'] = '<li >';
    //     $config['prev_tag_close'] = '</li>';


    //     $config['next_link'] = 'Next <i style="font-size: 0px !important" ></i>';
    //     $config['next_tag_open'] = '<li >';
    //     $config['next_tag_close'] = '</li>';


	// 	$from =  $this->uri->segment(7);
	// 	$this->pagination->initialize($config);

    //     if($from == 1){
    //         $from = 0;
    //     };

    //     $kdsatker =  $satker;
    //     $data['mapp'] = $this->Mappingapp->getDataNew($satker, $config['per_page'], $from, $userId, $roleId);
        
    //     //$data['mapp'] = $this->Page();

    //     //echo json_encode($data)
        
	// 	$this->load->view('Anggaran/Mappingapp/manage',$data);

    // }

    

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
