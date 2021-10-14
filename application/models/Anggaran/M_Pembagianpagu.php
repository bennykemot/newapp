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


    private function _get_datatables_query($kdsatker)
    {   
        $this->db->select('d_bagipagu.id');
        $this->db->select('d_bagipagu.user_id');
        $this->db->select('d_bagipagu.kdsatker');
        $this->db->select('d_bagipagu.thang');
        $this->db->select('d_bagipagu.kdprogram');
        $this->db->select('d_bagipagu.kdgiat');
        $this->db->select('d_bagipagu.kdoutput');
        $this->db->select('d_bagipagu.kdsoutput');
        $this->db->select('d_bagipagu.kdkmpnen');
        $this->db->select('user.username');

        $this->db->from($this->table);
        $this->db->join('user', 'd_bagipagu.user_id = user.id');
        $this->db->where('d_bagipagu.kdsatker', $kdsatker);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {   
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {   
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {   
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($kdsatker)
    {
        $this->_get_datatables_query($kdsatker);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($kdsatker)
    {
        $this->_get_datatables_query($kdsatker);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($kdsatker)
    {
        $this->db->from($this->table);
        $this->db->where('kdsatker', $kdsatker);
        return $this->db->count_all_results();
    }


    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){
            $this->db->insert($table,$data);
        }else{
            $this->db->where($data);
            $this->db->delete($table);
        }
	}

}