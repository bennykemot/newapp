<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Master extends CI_Model {

   // Fetch users
   function getData_tahapan($Trigger, $kdkmpnen){
       $this->db->where('kdkmpnen', $kdkmpnen);
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

   $this->db->from('r_pegawai');
   $this->db->where('nip', '196401011985031001');
   // $this->db->limit($number, $offset);
   $query = $this->db->get();

   return $query->result();

   }

function getData_Uangharian($Trigger, $Tujuan){

   $query = $this->db->query("SELECT * from r_uangharian where id = '".$Tujuan."' ");
   return $query->result();

   }
}
