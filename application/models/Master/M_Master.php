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
                ,d_bagipagu.ppk_id,d_detailapp.tahapan, d_detailapp.rupiah_tahapan,r_tahapan.nama_tahapan,t_app.nama_app FROM d_bagipagu 
                  JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex 
                  JOIN d_detailapp on d_detailapp.kdindex = d_bagipagu.kdindex
                  JOIN r_tahapan on d_detailapp.tahapan = r_tahapan.id
                  JOIN t_app on d_detailapp.id_app = t_app.id
                  ".$where." 
                AND d_pagu.kdsatker = ".$kdsatker." AND d_pagu.kdakun LIKE '%524%'");

         return $query->result();
   
         }

         function getKomponenSub_pagu($kdsatker, $unitid, $roleid){
            $where="";
            if($roleid != 1){
               $where = "AND d_bagipagu.unit_id = ".$unitid." ";
            }
   
            $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode, d_bagipagu.kdindex, d_bagipagu.ppk_id,d_bagipagu.unit_id 
            FROM d_pagu join d_bagipagu ON d_pagu.kdindex = d_bagipagu.kdindex where d_pagu.kdsatker = ".$kdsatker." 
                  ".$where." AND d_pagu.kdakun LIKE '%524%'");
   
            return $query->result();
      
            }

            function getKomponenSub_pagu_forJson($kdindex){
               $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode,d_bagipagu.ppk_id
               FROM d_pagu join d_bagipagu ON d_pagu.kdindex = d_bagipagu.kdindex where d_pagu.kdindex = '".$kdindex."'");
      
               return $query->result();
         
               }

            
         function getKomponenSub_forJson($kdindex, $tahapan){
   
            $query = $this->db->query("SELECT d_pagu.*, CONCAT(d_pagu.kdgiat,'.',d_pagu.kdoutput,'.','[IB.',d_pagu.kdib,']','.',d_pagu.kdsoutput,'.',d_pagu.kdkmpnen,'.',d_pagu.kdskmpnen,'.',d_pagu.kdakun) as kode
             ,d_bagipagu.ppk_id,d_detailapp.tahapan, d_detailapp.rupiah_tahapan,r_tahapan.nama_tahapan FROM d_bagipagu 
            JOIN d_pagu ON d_pagu.kdindex = d_bagipagu.kdindex 
            JOIN d_detailapp on d_detailapp.kdindex = d_bagipagu.kdindex
            JOIN r_tahapan on d_detailapp.tahapan = r_tahapan.id
                  WHERE d_pagu.kdindex = '".$kdindex."' AND d_detailapp.tahapan = ".$tahapan."
            ");
            return $query->result();
      
            }

         function getData_Kota($kdkabkota){

            $query = $this->db->query("SELECT CONCAT(id_kota,'-',id,'-',nama_kota) as idkota , CONCAT(nama_provinsi,'-',nama_kota) as valkota from r_uangharian where id_kota = ".$kdkabkota."");
            return $query->result();
      
            }
   }
