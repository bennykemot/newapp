<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Master/M_Dropdown','Dropdown');
	}


	public function program_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdsatker = $this->input->post('kdsatker');
        $unitid = $this->input->post('unitid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_program($searchTerm,$kdsatker, $unitid,$trigger);
  
        echo json_encode($response);
     }

     public function kegiatan_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdsatker = $this->input->post('kdsatker');
        $kdprogram = $this->input->post('kdprogram');
        $unitid = $this->input->post('unitid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_kegiatan($searchTerm, $kdsatker,$kdprogram, $unitid,$trigger);
  
        echo json_encode($response);
     }

     public function kro_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
        $unitid = $this->input->post('unitid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_kro($searchTerm, $kdsatker, $kdprogram, $kdgiat, $unitid,$trigger);
  
        echo json_encode($response);
     }

     public function ro_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
        $kdoutput = $this->input->post('kdoutput');
        $unitid = $this->input->post('unitid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_ro($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $unitid,$trigger);
  
        echo json_encode($response);
     }

     public function komponen_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
        $kdoutput = $this->input->post('kdoutput');
        $kdsoutput = $this->input->post('kdsoutput');
        $unitid = $this->input->post('unitid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_komponen($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $kdsoutput, $unitid,$trigger);
  
        echo json_encode($response);
     }

     public function sub_komponen_per_satker(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdprogram = $this->input->post('kdprogram');
      $kdsatker = $this->input->post('kdsatker');
      $kdgiat = $this->input->post('kdgiat');
      $kdoutput = $this->input->post('kdoutput');
      $kdsoutput = $this->input->post('kdsoutput');
      $kdkomponen = $this->input->post('kdkomponen');
      $unitid = $this->input->post('unitid');
      $trigger = $this->input->post('trigger');

      // Get users
      $response = $this->Dropdown->getData_sub_komponen($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $kdsoutput, $kdkomponen, $unitid,$trigger);

      echo json_encode($response);
   }

     public function satker(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      $Trigger = $this->input->post('Trigger');
      if($Trigger == "user_profile"){
         $kdsatker = $this->input->post('session_satker');
			//$userId = "";
      }if($Trigger == "satker_forPPK"){
			$kdsatker = "";
			//$userId = $this->input->post('userId');
		}else{
			//$userId = "";
         $kdsatker = "";
      }

      // Get users
      $response = $this->Dropdown->getData_satker($searchTerm, $kdsatker, $Trigger);

      echo json_encode($response);
   }

   public function role(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
		$Trigger = $this->input->post('Trigger');
      // Get users
      $response = $this->Dropdown->getData_role($searchTerm, $Trigger);

      echo json_encode($response);
   }

	public function menu(){
		//Search term
		$searchTerm = $this->input->post('searchTerm');

		$response = $this->Dropdown->getData_menu($searchTerm);

		echo json_encode($response);
	}

   public function app(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdindex = $this->input->post('kdindex');
      $Trigger = $this->input->post('Trigger');
      $kdsoutput = $this->input->post('kdsoutput');

      // Get users
      $response = $this->Dropdown->getData_app($searchTerm, $kdindex, $Trigger, $kdsoutput);

      echo json_encode($response);
   }

   public function user(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdsatker = $this->input->post('session_satker');

      // Get users
      $response = $this->Dropdown->getData_user($searchTerm, $kdsatker);

      echo json_encode($response);
   }

   public function pegawai(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $Trigger = $this->input->post('Trigger');

      if($Trigger == "select_forTim"){
         $tglberangkat = $this->input->post('tglberangkat');
         $tglkembali = $this->input->post('tglkembali');
         $response = $this->Dropdown->getData_PegawaiST($searchTerm, $Trigger,$tglberangkat,$tglkembali);
      }else if($Trigger ==  "select_forTim_count"){
         $tglberangkat = $this->input->post('tglberangkat');
         $tglkembali = $this->input->post('tglkembali');
         $nip = $this->input->post('nip');
         $nama = $this->input->post('nama');

         if($nip == "-" || $nip == "" || $nip == null){
            $where = "d_itemcs.nama = '".$nama."'";
            
         }else{

            $where = "d_itemcs.nip = '".$nip."'";
         }
         $response = $this->db->query("SELECT d_itemcs.nip,d_itemcs.id_st from d_itemcs
         JOIN d_surattugas ON d_itemcs.id_st = d_surattugas.id where (".$where." 
         AND d_surattugas.is_aktif = 1 AND d_itemcs.tglberangkat between '".$tglberangkat."' and '".$tglkembali."') OR (d_surattugas.is_aktif = 1 AND d_itemcs.nip = '".$nip."' AND d_itemcs.tglkembali between '".$tglberangkat."' and '".$tglkembali."')")->result_array();
      }else{
         $response = $this->Dropdown->getData_Pegawai($searchTerm, $Trigger);
      }

      // Get users
      

      echo json_encode($response);
   }

	public function pejabat(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      //$Trigger = $this->input->post('Trigger');
		$kdsatker = $this->input->post('kdsatker');

      // Get users
      $response = $this->Dropdown->getData_Pejabat($searchTerm, $kdsatker);

      echo json_encode($response);
   }

   public function sub_komponen(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $Trigger = $this->input->post('Trigger');

      // Get users
      $response = $this->Dropdown->getData_skomponen($searchTerm, $Trigger);

      echo json_encode($response);
   }

   public function unitkerja(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $Trigger = $this->input->post('Trigger');
		$kdsatker = $this->input->post('kdsatker');

      // Get users
      $response = $this->Dropdown->getData_unitkerja($searchTerm, $Trigger, $kdsatker);

		// if($Trigger == "unit_forPegawai"){
		// 	$response = $this->Dropdown->getData_unitkerja($searchTerm, $Trigger);
		// }

      echo json_encode($response);
   }

	public function jabatan(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $Trigger = $this->input->post('Trigger');

      // Get users
      $response = $this->Dropdown->getData_jabatan($searchTerm, $Trigger);

      echo json_encode($response);
   }

	public function keljab(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      //$Trigger = $this->input->post('Trigger');

      // Get users
      $response = $this->Dropdown->getData_keljab($searchTerm);

      echo json_encode($response);
   }

   public function v_mapping(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdsatker = $this->input->post('kdsatker');

      // Get users
      $response = $this->Dropdown->getData_v_mapping($searchTerm, $kdsatker);

      echo json_encode($response);
   }

   public function nost(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->Dropdown->getData_nost($searchTerm);

      echo json_encode($response);
   }

   public function pagu(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $Trigger = $this->input->post('Trigger');
      $kdsatker = $this->input->post('kdsatker');

      // Get users
      $response = $this->Dropdown->getData_pagu($searchTerm,$Trigger,$kdsatker);

      echo json_encode($response);
   }

   public function kota(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->Dropdown->getData_kota($searchTerm);

      echo json_encode($response);
   }

   public function thang(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->Dropdown->getData_thang($searchTerm);

      echo json_encode($response);
   }

   public function ppk(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdsatker = $this->input->post('session_satker');
		$trigger = $this->input->post('trigger');
		if($trigger == "ppk_forProfile"){
			$role = $this->input->post('role');
		}else{
			$role = 4;
		}

      // Get users
      $response = $this->Dropdown->getData_ppk($searchTerm, $kdsatker, $trigger, $role);
		echo json_encode($response);
	}

   public function tahapan(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdkmpnen = $this->input->post('kdkmpnen');
      $kdskmpnen = $this->input->post('kdskmpnen');
      $kdindex = $this->input->post('kdindex');

      // Get users
      $response = $this->Dropdown->getData_tahapan($searchTerm,$kdkmpnen, $kdskmpnen,$kdindex);
		echo json_encode($response);

   }

	public function golongan(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->Dropdown->getData_golongan($searchTerm);

      echo json_encode($response);
	}

	public function agama(){
		

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->Dropdown->getData_agama($searchTerm);

      echo json_encode($response);
   }

   public function ttd(){
		

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdsatker = $this->input->post('kdsatker');
		$Trigger = $this->input->post('Trigger');

      // Get users
      $response = $this->Dropdown->getData_ttd($searchTerm,$Trigger,$kdsatker);

      echo json_encode($response);
   }

   public function cs_ttd(){
		

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdsatker = $this->input->post('kdsatker');
		$Trigger = $this->input->post('Trigger');

      // Get users
      $response = $this->Dropdown->getData_csttd($searchTerm,$Trigger,$kdsatker);

      echo json_encode($response);
   }




}
