<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
		$this->load->library('datatables');
		$this->load->library('pagination');
		$this->load->model('Master/M_Pegawai','Pegawai');
	}


	public function Page()
	{
		$data['pegawai'] = $this->Pegawai->getPegawai();
		$this->load->view('MasterData/Pegawai/manage',$data);
	}

	public function tambah()
	{
		$this->load->view('MasterData/Pegawai/tambah');
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
			$niplama = $this->input->post('niplama');
			$nipbaru = $this->input->post('nipbaru');
			$nama = $this->input->post('nama_lengkap');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$tempat = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jk = $this->input->post('jk');
			$agama = $this->input->post('agama');
			$pangkat = $this->input->post('pangkat');
			$jbtn = $this->input->post('jbtn');
			$tmt = $this->input->post('tmt');
			$unit = $this->input->post('unit');
			$unit_nama = $this->input->post('unitkerja_nama');
			$unitid = $this->input->post('unitkerja_id');
			$unitkerja_grup = $this->input->post('unitkerja_grup');
			$satker = $this->input->post('satker');

			$data_pegawai = array(
				'niplama' => $niplama,
				'nip' => $nipbaru,
				'nama' => $nama,
				'nama_lengkap' => $nama_lengkap,
				'tempat_lahir' => $tempat,
				'tgl_lahir' => date("Y-m-d",strtotime($tgl_lahir)),
				'jenis_kelamin' => $jk,
				'agama' => $agama,
				'nama_pangkat' => $pangkat,
				'jabatan' => $jbtn,
				'tmt_jab' => $tmt,
				'namaunit_lengkap' => $unit_nama,
				'unit_id' => $unitkerja_grup,
				'satker_id' => $satker
			);

			$this->Pegawai->CRUD($data_pegawai,'t_pegawai',$Trigger);

			// $response = array(
            //     'status' => "success",
            //     'message' => 'Data Berhasil ditambah'
            // );

			// echo json_encode($response);

		}else if($Trigger == "R"){
			$id = $this->input->post('id');
			$where = array('t_pegawai.id' => $id);
			$output = $this->Pegawai->CRUD($where,'t_pegawai',$Trigger);
			echo json_encode($output);

		}else if($Trigger == "U"){
			$niplama = $this->input->post('niplama');
			$nipbaru = $this->input->post('nipbaru');
			$nama_lengkap = $this->input->post('nama_lengkap');
			$tempat = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$jk = $this->input->post('jk');
			$agama = $this->input->post('agama');
			$pangkat = $this->input->post('pangkat');
			$jbtn = $this->input->post('jbtn');
			$tmt = $this->input->post('tmt');
			$unit = $this->input->post('unit');
			$unit_nama = $this->input->post('unitkerja_nama');
			$unitid = $this->input->post('unitkerja_id');
			$unitkerja_grup = $this->input->post('unitkerja_grup');
			$satker_id = $this->input->post('satker');
			$id = $this->input->post('id');
			$keljab = $this->input->post('keljab');

			$data_pegawai = array(
				'niplama' => $niplama,
				'nip' => $nipbaru,
				'nama_lengkap' => $nama_lengkap,
				'tempat_lahir' => $tempat,
				'tgl_lahir' => date("Y-m-d",strtotime($tgl_lahir)),
				'jenis_kelamin' => $jk,
				'agama' => $agama,
				'nama_pangkat' => $pangkat,
				'jabatan' => $jbtn,
				'tmt_jab' => $tmt,
				'namaunit_lengkap' => $unit_nama,
				'unit_id' => $unitkerja_grup,
				'satker_id' => $satker_id,
				'kel_jab' => $keljab
			);

			$where = array('id' => $id);
			$this->Pegawai->update($data_pegawai,'t_pegawai',$where);

			// $data_pejabat = array(
			// 	'unitkerja_id' => $unitid,
			// 	'kdsatker' => $satker_id
			// );


			// $this->db->where("nip", $nipbaru);
			// $this->db->update("t_pejabat",$data_pejabat);

			// $cekPejabat = $this->db->query("select id from t_pejabat where nip = ".$nipbaru." ")->result();

			// $where_user = array('pejabat_id' => $cekPejabat[0]->id);

			// $data_user = array(
			// 	'unit_id' => $unitid,
			// 	'kdsatker' => $satker_id
			// );

			// $this->db->where($where_user);
			// $this->db->update("user",$data_user);


			$response = array(
                'status' => "success",
                'message' => 'Data Berhasil diubah'
            );

			echo json_encode($response);


		}
	}

	 
}
