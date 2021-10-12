<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
		$this->load->model('Profile/M_Profile','Profile');
	}

	public function index()
	{
		$this->load->view('Profile/Profile');
	}

    public function getUser()
    {
		// $kdsatker = $_POST['kdsatker'];
        $list = $this->Profile->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['id'] = $customers->id;
            $row['username'] = $customers->username;
            $row['kdsatker'] = $customers->kdsatker;
            $row['role_id'] = $customers->role_id;
            $row['status'] = $customers->status;
            $row['keterangan'] = $customers->keterangan;
            $row['nmsatker'] = $customers->nmsatker;
            $row['rolename'] = $customers->rolename;

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Profile->count_all(),
                        "recordsFiltered" => $this->Profile->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function Action()
    {
        $Trigger = $this->input->post('Trigger');
        if($Trigger == "C"){

            $nama_user = $this->input->post('nama_user');
            $kdsatker = $this->input->post('kdsatker');
            $kdstatus = $this->input->post('kdstatus');
            $kdrole = $this->input->post('kdrole');
            $password = $this->input->post('password');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'username' => $nama_user,
                'kdsatker' => $kdsatker,
                'status' => $kdstatus,
                'role_id' => $kdrole,
                'keterangan' => $keterangan,
                'password' => $password,

                
                );
            $this->Profile->CRUD($data,'user', $Trigger);

        }else{
            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->Profile->CRUD($where,'user', $Trigger);
        }

        
    }
}