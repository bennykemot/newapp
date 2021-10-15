<?php
class M_Mappingapp extends CI_Model{

    var $column_order = array(
        'kdsatker',
        'kddept',
        'kdunit',
        'kdprogram',
        'kdgiat',
        'kdoutput',
        'kdsoutput',
        'kdkmpnen',
        'kdskmpnen',
        'kdakun',
        'kdib',); //set column field database for datatable orderable

    var $column_search = array(
    'kode',
    'jumlah',
    'kdindex',
    'nmsatker','nmprogram','nmprogram','nmgiat','nmoutput','ursoutput','urkmpnen','urskmpnen','nmakun',
    'kdlevel'); //set column field database for datatable searchable 
    
    var $order= array('kdlevel' => 'asc'); // default order 

    
    private function query($kdsatker){
        $this->db->select('kode,jumlah,kdindex,nmsatker, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level0');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level0 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmprogram, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level1');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level1 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmgiat, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level2');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level2 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmoutput, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level3');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level3 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,ursoutput, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level4');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level4 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,urkmpnen, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level5');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level5 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,urskmpnen, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level6');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level6 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmakun, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level7');
        $this->db->where('kdsatker', $kdsatker);
        
        $v_level7 = $this->db->get_compiled_select();

        $query = $this->db->query(
            '   ('.$v_level0.') UNION ('.$v_level1.') UNION
                ('.$v_level2.') UNION ('.$v_level3.') UNION
                ('.$v_level4.') UNION ('.$v_level5.') UNION
                ('.$v_level6.') UNION ('.$v_level7.')');

                return $query;
    }

    private function _get_datatables_query($kdsatker)
    {   

        $this->query($kdsatker);

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
        //$this->_get_datatables_query($kdsatker);
        if($_POST['length'] != -1){

        $this->db->select('kode,jumlah,kdindex,nmsatker, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level0');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level0 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmprogram, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level1');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level1 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmgiat, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level2');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level2 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmoutput, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level3');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level3 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,ursoutput, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level4');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level4 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,urkmpnen, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level5');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level5 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,urskmpnen, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level6');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level6 = $this->db->get_compiled_select();

        $this->db->select('kode,jumlah,kdindex,nmakun, kdlevel,kdsatker,kddept,  kdunit,  kdprogram,  kdgiat,  kdoutput,  kdsoutput,  kdkmpnen,  kdskmpnen,  kdakun,  kdib');
        $this->db->from('v_level7');
        $this->db->where('kdsatker', $kdsatker);
        
        $this->db->limit($_POST['length'], $_POST['start']);
        $v_level7 = $this->db->get_compiled_select();

        $query = $this->db->query(
            '   ('.$v_level0.') UNION ('.$v_level1.') UNION
                ('.$v_level2.') UNION ('.$v_level3.') UNION
                ('.$v_level4.') UNION ('.$v_level5.') UNION
                ('.$v_level6.') UNION ('.$v_level7.')');

        }else{
            $query =  $this->query($kdsatker);
        }
        
        
        return $query->result();
    }
 
    function count_filtered($kdsatker)
    {
        $query =  $this->query($kdsatker);
        return $query->num_rows();
    }
 
    public function count_all($kdsatker)
    {
        $query = $this->query($kdsatker);
        return $this->db->count_all();
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