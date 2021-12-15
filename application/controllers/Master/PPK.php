<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PPK extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
		$this->load->library('datatables');
		$this->load->library('pagination');
		$this->load->model('Master/M_PPK','PPK');
	}


	public function Page()
	{
		$data['ppk'] = $this->PPK->getPPK();
		$this->load->view('MasterData/PPK/manage',$data);
	}

	public function Action()
	{
		$Trigger = $this->input->post('Trigger');

		if($Trigger == "C"){
			$kdsatker = $this->input->post('kdsatker');
			$uraian = $this->input->post('uraianppk');

			$data = array(
				'kdsatker' => $kdsatker,
				'uraian_ppk' => $uraian,
			);
			
			$this->PPK->CRUD($data,'d_ppk',$Trigger);

			$status = "success";
            $msg = "Data Berhasil Ditambah !";
            echo json_encode(array('status' => $status, 'msg' => $msg));



		}else if($Trigger == "R"){
			$id = $this->input->post('id');
			$where = array('d_ppk.id' => $id);
			$output = $this->PPK->CRUD($where,'d_ppk',$Trigger);
			echo json_encode($output);

		}else if($Trigger == "U"){
			$id = $this->input->post('idPPK');
			$kdsatker = $this->input->post('kdsatker_Edit');
			$uraian = $this->input->post('uraianppk_Edit');
			

			$data = array(
				'kdsatker' => $kdsatker,
				'uraian_ppk' => $uraian,
			);

			$where = array('id' => $id);
			$this->PPK->update($data,'d_ppk',$where);

			$status = "success";
            $msg = "Data Berhasil DiUbah !";
            echo json_encode(array('status' => $status, 'msg' => $msg));


		}else if($Trigger == "D"){
			$id = $this->input->post('id');

			//$getPejabat = $this->db->query("SELECT * from t_pejabat where id = '". $id."' ")->result_array();
			$where = array('id' => $id);
			$this->Pejabat->CRUD($where,'t_pejabat', $Trigger);

			$status = "success";
            $msg = "Data Berhasil Dihapus !";
            echo json_encode(array('status' => $status, 'msg' => $msg));
		}
	}

	 
}
