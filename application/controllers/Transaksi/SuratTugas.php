<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratTugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->library('pdf');
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


		$from =  $this->uri->segment(3);
		$this->pagination->initialize($config);
        $data['SuratTugas'] = $this->SuratTugas->getDataNew($config['per_page'], $from);
        $this->load->view('Transaksi/SuratTugas/manage',$data);
	}

	public function tambah()
	{
		$this->load->view('Transaksi/SuratTugas/tambah');
	}

    public function ubah()
	{
        $id =  $this->uri->segment(4);
        $data['ubah'] = $this->SuratTugas->getDataUbah($id);
        //echo json_encode($data);
		$this->load->view('Transaksi/SuratTugas/ubah',$data);
	}

    public function pregChar($str){
        $res = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        return (int)preg_replace('/[Rp]/', '', $res);
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
			$beban_anggaran = $this->input->post('select-bebananggaran');
			$ttd = $this->input->post('ttd');
            $countTim = $this->input->post('countTim');

            

            $data_st = array(
                'nost' => $nost,
                'tglst' => date("Y-m-d",strtotime($tglst)),
                'uraianst' => $uraianst,
                'tglmulaist' => date("Y-m-d",strtotime($tglst_mulai)),
                'tglselesaist' => date("Y-m-d",strtotime($tglst_selesai)),
                'idxskmpnen' => $idxskmpnen,
                'id_unit' => $beban_anggaran,
                'id_ttd' => $ttd,
                'is_approved1' => 0,
                'is_approved2' => 0,
                'is_approved3' => 0,
                'is_approved4' => 0
                
                );

            $kota = [];

            


            $this->SuratTugas->CRUD($data_st,'d_surattugas', $Trigger);

            $where = array('nost' => $nost);
            $cek = $this->SuratTugas->cek($where,'d_surattugas')->result_array();
        
                $data = array();    
                $j = 1;
                $ArrX = $this->input->post('ArrX');
                $urut = explode(",",$ArrX);
                $Nourut = []; 
                $total = [];
                $totaluangharian = 0;
                $totaluanginap = 0;
                $sum=0;
                
                for($i = 0 ; $i < $countTim; $i++){
                    
                       $data = array(
                            'nourut' => $this->input->post('urut'.$urut[$i].''),
                            'nama' => $this->input->post('nama'.$urut[$i].''),
                            'nip' => $this->input->post('nip'.$urut[$i].''),
                            'peran'  => $this->input->post('perjab'.$urut[$i].''),
                            'id_st' => $cek[0]['id']
                            
                       );

                       $data_ItemCS = array(
                        'nourut' => $this->input->post('urut'.$urut[$i].''),
                        'nama' => $this->input->post('nama'.$urut[$i].''),
                        'nip' => $this->input->post('nip'.$urut[$i].''),
                        'jabatan'  => $this->input->post('perjab'.$urut[$i].''),
                        'golongan'  => $this->input->post('gol'.$urut[$i].''),
                        'tglberangkat'  => date("Y-m-d",strtotime($this->input->post('tglberangkat'.$urut[$i].''))),
                        'tglkembali'  => date("Y-m-d",strtotime($this->input->post('tglkembali'.$urut[$i].''))),
                        'jmlhari'  => $this->input->post('jmlhari'.$urut[$i].''),
                        'kotaasal'  => $this->input->post('kotaasal'.$urut[$i].''),
                        'kotatujuan'  => $this->input->post('kotatujuan'.$urut[$i].''),

                        'tarifuangharian'  => $this->pregChar($this->input->post('tarifuangharian'.$urut[$i].'')),
                        'totaluangharian'  => $this->pregChar($this->input->post('uangharian'.$urut[$i].'')),
                        'tarifinap'  => $this->pregChar($this->input->post('tarifuangpenginapan'.$urut[$i].'')),
                        'totalinap'  => $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].'')),
                        // 'tarifrep'  => $this->pregChar("0"),
                        // 'totalrep'  => $this->pregChar("0"),
                        // 'taksiasal'  => $this->pregChar("0"),
                        // 'taksitujuan'  => $this->pregChar("0"),
                        // 'lain'  => $this->pregChar($this->input->post('gol'.$urut[$i].'')),
                        //'transport'  => 0,
                        // 'totaltravel'  => $this->pregChar($this->input->post('gol'.$urut[$i].'')),
                        // 'pengeluaranrill'  => $this->pregChar($this->input->post('gol'.$urut[$i].'')),

                        'jnstransportasi'  => $this->input->post('jnstransportasi'.$urut[$i].''),

                        'jumlah'  => $this->pregChar($this->input->post('total'.$urut[$i].'')),
                        
                        'id_st'  => $cek[0]['id'],
                        
                   );

                   $totaluangharian += $this->pregChar($this->input->post('uangharian'.$urut[$i].''));
                   $totaluanginap += $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].''));
                   $sum += $this->pregChar($this->input->post('uangharian'.$urut[$i].'')) + $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].''));

                //    $totaluangharian = $this->pregChar($this->input->post('uangharian'.$urut[$i].''));
                //    $totaluangpenginapan = $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].''));
                   //$totaluangpenginapan += $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].''));
                   

                //    $sumHarian +=$this->pregChar($this->input->post('totaluangharian'.$urut[$i].''));
                //    $sumInap += $this->pregChar($this->input->post('totalinap'.$urut[$i].''));
                //    $sumTransport += 0;

                //    $total[$i] += $this->pregChar($this->input->post('totaluangharian'.$urut[$i].'')) + $this->pregChar($this->input->post('totalinap'.$urut[$i].'')) + 0;
                //    $sum += $total[$i];

                        $this->db->insert('d_stdetail',$data);
                       $this->db->insert('d_itemcs',$data_ItemCS);
                }

                $data_cs = array(
                    'nost' => $cek[0]['id'],
                    'uraianst' => $uraianst,
                    'tglst' => date("Y-m-d",strtotime($tglst)),
                    'tujuanst' =>  $this->input->post('kotatujuan1'),
                    'totaluangharian' =>  $totaluangharian,
                    'totaluanginap ' =>  $totaluanginap,
                    'biaya' =>  $sum
                    );

                    
                    $this->db->insert('d_costsheet',$data_cs);
              
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

            $nost = $this->input->post('nost');
            $tglst = str_replace("/", "-",$this->input->post('tglst'));
            $uraianst = $this->input->post('uraianst');
            $tglst_mulai = str_replace("/", "-",$this->input->post('tglst_mulai'));
			$tglst_selesai = str_replace("/", "-",$this->input->post('tglst_selesai'));
			$idxskmpnen = $this->input->post('idxskmpnen');
			$beban_anggaran = $this->input->post('beban_anggaran');
			$ttd = $this->input->post('ttd');
            $countTim = $this->input->post('countTim');
            $idst = $this->input->post('idst');

            

            $data_st = array(
                'nost' => $nost,
                'tglst' => date("Y-m-d",strtotime($tglst)),
                'uraianst' => $uraianst,
                'tglmulaist' => date("Y-m-d",strtotime($tglst_mulai)),
                'tglselesaist' => date("Y-m-d",strtotime($tglst_selesai)),
                'idxskmpnen' => $idxskmpnen,
                'id_unit' => $beban_anggaran,
                'id_ttd' => $ttd,
                
                );
            $where = array('id' => $idst);

            $this->SuratTugas->Update($data_st,'d_surattugas', $where);

            ///DETAIL TIM///

            $where = array('id_st' => $idst);
            $this->SuratTugas->CRUD($where,'d_stdetail', 'D');
        
                $data = array();    
                $j = 0;
                $ArrX = $this->input->post('ArrX');
                $urut = explode(",",$ArrX);
                $Nourut = []; 

                
                for($i = 0 ; $i < $countTim; $i++){
                    
                    $data = array(
                         'nourut' => $this->input->post('urut'.$urut[$i].''),
                         'nama' => $this->input->post('nama'.$urut[$i].''),
                         'nip' => $this->input->post('nip'.$urut[$i].''),
                         'peran'  => $this->input->post('perjab'.$urut[$i].''),
                         'id_st' => $this->input->post('idst')
                         
                    );
                    $this->db->insert('d_stdetail',$data);
             }

        }else if($Trigger == "getRupiahTahapan"){

            $kdindex = $this->input->post('kdindex');
            //$where = array('kdindex' => $kdindex);
            $output = $this->SuratTugas->CRUD($kdindex,'d_detailapp', $Trigger);
            echo json_encode($output);

        }
        
    }

    public function Export(){
        $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8', 
        'format' => 'A4-P',
        'default_font_size' => 11,
        'default_font' => 'Arial Narrow',
        'margin_left' => 26,
        'margin_right' => 26,
        'margin_top' => 16,
        'margin_bottom' => 26,
        ]);
        $Assets			= $this->config->item('assets_url');
        $path           = '<img src='.$Assets.'app-assets/images/logo/bpkp.jpg>';
        $id             =  $this->uri->segment(4);
        $data['ubah']   = $this->SuratTugas->getDataUbah($id);
        $html = $this->load->view('Transaksi/SuratTugas/export.php',$data,true);

        $mpdf->WriteHTML($html);          
        $mpdf->Output('SuratTugas.pdf', 'I');
     
	
    }

}