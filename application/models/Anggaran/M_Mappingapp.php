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

    // function getData_detailapp($kdsatker){
    //     $query = $this->db->query("Select SUM(rupiah_tahapan) as jumlah_tahapan, kdindex from d_detailapp where
    //     kdsatker = ".$kdsatker." ");
    //     return $query->result();
    // }

    function getDataNew($kdsatker,$number,$offset, $userId, $roleId){

        if($roleId == 1){

        $query = $this->db->where('kdsatker', $kdsatker);
            $this->db->order_by('kdsatker, kddept, kdunit, kdprogram, kdgiat, kdoutput,kdib, kdsoutput, kdkmpnen, kdskmpnen, kdakun');
            $this->db->limit($number, $offset);
            $query = $this->db->get($this->table);

        }else{

        $query = $this->db->query('SELECT * FROM v_mapping 
        LEFT JOIN d_bagipagu ON v_mapping.kdsatker = d_bagipagu.kdsatker
        WHERE v_mapping.kdsatker = '.$kdsatker.' AND d_bagipagu.user_id = '.$userId.'
            AND (v_mapping.kdprogram = d_bagipagu.kdprogram OR v_mapping.kdprogram = "") 
            AND (v_mapping.kdgiat = d_bagipagu.kdgiat OR v_mapping.kdgiat = "")
            AND (v_mapping.kdoutput = d_bagipagu.kdoutput OR v_mapping.kdoutput = "")
            AND (v_mapping.kdsoutput = d_bagipagu.kdsoutput OR v_mapping.kdsoutput = "")
            AND (v_mapping.kdkmpnen = d_bagipagu.kdkmpnen OR v_mapping.kdkmpnen = "")
            Order by v_mapping.kdsatker, v_mapping.kddept, v_mapping.kdunit, v_mapping.kdprogram, v_mapping.kdgiat, v_mapping.kdoutput,v_mapping.kdib, v_mapping.kdsoutput, v_mapping.kdkmpnen, v_mapping.kdskmpnen, v_mapping.kdakun
            LIMIT '.$number.' OFFSET '.$offset.'');
        
        }

        return $query->result();
     
    }

    function Jum($kdsatker,$userId, $roleId){

        if($roleId == 1){
		 $query = $this->db->query("SELECT * from v_mapping WHERE kdsatker = ".$kdsatker." ");
        }else{
            $query = $this->db->query('SELECT * FROM v_mapping 
        JOIN d_bagipagu ON v_mapping.kdsatker=d_bagipagu.kdsatker
        WHERE v_mapping.kdsatker = '.$kdsatker.' AND d_bagipagu.user_id = '.$userId.'
            AND (v_mapping.kdprogram=d_bagipagu.kdprogram OR v_mapping.kdprogram="") 
            AND (v_mapping.kdgiat=d_bagipagu.kdgiat OR v_mapping.kdgiat="")
            AND (v_mapping.kdoutput=d_bagipagu.kdoutput OR v_mapping.kdoutput="")
            AND (v_mapping.kdsoutput=d_bagipagu.kdsoutput OR v_mapping.kdsoutput="")
            AND (v_mapping.kdkmpnen=d_bagipagu.kdkmpnen OR v_mapping.kdkmpnen="")');
        }
         return $query->num_rows();

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