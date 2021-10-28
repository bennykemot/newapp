<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detail_Mappingapp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
		$this->load->model('Anggaran/M_detail_Mappingapp','detail_Mappingapp');
	}

	public function index()
	{
		$this->load->view('Anggaran/Mappingapp/manage');
	}

    public function getMappingApp_detail()
    {
		$kdindex = $_POST['kdindex'];
        $list = $this->detail_Mappingapp->get_datatables($kdindex);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['id'] = $customers->id;
            $row['id_app'] = $customers->id_app;
            $row['nama_app'] = $customers->nama_app;
			$row['rupiah'] = $customers->rupiah;
            $row['tahapan'] = $customers->tahapan;
            $row['rupiah_tahapan'] = $customers->rupiah_tahapan;
			$row['kdindex'] = $customers->kdindex;
            $row['th_pkpt'] = $customers->th_pkpt;
            $row['jumlah'] = $customers->jumlah;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->detail_Mappingapp->count_all($kdindex),
                        "recordsFiltered" => $this->detail_Mappingapp->count_filtered($kdindex),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function Action()
    {

        $Trigger = $this->input->post('Trigger');
        
        if($Trigger == "C"){
            $nilai_app = $this->input->post('nilai_app');
            $th_pkpt = $this->input->post('th_pkpt');
            $kodeindex = $this->input->post('kodeindex');
            $app = $this->input->post('app');
            $countRupiah = $this->input->post('countRupiah');
            $tahapan = [
                "Pengumpulan Data",
                "Penelitian Awal",
                "Rapat/FGD Penyusunan Draft Pedoman", 
                "Diseminasi Draft Pedoman", 
                "Diseminasi Pedoman", 
                "Pemahaman Objek Penugasan Pengawasan serta Identifikasi dan Mitigasi Risiko", 
                "Evaluasi SPI Objek Pengawasan", 
                "Penyusunan Laporan Hasil Penugasan", 
                "Pendistribusian Laporan Hasil Penugasan"];

            $where = array('id_app' => $app, 'kdindex' => $kodeindex);

            $cek = $this->detail_Mappingapp->cek($where,'d_detailapp')->result_array();
            

            if(count($cek) == 0){
                $data = array();    
                $j = 1;
                for($i = 0 ; $i < $countRupiah; $i++){
                    
                        //$rupiah_tahapan[$i] = $this->input->post('rupiah'.$j.'');
                        array_push($data , array(
                            'id_app' => $app,
                            'rupiah' => $nilai_app,
                            'kdindex' => $kodeindex,
                            'th_pkpt' => $th_pkpt,
                            'tahapan' => $tahapan[$i],
                            'rupiah_tahapan'  => $this->input->post('rupiah'.$j.'')
                            
                            ));
                    $j++;
                }
                //$this->detail_Mappingapp->CRUD($data,'d_detailapp', $Trigger);
                $this->db->insert_batch('d_detailapp', $data);
               

            }else{
                $data = array(
                    'rupiah' => $nilai_app,
                    'th_pkpt' => $th_pkpt
                    
                    );
                $cekwhere = array('id'  => $cek[0]['id'] );
                $this->detail_Mappingapp->update($data,'d_detailapp', $cekwhere);

                

            }
            
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->detail_Mappingapp->CRUD($where,'d_detailapp', $Trigger);

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            
           
            $output = $this->detail_Mappingapp->CRUD($id,'d_detailapp', $Trigger);
            // $total = $this->detail_Mappingapp->getTotalRupiah($kdindex);
            echo json_encode($output);
            
        }else if($Trigger == "U"){

            $rupiah_tahapan = $this->input->post('rupiah_tahapan_Edit');
            $th_pkpt = $this->input->post('th_pkpt_Edit');

            $data = array(
                'rupiah_tahapan' => $rupiah_tahapan,
                'th_pkpt' => $th_pkpt
                
                );

            $id = $this->input->post('Id_Edit');
            $where = array('id' => $id);
	        $this->detail_Mappingapp->update($data,'d_detailapp', $where);

        }else if($Trigger == "getRupiahTahapan"){

            $kdindex = $this->input->post('kdindex');
            //$where = array('kdindex' => $kdindex);
            $output = $this->detail_Mappingapp->CRUD($kdindex,'d_detailapp', $Trigger);
            echo json_encode($output);

        }
        
    }
}
