<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Setting/M_Menu','Master');
	}


	public function Master(){

        $Username = $this->input->post('username');

        
            $response = $this->Master->get_Menu($Username);
        
        echo json_encode($response);
     }
}