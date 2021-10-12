<?php 

class M_Auth extends CI_Model{	
	
	function cek_Auth($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function session_Auth($table,$where){		
		return $this->db->get_where($table,$where);
	}
}