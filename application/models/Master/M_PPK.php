<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_PPK extends CI_Model {

  	function getPPK(){		
		
		$query = $this->db->query('SELECT * FROM d_ppk');

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

