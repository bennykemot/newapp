<?php
class M_Hakakses extends CI_Model{



    public function Master(){
        $this->db->from('t_hakakses');
        $query = $this->db->get();

        return $query->result();
    }
}

