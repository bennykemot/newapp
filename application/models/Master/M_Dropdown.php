<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dropdown extends CI_Model {

   // Fetch users
   function getData_program($searchTerm="", $kdsatker, $userid,$trigger){

      if($trigger == "program_for_ST"){
         // Fetch users
         $this->db->distinct();
         $this->db->select('kdprogram');
         $this->db->where("kdsatker", $kdsatker);
         $this->db->where("user_id", $userid);
         $this->db->where("kdprogram like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('d_bagipagu');
         $users = $fetched_records->result_array();

      }else{

         // Fetch users
            $this->db->distinct();
            $this->db->select('kdprogram');
            $this->db->where("kdsatker", $kdsatker);
            $this->db->or_where("kdprogram like '%".$searchTerm."%' ");
            $fetched_records = $this->db->get('d_pagu');
            $users = $fetched_records->result_array();
      }

      $data = array();
            foreach($users as $user){
               $data[] = array("id"=>$user['kdprogram'], "text"=>$user['kdprogram']);
            }
     
     return $data;
  }


  function getData_kegiatan($searchTerm="",$kdsatker, $kdprogram, $userid,$trigger){
   if($trigger == "kegiatan_per_satker"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdgiat');
      $this->db->where("kdsatker", $kdsatker);
      $this->db->where("user_id", $userid);
      $this->db->where("kdprogram like '%".$searchTerm."%' ");
      $fetched_records = $this->db->get('d_bagipagu');
      $users = $fetched_records->result_array();

   }else{
   // Fetch users
   $this->db->distinct();
   $this->db->select('kdgiat');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();
   }

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdgiat'], "text"=>$user['kdgiat']);
   }
   return $data;
}

function getData_kro($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $userid,$trigger){

   if($trigger == "kro_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdoutput');
      $this->db->where("kdsatker", $kdsatker);
      $this->db->where("user_id", $userid);
      $this->db->where("kdprogram", $kdprogram);
      $this->db->where("kdgiat", $kdgiat);
      $this->db->where("kdoutput like '%".$searchTerm."%' ");
      $fetched_records = $this->db->get('d_bagipagu');
      $users = $fetched_records->result_array();

   }else{
   // Fetch users
   $this->db->distinct();
   $this->db->select('kdoutput');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();
   }

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdoutput'], "text"=>$user['kdoutput']);
   }
   return $data;
}

function getData_ro($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $userid,$trigger){

   if($trigger == "ro_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdsoutput');
      $this->db->where("kdsatker", $kdsatker);
      $this->db->where("user_id", $userid);
      $this->db->where("kdprogram", $kdprogram);
      $this->db->where("kdgiat", $kdgiat);
      $this->db->where("kdoutput", $kdouput);
      $this->db->where("kdsoutput like '%".$searchTerm."%' ");
      $fetched_records = $this->db->get('d_bagipagu');
      $users = $fetched_records->result_array();

   }else{
   // Fetch users
   $this->db->distinct();
   $this->db->select('kdsoutput');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput", $kdouput);
   $this->db->where("kdsoutput like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();
   }

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdsoutput'], "text"=>$user['kdsoutput']);
   }
   return $data;
}

function getData_komponen($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $kdsoutput, $userid,$trigger){

   if($trigger == "komponen_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdkmpnen');
      $this->db->where("kdsatker", $kdsatker);
      $this->db->where("user_id", $userid);
      $this->db->where("kdprogram", $kdprogram);
      $this->db->where("kdgiat", $kdgiat);
      $this->db->where("kdoutput", $kdouput);
      $this->db->where("kdsoutput", $kdsoutput);
      $this->db->where("kdkmpnen like '%".$searchTerm."%' ");
      $fetched_records = $this->db->get('d_bagipagu');
      $users = $fetched_records->result_array();

   }else{
   // Fetch users
   $this->db->distinct();
   $this->db->select('kdkmpnen');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput", $kdouput);
   $this->db->where("kdsoutput", $kdsoutput);
   $this->db->where("kdkmpnen like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();
   }

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdkmpnen'], "text"=>$user['kdkmpnen']);
   }
   return $data;
}

