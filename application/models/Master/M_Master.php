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
}
