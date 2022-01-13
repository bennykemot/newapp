<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pejabat extends CI_Model {

  	function getPejabat(){		
		
		$query = $this->db->query("SELECT
										t_pejabat.id as id,
										t_pejabat.kdsatker as kdsatker,
										t_pejabat.unitkerja_id as unit_id,
										t_pejabat.nama as nama,
										t_pejabat.nip as nip,
										t_pejabat.jabatan_id as id_jab,
										t_pejabat.nama_jabatan as jabatan,

										t_unitkerja.nama_unit as unit,
										
										t_satker.nmsatker as nama_satker

										FROM
										t_pejabat

										JOIN 

										t_unitkerja ON t_unitkerja.id = t_pejabat.unitkerja_id
										
										JOIN 
										
										t_satker ON t_satker.kdsatker = t_pejabat.kdsatker
		
									");

		return $query->result();

	}

	// function getJabatanUbah($id){
	// 	$query = $this->db->query('SELECT * FROM 
	// 				t_pegawai
	// 				WHERE id = '.$id.' ');
	// 	return $query->result_array();

	// }

	function CRUD($data,$table,$Trigger){

		if($Trigger == "C"){

			$this->db->insert($table,$data);

		}else if($Trigger == "D"){

			$this->db->where($data);
			$this->db->delete($table);

		}else if($Trigger == "R"){

			$this->db->select('t_pejabat.id');
			$this->db->select('t_pejabat.kdsatker');
            $this->db->select('t_pejabat.unitkerja_id');
            $this->db->select('t_pejabat.nama');
            $this->db->select('t_pejabat.nip');
			$this->db->select('t_pejabat.nama_jabatan');
            $this->db->select('t_pejabat.jabatan_id');

            $this->db->select('t_unitkerja.nama_unit');
            $this->db->select('r_jabatan.jabatan');
            $this->db->select('t_satker.nmsatker');
            
            $this->db->from($table);
            $this->db->join('t_unitkerja', 't_unitkerja.id = t_pejabat.unitkerja_id');
            $this->db->join('r_jabatan', 'r_jabatan.id = t_pejabat.jabatan_id');
            $this->db->join('t_satker', 't_satker.kdsatker = t_pejabat.kdsatker');

            $this->db->where($data);
            $query = $this->db->get();
    
            return $query->row();

		}
	}

    public function Update($data, $table, $where){
        $this->db->update($table, $data, $where); 
    }

	function cek($data,$table){
        return $this->db->get_where($table,$data);
    }



	


}

