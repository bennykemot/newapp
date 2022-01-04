<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Master extends CI_Model {

   // Fetch users
   function getData_tahapan($Trigger, $kdkmpnen,$kdskmpnen){
         $this->db->where('kdkmpnen', $kdkmpnen);
         $this->db->where('kdskmpnen', $kdskmpnen);
        $fetched_records = $this->db->get('r_tahapan');
        $users = $fetched_records->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array("id"=>$user['id'], "nama_tahapan"=>$user['nama_tahapan'], "kdkmpnen"=>$user['kdkmpnen']);
     }
     return $data;
  }

  function getData_Pegawai($kdsatker){
		$this->db->select('nip');
		$this->db->select('nama');
		$this->db->select('jabatan');
		$this->db->select('tempat_lahir');
		$this->db->select('tanggal_lahir');
		$this->db->select('jenis_kelamin');
		$this->db->select('golruang');
		$this->db->select('nama_pangkat');
		$this->db->select('tmt_jab');
		$this->db->select('namaunit');

		$this->db->from('r_pegawai');
		$this->db->where('satker_id', $kdsatker);
		$query = $this->db->get();

		return $query->result();

   }

   function getData_Uangharian($Trigger, $Tujuan){

      $query = $this->db->query("SELECT r_tarifpenginapan.*,r_uangharian.* FROM r_tarifpenginapan 
      join r_uangharian ON r_uangharian.id_provinsi = r_tarifpenginapan.id_provinsi 
      WHERE r_uangharian.id =".$Tujuan."");
      //$query = $this->db->query("SELECT * from r_uangharian where id = '".$Tujuan."' ");
      return $query->result();

      }

   function getData_Menu($triggerdetail){

      if($triggerdetail == 'InsertForPenggunaAdmin'){

         $query = $this->db->query("SELECT kode_menu from r_menu");
      }else{
         $query = $this->db->query("SELECT kode_menu from r_menu where kode_menu IN ('menu_04','menu_02') ");

      }
      return $query->result_array();
   
      }

      function getKomponenSub($kdsatker, $unitid, $roleid){
         $where="";
         if($roleid != 1){
            $where = "AND d_bagipagu.unit_id = ".$unitid." ";
         }

//          $query = $this->db->query("SELECT a.*, b.*FROM (select d_bagipagu.kdindex, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode  from d_bagipagu 
//          JOIN d_pagu on d_bagipagu.kdindex = d_pagu.kdindex 
         
//          where d_bagipagu.kdsatker = ".$kdsatker.") as a
// LEFT JOIN (SELECT SUM(d_surattugas.jumlah_realisasi) as alokasi , d_surattugas.kdindex,d_surattugas.kodeall from d_surattugas
//     GROUP BY d_surattugas.kodeall) as b
    
//     ON a.kdindex = b.kdindex;");

$query = $this->db->query("SELECT a.*, b.alokasi, b.pagu_index, b.id_tahapan, b.id_appST 
FROM (SELECT d_pagu.kdindex, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode, 
d_detailapp.rupiah_tahapan, d_detailapp.tahapan, d_detailapp.id_app,r_tahapan.nama_tahapan,t_app.nama_app 
FROM d_pagu JOIN d_bagipagu ON d_pagu.kdindex = d_bagipagu.kdindex 
JOIN d_detailapp ON d_pagu.kdindex = d_detailapp.kdindex 
JOIN r_tahapan on d_detailapp.tahapan = r_tahapan.id 
JOIN t_app on d_detailapp.id_app = t_app.id 
WHERE d_pagu.kdsatker = ".$kdsatker." AND d_pagu.kdakun LIKE '%524%' ".$where." ) as a 
LEFT JOIN (SELECT SUM(d_surattugas.jumlah_realisasi) as alokasi, d_surattugas.kdindex as pagu_index, d_surattugas.id_tahapan as id_tahapan, d_surattugas.id_app as id_appST 
from d_surattugas WHERE d_surattugas.is_aktif = 1  GROUP BY d_surattugas.kdindex,d_surattugas.id_app,d_surattugas.id_tahapan) as b ON 
a.kdindex = b.pagu_index 
AND a.tahapan = b.id_tahapan 
AND a.id_app = b.id_appST; ");

         // $query= $this->db->query("
         // SELECT DISTINCT a.*,b.alokasi 
         // FROM 
         //    (SELECT d_pagu.*, 
         //    CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode ,
         //    d_bagipagu.ppk_id,d_detailapp.tahapan, d_detailapp.rupiah_tahapan,r_tahapan.nama_tahapan,t_app.nama_app,
         //    r_tahapan.id as id_tahapan, t_app.id as id_app
         //       FROM d_bagipagu 
         //       JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex 
         //       JOIN d_detailapp on d_detailapp.kdindex = d_bagipagu.kdindex 
         //       JOIN r_tahapan on d_detailapp.tahapan = r_tahapan.id 
         //       JOIN t_app on d_detailapp.id_app = t_app.id AND d_pagu.kdsatker = ".$kdsatker." 
         //       AND d_pagu.kdakun LIKE '%524%') as a 
         //       left JOIN (SELECT d_surattugas.kdindex, SUM(d_surattugas.jumlah_realisasi) AS alokasi 
         //       FROM d_surattugas GROUP BY d_surattugas.kdindex) as b 
         //       ON a.kdindex=b.kdindex; 
               
         //       ");

         // $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
         //        ,d_bagipagu.ppk_id,d_detailapp.tahapan, d_detailapp.rupiah_tahapan,r_tahapan.nama_tahapan,t_app.nama_app FROM d_bagipagu 
         //          JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex 
         //          JOIN d_detailapp on d_detailapp.kdindex = d_bagipagu.kdindex
         //          JOIN r_tahapan on d_detailapp.tahapan = r_tahapan.id
         //          JOIN t_app on d_detailapp.id_app = t_app.id
         //          ".$where." 
         //        AND d_pagu.kdsatker = ".$kdsatker." AND d_pagu.kdakun LIKE '%524%'");

         return $query->result();
   
         }

         function countPagu(){
            $boo = "";
            for($i= 4207; $i < 4230 ; $i++){
               //$boo .='"'.$i.'"'.",";
               if($i == 4229){
                  $boo .=$i;
               }else{
               $boo .= $i.",";
               }
               }
               return $boo;
         }


         function getKomponenSub_pagu($kdsatker, $unitid, $roleid){
            $where="";
            if($roleid != 1){
               $where = "AND d_bagipagu.unit_id = ".$unitid." ";
            }

            $query = $this->db->query("SELECT a.*, b.alokasi, b.pagu_index 
            FROM (SELECT d_pagu.kdindex, d_pagu.rupiah,
            CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode, 
            d_bagipagu.ppk_id,d_bagipagu.unit_id
            FROM d_pagu 
            JOIN d_bagipagu ON d_pagu.kdindex = d_bagipagu.kdindex 
             where d_pagu.kdsatker = ".$kdsatker." 
             ".$where." 
             AND d_pagu.kdgiat NOT IN (3701,".$this->countpagu().") 
             AND d_pagu.kdakun LIKE '%524%') as a 
             
             LEFT JOIN (SELECT SUM(d_surattugas.jumlah_realisasi) as alokasi, d_surattugas.kdindex as pagu_index 
             FROM d_surattugas WHERE d_surattugas.is_aktif = 1 GROUP BY d_surattugas.kdindex) as b ON a.kdindex = b.pagu_index; ");
   
            // $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode, d_bagipagu.kdindex, d_bagipagu.ppk_id,d_bagipagu.unit_id 
            // FROM d_pagu join d_bagipagu ON d_pagu.kdindex = d_bagipagu.kdindex where d_pagu.kdsatker = ".$kdsatker." 
            //       ".$where." 
            //       AND d_pagu.kdgiat NOT IN (".$this->countpagu().")
            //       AND d_pagu.kdakun LIKE '%524%'");
   
            return $query->result();
      
            }

            function getKomponenSub_pagu_forJson($kdindex){
               $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode,
               d_bagipagu.ppk_id,d_bagipagu.unit_id,t_unitkerja.nama_unit
               FROM d_pagu 
               join d_bagipagu ON d_pagu.kdindex = d_bagipagu.kdindex 
               JOIN t_unitkerja on d_bagipagu.unit_id = t_unitkerja.id
               
               where d_pagu.kdindex = '".$kdindex."'");
      
               return $query->result();
         
               }

            
         function getKomponenSub_forJson($kdindex, $tahapan, $app){
   
            $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
             ,d_bagipagu.ppk_id,d_detailapp.tahapan, d_detailapp.rupiah_tahapan,r_tahapan.nama_tahapan,d_bagipagu.unit_id,t_unitkerja.nama_unit,
             r_tahapan.id as id_tahapan, t_app.id as id_app FROM d_bagipagu 
            JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex 
            JOIN d_detailapp on d_detailapp.kdindex = d_bagipagu.kdindex
            JOIN r_tahapan on d_detailapp.tahapan = r_tahapan.id
            JOIN t_app on d_detailapp.id_app = t_app.id
            JOIN t_unitkerja on d_bagipagu.unit_id = t_unitkerja.id
                  WHERE d_pagu.kdindex = '".$kdindex."' AND d_detailapp.tahapan = ".$tahapan." AND d_detailapp.id_app = ".$app."
            ");
            return $query->result();
      
            }

         function getData_Kota($kdkabkota){

            $query = $this->db->query("SELECT CONCAT(id_kota,'-',id,'-',nama_kota) as idkota , CONCAT(nama_provinsi,'-',nama_kota) as valkota from r_uangharian where id_kota = ".$kdkabkota."");
            return $query->result();
      
            }
   }
