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

        $no_revisi = $this->input->post('no_revisi');
        $revisiKe = $this->input->post('revisike');

        if (!file_exists(FCPATH.'/assets/temp_folder/'.$kdsatker.'')) {
            mkdir(FCPATH.'/assets/temp_folder/'.$kdsatker.'', 0777, true);
        }else{

            $files = glob(FCPATH.'/assets/temp_folder/'.$kdsatker.'/*'); // get all file names
                foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
        }

                  //unlink(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'); // delete file
    }

            $config['upload_path']  = FCPATH.'/assets/temp_folder/'.$kdsatker.'/';
            $config['file_name']    = $this->input->post('shad_file');
            $config['max_size']     = 1024 * 8;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if (file_exists(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$name)) {
                unlink(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$name);
            }

        if ( $this->upload->do_upload('file_'))
        {       
            

            $data = $this->upload->data();
            $status = "success";
            $msg = "File Berhasil di Upload";

        }
        else
        {

            $status = "error";
            $msg = $this->upload->data();
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));

    
        $archive = RarArchive::open(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$name.'');
        $entries = $archive->getEntries();
        foreach ($entries as $entry) {
            $entry->extract(FCPATH.'/assets/temp_folder/'.$kdsatker.'/');
        }
        $archive->close();
        

        if($no_revisi == $revisiKe){
            $this->Transfer->d_pagu($kdsatker, $no_revisi, $revisiKe);
        }else{
            $this->Transfer->h_pagu($kdsatker, $no_revisi, $revisiKe);
        }

        $this->Transfer->xml($kdsatker,$name);

    }


}