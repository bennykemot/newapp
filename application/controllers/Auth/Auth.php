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
		

		if($cek > 0){
			$session = $this->Auth->session_Auth("user",$username,$password)->result();

			$data_session = array(
				'username' 	=> $username,
				'kdsatker' 	=> $session[0]->kdsatker,
				'nmsatker' 	=> $session[0]->nmsatker,
				'role_id'	=> $session[0]->role_id,
				'user_id' 	=> $session[0]->id,
				'keterangan' => $session[0]->keterangan,
				'unit_id' => $session[0]->unit_id,
				'penjab_id' => $session[0]->pejabat_id,

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

		?>	<script type="text/javascript">
				alert("Cek Kembali Username dan Password");
				history.back();
			</script>
		<?php
			//redirect(base_url('Main'));
			//echo "Username dan password salah !";
		}


		

		
		// $hak_akses = $this->Auth->session_Auth_hakakses("t_hakakses",$session[0]->role_id)->result();
		// $hak = array();

		// for($i=0;$i< count($hak_akses);$i++){
		// 	$hak[$hak_akses[$i]->hak_menu] = $hak_akses[$i];  
		// }

		// echo "<pre>";
		// print_r($hak);
		// echo "</pre>";

		
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Main'));
	}
}