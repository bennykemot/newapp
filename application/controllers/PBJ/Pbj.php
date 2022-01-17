<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pbj extends CI_Controller
{
	public $title = 'List PBJ';
	public $form = 'Form Tambah / Edit Data PBJ';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('form_validation');
		$this->load->library("datatables");
		$this->load->library('pagination');
		$this->load->helper('bisma_helper');
		$this->load->model('PBJ/M_Pbj','pbj');
		$this->load->model('M_data','mdata');
	}

	public function Page()
	{
		$data['title'] = $this->title;
		$this->load->view('PBJ/manage', $data);
	}

	public function grid()
	{
		$list = $this->pbj->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $lt) {
			$no++;
			$row = array();
			$row['id'] = dsuEncode($lt->id);
			$row['no'] = $no;
			$row['nopbj'] = $lt->nomor_ppbj;
			$row['namapbj'] = $lt->nama_pbj;
			$row['nodoksumber'] = $lt->nomor_dok_sumber;
			$row['tgldoksumber'] = date("d-m-Y", strtotime($lt->tanggal_dok_sumber));
			$row['jenis'] = '<b>'.($lt->kas == 1) ? 'YA' : 'TIDAK'.'</b>';
			$row['spk'] = '<b>'.($lt->spk == 1) ? 'YA' : 'TIDAK'.'</b>';
			$row['ls'] = '<b>'.($lt->langsung == 1) ? 'YA' : 'TIDAK'.'</b>';
			//$row['mak'] = '<b>'.$lt->kdsatker.'.'.$lt->kdprogram.'.'.$lt->kdgiat.'.'.$lt->kdoutput.'.'.$lt->kdkmpnen.'</b>';
			$row['mak'] = '<b>'.$lt->mak.'</b>';
			$row['pagu'] = 'Rp '.number_format($lt->pagu,0,",",".");
			$row['pengajuan'] = 'Rp '.number_format($lt->pengajuan,0,",",".");
			$row['penanggungjawab'] = $lt->nama_penanggung_jawab;
			$row['ppk'] = $lt->nama_ppk;
			$row['aksi'] = '<a href="'.site_url('PBJ/Pbj/ubah/'.dsuEncode($lt->id)).'" title="Edit Data"><i class="material-icons green-text">edit</i></a> '.
				'<a href="'.site_url('PBJ/Pbj/detil/'.dsuEncode($lt->id)).'" title="Detail Data"><i class="material-icons orange-text">details</i></a> '.
				'<a href="javascript:void(0)" title="Hapus Data" onclick="hapus_data(\''.dsuEncode($lt->id).'\')"><i class="material-icons red-text">delete</i></a>';

			$data[] = $row;
		}

		$count_all = $this->pbj->count_all();
		$count_filter = $this->pbj->count_filtered();

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $count_all,
			"recordsFiltered" => $count_filter,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function tambah() {
		$data = array(
			'form' => $this->form,
			'id' => set_value('id'),
			'nomor_ppbj' => set_value('nomor_ppbj'),
			'nama_pbj' => set_value('nama_pbj'),
			'nomor_dok_sumber' => set_value('nomor_dok_sumber'),
			'tanggal_dok_sumber' => set_value('tanggal_dok_sumber'),
			'kas' => set_value('kas'),
			'spk' => set_value('spk'),
			'langsung' => set_value('langsung'),
			'kdindex' => set_value('kdindex'),
			'penangungjawab_id' => set_value('penangungjawab_id'),
			'ppk' => set_value('ppk'),
		);

		$data['mak'] = $this->mdata->get_data('v_mak_pbj')->result();
		$data['penanggungjawab'] = $this->mdata->get_data('r_pegawai')->result();
		$this->db->where('nama_jabatan','PPK');
		$data['lppk'] = $this->mdata->get_data('t_pejabat')->result();

		$this->load->view('PBJ/form', $data);
	}

	public function ubah($id) {
		$id = dsuDecode($id);
			$row = $this->mdata->get_by_id('t_permintaan_pbj', 'id',$id);
		if($row) {
			$data = array(
				'form' => $this->form,
				'id' => set_value('id', dsuEncode($row->id)),
				'nomor_ppbj' => set_value('nomor_ppbj', $row->nomor_ppbj),
				'nama_pbj' => set_value('nama_pbj', $row->nama_pbj),
				'nomor_dok_sumber' => set_value('nomor_dok_sumber', $row->nomor_dok_sumber),
				'tanggal_dok_sumber' => set_value('tanggal_dok_sumber', $row->tanggal_dok_sumber),
				'kas' => set_value('kas', $row->kas),
				'spk' => set_value('spk', $row->spk),
				'langsung' => set_value('langsung', $row->langsung),
				'kdindex' => set_value('kdindex', $row->kdindex),
				'penangungjawab_id' => set_value('penangungjawab_id', $row->penangungjawab_id),
				'ppk' => set_value('ppk', $row->ppk),
			);

			$data['mak'] = $this->mdata->get_data('v_mak_pbj')->result();
			$data['penanggungjawab'] = $this->mdata->get_data('r_pegawai')->result();
			$this->db->where('nama_jabatan','PPK');
			$data['lppk'] = $this->mdata->get_data('t_pejabat')->result();

			$this->load->view('PBJ/form', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('PBJ/Pbj/page'));
		}

	}

	public function simpan_update()
	{
		$this->form_validation->set_rules('nomor_ppbj', 'Nomor PBJ', 'required', array('required' => 'Nomor PBJ Harus Diisi'));
		$this->form_validation->set_rules('nama_pbj', 'Nama PBJ', 'required', array('required' => 'Nama PBJ Harus Diisi'));
		$this->form_validation->set_rules('nomor_dok_sumber', 'Nomor Dokumen Sumber', 'required', array('required' => 'Nomor Dokumen Sumber Harus Diisi'));
		$this->form_validation->set_rules('tanggal_dok_sumber', 'Tanggal Dokumen Sumber', 'required', array('required' => 'Tanggal Dokumen Sumber Harus Diisi'));
		$this->form_validation->set_rules('kas', 'Jenis Bayar', 'required', array('required' => 'Jenis Bayar Harus Diisi'));
		$this->form_validation->set_rules('spk', 'SPK', 'required', array('required' => 'SPK Harus Diisi'));
		$this->form_validation->set_rules('langsung', 'LS', 'required', array('required' => 'LS Harus Diisi'));
		$this->form_validation->set_rules('kdindex', 'MAK', 'required', array('required' => 'MAK Harus Diisi'));
		$this->form_validation->set_rules('penangungjawab_id', 'Penanggung Jawab', 'required', array('required' => 'Penanggung Jawab Harus Diisi'));
		$this->form_validation->set_rules('ppk', 'PPK', 'required', array('required' => 'PPK Harus Diisi'));
		$this->form_validation->set_error_delimiters('<span class="text-danger"><b>', '</b></span>');
		if ($this->form_validation->run() == FALSE) {
			if(!$this->input->post('id')) {
				$this->tambah();
			} else {
				$this->ubah(dsuEncode($this->input->post('id')));
			}
		} else {
			$row = $this->mdata->get_by_id('t_permintaan_pbj', 'id',dsuDecode($this->input->post('id')));
			$bagipagu = $this->mdata->get_by_id('v_mak_pbj', 'kd_index_bagipagu',$row->kdindex);
			$data = array(
				'nomor_ppbj' => $this->input->post('nomor_ppbj',TRUE),
				'nama_pbj' => $this->input->post('nama_pbj',TRUE),
				'nomor_dok_sumber' => $this->input->post('nomor_dok_sumber',TRUE),
				'tanggal_dok_sumber' => date("Y-m-d", strtotime($this->input->post('tanggal_dok_sumber',TRUE))),
				'kas' => $this->input->post('kas',TRUE),
				'spk' => $this->input->post('spk',TRUE),
				'langsung' => $this->input->post('langsung',TRUE),
				'kdindex' => $this->input->post('kdindex',TRUE),
				'penangungjawab_id' => $this->input->post('penangungjawab_id',TRUE),
				'ppk' => $this->input->post('ppk',TRUE),

				'kd_satker' => $bagipagu->kdsatker,
				'kd_program' => $bagipagu->kdprogram,
				'kd_giat' => $bagipagu->kdgiat,
				'kd_output' => $bagipagu->kdoutput,
				'kd_kmpnen' => $bagipagu->kdkmpnen,
				'kd_skmpnen' => $bagipagu->kdskmpnen,
				'kd_akun' => $bagipagu->kdakun,
				'kd_ib' => $bagipagu->kdib,
			);
			if(!$this->input->post('id')) {
				$this->mdata->insert_data($data, 't_permintaan_pbj');
				$this->session->set_flashdata('message', 'Simpan Data PBJ Berhasil');
			} else {
				$this->mdata->update_data('id = '.dsuDecode($this->input->post('id')), $data, 't_permintaan_pbj');
				$this->session->set_flashdata('message', 'Ubah Data PBJ Berhasil');
			}
			redirect(site_url('PBJ/Pbj/page'));
		}
	}

	public function hapus($id)
	{
		$id = dsuDecode($id);
		$row = $this->mdata->get_by_id('t_permintaan_pbj', 'id',$id);
		if($row) {
			$this->mdata->delete_data('id = '.$id,'t_permintaan_pbj');
			$this->session->set_flashdata('message', 'Hapus Data Berhasil');
			redirect(site_url('PBJ/Pbj/page'));
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('PBJ/Pbj/page'));
		}
	}

	public function detil($id)
	{
		$id = dsuDecode($id);
		$this->db->select('t_permintaan_pbj.*');
		$this->db->select('v_mak_pbj.pagu AS pagu');
		$this->db->select('(SELECT SUM(tppd.rupiah) FROM t_permintaan_pbj_detail tppd WHERE tppd.permintaan_pbj_id = t_permintaan_pbj.id) AS pengajuan');
		$this->db->join('v_mak_pbj', 'v_mak_pbj.kd_index_bagipagu = t_permintaan_pbj.kdindex');
		$row = $this->mdata->get_by_id('t_permintaan_pbj', 't_permintaan_pbj.id',$id);
		if($row) {
			$data['title'] = 'Detail Data PBJ';
			$data['pbj'] = $row;
			$this->load->view('PBJ/detail/manage', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('PBJ/Pbj/page'));
		}
	}
}
