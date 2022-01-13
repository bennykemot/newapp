<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Jabatan extends CI_Model {

  	function getJabatan(){		
		$query = $this->db->get('r_jabatan');

		return $query->result();

	}

	function getJabatanUbah($id){
		$query = $this->db->query('SELECT * FROM 
					t_pegawai
					WHERE id = '.$id.' ');
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

