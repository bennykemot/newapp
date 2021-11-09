<?php
class M_Mappingapp extends CI_Model{

    var $table ="v_mapping";

    // function getDataNew($kdsatker){
    //     $this->db->where('kdsatker', $kdsatker);
    //     $this->db->from('v_mapping');
    //     $this->db->order_by('kdsatker, kddept, kdunit, kdprogram, kdgiat, kdoutput,kdib, kdsoutput, kdkmpnen, kdskmpnen, kdakun');
    //     $query = $this->db->get();

    //     return $query->result();
     
    // }

    function getDataNew($kdsatker,$number,$offset){
        $this->db->where('kdsatker', $kdsatker);
        $this->db->order_by('kdsatker, kddept, kdunit, kdprogram, kdgiat, kdoutput,kdib, kdsoutput, kdkmpnen, kdskmpnen, kdakun');
        $this->db->limit($number, $offset);
        $query = $this->db->get($this->table);

        return $query->result();
     
    }

    function Jum($satker){
		 $this->db->where('kdsatker',$satker);
         return $this->db->get($this->table)->num_rows();
	}


    
    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            return $this->db->get_where($table,$data);

        }
	}

    function getApp($data,$table){
        return $this->db->get_where($table,$data);
    }

}