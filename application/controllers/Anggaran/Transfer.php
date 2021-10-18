<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
		$this->load->model('Anggaran/M_Transfer','Transfer');
	}

	public function index()
	{
		$this->load->view('Anggaran/Transfer/manage');
	}

    public function getPagu_Norevisi(){
        $kdsatker = $this->input->post('kdsatker');

        $data = $this->Transfer->getPagu_Norevisi($kdsatker);
        echo json_encode($data);
    }

    public function upload() 
    {
        $kdsatker = $this->input->post('kdsatker');
        $file = $this->input->post('file_');
        $name = $this->input->post('shad_file');
        

        if (!file_exists(FCPATH.'/assets/temp_folder/'.$kdsatker.'')) {
            mkdir(FCPATH.'/assets/temp_folder/'.$kdsatker.'', 0777, true);
        }

            $config['upload_path']  = FCPATH.'/assets/temp_folder/'.$kdsatker.'/';
            $config['file_name']    = $this->input->post('shad_file');
            $config['max_size']     = 1024 * 8;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
        if ( $this->upload->do_upload('file_'))
        {       
            if (file_exists(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$name)) {
                unlink(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$name);
            }

            $data = $this->upload->data();
            $status = "success";
            $msg = "File Berhasil di Upload";

            
            
        }
        else
        {
           
            $status = "error";
            $msg = $this->upload->data();

                // $this->load->view('upload_success', $data);
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));

    }
}