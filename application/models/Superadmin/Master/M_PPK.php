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


			$this->db->select('id');
			$this->db->from('d_ppk');
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

