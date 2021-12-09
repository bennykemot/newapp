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
        $userid = $this->input->post('userid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_program($searchTerm,$kdsatker, $userid,$trigger);
  
        echo json_encode($response);
     }

     public function kegiatan_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdsatker = $this->input->post('kdsatker');
        $kdprogram = $this->input->post('kdprogram');
        $userid = $this->input->post('userid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_kegiatan($searchTerm, $kdsatker,$kdprogram, $userid,$trigger);
  
        echo json_encode($response);
     }

     public function kro_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
        $userid = $this->input->post('userid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_kro($searchTerm, $kdsatker, $kdprogram, $kdgiat, $userid,$trigger);
  
        echo json_encode($response);
     }

     public function ro_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
        $kdoutput = $this->input->post('kdoutput');
        $userid = $this->input->post('userid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_ro($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $userid,$trigger);
  
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
        $userid = $this->input->post('userid');
        $trigger = $this->input->post('trigger');
  
        // Get users
        $response = $this->Dropdown->getData_komponen($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $kdsoutput, $userid,$trigger);
  
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
      $userid = $this->input->post('userid');
      $trigger = $this->input->post('trigger');

      // Get users
      $response = $this->Dropdown->getData_sub_komponen($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $kdsoutput, $kdkomponen, $userid,$trigger);

      echo json_encode($response);
   }

     public function satker(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      $Trigger = $this->input->post('Trigger');
      if($Trigger == "user_profile"){
         $kdsatker = $this->input->post('session_satker');
      }else{
         $kdsatker = "";
      }

      // Get users
      $response = $this->Dropdown->getData_satker($searchTerm, $kdsatker, $Trigger);

      echo json_encode($response);
   }

   public function role(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->Dropdown->getData_role($searchTerm);

      echo json_encode($response);
   }

   public function app(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdindex = $this->input->post('kdindex');
      $Trigger = $this->input->post('Trigger');

      // Get users
      $response = $this->Dropdown->getData_app($searchTerm, $kdindex, $Trigger);

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

      // Get users
      $response = $this->Dropdown->getData_Pegawai($searchTerm, $Trigger);

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
      $Trigger = $this->input->post('trigger');
      $kdsatker = $this->input->post('kdsatker');

      // Get users
      $response = $this->Dropdown->getData_unitkerja($searchTerm, $Trigger, $kdsatker);

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
      $Trigger = $this->input->post('Trigger');
      $Jenistarif = $this->input->post('Jenistarif');

      // Get users
      $response = $this->Dropdown->getData_kota($searchTerm, $Trigger, $Jenistarif);

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
      $kdsatker = $this->input->post('kdsatker');

      // Get users
      $response = $this->Dropdown->getData_ppk($searchTerm, $kdsatker);

      echo json_encode($response);
   }

   public function tahapan(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');
      $kdkmpnen = $this->input->post('kdkmpnen');
      $kdskmpnen = $this->input->post('kdskmpnen');

      // Get users
      $response = $this->Dropdown->getData_tahapan($searchTerm,$kdkmpnen, $kdskmpnen);

      echo json_encode($response);
   }


}
