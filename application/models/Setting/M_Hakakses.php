<?php
class M_Hakakses extends CI_Model{



    public function Master($kdsatker,$number,$offset){

        $query = $this->db->query('SELECT 

									t_hakakses.id as id_hakakses,
									t_hakakses.role_id as role_id_hakakses,
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
                                    r_menu.status_menu as status_menu,

									t_role.rolename as role_name

									FROM
									t_hakakses

                                    JOIN

                                    r_menu ON r_menu.kode_menu = t_hakakses.hak_menu

									JOIN

									t_role ON t_role.id = t_hakakses.role_id

									ORDER BY t_hakakses.role_id

									
									LIMIT '.$number.' OFFSET '.$offset.'
									');


        // $this->db->from('t_hakakses');
        // $this->db->where('id_user', $Username);
        // $query = $this->db->get();

        // return $query->result();

        // $this->db->from('t_hakakses');
        // $query = $this->db->get();

        return $query->result();
    }

	function Jum($kdsatker){
		$query = $this->db->query('SELECT 

			t_hakakses.id as id_hakakses,
			t_hakakses.role_id as role_id_hakakses,
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
			r_menu.status_menu as status_menu,

			t_role.rolename as role_name

			FROM
			t_hakakses

			JOIN

			r_menu ON r_menu.kode_menu = t_hakakses.hak_menu

			JOIN

			t_role ON t_role.id = t_hakakses.role_id

			ORDER BY t_hakakses.role_id

			
		');

		return $query->num_rows();
	}

}

