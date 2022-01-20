<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Master/M_Dropdown','Dropdown');
		$this->load->model('Master/M_Master','Master');
		$this->load->library('session');
	}
	

	public function index()
	{
		
		$data['thang'] = $this->Dropdown->getData_thang_nonAjax();
		//echo json_encode($response);
		$this->load->view('Login/Login',$data);
	}

	public function Home()
	{

		$kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");

        if($role_id == 5 || $role_id == 7 || $role_id == 3){
            $penjab_id = $this->session->userdata("penjab_id");
          }else{
            $penjab_id = $user_id;
            
          }

		$data['status1'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'1');
		$data['status2'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'2');
		$data['status3'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'3');
		$data['status4'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'4');
		$data['status5'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'5');
		$data['status6'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'6');
		$data['status7'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'7');
		$data['status8'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'8');
		$data['status9'] = $this->Master->status_st($kdsatker, $unit_id, $role_id, $penjab_id,'9');

		$this->load->view('Home/Home', $data);
	}
}
