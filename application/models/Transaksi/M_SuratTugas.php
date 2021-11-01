<?php
class M_SuratTugas extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($number,$offset){
        $this->db->order_by('tglst');
        $this->db->limit($number, $offset);
        $query = $this->db->get('d_surattugas');

        return $query->result();
     
    }

    function Jum(){
         return $this->db->get('d_surattugas')->num_rows();
	}
    
    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            $this->db->select('id');
            $this->db->from('d_surattugas');
            $this->db->where('nost', $data);
            $query = $this->db->get();

            return $query->row();
        }
    }

    function cek($data,$table){
        return $this->db->get_where($table,$data);
    }
}