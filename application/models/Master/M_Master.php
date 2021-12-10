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

      $query = $this->db->query("SELECT * from r_uangharian where id = '".$Tujuan."' ");
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
            $where = "where d_bagipagu.unit_id = ".$unitid." ";
         }
         

         $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
          FROM d_bagipagu 
         JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex ".$where."
         ");
         return $query->result();
   
         }

         function getKomponenSub_forJson($kdindex){
   
            $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
             FROM d_bagipagu 
            JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex WHERE d_pagu.kdindex = '".$kdindex."'
            ");
            return $query->result();
      
            }
   }
