<?php
class M_NotaDinas extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($number,$offset){
       $query = $this->db->query('SELECT d_surattugas.id as idsurattugas, d_surattugas.nost, d_surattugas.uraianst, d_surattugas.tglst, d_surattugas.tglmulaist, d_surattugas.tglselesaist, d_costsheet.tujuanst, d_costsheet.biaya, d_costsheet.id as idcostsheet FROM `d_surattugas` JOIN d_costsheet ON d_surattugas.id = d_costsheet.nost  LIMIT '.$number.' OFFSET '.$offset.'');

        return $query->result();
     
    }

    function Jum(){
         return $this->db->query('SELECT * FROM d_surattugas JOIN d_costsheet ON d_surattugas.id = d_costsheet.nost')->num_rows();
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

    function getData_costsheet($Id_st,$Kdindex){

        $cek= $this->db->query("SELECT id_tahapan, id_app from d_surattugas where id=".$Id_st."")->result();

        if($cek[0]->id_app == 0){
            $query= $this->db->query("Select a.*, b.* from
            (SELECT kdindex,rupiah as rupiah_tahapan FROM d_pagu where d_pagu.kdindex = '".$Kdindex."')as a
            
            LEFT JOIN (SELECT SUM(d_surattugas.jumlah_realisasi) as realisasi, d_surattugas.kdindex as pagu_index 
     from d_surattugas WHERE d_surattugas.is_aktif = 1 AND d_surattugas.id !=".$Id_st." GROUP BY d_surattugas.kdindex) as b ON a.kdindex = b.pagu_index");

        }else{
        $query = $this->db->query("SELECT a.*, b.realisasi from 
        (SELECT d_detailapp.kdindex, d_detailapp.id_app, d_detailapp.tahapan, 
        d_detailapp.rupiah_tahapan, r_tahapan.id as id_tahapan 
        from d_detailapp 
        JOIN t_app ON t_app.id = d_detailapp.id_app 
        JOIN r_tahapan ON r_tahapan.id = d_detailapp.tahapan 
        JOIN v_mapping ON v_mapping.kdindex = d_detailapp.kdindex 
        where d_detailapp.kdindex = '".$Kdindex."' 
        and d_detailapp.id_app=".$cek[0]->id_app." 
        
        and d_detailapp.tahapan=".$cek[0]->id_tahapan." ) as a 
        
        
        LEFT JOIN (SELECT SUM(jumlah_realisasi) as realisasi, id_app, id_tahapan, kdindex 
        from d_surattugas 
        WHERE d_surattugas.is_aktif = 1 
        AND d_surattugas.id != ".$Id_st." 
        GROUP BY kdindex,id_app,id_tahapan) as b 
        
        ON a.kdindex = b.kdindex AND a.id_app = b.id_app AND a.tahapan = b.id_tahapan");
        }
        return $query->result();

    }

    function getData_export($Trigger,$Id_st){
        if($Trigger == "costsheet" || $Trigger == "spd" || $Trigger == "nominatif"){
            $query = $this->db->query("SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_cs, d_surattugas.status_penandatangan,
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.status_id,
            d_surattugas.tglselesaist, d_surattugas.idxskmpnen, d_surattugas.id_ttd,
            t_unitkerja.nama_unit , d_itemcs.nourut, d_itemcs.nama, 
            d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, 
            d_itemcs.tglberangkat, d_itemcs.tglkembali, d_itemcs.kotaasal, 
            d_itemcs.kotatujuan, d_itemcs.jmlhari, d_itemcs.totaluangharian, d_itemcs.transport, 
            d_itemcs.totalinap, d_itemcs.totalrep, d_itemcs.totaltravel , d_itemcs.jnstransportasi,d_itemcs.nospd,
            d_itemcs.jumlah ,d_pagu.rupiah,d_pagu.kdbeban,
			t_pejabat.nama as ppk_nama, 
			t_pejabat.nip as ppk_nip,
			t_satker.lokasi as lokasi,

            CONCAT(d_pagu.thang,'.',d_pagu.kdsatker,'.',d_pagu.kddept,'.',d_pagu.kdunit,'.',d_pagu.kdprogram,'.',
            d_pagu.kdgiat,'.',d_pagu.kdoutput,'.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',
            d_pagu.kdakun,'.',d_pagu.kdbeban,'.',d_pagu.kdib) as kodebeban,
            
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_surattugas.cs_menyetujui,'-',2),'-',-1) as nip_menyetujui, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_surattugas.cs_menyetujui,'-',3),'-',-1) as nama_menyetujui,

            SUBSTRING_INDEX(SUBSTRING_INDEX(d_surattugas.cs_mengajukan,'-',2),'-',-1) as nip_mengajukan, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_surattugas.cs_mengajukan,'-',3),'-',-1) as nama_mengajukan
            
            
            FROM d_surattugas 
            JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st 
            LEFT JOIN t_pegawai ON d_surattugas.id_ttd = t_pegawai.nip 
            JOIN d_pagu ON d_pagu.kdindex = d_surattugas.kdindex
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id 
			JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker
            JOIN d_bagipagu ON d_bagipagu.kdindex = d_surattugas.kdindex
            JOIN t_unitkerja ON d_bagipagu.unit_id = t_unitkerja.id
            
            WHERE d_surattugas.id = ".$Id_st." ORDER BY d_itemcs.nourut ");

            return $query->result();
            
        }else if($Trigger == "spd_back" ){

            $query = $this->db->query("SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_cs, d_surattugas.status_penandatangan,
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.status_id,
            d_surattugas.tglselesaist, d_surattugas.idxskmpnen, d_itemcs.id_ttd_spd, 
            t_unitkerja.nama_unit , d_itemcs.nourut, d_itemcs.nama, 
            d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, 
            d_itemcs.tglberangkat, d_itemcs.tglkembali, d_itemcs.kotaasal, 
            d_itemcs.kotatujuan, d_itemcs.jmlhari, d_itemcs.totaluangharian, 
            d_itemcs.totalinap, d_itemcs.totalrep, d_itemcs.totaltravel , d_itemcs.jnstransportasi,d_itemcs.nospd,
            d_itemcs.jumlah,
			t_pejabat.nama as ppk_nama, 
			t_pejabat.nip as ppk_nip,
            t_pegawai.jabatan as jabatan_ttd_spd,
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) as nip_ttd_spd, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',3),'-',-1) as nama_ttd_spd
            
            FROM d_surattugas JOIN t_unitkerja ON t_unitkerja.id = d_surattugas.id_unit 
            JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id
            JOIN t_pegawai ON  SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) = t_pegawai.nip  
            
            WHERE d_surattugas.id = ".$Id_st." ORDER BY d_itemcs.nourut ");

            return $query->result();

        }else if($Trigger == "kwitansi" ){

            $query = $this->db->query("SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_cs, d_surattugas.status_penandatangan,
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.status_id,
            d_surattugas.tglselesaist, d_surattugas.idxskmpnen, 
            t_unitkerja.nama_unit , d_itemcs.nourut, d_itemcs.nama, 
            d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, 
            d_itemcs.tglberangkat, d_itemcs.tglkembali, d_itemcs.kotaasal, 
            d_itemcs.kotatujuan, d_itemcs.jmlhari, d_itemcs.totaluangharian, d_itemcs.nospd,
            d_itemcs.totalinap, d_itemcs.totalrep, d_itemcs.totaltravel ,
            d_itemcs.tarifuangharian, 
            d_itemcs.tarifinap, d_itemcs.tarifrep, d_itemcs.transport ,
            d_itemcs.jnstransportasi, 
            d_itemcs.tariftaxi, 	
            d_itemcs.tariflaut, 
            d_itemcs.tarifdarat, 
            d_itemcs.tarifudara, 
            d_itemcs.jumlah,
			t_satker.lokasi as lokasi,
			t_pejabat.nama as ppk_nama, 
			t_pejabat.nip as ppk_nip
            
            FROM d_surattugas JOIN t_unitkerja ON t_unitkerja.id = d_surattugas.id_unit 
            JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st 
			JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id 
            
            WHERE d_surattugas.id = ".$Id_st." ORDER BY d_itemcs.nourut ");

            return $query->result();

        }else if($Trigger == "rincian_biaya" ){

            $query = $this->db->query("SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_cs, d_surattugas.status_penandatangan,
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.status_id,
            d_surattugas.tglselesaist, d_surattugas.idxskmpnen, 
            t_unitkerja.nama_unit , d_itemcs.nourut, d_itemcs.nama, 
            d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, 
            d_itemcs.tglberangkat, d_itemcs.tglkembali, d_itemcs.kotaasal, d_itemcs.nospd,
            d_itemcs.kotatujuan, d_itemcs.jmlhari, d_itemcs.totaluangharian, 
            d_itemcs.totalinap, d_itemcs.totalrep, d_itemcs.totaltravel ,
            d_itemcs.tarifuangharian, 
            d_itemcs.tarifinap, d_itemcs.tarifrep, d_itemcs.transport ,
            d_itemcs.jnstransportasi,
            d_itemcs.tariftaxi, 	
            d_itemcs.tariflaut, 
            d_itemcs.tarifdarat, 
            d_itemcs.tarifudara, 
            d_itemcs.jumlah,
			t_pejabat.nama as ppk_nama, 
			t_pejabat.nip as ppk_nip,
			t_satker.lokasi as lokasi 
            
            FROM d_surattugas JOIN t_unitkerja ON t_unitkerja.id = d_surattugas.id_unit 
            JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st 
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id  
			JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker
            
            WHERE d_surattugas.id = ".$Id_st." ORDER BY d_itemcs.nourut ");

            return $query->result();

        }else if($Trigger == "pengeluaran_rill" ){

            $query = $this->db->query("SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_cs, d_surattugas.status_penandatangan,
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.status_id,
            d_surattugas.tglselesaist, d_surattugas.idxskmpnen, 
            d_itemcs.nourut, d_itemcs.nama, 
            d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan,d_itemcs.nospd,
			t_pejabat.nama as ppk_nama, 
			t_pejabat.nip as ppk_nip,
			t_satker.lokasi as lokasi 
            
            FROM d_surattugas
            JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st 
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id  
			JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker
            
            WHERE d_surattugas.id = ".$Id_st." ORDER BY d_itemcs.nourut ");

            return $query->result();

        }else if($Trigger == "perhitungan_rampung" ){

                $query = $this->db->query("SELECT 
                d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_id,d_surattugas.status_cs, d_surattugas.status_penandatangan,
                d_surattugas.uraianst, d_surattugas.tglmulaist, 
                d_surattugas.tglselesaist, d_surattugas.idxskmpnen, d_itemcs.nospd,
                d_itemcs.nourut, d_itemcs.nama, 
                d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, d_itemcs.jumlah,
				t_pejabat.nama as ppk_nama, 
				t_pejabat.nip as ppk_nip,
				t_satker.lokasi as lokasi 
                
                FROM d_surattugas
                JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st
				JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id 
				JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker
                
                WHERE d_surattugas.id = ".$Id_st." ORDER BY d_itemcs.nourut ");
    
                return $query->result();
    
            }
    }

	function getBendahara_export($kdsatker,$unitId){
		$whereUnitId = "";
		if($kdsatker == 450491){
			$whereUnitId = " AND t_pejabat.unitkerja_id = ".$unitId." ";
		}

		$query = $this->db->query("SELECT * FROM t_pejabat 
				WHERE jabatan_id = 2 AND kdsatker = ".$kdsatker." ".$whereUnitId."
		");
    
        return $query->result_array();

	}

}
