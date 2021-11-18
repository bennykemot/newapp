<?php
class M_NotaDinas extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew(){
        $this->db->order_by('tglst');
        $query = $this->db->get('d_surattugas');

        return $query->result();
     
    }

    function Jum(){
         return $this->db->get('d_surattugas')->num_rows();
	}
    
    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($data);
            $this->db->delete($table);

        }else if($Trigger == "R"){
            $this->db->select('d_surattugas.id as idst');
            $this->db->select('d_surattugas.tglst');
            $this->db->select('d_surattugas.uraianst');
            $this->db->select('d_surattugas.tglmulaist');
            $this->db->select('d_surattugas.tglselesaist');
            $this->db->select('d_surattugas.id_unit');
            $this->db->select('d_surattugas.id_ttd');
            $this->db->select('d_surattugas.idxskmpnen');

            $this->db->select('d_stdetail.id as id');
            $this->db->select('d_stdetail.nourut');
            $this->db->select('d_stdetail.nama');
            $this->db->select('d_stdetail.nip');

            $this->db->select('r_pegawai.gol_id');
            
            $this->db->select('r_golongan.new_id_golongan as id_golongan');
            $this->db->select('r_golongan.kode as nama_golongan');

            $this->db->from('d_surattugas');
            $this->db->join('d_stdetail', 'd_surattugas.id = d_stdetail.id_st');
            $this->db->join('r_pegawai', 'r_pegawai.nip = d_stdetail.nip');

            $this->db->join('r_golongan', 'r_golongan.new_id_golongan = r_pegawai.gol_id');

            $this->db->where('d_surattugas.id', $data);
            $query = $this->db->get();

            return $query->result_array();
        }else if($Trigger == "SelectForBebanAnggaran_NotaDinas"){

            $this->db->select('rupiah');
            $this->db->from('d_pagu');
            $this->db->where('kdindex', $data);
            $query = $this->db->get();
            return $query->result_array();

        }
    }

    function cek($data,$table){
        return $this->db->get_where($table,$data);
    }

    function getData_export(){
        if($Trigger == "costsheet"){
            $this->db->select('d_surattugas.id as idst');
            $this->db->select('d_surattugas.tglst');
            $this->db->select('d_surattugas.uraianst');
            $this->db->select('d_surattugas.tglmulaist');
            $this->db->select('d_surattugas.tglselesaist');
            $this->db->select('d_surattugas.id_unit');
            $this->db->select('d_surattugas.id_ttd');
            $this->db->select('d_surattugas.idxskmpnen');

            $this->db->select('d_stdetail.id as id');
            $this->db->select('d_stdetail.nourut');
            $this->db->select('d_stdetail.nama');
            $this->db->select('d_stdetail.nip');

            $this->db->select('r_pegawai.gol_id');
            
            $this->db->select('r_golongan.new_id_golongan as id_golongan');
            $this->db->select('r_golongan.kode as nama_golongan');

            $this->db->from('d_surattugas');
            $this->db->join('d_stdetail', 'd_surattugas.id = d_stdetail.id_st');
            $this->db->join('r_pegawai', 'r_pegawai.nip = d_stdetail.nip');

            $this->db->join('r_golongan', 'r_golongan.new_id_golongan = r_pegawai.gol_id');

            $this->db->where('d_surattugas.id', $data);
            $query = $this->db->get();

            return $query->result_array();
        }
    }

}