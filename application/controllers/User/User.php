<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('User/M_User','User');
	}

	public function index()
	{
		$this->load->view('User/User');
	}

	public function User(){
		$user_id = $this->uri->segment(4);

		$data['user'] = $this->User->getUser($user_id);
		// echo json_encode($output);
		$this->load->view('User/User', $data);

	}

	public function Action(){
		$Trigger        = $this->input->post('Trigger');

		if($Trigger == "R"){
            $id = $this->input->post('id');
            $where = array('id' => $id);
            $output = $this->User->CRUD($where,'user', $Trigger);
            echo json_encode($output);
		}else{

			$id        = $this->input->post('idUser');
            $username  = $this->input->post('username');
            $password  = $this->input->post('password');

			$data = array(
                'username' => $username,
                'password' => $password
                
                );
            $where = array('id' => $id);
	        $this->User->update($data,'user', $where);

            $status = "success";
            $msg = "Data Berhasil DiUbah !";
            echo json_encode(array('status' => $status, 'msg' => $msg));

		}

	}
}