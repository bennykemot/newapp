<?php
class M_Menu extends CI_Model{



    public function Master(){
        $this->db->from('r_menu');
        $query = $this->db->get();

        return $query->result();
    }
}

