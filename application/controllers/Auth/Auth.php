<?php 

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Auth/M_Auth', 'Auth');

	}

	function act_auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
		$cek = $this->Auth->cek_Auth("user",$where)->num_rows();
		$session = $this->Auth->session_Auth("user",$where)->result();

		if($cek > 0){

			$data_session = array(
				'username' => $username,
				'kdsatker' => $session[0]->kdsatker,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("Main/Home"));

		}else{
			echo "Username dan password salah !";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Main'));
	}
}