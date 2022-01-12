<?php
class M_SuratTugas extends CI_Model{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}

    function getDataNew($per_page,$from,$kdsatker, $unitid, $roleid, $penjabid){
        $where="";$whereD="";
        
        if($roleid == 1){
            $where = "";
            }else{
                if($kdsatker == "450491"){
                    if($roleid == 3 || $roleid == 2 || $roleid == 4 || $roleid == 9 || $roleid == 10){
                    $where = "AND d_surattugas.id_unit = ".$unitid."";
                    }else{
                        $where="";
                    }
                }else{
                    if($roleid == 5 || $roleid == 7 || $roleid == 3 ){
                        $where="";
                    }else{
                        $where = "AND d_surattugas.id_unit = ".$unitid."";
                    }
                }
            }

        if($roleid == 3){
            $join ="";
            $whereD = "AND d_bagipagu.ppk_id = ".$penjabid."";
        }else if($roleid == 5 || $roleid == 7){
            $cek = $this->db->query("select * from t_pejabat where id = ".$penjabid."")->result();
            $whereD = "AND d_surattugas.cs_menyetujui like '%".$cek[0]->nip."%'";
        }

        $query = $this->db->query("SELECT d_surattugas.*, user.username 
        from d_surattugas 
        JOIN d_bagipagu ON d_surattugas.kdindex = d_bagipagu.kdindex
        JOIN user ON d_surattugas.user_id = user.id where 
        d_surattugas.is_aktif = 1 AND d_surattugas.kdsatker = ".$kdsatker." ".$whereD." ".$where." 
        ORDER BY d_surattugas.created_at LIMIT ".$from.",".$per_page."");

        // $this->db->where('kdsatker', $kdsatker);
        // $this->db->where('is_aktif', 1);
        // $where;
        // $this->db->order_by('tglst');
        // $query = $this->db->get('d_surattugas');

        return $query->result();
     
    }

    function Jum($kdsatker, $unitid, $roleid, $penjabid){

        $where="";$whereD="";
        
        if($roleid == 1){
            $where = "";
            }else{
                if($kdsatker == "450491"){
                    if($roleid == 3 || $roleid == 2 || $roleid == 4 || $roleid == 9 || $roleid == 10){
                    $where = "AND d_surattugas.id_unit = ".$unitid."";
                    }else{
                        $where="";
                    }
                }else{
                    if($roleid == 5 || $roleid == 7 || $roleid == 3 ){
                        $where="";
                    }else{
                        $where = "AND d_surattugas.id_unit = ".$unitid."";
                    }
                }
            }

        if($roleid == 3){
            $join ="";
            $whereD = "AND d_bagipagu.ppk_id = ".$penjabid."";
        }else if($roleid == 5 || $roleid == 7){
            $cek = $this->db->query("select * from t_pejabat where id = ".$penjabid."")->result();
            $whereD = "AND d_surattugas.cs_menyetujui like '%".$cek[0]->nip."%'";
        }

        $query = $this->db->query("SELECT d_surattugas.*, user.username 
        from d_surattugas 
        JOIN d_bagipagu ON d_surattugas.kdindex = d_bagipagu.kdindex
        JOIN user ON d_surattugas.user_id = user.id where 
        d_surattugas.is_aktif = 1 AND d_surattugas.kdsatker = ".$kdsatker." ".$whereD." ".$where."");

         return $query->num_rows();
	}

    function getDataUbah($kdindex, $id, $trigger){

        if($trigger == "Tambah_Tim"){

            $query = $this->db->query('SELECT d_surattugas.nost, d_surattugas.tglst, 
            d_surattugas.uraianst, d_surattugas.tglmulaist, 
            d_surattugas.tglselesaist ,d_surattugas.id_unit,d_surattugas.kdakun,d_surattugas.kdsatker,
            d_surattugas.jumlah_uang,d_surattugas.cs_menyetujui,d_surattugas.cs_mengajukan,d_surattugas.id_app,d_surattugas.id_tahapan,
            
            t_unitkerja.nama_unit, 
            d_bagipagu.kdindex, 
            
            d_surattugas.idxskmpnen, 
            d_surattugas.id_ttd,
            d_surattugas.jumlah_uang,
            CONCAT("NoTim") as tim,
            
            t_pejabat.nama as nama_ttd,
            d_surattugas.id as idst,

            t_satker.kdkabkota,
            t_satker.kdlokasi
            
            FROM d_surattugas 
            JOIN d_bagipagu on d_surattugas.kdindex = d_bagipagu.kdindex
            JOIN t_unitkerja ON d_bagipagu.unit_id = t_unitkerja.id
            JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker 
            JOIN t_pejabat ON d_surattugas.id_ttd = t_pejabat.id  WHERE d_surattugas.id = '.$id.'');

        }else{

                if($trigger == "export"){

                            $select = "d_itemcs.nourut, d_itemcs.jabatan,
                                d_itemcs.nama, d_itemcs.nip, 
                                d_itemcs.jabatan, d_itemcs.golongan, 
                                d_itemcs.tglberangkat, d_itemcs.tglkembali, 
                                d_itemcs.jmlhari,d_itemcs.totaluangharian, 
                                d_itemcs.totalinap, d_itemcs.totalrep, 
                                d_itemcs.totaltravel, d_itemcs.jumlah, d_itemcs.tarifuangharian,d_itemcs.tarifinap,
                                d_itemcs.jnstransportasi, CONCAT('WithTim') as tim, d_itemcs.id as idtim,
                                t_pegawai.jabatan_st as jabatan_ttd,
								
                    
                                d_itemcs.kotaasal,d_itemcs.kotatujuan,";
                                $join = "JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st 
                                JOIN t_pegawai ON t_pegawai.nip = t_pejabat.nip
								
                                ";
                                $group = "GROUP BY d_itemcs.nip";

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
                            d_itemcs.totalinap, d_itemcs.totalrep, d_itemcs.tarifrep, 
                            d_itemcs.tariftaxi,d_itemcs.tariflaut,d_itemcs.tarifudara,d_itemcs.tarifdarat,d_itemcs.lain,
                            d_itemcs.totaltravel, d_itemcs.jumlah, d_itemcs.transport,d_itemcs.tarifuangharian,d_itemcs.tarifinap,
                            d_itemcs.jnstransportasi, CONCAT('WithTim') as tim, d_itemcs.id as idtim,d_itemcs.nospd,d_itemcs.id_ttd_spd,
                            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',2),'-',-1) as nip_ttd_spd, 
                            SUBSTRING_INDEX(SUBSTRING_INDEX(d_itemcs.id_ttd_spd,'-',3),'-',-1) as nama_ttd_spd,
                           
                            
                            d_itemcs.kotaasal,d_itemcs.kotatujuan,";
                            $join = "JOIN d_itemcs ON d_surattugas.id = d_itemcs.id_st";
                            $group="";

                            $order ="ORDER BY d_itemcs.nourut";
                        
                        }else{
                            $join = "";
                            $select = "CONCAT('NoTim') as tim,";
                            $oder = "";
                            $group = "";
                        }
                }
            $query = $this->db->query('SELECT d_pagu.*, d_surattugas.nost, d_surattugas.tglst, 
            d_surattugas.uraianst, d_surattugas.tglmulaist, d_surattugas.idx_temp,
            d_surattugas.tglselesaist ,d_surattugas.id_unit,d_surattugas.id as idst,d_surattugas.idxskmpnen, 
            d_surattugas.id_ttd,d_surattugas.kdsatker,d_surattugas.id_ttd,d_surattugas.jumlah_uang,d_surattugas.cs_menyetujui,d_surattugas.cs_mengajukan,
            d_surattugas.id_tahapan,d_surattugas.id_app,d_surattugas.status_id,d_bagipagu.unit_id, d_surattugas.status_id, d_surattugas.status_penandatangan,
            
            t_unitkerja.nama_unit,
            t_unitkerja.grup_id as kdunit, 
            '.$select.'
            t_pejabat.nama as nama_ttd,
            t_pejabat.nip as nip_ttd,
            t_satker.kdkabkota
            
            FROM d_surattugas 
            JOIN d_pagu ON d_surattugas.kdindex = d_surattugas.kdindex 
            JOIN t_pejabat ON d_surattugas.id_ttd = t_pejabat.id 
            JOIN t_satker ON d_surattugas.kdsatker = t_satker.kdsatker 
            JOIN d_bagipagu ON d_bagipagu.kdindex = d_surattugas.kdindex
            JOIN t_unitkerja ON d_bagipagu.unit_id = t_unitkerja.id
            '.$join.' WHERE d_surattugas.id = '.$id.' 
            AND d_pagu.kdindex = "'.$kdindex.'" '.$group.'
            '. $order.'');
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

    function history($idst){

        $this->db->query("INSERT into h_surattugas (
            kdindex, thang, kdgiat, kdoutput, 
            kdsoutput, kdkmpnen, kdskmpnen, 
            kdakun, kdbeban, no_kuitansi, nost, 
            tglst, uraianst, tglmulaist, tglselesaist, 
            id_unit, unitkerja_id, kdsatker, bidang_id, 
            id_ttd, pejabat_id, user_id, ppk_id, kaldik, 
            kaldik_id, status_penandatangan, penandatangan, 
            jumlah_uang, jumlah_realisasi, status_id, 
            is_aktif, idxskmpnen, idx_temp, cs_menyetujui, 
            cs_mengajukan, id_tahapan, id_app, created_at)
        
        (select 
        kdindex, thang, kdgiat, kdoutput, 
            kdsoutput, kdkmpnen, kdskmpnen, 
            kdakun, kdbeban, no_kuitansi, nost, 
            tglst, uraianst, tglmulaist, tglselesaist, 
            id_unit, unitkerja_id, kdsatker, bidang_id, 
            id_ttd, pejabat_id, user_id, ppk_id, kaldik, 
            kaldik_id, status_penandatangan, penandatangan, 
            jumlah_uang, jumlah_realisasi, status_id, 
            is_aktif, idxskmpnen, idx_temp, cs_menyetujui, 
            cs_mengajukan, id_tahapan, id_app,created_at
         from d_surattugas where id = '".$idst."')");

        $this->db->query("INSERT into h_itemcs (
            nourut, nospd, nama, nip, 
            jabatan, golongan, tglberangkat, 
            tglkembali, jmlhari, kotaasal, 
            kotatujuan, tarifuangharian, totaluangharian, 
            tarifinap, totalinap, tarifrep, totalrep, 
            taksiasal, taksitujuan, lain, transport, 
            totaltravel, tariftaxi, tariflaut, tarifudara, 
            tarifdarat, pengeluaranrill, jnstransportasi, 
            jumlah, id_ttd_spd, id_st, id_cs)

        (select 
        nourut, nospd, nama, nip, 
            jabatan, golongan, tglberangkat, 
            tglkembali, jmlhari, kotaasal, 
            kotatujuan, tarifuangharian, totaluangharian, 
            tarifinap, totalinap, tarifrep, totalrep, 
            taksiasal, taksitujuan, lain, transport, 
            totaltravel, tariftaxi, tariflaut, tarifudara, 
            tarifdarat, pengeluaranrill, jnstransportasi, 
            jumlah, id_ttd_spd, id_st, id_cs
        from d_itemcs where id_st = '".$idst."')");

    }
}
