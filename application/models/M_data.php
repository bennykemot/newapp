<?php

class M_data extends CI_Model{

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->delete($table,$where);
	}

	function get_by_id($table,$column_id,$id)
	{
		$this->db->where($column_id, $id);
		return $this->db->get($table)->row();
	}
}

?>
