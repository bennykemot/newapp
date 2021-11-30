<?php
class M_Menu extends CI_Model{



    public function Master(){
        $this->db->from('r_menu');
        $this->db->order_by('parent_menu');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_Menu($Username){

        $query = $this->db->query('SELECT 

									t_hakakses.id as id_hakakses,
									t_hakakses.id_user as id_user_hakakses,
									t_hakakses.hak_menu as hak_menu,
									t_hakakses.hak_c as C,
									t_hakakses.hak_r as R,
									t_hakakses.hak_u as U,
									t_hakakses.hak_d as D,

                                    r_menu.kode_menu as kode_menu,
                                    r_menu.nama_menu as nama_menu,
                                    r_menu.icon_menu as icon_menu,
                                    r_menu.link_menu as link_menu,
                                    r_menu.parent_menu as parent_menu,
                                    r_menu.status_menu as status_menu

									FROM
									t_hakakses

                                    JOIN

                                    r_menu ON r_menu.kode_menu = t_hakakses.hak_menu

									WHERE
									t_hakakses.id_user = "'.$Username.'"

									');


        // $this->db->from('t_hakakses');
        // $this->db->where('id_user', $Username);
        // $query = $this->db->get();

        return $query->result();
    }

	function CRUD($data,$table,$Trigger){
		if($Trigger == "C"){
			$this->db->insert($table,$data);
		}else if($Trigger == "D"){
			$this->db->where($data);
			$this->db->delete($table);
		}else if($Trigger == "R"){
			$this->db->select('id');
			$this->db->from('r_menu');
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

