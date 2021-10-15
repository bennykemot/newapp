<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dropdown extends CI_Model {

   // Fetch users
   function getData_program($searchTerm="", $kdsatker){

     // Fetch users
     $this->db->distinct();
     $this->db->select('kdprogram');
     $this->db->where("kdsatker", $kdsatker);
     $this->db->or_where("kdprogram like '%".$searchTerm."%' ");
     $fetched_records = $this->db->get('d_pagu');
     $users = $fetched_records->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array("id"=>$user['kdprogram'], "text"=>$user['kdprogram']);
     }
     return $data;
  }

  function getData_kegiatan($searchTerm="",$kdsatker, $kdprogram){

   // Fetch users
   $this->db->distinct();
   $this->db->select('kdgiat');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->or_where("kdgiat like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdgiat'], "text"=>$user['kdgiat']);
   }
   return $data;
}

function getData_kro($searchTerm="",$kdsatker, $kdprogram, $kdgiat){

   // Fetch users
   $this->db->distinct();
   $this->db->select('kdoutput');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->or_where("kdoutput like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdoutput'], "text"=>$user['kdoutput']);
   }
   return $data;
}

function getData_ro($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput){

   // Fetch users
   $this->db->distinct();
   $this->db->select('kdsoutput');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput", $kdouput);
   $this->db->or_where("kdsoutput like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdsoutput'], "text"=>$user['kdsoutput']);
   }
   return $data;
}

function getData_komponen($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $kdsoutput){

   // Fetch users
   $this->db->distinct();
   $this->db->select('kdkmpnen');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput", $kdouput);
   $this->db->where("kdsoutput", $kdsoutput);
   $this->db->or_where("kdkmpnen like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdkmpnen'], "text"=>$user['kdkmpnen']);
   }
   return $data;
}

function getData_satker($searchTerm=""){

   // Fetch users
   $this->db->select('kdsatker');
   $this->db->select('nmsatker');
   $this->db->where("nmsatker like '%".$searchTerm."%' ");
   $this->db->or_where("kdsatker like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('t_satker');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdsatker'], "text"=>$user['kdsatker']. ' - ' .$user['nmsatker']);
   }
   return $data;
}

function getData_role($searchTerm=""){

   // Fetch users
   $this->db->select('id');
   $this->db->select('rolename');
   $this->db->where("rolename like '%".$searchTerm."%' ");
   $this->db->or_where("id like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('role');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['rolename']);
   }
   return $data;
}

function getData_app($searchTerm=""){

   // Fetch users
   $this->db->select('id');
   $this->db->select('nama_app');
   $this->db->where("nama_app like '%".$searchTerm."%' ");
   $this->db->or_where("id like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('t_app');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['nama_app']);
   }
   return $data;
}

}