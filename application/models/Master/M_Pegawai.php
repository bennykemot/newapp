<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pegawai extends CI_Model {

  	function getPegawai(){		
		$query = $this->db->get('t_pegawai');

		return $query->result();

	}

	function getPegawaiUbah($id){
		$query = $this->db->query('SELECT t_pegawai.*, 
		t_satker.nmsatker, t_unitkerja.grup_id as grup_id, t_unitkerja.id as idunitkerja, t_satker.kdsatker as kdsatker
		FROM t_pegawai 
		JOIN t_satker ON t_satker.kdsatker = t_pegawai.satker_id 
		JOIN t_unitkerja ON t_unitkerja.nama_unit = t_pegawai.namaunit_lengkap  OR t_unitkerja.nama_unit = t_pegawai.namaunit
		WHERE t_pegawai.id = '.$id.'');
		return $query->result_array();

	}

	function CRUD($data,$table,$Trigger){
		if($Trigger == "C"){

			$this->db->insert($table,$data);

		}else if($Trigger == "D"){

			$this->db->where($data);
			$this->db->delete($table);

		}else if($Trigger == "R"){

			$this->db->select('id');
			$this->db->from('t_pegawai');
			$this->db->where('id',$data);
			$query = $this->db->get();

			return $query->row();

		}
	}

	function Update($data,$table,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function cek($data,$table){
        return $this->db->get_where($table,$data);
    }



	


}

