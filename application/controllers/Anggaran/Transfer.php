<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \CloudConvert\Models\Job;
use \CloudConvert\Models\ImportUploadTask;
use \CloudConvert\CloudConvert;
use \CloudConvert\Models\Task;




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

    function test(){

        $cloudconvert = new CloudConvert([
            'api_key' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOWY5ZmQzZmI3MDM4MTI1OWJjZTM4YjVhNGRjZTJkMDg0ZDk1ZDM1NjAyYWE4NDQ3NWNlNWRiZjZlNWQwMzY5ODcyNmIwODAxYWQ5M2I3NTciLCJpYXQiOjE2MzU5NTAwMTYuMDMwNjQ1LCJuYmYiOjE2MzU5NTAwMTYuMDMwNjQ3LCJleHAiOjQ3OTE2MjM2MTYuMDA5Njg5LCJzdWIiOiI1NDQzNzMyNiIsInNjb3BlcyI6WyJ1c2VyLnJlYWQiLCJ1c2VyLndyaXRlIiwidGFzay5yZWFkIiwidGFzay53cml0ZSJdfQ.hLvvrTNFl-z4KK0jmk5WeNl5UFaiFwrPt1jNN9JGgeGHhkO0I0UbH1HBGTDrC9TLnrWggTaxK_RTL1pAXfwmwq3VOAhd-TzJt6sMc6MTbdCPs47TOJotSqe9LzqWBach6xeDOqr4VQ_rW7NnxQd0CrmD-OwtQ7iAWL-A4kDYdjo7toNCVDf_OJHldoN6T-9YDKB9g6E2PIeDEDd1m-Bw9tWx45r3lDz3CagfUXRKlCI8ooEoIU-WGxojAYQsHwmVVQYPjANGWVyKXbBODEqARElQuKCrncfPoB2M2OFVlNwstlxdAKQx4CqcMcck1lx97DTJKB8CL3w0F4L8smAHa1GHPfLECPaHZ-e97kg-HrLcyciU4V30Vhe3cTTF_QVQkqc-PhcxJAo314-LaRhiAZmQmvbRdQvPybeCoppJoU5BLqv0iIZSxJzMDGSthAwDcISua8PLGN_ZzAT5dl5h91CUG_00cnRDdsoHVB3NAukvS4HSXHlWjF1C76aPQlF35LSBx1EIW9_QDMP4e6ZOJuXZJpJ_ek0qf-InDJ_Vw1maE0F6FYj4PLDoHXVpP91aUeZmj6-Hy0-LscADea-rS5SQLHhonA05YUoJQQ7YSM7XcThfYGamPPZY6k4SqK3t2MV_m2mbAMHoLAdxIHZP2OIqVAegCr5EvWnOzWETJ7k'
        ]);
        
        

            $job = (new Job())
            ->addTask(
                (new Task('import/upload', 'upload-my-file'))
                )
            ->addTask(
                (new Task('convert', 'convert-my-file'))
                    ->set('input_format', 'rar')
                    ->set('output_format', 'zip')
                    ->set('engine', 'archivetool')
                    ->set('input', "upload-my-file")
                )
                ->addTask(
                    (new Task('export/url', 'export-1'))
                      ->set('input', "convert-my-file")
                      ->set('inline', false)
                      ->set('archive_multiple_files', false)
                  ); 

            $cloudconvert->jobs()->create($job);

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
        $filename = $this->input->post('shad_file');
       
        $dumNamaFile = $this->input->post('dumNamaFile');

        $info = pathinfo($filename);
        $name =  $info['filename'] . '.zip';

        //$name= $dumNamaFile.".zip";

        $no_revisi = $this->input->post('no_revisi');
        $revisiKe = $this->input->post('revisike');

        if (!file_exists(FCPATH.'/assets/temp_folder/'.$kdsatker.'')) {
            mkdir(FCPATH.'/assets/temp_folder/'.$kdsatker.'', 0666, true);
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
            $config['file_name']    = $filename;
            $config['max_size']     = 1024 * 8;
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if (file_exists(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$filename)) {
                unlink(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$filename);
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

        /* example by Erik Jenssen aka erix */

        //$filename = "foobar.rar";
        // $filepath = FCPATH.'/assets/temp_folder/'.$kdsatker.'/';

        // $rar_file = rar_open($filepath.$filename);
        // $list = rar_list($rar_file);
        // foreach($list as $file) {
        //     $entry = rar_entry_get($rar_file, $file->getName());
        //     $entry->extract(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'); // extract to the current dir
        // }
        // rar_close($rar_file);
        
        $archive = RarArchive::open(FCPATH.'/assets/temp_folder/'.$kdsatker.'/'.$filename.'');
        $entries = $archive->getEntries();
        foreach ($entries as $entry) {
            $entry->extract(FCPATH.'/assets/temp_folder/'.$kdsatker.'/');
        }
        $archive->close();

        $this->Transfer->xml_d_item($kdsatker,$filename);
        $this->Transfer->xml_d_soutput($kdsatker,$filename);
        $this->Transfer->xml_d_kmpnen($kdsatker,$filename);
        $this->Transfer->xml_d_skmpnen($kdsatker,$filename);
        
        if($no_revisi == $revisiKe){
            $this->Transfer->d_pagu($kdsatker, $no_revisi, $revisiKe);
        }else{
            $this->Transfer->h_pagu($kdsatker, $no_revisi, $revisiKe);
        }

        

    }
}