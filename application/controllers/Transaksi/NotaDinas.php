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
		$data['NotaDinas']= $this->NotaDinas->getDataNew();
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

	public function Export(){
		
		$trigger         =  $this->uri->segment(4);
		$style           =  $this->uri->segment(5);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 
			'format' => 'A4-'.$style.'',
			'default_font_size' => 9,
			'default_font' => 'Calibri',
			'margin_left' => 10,
			'margin_right' => 10,
			'margin_top' => 6,
			'margin_bottom' => 6,
			]);
		if($trigger == "costsheet"){
			
			$html = $this->load->view('Transaksi/ExportViews/Costsheet.php',[],true);
			$name = "Costsheet.pdf";
		}else if($trigger == "spd"){
			$html = $this->load->view('Transaksi/ExportViews/SPD.php',[],true);
			$name = "SPD.pdf";

		}else if($trigger == "spd_back"){
			$html = $this->load->view('Transaksi/ExportViews/SPDBack.php',[],true);
			$name = "SPD-Back.pdf";

		}else if($trigger == "kwitansi"){
			$html = $this->load->view('Transaksi/ExportViews/Kwitansi.php',[],true);
			$name = "Kwitansi.pdf";
		}else if($trigger == "rincian_biaya"){
			$html = $this->load->view('Transaksi/ExportViews/Rincianbiaya.php',[],true);
			$name = "RincianBiaya.pdf";
		}else if($trigger == "pengeluaran_rill"){
			
			$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 
			'format' => 'A4-'.$style.'',
			'default_font_size' => 9,
			'default_font' => 'Calibri',
			'margin_left' => 16,
			'margin_right' => 16,
			'margin_top' => 16,
			'margin_bottom' => 16,
			]);

			$html = $this->load->view('Transaksi/ExportViews/Pengeluaranrill.php',[],true);
			$name = "Pengeluaran-Rill.pdf";
		}else if($trigger == "nominatif"){
			$html = $this->load->view('Transaksi/ExportViews/Nominatif.php',[],true);
			$name = "Nominatif.pdf";
		}else if($trigger == "perhitungan_rampung"){
			$html = $this->load->view('Transaksi/ExportViews/Perhitunganrampung.php',[],true);
			$name = "Perhitungan-Rampung.pdf";
		}
        $mpdf->WriteHTML($html);          
        $mpdf->Output($name, 'I');
     
	
    }
}