<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Dropdown extends CI_Model {

   // Fetch users
   function getData_program($searchTerm="", $kdsatker, $unitid,$trigger){

      if($trigger == "program_for_ST"){
         // Fetch users
         $this->db->distinct();
         $this->db->select('kdprogram');
         $this->db->where("kdsatker", $kdsatker);
         if($unitid != 0){
            $this->db->where("unit_id", $unitid);
         }
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


  function getData_kegiatan($searchTerm="",$kdsatker, $kdprogram, $unitid,$trigger){
   if($trigger == "kegiatan_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdgiat');
      $this->db->where("kdsatker", $kdsatker);
      if($unitid != 0){
         $this->db->where("unit_id", $unitid);
      }
      $this->db->where("kdgiat like '%".$searchTerm."%' ");
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

function getData_kro($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $unitid,$trigger){

   if($trigger == "kro_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdoutput');
      $this->db->where("kdsatker", $kdsatker);
      if($unitid != 0){
         $this->db->where("unit_id", $unitid);
      }
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

function getData_ro($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $unitid,$trigger){

   if($trigger == "ro_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdsoutput');
      $this->db->where("kdsatker", $kdsatker);
      if($unitid != 0){
         $this->db->where("unit_id", $unitid);
      }
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

function getData_komponen($searchTerm="",$kdsatker, $kdprogram, $kdgiat, $kdouput, $kdsoutput, $unitid,$trigger){

   if($trigger == "komponen_for_ST"){
      // Fetch users
      $this->db->distinct();
      $this->db->select('kdkmpnen');
      $this->db->where("kdsatker", $kdsatker);
      if($unitid != 0){
         $this->db->where("unit_id", $unitid);
      }
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
	if($Trigger != "satker_forPPK"){
		$this->db->where("kdsatker",$kdsatker);
	}
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

function getData_role($searchTerm="", $Trigger){
	if($Trigger == "rolePengusul"){
		$fetched_records = $this->db->query("SELECT id, rolename FROM t_role WHERE id IN (2,4,9,10) ");
		$users = $fetched_records->result_array();

		$data = array();
		foreach($users as $user){
			$data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['rolename']);
		}
		return $data;

	}else{

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

   
}

// function getData_roleppk($searchTerm=""){
// 	$query = $this->db->query("SELECT id, nama_app FROM t_app where id IN (2, 4, 8, 9)");

//    // Fetch users
//    $this->db->select('id');
//    $this->db->select('rolename');
// 	$this->db->where('id like "2"')

//    $this->db->where("rolename like '%".$searchTerm."%' ");
//    $this->db->where("id like '%".$searchTerm."%' ");
//    $fetched_records = $this->db->get('t_role');
//    $users = $fetched_records->result_array();

//    // Initialize Array with fetched data
//    $data = array();
//    foreach($users as $user){
//       $data[] = array("id"=>$user['id'], "text"=>$user['id']. ' - ' .$user['rolename']);
//    }
//    return $data;
// }

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



function getData_app($searchTerm="", $kdindex, $Trigger, $kdsoutput){

      if($Trigger == "SelectForKodeApp_NotaDinas"){
         
         $this->db->where("nama_app like '%".$searchTerm."%' ");
         $fetched_records = $this->db->get('t_app');
         $users = $fetched_records->result_array();

         // Initialize Array with fetched data
         $data = array();
         foreach($users as $user){
            $data[] = array("id"=>$user['id'], "text"=>$user['nama_app']);
         }
         return $data;

      }else{
         // $getId_app = $this->db->query("SELECT distinct id_app from d_detailapp where kdindex = '".$kdindex."'");
         // //echo $getId_app;
         // $loop = [];
         // foreach ($getId_app->result_array() as $row)
         // {
         //       $loop[] =  $row['id_app'];
               
         // }

         // $res = implode(",", $loop);
         
         // if(count($loop) <= 0){
         //    $fetched_records = $this->db->query("SELECT id, nama_app FROM t_app");
         // }else{
         //    $fetched_records = $this->db->query("SELECT id, nama_app FROM t_app where id NOT IN (".$res.")");
         // }

         $fetched_records = $this->db->query("SELECT id, nama_app FROM t_app where kdsoutput = '".$kdsoutput."' AND nama_app like '%".$searchTerm."%' ");
         
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
   $this->db->select('kel_jab');
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
         $data[] = array("id"=>$user['nip']."-".$user['jabatan']."-".$user['nama']."-".$user['golruang']."-".$user['kel_jab'], "text"=>$user['nama']);
      }
   }
   
   return $data;
}

function getData_Pejabat($searchTerm="", $kdsatker){

   // Fetch users
   $this->db->select('nip');
   $this->db->select('nama');
	$this->db->where("satker_id",$kdsatker);
   $this->db->where("nama like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('t_pegawai');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
       $data[] = array("id"=>$user['nip'], "text"=>$user['nama']);
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

function getData_unitkerja($searchTerm="", $Trigger, $kdsatker){
	if($Trigger == "unit_forPejabat"){
		$this->db->select('id');
		$this->db->select('grup_id');
		$this->db->select('nama_unit');
		$this->db->select('kel_jab');
		$this->db->where("satker_id", $kdsatker);
		$this->db->where("kel_jab", "E.II");
		$this->db->where("nama_unit like '%".$searchTerm."%' ");

		$fetched_records = $this->db->get('t_unitkerja');
		$users = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($users as $user){
			$data[] = array("id"=>$user['id'], "text"=> $user['nama_unit']);
		}
		return $data;
		
	}elseif($Trigger == "unit_forPengguna"){
		$fetched_records = $this->db->query("SELECT * FROM t_unitkerja WHERE (kel_jab = 'E.II' OR kel_jab = 'E.III') AND satker_id = '".$kdsatker."' AND nama_unit like '%".$searchTerm."%' ");
		$users = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($users as $user){
			$data[] = array("id"=>$user['id'], "text"=> $user['grup_id'] ." - ". $user['nama_unit']);
		}
		return $data;

   }elseif($Trigger == "SelectForBebanAnggaran_NotaDinas"){
		$this->db->select('id');
		$this->db->select('nama_unit');
      $this->db->where("satker_id", $kdsatker);
		$this->db->where("nama_unit like '%".$searchTerm."%' ");
		$fetched_records = $this->db->get('t_unitkerja');
		$users = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($users as $user){
			$data[] = array("id"=>$user['id'], "text"=>$user['nama_unit']);
		}
		return $data;

	}else{

		$this->db->select('id');
		$this->db->select('nama_unit');
		$this->db->select('kel_jab');
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
}

function getData_jabatan($searchTerm="", $Trigger){

   $this->db->select('id');
   $this->db->select('jabatan');
   $this->db->where("jabatan like '%".$searchTerm."%' ");
   $fetched_records = $this->db->get('r_jabatan');
   $jabatans = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($jabatans as $jabatan){
      $data[] = array("id"=>$jabatan['id'], "text"=>$jabatan['jabatan']);
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

function getData_kota($searchTerm=""){


   $this->db->select('id');
   $this->db->select('id_provinsi');
   $this->db->select('id_kota');
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

function getData_ppk($searchTerm="",$kdsatker){

   $this->db->select('id');
   $this->db->select('nama');
   $this->db->where("nama like '%".$searchTerm."%' ");
   $this->db->where("jabatan_id", 4);
	$this->db->where("kdsatker", $kdsatker);
   $fetched_records = $this->db->get('t_pejabat');
   $users = $fetched_records->result_array();

   // Initialize Array with fetched data
   $data = array();
   foreach($users as $user){
      $data[] = array("id"=>$user['id'], "text"=>$user['nama']);
   }
   return $data;
}

function getData_tahapan($searchTerm="",$kdkmpnen, $kdskmpnen, $kdindex){

   // $getId_app = $this->db->query("SELECT distinct tahapan from d_detailapp where kdindex = '".$kdindex."'");
   //       //echo $getId_app;
   //       $loop = [];
   //       foreach ($getId_app->result_array() as $row)
   //       {
   //             $loop[] =  $row['tahapan'];
               
   //       }

   //       $res = implode(",", $loop);
         
   //       if(count($loop) <= 0){
   //          $fetched_records = $this->db->query("SELECT id, nama_tahapan FROM r_tahapan 
   //                            WHERE kdkmpnen =".$kdkmpnen." AND kdskmpnen=".$kdskmpnen." AND nama_tahapan like '%".$searchTerm."%' ");
   //       }else{
   //          $fetched_records = $this->db->query("SELECT id, nama_tahapan FROM r_tahapan 
   //                            where kdkmpnen =".$kdkmpnen." AND kdskmpnen=".$kdskmpnen." AND nama_tahapan like '%".$searchTerm."%'  AND id NOT IN (".$res.")");
   //       }

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

function getData_ttd($searchTerm="",$Trigger,$kdsatker){
	if($Trigger == "ttd_forST"){
		$this->db->select('id');
		$this->db->select('nama');
		$this->db->select('nip');
		$this->db->where("nama like '%".$searchTerm."%' ");
		$this->db->where("kdsatker", $kdsatker);
		$this->db->where("jabatan_id", 5);
		$fetched_records = $this->db->get('t_pejabat');
		$users = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($users as $user){
			$data[] = array("id"=>$user['id'], "text"=>$user['nama']);
		}
		return $data;

	}else{
		
		$this->db->select('id');
		$this->db->select('nama');
		$this->db->select('nip');
		$this->db->where("nama like '%".$searchTerm."%' ");
		//$this->db->where("kdsatker", $kdsatker);
		$this->db->where("jabatan_id", 5);
		$fetched_records = $this->db->get('t_pejabat');
		$users = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($users as $user){
			$data[] = array("id"=>$user['id'], "text"=>$user['nama']);
		}
		return $data;
	}

   
}

}
