<?php
class M_SuratTugas extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($number,$offset){
        $this->db->where('is_aktif', 1);
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

            if($trigger == "export"){

            $select = "d_itemcs.nourut, d_itemcs.jabatan,
                d_itemcs.nama, d_itemcs.nip, 
                d_itemcs.jabatan, d_itemcs.golongan, 
                d_itemcs.tglberangkat, d_itemcs.tglkembali, 
                d_itemcs.jmlhari,d_itemcs.totaluangharian, 
                d_itemcs.totalinap, d_itemcs.totalrep, 
                d_itemcs.totaltravel, d_itemcs.jumlah, 
                d_itemcs.jnstransportasi, CONCAT('WithTim') as tim, d_itemcs.id as idtim,
    
                d_itemcs.kotaasal,d_itemcs.kotatujuan,";
                $join = "JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st";

                $order ="ORDER BY d_itemcs.nourut";
            
                }else{

                    $cek = $this->db->query("SELECT id from d_itemcs WHERE id_st = ".$id."")->result_array();
                    $select ="";$join="";$order="";
                    if(count($cek) > 0){
                        $select = "d_itemcs.nourut, d_itemcs.jabatan,
                        d_itemcs.nama, d_itemcs.nip, 
                        d_itemcs.jabatan, d_itemcs.golongan, 
                        d_itemcs.tglberangkat, d_itemcs.tglkembali, 
                        d_itemcs.jmlhari,d_itemcs.totaluangharian, 
                        d_itemcs.totalinap, d_itemcs.totalrep, 
                        d_itemcs.totaltravel, d_itemcs.jumlah, 
                        d_itemcs.jnstransportasi, CONCAT('WithTim') as tim, d_itemcs.id as idtim,
            
                        d_itemcs.kotaasal,d_itemcs.kotatujuan,";
                        $join = "JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st";

                        $order ="ORDER BY d_itemcs.nourut";
                    
                }
               }
            $query = $this->db->query('SELECT d_surattugas.nost, d_surattugas.tglst, 
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.idx_temp,
            d_surattugas.tglselesaist ,d_surattugas.id_unit,d_surattugas.id as idst,d_surattugas.idxskmpnen, 
            d_surattugas.id_ttd,
            CONCAT("NoTim") as tim,
            
            t_unitkerja.nama_unit, 
            '.$select.'
            t_pegawai.nama as nama_ttd
            
            FROM d_surattugas 
            JOIN t_unitkerja ON d_surattugas.id_unit = t_unitkerja.id 
            JOIN t_pegawai ON d_surattugas.id_ttd = t_pegawai.nip 
            '.$join.' WHERE d_surattugas.id = '.$id.'  '. $order.'');
    }
        
            return $query->result_array();

    }
    
    function CRUD($data,$table,$Trigger){

        if($Trigger == "C"){

            $this->db->insert($table,$data);

        }else if($Trigger == "D"){

            $this->db->where($where);
            $this->db->update($table,$data);

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