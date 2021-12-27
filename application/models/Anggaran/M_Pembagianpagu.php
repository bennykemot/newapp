<?php
class M_Pembagianpagu extends CI_Model{

    var $table = 'd_bagipagu';
    var $column_order = array('d_bagipagu.thang',
    'd_bagipagu.kdsatker',
    'd_bagipagu.kdprogram',
    'd_bagipagu.kdgiat',
    'd_bagipagu.kdoutput',
    'd_bagipagu.kdsoutput',
    'd_bagipagu.kdkmpnen',
    'd_bagipagu.user_id'); //set column field database for datatable orderable

    var $column_search = array('d_bagipagu.thang',
    'd_bagipagu.kdsatker',
    'd_bagipagu.kdprogram',
    'd_bagipagu.kdgiat',
    'd_bagipagu.kdoutput',
    'd_bagipagu.kdsoutput',
    'd_bagipagu.kdkmpnen',
    'd_bagipagu.user_id'); //set column field database for datatable searchable 
    
    var $order = array('d_bagipagu.id' => 'asc'); // default order 
    
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($kdsatker,$thang, $userid, $roleid,$unitid){
        $whereUnitid ="";
        if($roleid != 1){
           $whereUnitid = "AND d_bagipagu.unit_id ='.$unitid.'";
        }

        $query = $this->db->query('SELECT a.*, b.realisasi, b.pagu_index 
        FROM (SELECT d_pagu.*, t_akun.nmakun, d_bagipagu.unit_id 
        from d_pagu JOIN t_akun ON d_pagu.kdakun = t_akun.kdakun 
        LEFT JOIN d_bagipagu on d_bagipagu.kdindex = d_pagu.kdindex 
        WHERE d_pagu.kdsatker = '.$kdsatker.' AND d_pagu.thang = '.$thang.' '.$whereUnitid.' ORDER BY d_pagu.kdindex) as a 
        LEFT JOIN (SELECT SUM(d_surattugas.jumlah_realisasi) as realisasi, d_surattugas.kdindex as pagu_index 
        from d_surattugas GROUP BY d_surattugas.kdindex) as b ON a.kdindex = b.pagu_index; ');

        // $query =  $this->db->query('SELECT d_pagu.*, t_akun.nmakun, d_bagipagu.unit_id from d_pagu JOIN t_akun ON d_pagu.kdakun = t_akun.kdakun LEFT JOIN d_bagipagu on d_bagipagu.kdindex = d_pagu.kdindex
        // WHERE d_pagu.kdsatker = '.$kdsatker.' AND d_pagu.thang = '.$thang.' '.$whereUnitid.'  ORDER BY d_pagu.kdindex');

        return $query->result();
     
    }


    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            $query = $this->db->query("SELECT 
            CONCAT(kdgiat,'.',kdoutput,'.','[IB.',kdib,']','.',kdsoutput,'.',kdkmpnen,'.',kdskmpnen,'.',kdakun) as mata_anggaran 
            , rupiah, kdindex, thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen
             FROM d_pagu where kdindex = '".$data."'");
    
            return $query->result();

        }else if($Trigger == "R-table"){
            $query = $this->db->query("SELECT d_bagipagu.id, d_bagipagu.unit_id, d_bagipagu.role_id, 
            d_pagu.rupiah, d_pagu.kdbeban , t_unitkerja.nama_unit, d_bagipagu.ppk_id , t_pejabat.nama , t_role.rolename
                                        FROM d_bagipagu 
                                        JOIN t_unitkerja ON d_bagipagu.unit_id = t_unitkerja.id 
                                        JOIN t_pejabat ON d_bagipagu.ppk_id = t_pejabat.id
                                        JOIN t_role ON d_bagipagu.role_id = t_role.id
                                        JOIN d_pagu ON d_bagipagu.kdindex = d_pagu.kdindex 
                                        where d_bagipagu.kdindex = '".$data."'");
    
            return $query->result();

        }
	}

    function CEK($data,$table,$Trigger){

            $this->db->from($table);
            $this->db->where($data);
            $query = $this->db->get();
    
            return $query->result_array();
    }

    public function Update($data, $table, $where){
        $this->db->update($table, $data, $where); 
    }

}
