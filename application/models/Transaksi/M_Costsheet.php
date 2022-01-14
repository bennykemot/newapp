<?php
class M_Costsheet extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getData($id, $trigger){
        if($trigger == "Detail"){  
            $query = $this->db->query("SELECT d_itemcs.* , d_surattugas.* , 
            t_unitkerja.nama_unit,
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) as nip_ttd_spd, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',3),'-',-1) as nama_ttd_spd 
            FROM d_itemcs 
            JOIN d_surattugas ON d_itemcs.id_st = d_surattugas.id_st 
            JOIN d_bagipagu On d_bagipagu.kdindex = d_surattugas.kdindex 
            JOIN t_unitkerja ON t_unitkerja.id = d_bagipagu.unit_id 
            where d_itemcs.id_cs = '".$id."'");
        }else{
            if($id == 0){
                $query = $this->db->query("SELECT d_costsheet.*, d_surattugas.kdindex,d_surattugas.status_id from d_costsheet
                LEFT JOIN d_surattugas ON d_surattugas.id_st = d_costsheet.id_st WHERE d_costsheet.id_cs != '' AND d_costsheet.id_st!='0' ");

            }else{
                $query = $this->db->query("SELECT d_costsheet.*, d_surattugas.kdindex,d_surattugas.status_id from d_costsheet
                LEFT JOIN d_surattugas ON d_surattugas.id_st = d_costsheet.id_st 
                where d_costsheet.id_cs LIKE '%".$id."%'");
            }
            
        }
        return $query->result();

    }

    function getData_costsheet($Id_st,$Kdindex,$id_cs){

        $cek= $this->db->query("SELECT id_tahapan, id_app from d_surattugas where id_st=".$Id_st."")->result();

        if($cek[0]->id_app == 0){
            $query= $this->db->query("Select a.*, b.* from
            (SELECT kdindex,rupiah as rupiah_tahapan FROM d_pagu where d_pagu.kdindex = '".$Kdindex."')as a
            
            LEFT JOIN (SELECT SUM(d_surattugas.jumlah_realisasi) as realisasi, d_surattugas.kdindex as pagu_index 
     from d_surattugas WHERE d_surattugas.is_aktif = 1 AND d_surattugas.id_st !=".$Id_st." GROUP BY d_surattugas.kdindex) as b ON a.kdindex = b.pagu_index");

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
        AND d_surattugas.id_st != ".$Id_st." 
        GROUP BY kdindex,id_app,id_tahapan) as b 
        
        ON a.kdindex = b.kdindex AND a.id_app = b.id_app AND a.tahapan = b.id_tahapan");
        }
        return $query->result();

    }

    function getData_Ubah($kdindex, $id, $trigger,$data){

        $query = $this->db->query("SELECT 
        d_pagu.*, 
        d_surattugas.nost, d_surattugas.tglst, d_surattugas.uraianst, 
        d_surattugas.tglmulaist, d_surattugas.idx_temp,d_surattugas.status_cs, 
        d_surattugas.tglselesaist ,d_surattugas.id_unit,d_surattugas.id_st as idst,
        d_surattugas.idxskmpnen, d_surattugas.id_ttd,d_surattugas.kdsatker,
        d_surattugas.id_ttd,d_surattugas.jumlah_uang,d_surattugas.cs_menyetujui,
        d_surattugas.cs_mengajukan, d_surattugas.id_tahapan,d_surattugas.id_app
        ,d_surattugas.status_id,d_bagipagu.unit_id, d_surattugas.status_id, 
        d_surattugas.status_penandatangan, 
        
        t_unitkerja.nama_unit, 
        t_unitkerja.nama_grup, t_unitkerja.grup_id as kdunit, 
        
        d_itemcs.nourut, d_itemcs.jabatan, d_itemcs.nama, 
        d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, 
        d_itemcs.tglberangkat, d_itemcs.tglkembali, 
        d_itemcs.jmlhari,d_itemcs.totaluangharian, 
        d_itemcs.totalinap, d_itemcs.totalrep, 
        d_itemcs.tarifrep, d_itemcs.tariftaxi,d_itemcs.tariflaut,
        d_itemcs.tarifudara,d_itemcs.tarifdarat,d_itemcs.lain, 
        d_itemcs.totaltravel, d_itemcs.jumlah, d_itemcs.transport,
        d_itemcs.tarifuangharian,d_itemcs.tarifinap, 
        d_itemcs.jnstransportasi, CONCAT('WithTim') as tim, 
        d_itemcs.id as idtim,
        d_itemcs.nospd,
        d_itemcs.id_ttd_spd, 
        SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) as nip_ttd_spd, 
        SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',3),'-',-1) as nama_ttd_spd, 
        d_itemcs.kotaasal,d_itemcs.kotatujuan, 
        
        t_pegawai.nama as nama_ttd, 
        t_pegawai.nip as nip_ttd, 
        
        t_satker.kdkabkota, 
        r_statuscs.uraian_pusat,
        r_statuscs.uraian_perwakilan, d_costsheet.id_cs 
        
        FROM d_surattugas 
        JOIN d_pagu ON d_surattugas.kdindex = d_surattugas.kdindex 
        JOIN t_pegawai ON d_surattugas.id_ttd = t_pegawai.nip 
        JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker 
        JOIN d_bagipagu ON d_bagipagu.kdindex = d_surattugas.kdindex 
        JOIN t_unitkerja ON d_bagipagu.unit_id = t_unitkerja.id 
        JOIN r_statuscs ON d_surattugas.status_id = r_statuscs.id 
        JOIN d_itemcs ON d_surattugas.id_st = d_itemcs.id_st 
        JOIN d_costsheet ON d_costsheet.id_cs = d_itemcs.id_cs
        
        WHERE d_surattugas.id_st = ".$id." 
        AND d_pagu.kdindex = '".$kdindex."' ORDER BY d_itemcs.nourut");
        return $query->result_array();
        
    }

    function getData_export($Trigger,$Id_st,$Id_cs){
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
            JOIN d_itemcs ON d_surattugas.id_st = d_itemcs.id_st 
            LEFT JOIN t_pegawai ON d_surattugas.id_ttd = t_pegawai.nip 
            JOIN d_pagu ON d_pagu.kdindex = d_surattugas.kdindex
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id 
			JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker
            JOIN d_bagipagu ON d_bagipagu.kdindex = d_surattugas.kdindex
            JOIN t_unitkerja ON d_bagipagu.unit_id = t_unitkerja.id
            
            WHERE d_itemcs.id_cs = '".$Id_cs."' ORDER BY d_itemcs.nourut ");

            return $query->result();
        }else if($Trigger == "spd_back" ){

            $query = $this->db->query("SELECT d_surattugas.nost, d_surattugas.tglst, d_surattugas.status_cs, d_surattugas.status_penandatangan,
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.status_id,
            d_surattugas.tglselesaist, d_surattugas.idxskmpnen, d_itemcs.id_ttd_spd, 
            t_unitkerja.nama_unit , d_itemcs.nourut, d_itemcs.nama, 
            d_itemcs.nip, d_itemcs.jabatan, d_itemcs.golongan, 
            d_itemcs.tglberangkat, d_itemcs.tglkembali, d_itemcs.kotaasal, 
            d_itemcs.kotatujuan, d_itemcs.jmlhari, d_itemcs.totaluangharian, 
            d_itemcs.totalinap, d_itemcs.totalrep, d_itemcs.totaltravel , d_itemcs.jnstransportasi,
            d_itemcs.jumlah,
			t_pejabat.nama as ppk_nama, 
			t_pejabat.nip as ppk_nip,
            t_pegawai.jabatan as jabatan_ttd_spd,
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) as nip_ttd_spd, 
            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',3),'-',-1) as nama_ttd_spd
            
            FROM d_surattugas JOIN t_unitkerja ON t_unitkerja.id = d_surattugas.id_unit 
            JOIN d_itemcs ON d_surattugas.id_st = d_itemcs.id_st
			JOIN t_pejabat ON d_surattugas.ppk_id = t_pejabat.id
            JOIN t_pegawai ON  SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) = t_pegawai.nip  
            
            WHERE d_itemcs.id_cs = '".$Id_cs."' ORDER BY d_itemcs.nourut ");

            return $query->result();

        }
    }
}
