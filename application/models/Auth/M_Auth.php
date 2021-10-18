<?php 

class M_Auth extends CI_Model{	
	
	function cek_Auth($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function session_Auth($table,$where){	
		$this->db->from($table);
		$this->db->join('t_satker', 't_satker.kdsatker = '.$table.'.kdsatker');
		$this->db->where($where);
		return $this->db->get();
	}
}