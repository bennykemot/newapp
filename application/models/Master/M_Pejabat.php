<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pejabat extends CI_Model {

  	function getPejabat(){		
		


		$query = $this->db->query('SELECT
									t_pejabat.id as id,
									
									t_pejabat.unitkerja_id as unit_id,
									t_pejabat.nama as nama,
									t_pejabat.nip as nip,
									t_pejabat.jabatan_id as id_jab,

									t_unitkerja.nama_unit as unit,

									r_jabatan.jabatan as jabatan,

									t_satker.nmsatker as satker

									FROM
									t_pejabat

									JOIN 

									t_unitkerja ON t_unitkerja.id = t_pejabat.unitkerja_id

									JOIN

									r_jabatan ON r_jabatan.id = t_pejabat.jabatan_id

									JOIN

									t_satker ON t_satker.kdsatker = t_pejabat.kdsatker
		
									');

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

