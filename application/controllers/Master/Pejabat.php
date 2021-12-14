<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pejabat extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
		$this->load->library('datatables');
		$this->load->library('pagination');
		$this->load->model('Master/M_Pejabat','Pejabat');
	}


	public function Page()
	{
		$kdsatker = $this->session->userdata("kdsatker");

		$data['pejabat'] = $this->Pejabat->getPejabat($kdsatker);
		$this->load->view('MasterData/Pejabat/manage',$data);
	}

	public function ubah()
	{
		$id = $this->uri->segment(4);
		$data['ubah'] = $this->Pegawai->getPegawaiUbah($id);
		$this->load->view('MasterData/Pegawai/ubah',$data);

	}

	public function Action()
	{
		$Trigger = $this->input->post('Trigger');

		if($Trigger == "C"){
			$kdsatker = $this->input->post('kdsatker');
			$nama_pejabat = $this->input->post('getPejabat');
			$nip = $this->input->post('nip');
			$jabatan = $this->input->post('jabatanText');
			$unit = $this->input->post('unit');
			$jabatan_id = $this->input->post('jabatan_id');

			$data = array(
				'kdsatker' => $kdsatker,
				'unitkerja_id' => $unit,
				'nama' => $nama_pejabat,
				'nip' => $nip,
				'nama_jabatan' => $jabatan,
				'jabatan_id' => $jabatan_id,
			);
			
			$this->Pejabat->CRUD($data,'t_pejabat',$Trigger);

			$status = "success";
            $msg = "Data Berhasil Ditambah !";
            echo json_encode(array('status' => $status, 'msg' => $msg));



		}else if($Trigger == "R"){
			$id = $this->input->post('id');
			$where = array('t_pejabat.id' => $id);
			$output = $this->Pejabat->CRUD($where,'t_pejabat',$Trigger);
			echo json_encode($output);

		}else if($Trigger == "U"){
			$id = $this->input->post('idPejabat');
			$kdsatker = $this->input->post('kdsatker_Edit');
			$nama_pejabat = $this->input->post('nama_pejabat');
			$nip = $this->input->post('nip_Edit');
			$jabatan = $this->input->post('jabatanEditText');
			$unit = $this->input->post('unit_Edit');
			$jabatan_id = $this->input->post('jabatan_Edit');
			

			$data = array(
				'kdsatker' => $kdsatker,
				'unitkerja_id' => $unit,
				'nama' => $nama_pejabat,
				'nip' => $nip,
				'nama_jabatan' => $jabatan,
				'jabatan_id' => $jabatan_id,
			);

			$where = array('id' => $id);
			$this->Pejabat->update($data,'t_pejabat',$where);

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
