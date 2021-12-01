<?php 

class M_Auth extends CI_Model{	
	
	function cek_Auth($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function session_Auth($table,$username,$password){	
		return $this->db->query('SELECT 
									'.$table.'.id,
									'.$table.'.username,
									'.$table.'.password,
									'.$table.'.kdsatker as user_kdsatker,
									'.$table.'.role_id,
									'.$table.'.status,
									'.$table.'.keterangan,

									t_satker.kdsatker as kdsatker,
									t_satker.nmsatker as nmsatker

									FROM
									'.$table.'

									JOIN
									t_satker ON t_satker.kdsatker = '.$table.'.kdsatker

									WHERE
									user.username = "'.$username.'"
									AND
									user.password = "'.$password.'"

									');

		
	}

	function session_Auth_hakakses($table,$role_id){	
		return $this->db->query('SELECT 

									'.$table.'.id as id_hakakses,
									'.$table.'.role_id as role_id_hakakses,
									'.$table.'.hak_menu as hak_menu,
									'.$table.'.hak_c as C,
									'.$table.'.hak_r as R,
									'.$table.'.hak_u as U,
									'.$table.'.hak_d as D

									FROM
									'.$table.'

									WHERE
									'.$table.'.role_id = '.$role_id.'

									');

		
	}
}