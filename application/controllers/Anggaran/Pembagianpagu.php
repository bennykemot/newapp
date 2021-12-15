<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembagianpagu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
        $this->load->library('pagination');
		$this->load->model('Anggaran/M_Pembagianpagu','Pembagianpagu');
	}

    public function index()
	{}

	public function Page()
	{

        
        $kdsatker =  $this->uri->segment(4);
        $thang =  $this->uri->segment(5);
        $userid =  $this->uri->segment(6);
        $roleid =  $this->uri->segment(7);
        $unit_id =  $this->uri->segment(8);
        $data['pp'] = $this->Pembagianpagu->getDataNew($kdsatker,$thang,$userid,$roleid,$unit_id);
        $data['head'] = $this->db->query("SELECT SUM(rupiah) as jumlah, norevisi, tgrevisi from d_pagu WHERE d_pagu.kdsatker = ".$kdsatker." AND d_pagu.thang = ".$thang." ")->result();
		$this->load->view('Anggaran/Pembagianpagu/manage', $data);
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
            $row['kddept'] = $customers->kddept;
            $row['kdunit'] = $customers->kdunit;
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
            $ppk = $this->input->post('ppk');
            $unitkerja = $this->input->post('unitkerja');
            $kewenangan = $this->input->post('kewenangan');
            $kdindex = $this->input->post('kdindex');
            $kdsatker = $this->input->post('kdsatker');
            $kddept = $this->input->post('kddept');
            $kdunit = $this->input->post('kdunit');
            $kdprogram = $this->input->post('kdprogram');
            $kdgiat = $this->input->post('kdgiat');
            $kdoutput = $this->input->post('kdoutput');
            $kdsoutput = $this->input->post('kdsoutput');
            $kdkmpnen = $this->input->post('kdkmpnen');
            $thang = $this->input->post('thang');
            $trigger = $this->input->post('Trigger');

            $datawhere = array(
                'thang' => $thang,
                'kdindex' => $kdindex);

            $cek = $this->Pembagianpagu->CEK($datawhere,'d_bagipagu', 'R');

            if(count($cek) <= 0 ){

                $data = array(
                    'thang' => $thang,
                    'kdsatker' => $kdsatker,
                    'kddept' => $kddept,
                    'kdunit' => $kdunit,
                    'kdprogram' => $kdprogram,
                    'kdgiat' => $kdgiat,
                    'kdoutput' => $kdoutput,
                    'kdsoutput' => $kdsoutput,
                    'kdkmpnen' => $kdkmpnen,
                    'ppk_id' => $ppk,
                    'role_id' => $kewenangan,
                    'unit_id' => $unitkerja,
                    'kdindex' => $kdindex
                    
                    );
                $this->Pembagianpagu->CRUD($data,'d_bagipagu', $Trigger);

                $response = array(
                    'status' => "success",
                    'message' => 'Data Berhasil ditambah'
                );
    
                echo json_encode($response);

            }else{

                $response = array(
                    'status' => "error",
                    'message' => 'Data Duplikat'
                );
    
                echo json_encode($response);

            }

           
            
            
            
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->Pembagianpagu->CRUD($where,'d_bagipagu', $Trigger);

            $response = array(
                'status' => "success",
                'message' => 'Data Berhasil dihapus'
            );

            echo json_encode($response);

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            $where = array('d_bagipagu.id' => $id);
            $output = $this->Pembagianpagu->CRUD($where,'d_bagipagu', $Trigger);
            echo json_encode($output);
            
        }else if($Trigger == "U"){

            $id             = $this->input->post('idbagipagu');
            $ppk            = $this->input->post('ppk');
            $unitkerja      = $this->input->post('unitkerja');
            $kewenangan     = $this->input->post('kewenangan');

            $data = array(
                    'ppk_id' => $ppk,
                    'role_id' => $kewenangan,
                    'unit_id' => $unitkerja,
                
                );
            $where = array('id' => $id);
	        $this->Pembagianpagu->update($data,'d_bagipagu', $where);

            $response = array(
                'status' => "success",
                'message' => 'Data Berhasil diubah'
            );

            echo json_encode($response);
        }
        
    }

	public function Tambah()
		{
            $var =  $this->uri->segment(4);
            $kdindex = str_replace("%20", " ", $var);
            $data['tambahpp'] = $this->Pembagianpagu->CRUD($kdindex,'d_pagu','R');
            $data['readpp'] = $this->Pembagianpagu->CRUD($kdindex,'d_bagipagu','R-table');

			$this->load->view('Anggaran/Pembagianpagu/tambah', $data);
		}
}
