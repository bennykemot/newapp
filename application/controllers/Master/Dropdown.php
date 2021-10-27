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
  
        // Get users
        $response = $this->Dropdown->getData_program($searchTerm,$kdsatker);
  
        echo json_encode($response);
     }

     public function kegiatan_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdsatker = $this->input->post('kdsatker');
        $kdprogram = $this->input->post('kdprogram');
  
        // Get users
        $response = $this->Dropdown->getData_kegiatan($searchTerm, $kdsatker,$kdprogram);
  
        echo json_encode($response);
     }

     public function kro_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
  
        // Get users
        $response = $this->Dropdown->getData_kro($searchTerm, $kdsatker, $kdprogram, $kdgiat);
  
        echo json_encode($response);
     }

     public function ro_per_satker(){

        // Search term
        $searchTerm = $this->input->post('searchTerm');
        $kdprogram = $this->input->post('kdprogram');
        $kdsatker = $this->input->post('kdsatker');
        $kdgiat = $this->input->post('kdgiat');
        $kdoutput = $this->input->post('kdoutput');
  
        // Get users
        $response = $this->Dropdown->getData_ro($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput);
  
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
  
        // Get users
        $response = $this->Dropdown->getData_komponen($searchTerm, $kdsatker, $kdprogram, $kdgiat, $kdoutput, $kdsoutput);
  
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

      // Get users
      $response = $this->Dropdown->getData_app($searchTerm, $kdindex);

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

}
