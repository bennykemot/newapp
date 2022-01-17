<?php

class M_Pbj extends CI_Model
{
	var $table = 't_permintaan_pbj';
	var $column_order = array(
		'id',
		'nomor_ppbj',
		'nama_pbj',
		'nomor_dok_sumber',
		'tanggal_dok_sumber',
		'spk',
		'penangungjawab_id',
		'ppk'
	);
	var $column_search = array(
		'nomor_ppbj',
		'nama_pbj',
		'nomor_dok_sumber',
		'pg_pjwb.nama',
		'pg_ppk.nama'
	);
	var $order = array('id' => 'ASC');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		$this->db->select($this->table.'.*');
		$this->db->select('pg_pjwb.nama AS nama_penanggung_jawab');
		$this->db->select('pg_ppk.nama AS nama_ppk');
		$this->db->select('v_mak_pbj.mak AS mak');
		$this->db->select('v_mak_pbj.pagu AS pagu');
		$this->db->select('(SELECT SUM(tppd.rupiah) FROM t_permintaan_pbj_detail tppd WHERE tppd.permintaan_pbj_id = t_permintaan_pbj.id) AS pengajuan');
		$this->db->join('r_pegawai as pg_pjwb', 'pg_pjwb.id = '.$this->table.'.penangungjawab_id');
		$this->db->join('t_pejabat as pg_ppk', 'pg_ppk.id = '.$this->table.'.ppk');
		$this->db->join('v_mak_pbj', 'v_mak_pbj.kd_index_bagipagu = '.$this->table.'.kdindex');
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
}
