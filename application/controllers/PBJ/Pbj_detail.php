<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pbj_detail extends CI_Controller
{
	public $title = 'List Detail PBJ';
	public $form = 'Form Tambah / Edit Data Detail PBJ';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library('form_validation');
		$this->load->library("datatables");
		$this->load->library('pagination');
		$this->load->model('PBJ/M_Pbj_detail','pbjdetail');
		$this->load->model('M_data','mdata');
	}

	public function Page()
	{
		$data['title'] = $this->title;
		$this->load->view('PBJ/detail/manage', $data);
	}

	public function grid($id_parent)
	{
		$this->db->where('permintaan_pbj_id',dsuDecode($id_parent));
		$list = $this->pbjdetail->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $lt) {
			$no++;
			$row = array();
			$row['id'] = dsuEncode($lt->id);
			$row['no'] = $no;
			$row['uraian'] = $lt->uraian_pbj;
			$row['volume'] = $lt->volume_pbj;
			$row['satuan'] = $lt->satuan;
			$row['rupiah'] = number_format($lt->rupiah,0,",",".");
			$row['jumlah'] = number_format($lt->jumlah,0,",",".");
			$row['aksi'] = '<a href="'.site_url('PBJ/Pbj_detail/ubah/'.dsuEncode($lt->id)).'" title="Edit Data"><i class="material-icons green-text">edit</i></a> '.
				'<a href="javascript:void(0)" title="Hapus Data" onclick="hapus_data(\''.dsuEncode($lt->id).'\')"><i class="material-icons red-text">delete</i></a>';
			//$row['aksi'] = '<a href="javascript:void(0)" title="Hapus Data" onclick="hapus_data(\''.dsuEncode($lt->id).'\')"><i class="material-icons red-text">delete</i></a>';

			$data[] = $row;
		}

		$count_all = $this->pbjdetail->count_all();
		$count_filter = $this->pbjdetail->count_filtered();

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $count_all,
			"recordsFiltered" => $count_filter,
			"data" => $data
		);
		echo json_encode($output);
	}

	public function tambah($id_parent) {
		$id_parent = dsuDecode($id_parent);
		$data = array(
			'form' => $this->form,
			'id' => set_value('id'),
			'permintaan_pbj_id' => set_value('permintaan_pbj_id',$id_parent),
			'uraian_pbj' => set_value('uraian_pbj'),
			'volume_pbj' => set_value('volume_pbj'),
			'satuan' => set_value('satuan'),
			'rupiah' => set_value('rupiah'),
			'jumlah' => set_value('jumlah'),
		);

		$this->load->view('PBJ/detail/form', $data);
	}

	public function ubah($id) {
		$id = dsuDecode($id);
		$row = $this->mdata->get_by_id('t_permintaan_pbj_detail', 'id',$id);
		if($row) {
			$data = array(
				'form' => $this->form,
				'id' => set_value('id', dsuEncode($row->id)),
				'permintaan_pbj_id' => set_value('permintaan_pbj_id', $row->permintaan_pbj_id),
				'uraian_pbj' => set_value('uraian_pbj', $row->uraian_pbj),
				'volume_pbj' => set_value('volume_pbj', $row->volume_pbj),
				'satuan' => set_value('satuan', $row->satuan),
				'rupiah' => set_value('rupiah', $row->rupiah),
				'jumlah' => set_value('jumlah', $row->jumlah),
			);

			$this->load->view('PBJ/detail/form', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('PBJ/Pbj/detail/'.dsuEncode($id)));
		}

	}

	public function simpan_update()
	{
		$this->form_validation->set_rules('uraian_pbj', 'Uraian', 'required', array('required' => 'Uraian Harus Diisi'));
		$this->form_validation->set_rules('volume_pbj', 'Volume', 'required|numeric', array('required' => 'Volume Harus Diisi', 'numeric' => 'Volume Hanya Boleh Diisi Dengan Angka'));
		$this->form_validation->set_rules('satuan', 'Satuan', 'required', array('required' => 'Satuan Harus Diisi'));
		$this->form_validation->set_rules('rupiah', 'Rupiah', 'required|numeric', array('required' => 'Rupiah Harus Diisi', 'numeric' => 'Rupiah Hanya Boleh Diisi Dengan Angka'));
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric', array('required' => 'Jumlah Harus Diisi', 'numeric' => 'Jumlah Hanya Boleh Diisi Dengan Angka'));
		$this->form_validation->set_error_delimiters('<span class="text-danger"><b>', '</b></span>');
		if ($this->form_validation->run() == FALSE) {
			if(!$this->input->post('id')) {
				$this->tambah(dsuEncode($this->input->post('permintaan_pbj_id')));
			} else {
				$this->edit(dsuEncode($this->input->post('id')));
			}
		} else {
			$data = array(
				'permintaan_pbj_id' => $this->input->post('permintaan_pbj_id',TRUE),
				'uraian_pbj' => $this->input->post('uraian_pbj',TRUE),
				'volume_pbj' => $this->input->post('volume_pbj',TRUE),
				'satuan' => $this->input->post('satuan',TRUE),
				'rupiah' => $this->input->post('rupiah',TRUE),
				'jumlah' => $this->input->post('jumlah',TRUE),
			);
			if(!$this->input->post('id')) {
				$this->mdata->insert_data($data, 't_permintaan_pbj_detail');
				$this->session->set_flashdata('message', 'Simpan Data Detail PBJ Berhasil');
			} else {
				$this->mdata->update_data('id = '.dsuDecode($this->input->post('id')), $data, 't_permintaan_pbj_detail');
				$this->session->set_flashdata('message', 'Ubah Data Detail PBJ Berhasil');
			}
			redirect(site_url('PBJ/Pbj/detil/'.dsuEncode($this->input->post('permintaan_pbj_id'))));
		}
	}

	public function tambah_multi_row($id_parent)
	{
		$id_parent = dsuDecode($id_parent);
		$data = array(
			'form' => $this->form,
			'id' => set_value('id'),
			'permintaan_pbj_id' => set_value('permintaan_pbj_id',$id_parent),
			'uraian_pbj' => set_value('uraian_pbj'),
			'volume_pbj' => set_value('volume_pbj'),
			'satuan' => set_value('satuan'),
			'rupiah' => set_value('rupiah'),
			'jumlah' => set_value('jumlah'),
		);

		$this->load->view('PBJ/detail/form_add_multi', $data);
	}

	public function edit_multi_row($id_parent)
	{
		$id_parent = dsuDecode($id_parent);

		$this->db->where('permintaan_pbj_id', $id_parent);
		$data_detail_pbj = $this->mdata->get_data('t_permintaan_pbj_detail')->result();

		$data = array(
			'form' => $this->form,
			'permintaan_pbj_id' => set_value('permintaan_pbj_id',$id_parent),
			'data_detail_pbj' => $data_detail_pbj
		);
		$this->load->view('PBJ/detail/form_edit_multi', $data);
	}

	public function simpan_update_multi_row()
	{
		$this->form_validation->set_rules('uraian_pbj[]', 'Uraian', 'required', array('required' => 'Uraian Harus Diisi'));
		$this->form_validation->set_error_delimiters('<span class="text-danger"><b>', '</b></span>');
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_multi_row($this->input->post('permintaan_pbj_id'));
		} else {
			for ($iu = 0; $iu < count($this->input->post('data_count')); $iu++) {
				$data = array(
					'permintaan_pbj_id' => dsuDecode($this->input->post('permintaan_pbj_id')),
					'uraian_pbj' => $this->input->post('uraian_pbj[' . $iu . ']'),
					'volume_pbj' => $this->input->post('volume_pbj[' . $iu . ']'),
					'satuan' => $this->input->post('satuan[' . $iu . ']'),
					'rupiah' => $this->input->post('rupiah[' . $iu . ']'),
					'jumlah' => $this->input->post('jumlah[' . $iu . ']'),
				);
				$this->mdata->insert_data($data, 't_permintaan_pbj_detail');
			}
			redirect(site_url('PBJ/Pbj/detil/'.$this->input->post('permintaan_pbj_id')));
		}
	}

	public function hapus($id)
	{
		$id = dsuDecode($id);
		$row = $this->mdata->get_by_id('t_permintaan_pbj_detail', 'id',$id);
		if($row) {
			$this->mdata->delete_data('id = '.$id,'t_permintaan_pbj_detail');
			$this->session->set_flashdata('message', 'Hapus Data Berhasil');
			redirect(site_url('PBJ/Pbj/detil/'.dsuEncode($row->permintaan_pbj_id)));
		} else {
			$this->session->set_flashdata('message', 'Data Tidak Ditemukan');
			redirect(site_url('PBJ/Pbj/page/'.dsuEncode($row->permintaan_pbj_id)));
		}
	}
}
