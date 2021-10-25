<?php
class M_User extends CI_Model{



    public function getUser($user_id){

        
        $this->db->select('user.username');
        $this->db->select('user.password');
        $this->db->select('user.kdsatker');
        $this->db->select('user.role_id');
        $this->db->select('user.status');
        $this->db->select('t_satker.nmsatker');
        $this->db->select('t_role.rolename');
        $this->db->from('user');
        $this->db->join('t_satker', 't_satker.kdsatker = user.kdsatker');
        $this->db->join('t_role', 't_role.id = user.role_id');
        $this->db->where('user.id', $user_id);

        $query = $this->db->get();
            
        return $query->row();
    }
}

