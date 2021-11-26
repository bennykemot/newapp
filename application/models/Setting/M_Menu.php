<?php
class M_Menu extends CI_Model{



    public function Master(){
        $this->db->from('r_menu');
        $this->db->order_by('parent_menu');
        $query = $this->db->get();

        return $query->result();
    }
}

