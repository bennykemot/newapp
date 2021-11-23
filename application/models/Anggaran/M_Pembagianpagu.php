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

    function getDataNew($kdsatker,$thang){
        $this->db->select('d_bagipagu.id');
        $this->db->select('d_bagipagu.user_id');
        $this->db->select('d_bagipagu.kdsatker');
        $this->db->select('d_bagipagu.kddept');
        $this->db->select('d_bagipagu.kdunit');
        $this->db->select('d_bagipagu.thang');
        $this->db->select('d_bagipagu.kdprogram');
        $this->db->select('d_bagipagu.kdgiat');
        $this->db->select('d_bagipagu.kdoutput');
        $this->db->select('d_bagipagu.kdsoutput');
        $this->db->select('d_bagipagu.kdkmpnen');
        $this->db->select('user.username');

        $this->db->from('d_bagipagu');
        $this->db->join('user', 'd_bagipagu.user_id = user.id');
        $this->db->where('d_bagipagu.kdsatker', $kdsatker);
        $this->db->where('d_bagipagu.thang', $thang);
        // $this->db->limit($number, $offset);
        $query = $this->db->get();

        return $query->result();
     
    }


    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            
            $this->db->from($table);
            $this->db->join('user', 'user.id = '.$table.'.user_id');
            $this->db->where($data);
            $query = $this->db->get();
    
            return $query->row();

        }
	}

    public function Update($data, $table, $where){
        $this->db->update($table, $data, $where); 
    }

}