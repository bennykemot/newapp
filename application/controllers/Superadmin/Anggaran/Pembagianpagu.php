<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pembagianpagu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
        $this->load->library('pagination');
		$this->load->model('Superadmin/Anggaran/M_Pembagianpagu','Pembagianpagu');
	}

    public function index()
	{}

	public function Page()
	{

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");

		$data['pp'] = $this->Pembagianpagu->getDataList();
        //$data['pp'] = $this->Pembagianpagu->getDataNew($kdsatker,$thang,$user_id,$role_id,$unit_id);
        
		$this->load->view('Superadmin/Anggaran/Pembagianpagu/manage', $data);
	}

	public function detail(){
		$kdsatker = $this->uri->segment(5);
		$thang = $this->session->userdata("thang");
		$data['pp'] = $this->Pembagianpagu->getDataNew($kdsatker,$thang);
		$data['head'] = $this->db->query("SELECT SUM(rupiah) as jumlah, norevisi, tgrevisi from d_pagu WHERE d_pagu.kdsatker = ".$kdsatker." AND d_pagu.thang = ".$thang." ")->result();
		$data['Satker'] = $this->Pembagianpagu->getNamaSatker($kdsatker);
		$this->load->view('Superadmin/Anggaran/Pembagianpagu/detail',$data);
	}

	public function getPembagianPagu()
    {
        
		$kdsatker = $_POST['kdsatker'];
        $list = $this->Pembagianpagu->get_datatables($kdsatker);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['thang'] = $customers->thang;
            $row['kdsatker'] = $customers->kdsatker;
            $row['kddept'] = $customers->kddept;
            $row['kdunit'] = $customers->kdunit;
            $row['kdprogram'] = $customers->kdprogram;
            $row['kdgiat'] = $customers->kdgiat;
            $row['kdoutput'] = $customers->kdoutput;
            $row['kdsoutput'] = $customers->kdsoutput;
			$row['kdkmpnen'] = $customers->kdkmpnen;
            $row['username'] = $customers->username;
            $row['id'] = $customers->id;

 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Pembagianpagu->count_all($kdsatker),
                        "recordsFiltered" => $this->Pembagianpagu->count_filtered($kdsatker),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function Action()
    {

        $Trigger = $this->input->post('Trigger');
        if($Trigger == "C"){
            $ppk = $this->input->post('ppk');
            $userid = $this->input->post('userid');
            $unitkerja = $this->input->post('unitkerja');
            $kewenangan = $this->input->post('kewenangan');
            $kdindex = $this->input->post('kdindex');
            $kdsatker = $this->input->post('kdsatker');
            $kddept = $this->input->post('kddept');
            $kdunit = $this->input->post('kdunit');
            $kdprogram = $this->input->post('kdprogram');
            $kdgiat = $this->input->post('kdgiat');
            $kdoutput = $this->input->post('kdoutput');
            $kdsoutput = $this->input->post('kdsoutput');
            $kdkmpnen = $this->input->post('kdkmpnen');
            $thang = $this->input->post('thang');
            $trigger = $this->input->post('Trigger');

            $datawhere = array(
                'thang' => $thang,
                'kdindex' => $kdindex);

            $cek = $this->Pembagianpagu->CEK($datawhere,'d_bagipagu', 'R');

            if(count($cek) <= 0 ){

                $data = array(
                    'thang' => $thang,
                    'kdsatker' => $kdsatker,
                    'kddept' => $kddept,
                    'kdunit' => $kdunit,
                    'kdprogram' => $kdprogram,
                    'kdgiat' => $kdgiat,
                    'kdoutput' => $kdoutput,
                    'kdsoutput' => $kdsoutput,
                    'kdkmpnen' => $kdkmpnen,
                    'ppk_id' => $ppk,
                    'role_id' => $kewenangan,
                    'unit_id' => $unitkerja,
                    'kdindex' => $kdindex,
                    'user_id' => $userid
                    
                    );
                $this->Pembagianpagu->CRUD($data,'d_bagipagu', $Trigger);

                $response = array(
                    'status' => "success",
                    'message' => 'Data Berhasil ditambah'
                );
    
                echo json_encode($response);

            }else{

                $response = array(
                    'status' => "error",
                    'message' => 'Data Duplikat'
                );
    
                echo json_encode($response);

            }

           
            
            
            
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->Pembagianpagu->CRUD($where,'d_bagipagu', $Trigger);

            $response = array(
                'status' => "success",
                'message' => 'Data Berhasil dihapus'
            );

            echo json_encode($response);

        }else if($Trigger == "R"){
            $id = $this->input->post('id');
            $where = array('d_bagipagu.id' => $id);
            $output = $this->Pembagianpagu->CRUD($where,'d_bagipagu', $Trigger);
            echo json_encode($output);
            
        }else if($Trigger == "U"){

            $id             = $this->input->post('idbagipagu');
            $ppk            = $this->input->post('ppk');
            $unitkerja      = $this->input->post('unitkerja');
            $kewenangan     = $this->input->post('kewenangan');
            $userid         = $this->input->post('userid');

            $data = array(
                    'ppk_id' => $ppk,
                    'role_id' => $kewenangan,
                    'unit_id' => $unitkerja,
                    'user_id' => $userid
                
                );
            $where = array('id' => $id);
	        $this->Pembagianpagu->update($data,'d_bagipagu', $where);

            $response = array(
                'status' => "success",
                'message' => 'Data Berhasil diubah'
            );

            echo json_encode($response);
        }
        
    }

	public function Tambah()
		{
            $var =  $this->uri->segment(4);
            $kdindex = str_replace("%20", " ", $var);
            $data['tambahpp'] = $this->Pembagianpagu->CRUD($kdindex,'d_pagu','R');
            $data['readpp'] = $this->Pembagianpagu->CRUD($kdindex,'d_bagipagu','R-table');

			$this->load->view('Anggaran/Pembagianpagu/tambah', $data);
		}

    function export(){
            $kdsatker =  $this->uri->segment(5);
            $thang =  $this->uri->segment(6);
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet()->getProtection()->setSheet(true);
            $spreadsheet->getDefaultStyle()->getProtection()->setLocked(false);
            $sheet = $spreadsheet->getActiveSheet();
        
            $style_col = [
              'font' => ['bold' => true], // Set font nya jadi bold
              'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
              ],
              'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
              ]
            ];
        
            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = [
              'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
              ],
              'borders' => [
                'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
                'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
                'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
                'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
              ]
            ];
        
            $sheet->setCellValue('A1', "PEMBAGIAN PAGU SATKER - ".$kdsatker.""); // Set kolom A1 dengan tulisan "DATA SISWA"
            $sheet->mergeCells('A1:N1'); // Set Merge Cell pada kolom A1 sampai E1
            $sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
            $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            
            $header = 3;
        
            // Buat header tabel nya pada baris ke 3
            $sheet->setCellValue('A'.$header.'', "NO");
            $sheet->setCellValue('B'.$header.'', "PROGRAM");
            $sheet->setCellValue('C'.$header.'', "KEGIATAN");
            $sheet->setCellValue('D'.$header.'', "KRO");
            $sheet->setCellValue('E'.$header.'', "RO");
            $sheet->setCellValue('F'.$header.'', "KOMP");
            $sheet->setCellValue('G'.$header.'', "SUB KOMP");
            $sheet->setCellValue('H'.$header.'', "AKUN");
            $sheet->setCellValue('I'.$header.'', "URAIAN");
            $sheet->setCellValue('J'.$header.'', "ANGGARAN");
            $sheet->setCellValue('K'.$header.'', "REALISASI");
            $sheet->setCellValue('L'.$header.'', "PPK");
            $sheet->setCellValue('M'.$header.'', "UNIT KERJA");
            $sheet->setCellValue('N'.$header.'', "ROLE PENGUSUL");

            $cell = range('A', 'N');
					$count = count($cell);
					for ($i = 0; $i < $count; $i++) {
                        $sheet->getStyle(''.$cell[$i].''.$header.'')->applyFromArray($style_col);
					}
            $export = $this->Pembagianpagu->getDataExport($kdsatker,$thang);
        
            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
            foreach($export as $data){

                    
              $sheet->setCellValue('A'.$numrow, $no);
              $sheet->setCellValue('B'.$numrow, $data->kdprogram);
              $sheet->setCellValue('C'.$numrow, $data->kdgiat);
              $sheet->setCellValue('D'.$numrow, $data->kdoutput);
              $sheet->setCellValue('E'.$numrow, $data->kdsoutput);
              $sheet->setCellValue('F'.$numrow, $data->kdkmpnen);
              $sheet->setCellValue('G'.$numrow, $data->kdskmpnen);
              $sheet->setCellValue('H'.$numrow, $data->kdakun);
              $sheet->setCellValue('I'.$numrow, $data->nmakun);
              $sheet->setCellValue('J'.$numrow, $data->rupiah);
              $sheet->setCellValue('K'.$numrow, $data->realisasi);
              $sheet->setCellValue('L'.$numrow, $data->nama);
              $sheet->setCellValue('M'.$numrow, $data->nama_unit);
              $sheet->setCellValue('N'.$numrow, $data->rolename);
              
              // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
              $cell = range('A', 'N');
					$count = count($cell);
					for ($i = 0; $i < $count; $i++) {
                        $sheet->getStyle(''.$cell[$i].''.$numrow.'')->applyFromArray($style_row);
                        $sheet->getColumnDimension(''.$cell[$i].'')->setAutoSize(true);
                        
                        $sheet->getColumnDimension('D')->setWidth(10);
                        $sheet->getColumnDimension('E')->setWidth(10);
                        $sheet->getColumnDimension('F')->setWidth(10);
					}
                    $sheet->getStyle('D'.$numrow.'')->getProtection()
                    ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

                    $sheet->getStyle('J'.$numrow.'')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $sheet->getStyle('K'.$numrow.'')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
              
              $no++; // Tambah 1 setiap kali looping
              $numrow++; // Tambah 1 setiap kali looping
            }
           
            $sheet->getColumnDimension('A')->setWidth(5);
            $sheet->getDefaultRowDimension()->setRowHeight(-1);
           


            $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $sheet->setTitle("PembagianPagu".$thang."-".$kdsatker."");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="PembagianPagu'.$thang.'-'.$kdsatker.'.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
        
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
          }
    
}
