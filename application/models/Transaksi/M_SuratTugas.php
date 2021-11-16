<?php
class M_SuratTugas extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($number,$offset){
        $this->db->order_by('tglst');
        $this->db->limit($number, $offset);
        $query = $this->db->get('d_surattugas');

        return $query->result();
     
    }

    function Jum(){
         return $this->db->get('d_surattugas')->num_rows();
	}

    function getDataUbah($id){
            $query = $this->db->query('SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.tglselesaist
            ,d_surattugas.id_unit, d_surattugas.idxskmpnen, d_surattugas.id_ttd, d_surattugas.id as idst,
            d_stdetail.nourut, d_stdetail.nama, d_stdetail.nip, d_stdetail.peran, d_stdetail.id as idtim, t_unitkerja.nama_unit
            ,d_surattugas.is_approved1 as approved_eselon1 , d_surattugas.is_approved2 as approved_eselon2, 
            d_surattugas.is_approved3 as approved_eselon3, d_surattugas.is_approved4 as approved_eselon4,
            DATEDIFF(d_surattugas.tglselesaist, d_surattugas.tglmulaist) as jmlhari
            FROM d_surattugas 
            JOIN d_stdetail ON d_surattugas.id = d_stdetail.id_st 
            JOIN t_unitkerja ON d_surattugas.id_unit = t_unitkerja.id WHERE d_surattugas.id = "'.$id.'"');
            return $query->result_array();

    }
    
    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){

            $this->db->select('id');
            $this->db->from('d_surattugas');
            $this->db->where('nost', $data);
            $query = $this->db->get();

            return $query->row();
        }
    }

    function Update($data,$table,$where){
        $this->db->where($where);
		$this->db->update($table,$data);
    }
    

    function cek($data,$table){
        return $this->db->get_where($table,$data);
    }
}