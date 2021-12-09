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

    function getDataUbah($id, $trigger){

        if($trigger == "Tambah_Tim"){

            $query = $this->db->query('SELECT d_surattugas.nost, d_surattugas.tglst, 
            d_surattugas.uraianst, d_surattugas.tglmulaist, 
            d_surattugas.tglselesaist ,d_surattugas.id_unit,
            
            t_unitkerja.nama_unit, 
            
            d_surattugas.idxskmpnen, 
            d_surattugas.id_ttd, 
            
            t_pegawai.nama as nama_ttd, 
            d_surattugas.id as idst
            
            FROM d_surattugas 
            JOIN t_unitkerja ON d_surattugas.id_unit = t_unitkerja.id 
            JOIN t_pegawai ON d_surattugas.id_ttd = t_pegawai.nip WHERE d_surattugas.id = '.$id.'');

        }else{
            $query = $this->db->query('SELECT d_surattugas.nost, d_surattugas.tglst, 
            d_surattugas.uraianst, d_surattugas.tglmulaist, 
            d_surattugas.tglselesaist ,d_surattugas.id_unit,
            
            t_unitkerja.nama_unit, 
            
            d_surattugas.idxskmpnen, 
            d_surattugas.id_ttd, 
            
            t_pegawai.nama as nama_ttd, 
            d_surattugas.id as idst, 
            
            d_itemcs.nourut, d_itemcs.jabatan,
            d_itemcs.nama, d_itemcs.nip, 
            d_itemcs.jabatan, d_itemcs.golongan, 
            d_itemcs.tglberangkat, d_itemcs.tglkembali, 
            d_itemcs.jmlhari,d_itemcs.totaluangharian, 
            d_itemcs.totalinap, d_itemcs.totalrep, 
            d_itemcs.totaltravel, d_itemcs.jumlah, 
            d_itemcs.jnstransportasi,

            d_itemcs.kotaasal,d_itemcs.kotatujuan
            
            FROM d_surattugas 
            JOIN t_unitkerja ON d_surattugas.id_unit = t_unitkerja.id 
            JOIN t_pegawai ON d_surattugas.id_ttd = t_pegawai.nip 
            JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st WHERE d_surattugas.id = '.$id.'');
        }
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