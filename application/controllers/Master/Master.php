<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Master/M_Master','Master');
	}


	public function Tahapan(){

        $Trigger = $this->input->post('Trigger');

        $kdkmpnen = $this->input->post('kdkmpnen');
        $kdskmpnen = $this->input->post('kdskmpnen');

        
            $response = $this->Master->getData_tahapan($Trigger, $kdkmpnen, $kdskmpnen);
        
        echo json_encode($response);
     }

     public function Master_Pegawai(){

        $kdsatker = $this->input->post('kdsatker');

        
            $response = $this->Master->getData_Pegawai($kdsatker);
        
        echo json_encode($response);
     }

     public function Master_Uangharian(){

        $Trigger = $this->input->post('Trigger');
        $Tujuan = $this->input->post('Tujuan');
        
            $response = $this->Master->getData_Uangharian($Trigger, $Tujuan);
        
        echo json_encode($response);
     }

	 
}