function getData_sub_komponen($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $kdsoutput, $kdkomponen, $userid,$trigger){

   // if($trigger == "skomponen_for_ST"){
   //    // Fetch users
   //    $this->db->distinct();
   //    $this->db->select('kdskmpnen');
   //    $this->db->where("kdsatker", $kdsatker);
   //    $this->db->where("user_id", $userid);
   //    $this->db->where("kdprogram", $kdprogram);
   //    $this->db->where("kdgiat", $kdgiat);
   //    $this->db->where("kdoutput", $kdouput);
   //    $this->db->where("kdsoutput", $kdsoutput);
   //    $this->db->where("kdkmpnen", $kdkomponen);
   //    $this->db->where("kdskmpnen like '%".$searchTerm."%' ");
   //    $fetched_records = $this->db->get('d_bagipagu');
   //    $users = $fetched_records->result_array();

   // }else{
   // Fetch users
   $this->db->distinct();
   $this->db->select('kdskmpnen');
   $this->db->where("kdsatker", $kdsatker);
   $this->db->where("kdprogram", $kdprogram);
   $this->db->where("kdgiat", $kdgiat);
   $this->db->where("kdoutput", $kdouput);
   $this->db->where("kdsoutput", $kdsoutput);
   $this->db->where("kdkmpnen", $kdkomponen);
   $this->db->where("kdskmpnen like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_pagu');
   $users = $fetched_records->result_array();
  // }

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
   $this->db->where("id like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('t_role');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['rolename']);
   }
   return $data;
}

function getData_menu($searchTerm=""){
	$this->db->select('id');
	$this->db->select('kode_menu');
	$this->db->select('nama_menu');
	$this->db->where("nama_menu like '%".$searchTerm."%' ");
	$fetched_records = $this->db->get('r_menu');
	$menus = $fetched_records->result_array();

	$data = array();
	foreach($menus as $menu){
		$data[] = array("id"=>$menu['id'], "text"=>$menu['id']. ' - ' .$menu['nama_menu']);
	}
	return $data;

}

function getData_agama($searchTerm){
	$this->db->select('id');
	$this->db->select('agama');
	$this->db->where("agama like '%".$searchTerm."%' ");
	$fetched_records = $this->db->get('r_agama');
	$agamas = $fetched_records->result_array();

	$data = array();
	foreach($agamas as $agama){
		$data[] = array("id"=>$agama['agama'], "text"=>$agama['agama']);
	}
	
	return $data;
}

function getData_golongan($searchTerm){
	$this->db->select('id');
	$this->db->select('golongan');
	$this->db->select('nama');
	$this->db->where("golongan like '%".$searchTerm."%' ");
	$fetched_records = $this->db->get('r_golruang');
	$gols = $fetched_records->result_array();

	$data = array();
	foreach($gols as $gol){
		$data[] = array("id"=>$gol['nama']. ', ' .$gol['golongan'], "text"=>$gol['nama']. ', ' .$gol['golongan']);
	}
	
	return $data;
}



function getData_app($searchTerm="", $kdindex, $Trigger){

      if($Trigger == "SelectForKodeApp_NotaDinas"){

         $this->db->where("nama_app like '%".$searchTerm."%' ");
         $this->db->where("id like '%".$searchTerm."%' ");
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
   $this->db->select('golruang');
   $this->db->where("nama like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('t_pegawai');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   if($Trigger == "pegawai_forST"){
      foreach($users as $user){
         $data[] = array("id"=>$user['nip'], "text"=>$user['nama']);
      }
   }else{
      foreach($users as $user){
         $data[] = array("id"=>$user['nip']."-".$user['jabatan']."-".$user['nama']."-".$user['golruang'], "text"=>$user['nama']);
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
   , kdakun FROM d_pagu where kdsatker = '".$kdsatker."'");

   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['kdakun'].'-'.$user['kdindex'], "text"=>$user['text_kdindex']);
   }
   return $data;
}

function getData_kota($searchTerm="", $Trigger, $Jenistarif){

   // if($Trigger == "fullboard" || $Jenistarif == "dalam" ){
   //    $get = 'fb_dalamkota';

   // }else if($Trigger == "fullboard" || $Jenistarif == "luar" ){
   //    $get = 'fb_luarkota';

   // }else if($Trigger == "non-fullboard" || $Jenistarif == "dalam" ){
   //    $get = 'dalam_kota_8_jam';

   // }else if($Trigger == "non-fullboard" || $Jenistarif == "luar" ){
   //    $get = 'luar_kota';
   // }

   // $get = 'luar_kota';

   $this->db->select('id');
   $this->db->select('id_provinsi');
   $this->db->select('id_kota');
   //$this->db->select($get);
   $this->db->select('nama_kota');
   $this->db->select('nama_provinsi');
   $this->db->where("nama_kota like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('r_uangharian');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id_kota'].'-'.$user['id'].'-'.$user['nama_kota'], "text"=>$user['nama_provinsi'].'-'.$user['nama_kota']);
   }
   return $data;
}

function getData_thang($searchTerm=""){

   $fetched_records = $this->db->query("SELECT id, tahun from r_thang");

   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['tahun'], "text"=>$user['tahun']);
   }
   return $data;
}

function getData_thang_nonAjax(){

   $query = $this->db->query("SELECT * from r_thang ");
   return $query->result();
}

<<<<<<< Updated upstream
function getData_ppk($searchTerm="",$kdsatker){

   $this->db->select('id');
   $this->db->select('uraian_ppk');
   $this->db->where("uraian_ppk like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('d_ppk');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['uraian_ppk']);
   }
   return $data;
}

function getData_tahapan($searchTerm="",$kdkmpnen, $kdskmpnen){

   $this->db->select('id');
   $this->db->select('nama_tahapan');
   $this->db->where("nama_tahapan like '%".$searchTerm."%' ");
   $this->db->where("kdkmpnen",$kdkmpnen);
   $this->db->where("kdskmpnen",$kdskmpnen);
   $fetched_records = $this->db->get('r_tahapan');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['nama_tahapan']);
   }
   return $data;
}

}
=======


}
>>>>>>> Stashed changes
