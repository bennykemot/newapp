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

    public function Page()
	{   
        $kdsatker =  $this->uri->segment(4);
        $data['user'] = $this->Profile->getDataNew($kdsatker);
		$this->load->view('Profile/Profile',$data);
	}

    public function getUser()
    {
		$kdsatker = $_POST['kdsatker'];
        $list = $this->Profile->get_datatables($kdsatker);
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
                        "recordsTotal" => $this->Profile->count_all($kdsatker),
                        "recordsFiltered" => $this->Profile->count_filtered($kdsatker),
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

            $getUsername= $this->db->query("SELECT username from user where username = '". $nama_user."' ")->result_array();
            if(count($getUsername) > 0){
                $status = "warning";
                $msg = "Username Sudah Ada !";
                echo json_encode(array('status' => $status, 'msg' => $msg));
            }else{

            

            $data = array(
                'username' => $nama_user,
                'kdsatker' => $kdsatker,
                'status' => $kdstatus,
                'role_id' => $kdrole,
                'keterangan' => $keterangan,
                'password' => $password,

                
                );
            $this->Profile->CRUD($data,'user', $Trigger);

            $status = "success";
            $msg = "Data Berhasil Ditambah !";
            echo json_encode(array('status' => $status, 'msg' => $msg));
            }
            

        }else if($Trigger == "D"){
            $id = $this->input->post('id');

            $getUsername= $this->db->query("SELECT username from user where id = '". $id."' ")->result_array();
            $where = array('id' => $id);
            $where2 = array('id_user' => $getUsername[0]['username']);
	        $this->Profile->CRUD($where,'user', $Trigger);
            $this->Profile->Hak_Akses($where2,'t_hakakses', $Trigger);

            $status = "success";
            $msg = "Data Berhasil Dihapus !";
            echo json_encode(array('status' => $status, 'msg' => $msg));

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            $where = array('user.id' => $id);
            $output = $this->Profile->CRUD($where,'user', $Trigger);
            echo json_encode($output);
            
        }else if($Trigger == "U"){

            $id         = $this->input->post('idUser');
            $username         = $this->input->post('nama_user_Edit');
            $kdsatker  = $this->input->post('kdsatker_Edit');
            $kdrole   = $this->input->post('kdrole_Edit');
            $kdstatus  = $this->input->post('kdstatus_Edit');
            $password     = $this->input->post('password_Edit');
            $keterangan   = $this->input->post('keterangan_Edit');

            $data = array(
                'username' => $username,
                'password' => $password,
                'kdsatker' => $kdsatker,
                'role_id' => $kdrole,
                'status' => $kdstatus,
                'keterangan' => $keterangan
                
                );
            $where = array('id' => $id);
	        $this->Profile->update($data,'user', $where);

            $status = "success";
            $msg = "Data Berhasil DiUbah !";
            echo json_encode(array('status' => $status, 'msg' => $msg));
        }

        
    }
}