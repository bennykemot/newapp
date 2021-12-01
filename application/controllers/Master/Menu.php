<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("form","url"));
		$this->load->model('Setting/M_Menu','Master');
	}


	public function Master(){

        $role_id = $this->input->post('role_id');

        
            $response = $this->Master->get_Menu($role_id);
        
        echo json_encode($response);
     }
}
