<?php
class M_Costsheet extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getData_costsheet($id, $trigger){
        if($trigger == "Detail"){  
            $query = $this->db->query("SELECT d_itemcs.* , d_surattugas.* , 
            t_unitkerja.nama_unit,
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) as nip_ttd_spd, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',3),'-',-1) as nama_ttd_spd 
            FROM d_itemcs 
            JOIN d_surattugas ON d_itemcs.id_st = d_surattugas.id_st 
            JOIN d_bagipagu On d_bagipagu.kdindex = d_surattugas.kdindex 
            JOIN t_unitkerja ON t_unitkerja.id = d_bagipagu.unit_id 
            where d_itemcs.id_cs = '".$id."'");
        }else{
            $query = $this->db->query("SELECT d_costsheet.*, d_surattugas.kdindex from d_costsheet
            LEFT JOIN d_surattugas ON d_surattugas.id_st = d_costsheet.id_st 
            where d_costsheet.id_st = ".$id."");
        }
        return $query->result();

    }
}
