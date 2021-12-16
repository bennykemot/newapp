<?php
class M_Mappingapp extends CI_Model{

    var $table ="v_mapping";


    function getData_Mapping($kdsatker,$thang, $userid,$roleid, $unitid){
        $whereUnitid ="";$whereRoleid="";
        if($roleid != 1){
           $whereUnitid = "AND d_bagipagu.unit_id ='.$unitid.'";
           $whereRoleid = "WHERE c.role_id = ".$roleid." ";
           
        }

        if($kdsatker == "450491"){
                $kdgiat = "AND d_pagu.kdgiat > 4206 AND d_pagu.kdgiat < 4230";
            }else{
                $kdgiat = "AND d_pagu.kdgiat = 3701";
            }

            // $query = $this->db->query("SELECT a.*,b.alokasi , c.*
            // FROM 
            // (SELECT d_pagu.*,t_akun.nmakun FROM bsmart.d_pagu JOIN bsmart.t_akun ON d_pagu.kdakun=t_akun.kdakun 
         
            //     WHERE d_pagu.thang=".$thang." ".$kdgiat." AND d_pagu.kdprogram='CH' AND d_pagu.kdsatker=".$kdsatker."
            // ) as a 
            //  left JOIN 
            //     (SELECT d_detailapp.kdindex, SUM(d_detailapp.rupiah_tahapan) AS alokasi FROM d_detailapp GROUP BY d_detailapp.kdindex) as b
            //     ON a.kdindex=b.kdindex
                
            //     LEFT JOIN (SELECT d_bagipagu.role_id, d_bagipagu.kdindex FROM d_bagipagu ) as c
                
            //     ON a.kdindex=c.kdindex
                
            //     ".$whereRoleid."");

        $query = $this->db->query("SELECT a.*,b.alokasi 
        FROM 
        (SELECT d_pagu.*,t_akun.nmakun FROM bsmart.d_pagu JOIN bsmart.t_akun ON d_pagu.kdakun=t_akun.kdakun 
            WHERE d_pagu.thang=".$thang." ".$kdgiat." AND d_pagu.kdprogram='CH' AND d_pagu.kdsatker=".$kdsatker.") as a 
         left JOIN 
            (SELECT d_detailapp.kdindex, SUM(d_detailapp.rupiah_tahapan) AS alokasi FROM d_detailapp GROUP BY d_detailapp.kdindex) as b
            ON a.kdindex=b.kdindex
            
            LEFT JOIN (SELECT d_bagipagu.role_id, d_bagipagu.kdindex as kdindexbagipagu FROM d_bagipagu ) as c
                
                 ON a.kdindex=c.kdindexbagipagu  ".$whereRoleid."");

        // $query =  $this->db->query('SELECT d_pagu.*, t_akun.nmakun from d_pagu 
        // JOIN t_akun ON d_pagu.kdakun = t_akun.kdakun
        // JOIN d_bagipagu ON d_bagipagu.kdsatker = d_pagu.kdsatker 
        
        // WHERE d_bagipagu.kdsatker = '.$kdsatker.' AND d_bagipagu.thang = '.$thang.'  '.$whereUnitid.'
        // AND d_pagu.kdprogram = "CH"');

        return $query->result();
     
    }

    function datatablesdata($kdsatker){

            $this->db->where('kdsatker', $kdsatker);
            $this->db->order_by('kdsatker, kddept, kdunit, kdprogram, kdgiat, kdoutput,kdib, kdsoutput, kdkmpnen, kdskmpnen, kdakun');
            //$this->db->limit($number, $offset);
            $query =  $this->db->get($this->table);

            return $query->result();


    }

    function count_filtered($satker)
    {
        $this->db->where('kdsatker', $kdsatker);
            $this->db->order_by('kdsatker, kddept, kdunit, kdprogram, kdgiat, kdoutput,kdib, kdsoutput, kdkmpnen, kdskmpnen, kdakun');
            //$this->db->limit($number, $offset);
            $query =  $this->db->get($this->table);

        return $query->num_rows();
    }
 
    public function count_all($satker)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

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
            
            

        }else if($Trigger == "R-table"){

            $query = $this->db->query("SELECT d_detailapp.* ,t_app.nama_app ,r_tahapan.nama_tahapan 
            
            FROM d_detailapp JOIN t_app ON d_detailapp.id_app = t_app.id
            JOIN r_tahapan ON d_detailapp.tahapan = r_tahapan.id 
            
            where d_detailapp.kdindex = '".$data."' ORDER BY d_detailapp.id_app, d_detailapp.tahapan ASC");
    
            return $query->result();

        }
	}

    function getApp($data,$table){
        return $this->db->get_where($table,$data);
    }

}