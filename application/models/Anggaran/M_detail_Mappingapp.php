
    <?php
    class M_detail_Mappingapp extends CI_Model{

        //////////////////////////

    var $column_order = array(
        'd_detailapp.id',
        'd_detailapp.id_app',
        'd_detailapp.rupiah',
        'd_detailapp.kdindex'); //set column field database for datatable orderable

    var $column_search = array(
        'd_detailapp.id',
        'd_detailapp.id_app',
        'd_detailapp.rupiah',
        'd_detailapp.kdindex',
        't_app.nama_app',); //set column field database for datatable searchable 
    
    var $order = array('id' => 'asc'); // default order 
    
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}
    
    private function _get_datatables_query($kdindex)
    {   
        $this->db->select('d_detailapp.id', 'id');
        $this->db->select('d_detailapp.id_app');
        $this->db->select('d_detailapp.rupiah');
        $this->db->select('d_detailapp.kdindex');
        $this->db->select('d_detailapp.th_pkpt');
        $this->db->select('d_detailapp.tahapan');
        $this->db->select('d_detailapp.rupiah_tahapan');
        $this->db->select('t_app.nama_app');

        $this->db->from('d_detailapp');
        $this->db->join('t_app', 't_app.id = d_detailapp.id_app');
        $this->db->where('d_detailapp.kdindex', $kdindex);
 
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
 
    function get_datatables($kdindex)
    {
        $this->_get_datatables_query($kdindex);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered($kdindex)
    {
        $this->_get_datatables_query($kdindex);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all($kdindex)
    {
        $this->db->from('d_detailapp');
        $this->db->where('kdindex', $kdindex);
        return $this->db->count_all_results();
    }

    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            $this->db->from($table);
            $this->db->join('t_app', 't_app.id = '.$table.'.id_app');
            $this->db->where($data);
            $query = $this->db->get();
    
            return $query->row();


        }else if($Trigger == "U"){

            $this->db->update($table, $data, $where);

        }else if($Trigger == "getRupiahTahapan"){

            $query = $this->db->query("SELECT SUM(rupiah_tahapan) as rupiah_tahapan from d_detailapp where kdindex = '".$data."'");    
            return $query->row();
        }
	}

    function getApp($data,$table){
        return $this->db->get_where($table,$data);
    }

    function cek($data,$table){
        return $this->db->get_where($table,$data);
    }

    public function Update($data, $table, $where){
        $this->db->update($table, $data, $where); 
    }


}