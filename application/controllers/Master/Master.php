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

        
            $response = $this->Master->getData_tahapan($Trigger, $kdkmpnen);
        
        echo json_encode($response);
     }
}