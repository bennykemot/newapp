<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotaDinas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->model('Transaksi/M_NotaDinas','NotaDinas');
	}

	public function index()
	{
		//$data['NotaDinas']= $this->NotaDinas->getDataNew();
		//$this->load->view('Transaksi/NotaDinas/manage');
	}

	public function Page()
	{
        
        $jumlah_data = $this->NotaDinas->Jum();
        $config['base_url'] = base_url().'Transaksi/NotaDinas/Page';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;

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


		$from =  $this->uri->segment(4);
		$this->pagination->initialize($config);
        $data['NotaDinas'] = $this->NotaDinas->getDataNew($config['per_page'], $from);
        $this->load->view('Transaksi/NotaDinas/manage',$data);
	}

	public function tambah()
	{
		$this->load->view('Transaksi/NotaDinas/tambah');
	}

	public function getData(){
			$Trigger = $this->input->post('Trigger');
			$id = $this->input->post('id');
            $output = $this->NotaDinas->CRUD($id,'d_surattugas', $Trigger);
            echo json_encode($output);
	}

	public function Error_exp(){
		?> <script type="text/javascript">
                    setTimeout(function() {
                        window.close();
                        window.history.back();
                    }, 100);
                    
                    
                </script>
                <?php 
	}

	public function Export(){
		
		$trigger         =  $this->uri->segment(4);
		$style           =  $this->uri->segment(5);
		$id_st           =  $this->uri->segment(6);
		$unitId = $this->session->userdata('unit_id');
		$kdsatker = $this->session->userdata('kdsatker');
		

		$mpdf = new \Mpdf\Mpdf(['tempDir' => sys_get_temp_dir().DIRECTORY_SEPARATOR.'mpdf',
		'mode' => 'utf-8', 
			'format' => 'A4-'.$style.'',
			'default_font_size' => 8,
			'default_font' => 'Calibri',
			'margin_left' => 10,
			'margin_right' => 10,
			'margin_top' => 6,
			'margin_bottom' => 6,
			]);
		if($trigger == "costsheet"){
			$a              = $this->uri->segment(7);
        	$kdindex        = str_replace("%20", " ", $a);

			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);
			$data['cs']= $this->NotaDinas->getData_costsheet($id_st, $kdindex);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Costsheet.php',$data,true);
				$name = "Costsheet.pdf";
				}else{
				$this->Error_exp();
			}

			
		}else if($trigger == "spd"){
			//$kdsatker = $this->session->userdata('kdsatker');
			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/SPD.php',$data,true);
			$name = "SPD.pdf";
				}else{
				$this->Error_exp();
			}
			

		}else if($trigger == "spd_back"){

			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/SPDBack.php',$data,true);
				$name = "SPD-Back.pdf";
				}else{
				$this->Error_exp();
			}

		}else if($trigger == "kwitansi"){
			$data['bendahara'] = $this->NotaDinas->getBendahara_export($kdsatker,$unitId);

			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Kwitansi.php',$data,true);
				$name = "Kwitansi.pdf";
				}else{
				$this->Error_exp();
			}
		}else if($trigger == "rincian_biaya"){
			$data['bendahara'] = $this->NotaDinas->getBendahara_export($kdsatker,$unitId);

			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Rincianbiaya.php',$data,true);
			$name = "RincianBiaya.pdf";
				}else{
				$this->Error_exp();
			}
		}else if($trigger == "pengeluaran_rill"){
			
			$mpdf = new \Mpdf\Mpdf(['tempDir' => sys_get_temp_dir().DIRECTORY_SEPARATOR.'mpdf',
			'mode' => 'utf-8', 
			'format' => 'A4-'.$style.'',
			'default_font_size' => 9,
			'default_font' => 'Calibri',
			'margin_left' => 16,
			'margin_right' => 16,
			'margin_top' => 16,
			'margin_bottom' => 16,
			]);

			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Pengeluaranrill.php',$data,true);
			$name = "Pengeluaran-Rill.pdf";
				}else{
				$this->Error_exp();
			}
			
		}else if($trigger == "nominatif"){
			$data['bendahara'] = $this->NotaDinas->getBendahara_export($kdsatker,$unitId);

			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);

			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Nominatif.php',$data,true);
				$name = "Nominatif.pdf";
				}else{
				$this->Error_exp();
			}
			
		}else if($trigger == "perhitungan_rampung"){

			
			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st);

			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Perhitunganrampung.php',$data,true);
				$name = "Perhitungan-Rampung.pdf";
				}else{
				$this->Error_exp();
			}
			
		}
		if($data['export'][0]->status_id < 3){
			$mpdf->SetWatermarkText('DRAFT'); // Will cope with UTF-8 encoded text
			$mpdf->showWatermarkText = true; // Uses default font if left blank
		}
        $mpdf->WriteHTML($html);          
        $mpdf->Output($name, 'I');
     
	
    }
}
