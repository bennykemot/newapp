<?php
class M_Transfer extends CI_Model{

    
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}


     function getPagu_Norevisi($kdsatker)
    {
       $this->db->distinct();
       $this->db->select('revisike');
       $this->db->from('d_pagu');
       $this->db->where('kdsatker', $kdsatker);
        $query = $this->db->get();
       return $query->result();

    }

}