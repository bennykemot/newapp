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

function getData_sub_komponen($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $kdsoutput, $kdkomponen){

   // Fetch users
   $this->db->distinct();
   $this->db->select('kdskmpnen');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput", $kdouput);
   $this->db->where("kdsoutput", $kdsoutput);
   $this->db->where("kdkmpnen", $kdkomponen);
   $this->db->or_where("kdskmpnen like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdskmpnen'], "text"=>$user['kdskmpnen']);
   }
   return $data;
}

function getData_satker($searchTerm="", $kdsatker, $Trigger){

   // Fetch users
   $this->db->select('kdsatker');
   $this->db->select('nmsatker');
   $this->db->where("kdsatker",$kdsatker);
   $this->db->where("nmsatker like '%".$searchTerm."%' ");
   $this->db->where("kdsatker like '%".$searchTerm."%' ");
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
   $fetched_records = $this->db->get('t_role');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['rolename']);
   }
   return $data;
}


function getData_app($searchTerm="", $kdindex, $Trigger){

      if($Trigger == "SelectForKodeApp_NotaDinas"){

         $this->db->where("nama_app like '%".$searchTerm."%' ");
         $this->db->or_where("id like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('t_app');
         $users = $fetched_records->result_array();

         // Initialize Array with fetched data
         $data = array();
         foreach($users as $user){
            $data[] = array("id"=>$user['id'], "text"=>$user['nama_app']);
         }
         return $data;

      }else{
         $getId_app = $this->db->query("SELECT distinct id_app from d_detailapp where kdindex = '".$kdindex."'");
         //echo $getId_app;
         $loop = [];
         foreach ($getId_app->result_array() as $row)
         {
               $loop[] =  $row['id_app'];
               
         }

         $res = implode(",", $loop);
         
         if(count($loop) <= 0){
            $fetched_records = $this->db->query("SELECT id, nama_app FROM t_app");
         }else{
            $fetched_records = $this->db->query("SELECT id, nama_app FROM t_app where id NOT IN (".$res.")");
         }
         
         $users = $fetched_records->result_array();

         // Initialize Array with fetched data
         $data = array();
         foreach($users as $user){
            $data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['nama_app']);
         }
         return $data;
   }
}

function getData_user($searchTerm="", $kdsatker){

   // Fetch users
   $this->db->select('id');
   $this->db->select('username');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("username like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('user');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['username']);
   }
   return $data;
}

function getData_Pegawai($searchTerm="", $Trigger){

   // Fetch users
   $this->db->select('nip');
   $this->db->select('nama');
   $this->db->select('jabatan');
   $this->db->where("nama like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('r_pegawai');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   if($Trigger == "pegawai_forST"){
      foreach($users as $user){
         $data[] = array("id"=>$user['nip'], "text"=>$user['nama']);
      }
   }else{
      foreach($users as $user){
         $data[] = array("id"=>$user['nip']."-".$user['jabatan']."-".$user['nama'], "text"=>$user['nama']);
      }
   }
   
   return $data;
}

function getData_skomponen($searchTerm="", $Trigger){

   $fetched_records = $this->db->query("
         SELECT 
         CONCAT(thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen) AS idxskmpnen, 
         urskmpnen FROM d_skmpnen");
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['idxskmpnen'], "text"=>$user['urskmpnen']);
   }
   return $data;
}

function getData_unitkerja($searchTerm="", $Trigger){

   $this->db->select('id');
   $this->db->select('nama_unit');
   $this->db->where("nama_unit like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('t_unitkerja');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['nama_unit']);
   }
   return $data;
}

function getData_v_mapping($searchTerm="", $kdsatker){

   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("nama_unit like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('v_mapping');
   $users = $fetched_records->result_array();
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['nama_unit']);
   }
   return $data;
}

function getData_nost($searchTerm=""){

   $this->db->select('id');
   $this->db->select('nost');
   $this->db->where("nost like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_surattugas');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['nost']);
   }
   return $data;
}

function getData_pagu($searchTerm="",$Trigger,$kdsatker){

   $fetched_records = $this->db->query("SELECT kdindex, 
   CONCAT(kdprogram,'.',kdgiat,'.',kdoutput,'.',kdsoutput,'.',kdkmpnen,'.',kdskmpnen,'.',kdakun,'.',kdib) as text_kdindex 
   FROM d_pagu where kdsatker = '".$kdsatker."'");

   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdindex'], "text"=>$user['text_kdindex']);
   }
   return $data;
}

}