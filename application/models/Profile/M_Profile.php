<?php
class M_Profile extends CI_Model{

    var $table = 'user';
    var $column_order = array('user.id',
    'username',
    'kdsatker'); //set column field database for datatable orderable

    var $column_search = array('user.id',
    'username',
    'kdsatker'); //set column field database for datatable searchable 
    
    var $order = array('user.id' => 'asc'); // default order 
    
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($kdsatker){
        $this->db->select('t_satker.nmsatker');
        $this->db->select('t_satker.kdsatker');

        $this->db->select('user.id');
        $this->db->select('user.username');
        $this->db->select('user.role_id');
        $this->db->select('user.keterangan');
        $this->db->select('user.status');
        $this->db->select('t_role.rolename');
        
        
        $this->db->from($this->table);
        $this->db->join('t_satker', 't_satker.kdsatker = user.kdsatker');
        $this->db->join('t_role', 't_role.id = user.role_id');
        $this->db->where('user.kdsatker', $kdsatker);
        $query = $this->db->get();

        return $query->result();
     
    }


    private function _get_datatables_query($kdsatker)
    {
        $this->db->select('t_satker.nmsatker');
        $this->db->select('t_satker.kdsatker');

        $this->db->select('user.id');
        $this->db->select('user.username');
        $this->db->select('user.role_id');
        $this->db->select('user.keterangan');
        $this->db->select('user.status');
        $this->db->select('t_role.rolename');
        
        
        $this->db->from($this->table);
        $this->db->join('t_satker', 't_satker.kdsatker = user.kdsatker');
        $this->db->join('t_role', 't_role.id = user.role_id');
        $this->db->where('user.kdsatker', $kdsatker);
 
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
        return $this->db->count_all_results();
    }


    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            $this->db->select('t_satker.nmsatker');
            $this->db->select('t_satker.kdsatker');
    
            $this->db->select('user.id');
            $this->db->select('user.password');
            $this->db->select('user.username');
            $this->db->select('user.role_id');
            $this->db->select('user.keterangan');
            $this->db->select('user.status');
            $this->db->select('user.unit_id');
			$this->db->select('user.unit_kerja');
			$this->db->select('user.pejabat_id');
            $this->db->select('t_unitkerja.nama_unit');
            $this->db->select('t_role.rolename');
            
            
            $this->db->from($table);
            $this->db->join('t_satker', 't_satker.kdsatker = user.kdsatker');
            $this->db->join('t_role', 't_role.id = user.role_id');
            $this->db->join('t_unitkerja', 't_unitkerja.id = user.unit_id');
			$this->db->join('t_pejabat', 't_pejabat.jabatan_id = user.pejabat_id');
            $this->db->where($data);
            $query = $this->db->get();
    
            return $query->row();
        }
	}

    public function Update($data, $table, $where){
        $this->db->update($table, $data, $where); 
    }

    function Hak_Akses($data,$table, $Trigger){

        if($Trigger == "R"){

            $this->db->insert($table,$data);
            
        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }

    }


}
