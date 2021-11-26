<?php 

class Auth extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('Auth/M_Auth', 'Auth');



	}

	function act_auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$thang = $this->input->post('thang');
		$where = array(
			'user.username' => $username,
			'user.password' => $password
			);
		$cek = $this->Auth->cek_Auth("user",$where)->num_rows();
		$session = $this->Auth->session_Auth("user",$username,$password)->result();

		
		$hak_akses = $this->Auth->session_Auth_hakakses("t_hakakses",$username)->result();
		$hak = array();

		for($i=0;$i< count($hak_akses);$i++){
			$hak[$hak_akses[$i]->hak_menu] = $hak_akses[$i];  
		}

		// echo "<pre>";
		// print_r($hak);
		// echo "</pre>";

		if($cek > 0){

			$data_session = array(
				'username' 	=> $username,
				'kdsatker' 	=> $session[0]->kdsatker,
				'nmsatker' 	=> $session[0]->nmsatker,
				'role_id'	=> $session[0]->role_id,
				'user_id' 	=> $session[0]->id,
				'keterangan' => $session[0]->keterangan,

				'hak_akses' => $hak,
				'thang' => $thang,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

		// echo "<pre>";
		// print_r($data_session);
		// echo "</pre>";

		// exit;

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