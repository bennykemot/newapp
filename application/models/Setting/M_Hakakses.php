<?php
class M_Hakakses extends CI_Model{



    public function Master($kdsatker,$number,$offset){

        $query = $this->db->query('SELECT 

									t_hakakses.id as id_hakakses,
									t_hakakses.id_user as id_user,
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

									JOIN

									user ON user.username = t_hakakses.id_user

									WHERE user.kdsatker = '.$kdsatker.'
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
			t_hakakses.id_user as id_user,
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

			user.kdsatker as kdsatker,
            user.role_id as role_id

			FROM
			t_hakakses

			JOIN

			r_menu ON r_menu.kode_menu = t_hakakses.hak_menu

			JOIN

			user ON user.username = t_hakakses.id_user

			WHERE user.kdsatker = '.$kdsatker.'
		');

		return $query->num_rows();
	}

}

