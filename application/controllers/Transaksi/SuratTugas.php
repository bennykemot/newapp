<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratTugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->model('Transaksi/M_SuratTugas','SuratTugas');
	}

	public function index()
	{

		$this->load->view('Transaksi/SuratTugas/manage');
	}

    public function Page()
	{
        
        $jumlah_data = $this->SuratTugas->Jum();
        $config['base_url'] = base_url().'Transaksi/SuratTugas/Page';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;

        $config['first_url'] = '1';

        $config['full_tag_open'] = "<ul class='pagination' >";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li >';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a class="active" >';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li >';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li >';
        $config['last_tag_close'] = '</li>';



        $config['prev_link'] = '<i style="font-size: 0px !important" ></i> Previous';
        $config['prev_tag_open'] = '<li >';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = 'Next <i style="font-size: 0px !important" ></i>';
        $config['next_tag_open'] = '<li >';
        $config['next_tag_close'] = '</li>';


		$from =  $this->uri->segment(3);
		$this->pagination->initialize($config);
        $data['SuratTugas'] = $this->SuratTugas->getDataNew($config['per_page'], $from);
        $this->load->view('Transaksi/SuratTugas/manage',$data);
	}

	public function tambah()
	{
		$this->load->view('Transaksi/SuratTugas/tambah');
	}

	public function Action()
    {

        $Trigger = $this->input->post('Trigger');
        
        if($Trigger == "C"){
            $nost = $this->input->post('nost');
            $tglst = str_replace("/", "-",$this->input->post('tglst'));
            $uraianst = $this->input->post('uraianst');
            $tglst_mulai = str_replace("/", "-",$this->input->post('tglst_mulai'));
			$tglst_selesai = str_replace("/", "-",$this->input->post('tglst_selesai'));
			$idxskmpnen = $this->input->post('idxskmpnen');
			$beban_anggaran = $this->input->post('beban_anggaran');
			$ttd = $this->input->post('ttd');
            $countTim = $this->input->post('countTim');

            

            $data_st = array(
                'nost' => $nost,
                'tglst' => date("Y-m-d",strtotime($tglst)),
                'uraianst' => $uraianst,
                'tglmulaist' => date("Y-m-d",strtotime($tglst_mulai)),
                'tglselesaist' => date("Y-m-d",strtotime($tglst_selesai)),
                'idxskmpnen' => $idxskmpnen,
                'id_unit' => $idxskmpnen,
                'id_ttd' => $ttd,
                'is_approved1' => 0,
                'is_approved2' => 0,
                'is_approved3' => 0,
                'is_approved4' => 0
                
                );

            $this->SuratTugas->CRUD($data_st,'d_surattugas', $Trigger);

            $where = array('nost' => $nost);
            $cek = $this->SuratTugas->cek($where,'d_surattugas')->result_array();
        
                $data = array();    
                $j = 1;
                $ArrX = $this->input->post('ArrX');
                $urut = explode(",",$ArrX);
                $Nourut = []; 

                // for($i = 0 ; $i < count($urut) ; $i++){
                //     $Nourut[] = $this->input->post('urut'.$i.'');
                // }
                
                
                for($i = 0 ; $i < $countTim; $i++){
                    
                       $data = array(
                            'nourut' => $this->input->post('urut'.$urut[$i].''),
                            'nama' => $this->input->post('nama'.$urut[$i].''),
                            'nip' => $this->input->post('nip'.$urut[$i].''),
                            'peran'  => $this->input->post('perjab'.$urut[$i].''),
                            'id_st' => $cek[0]['id']
                            
                       );
                       $this->db->insert('d_stdetail',$data);
                }
                
                //$this->db->insert_batch('d_stdetail', $data);
             
            
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
            $where2 = array('id_st' => $id);
	        $this->SuratTugas->CRUD($where,'d_surattugas', $Trigger);
            $this->SuratTugas->CRUD($where2,'d_stdetail', $Trigger);

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            
           
            $output = $this->SuratTugas->CRUD($id,'d_surattugas', $Trigger);
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
	        $this->SuratTugas->update($data,'d_detailapp', $where);

        }else if($Trigger == "getRupiahTahapan"){

            $kdindex = $this->input->post('kdindex');
            //$where = array('kdindex' => $kdindex);
            $output = $this->SuratTugas->CRUD($kdindex,'d_detailapp', $Trigger);
            echo json_encode($output);

        }
        
    }

}