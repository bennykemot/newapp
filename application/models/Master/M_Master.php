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

         $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
                FROM d_bagipagu 
                  JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex ".$where." 
                AND d_pagu.kdsatker = ".$kdsatker." AND d_pagu.kdakun LIKE '%524%'");

      //    if($kdsatker == "450491"){
      //       $Where_kdgiat = "WHERE d_pagu.kdgiat > 4206 AND d_pagu.kdgiat < 4230";
      //       $res= 1;
      //   }else if($kdsatker == "604435" || $kdsatker == "636702" || $kdsatker == "636778" 
      //             || $kdsatker == "450460" || $kdsatker == "651994"){
            
      //    $Where_kdgiat ="";
      //       $res = 9999;
      //   }else{

      //    $Where_kdgiat = "WHERE d_pagu.kdgiat = 3701";
      //       $res= 1;
         
      //   }


      //   if($res == 1){
      //    $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
      //       FROM d_bagipagu 
      //       JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex ".$Where_kdgiat." ".$where." 
      //       AND d_pagu.kdsatker = ".$kdsatker." AND d_pagu.kdakun LIKE '%524%'");
        
         
      //   }else{

      //    $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
      //             FROM d_pagu WHERE d_pagu.kdakun LIKE '%524%' AND d_pagu.kdsatker = ".$kdsatker." 
      //             AND d_pagu.kdgiat != 3701");
         

      //   }
         

         return $query->result();
   
         }

         function getKomponenSub_forJson($kdindex){
   
            $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
             FROM d_bagipagu 
            JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex WHERE d_pagu.kdindex = '".$kdindex."'
            ");
            return $query->result();
      
            }

         function getData_Kota($kdkabkota){

            $query = $this->db->query("SELECT CONCAT(id_kota,'-',id,'-',nama_kota) as idkota , CONCAT(nama_provinsi,'-',nama_kota) as valkota from r_uangharian where id_kota = ".$kdkabkota."");
            return $query->result();
      
            }
   }
