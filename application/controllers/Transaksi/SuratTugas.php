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
        $this->load->model('Master/M_Master','Master');
	}

	public function index()
	{

		$this->load->view('Transaksi/SuratTugas/manage');
	}

    

    public function Page()
	{
        $kdsatker           =  $this->uri->segment(4);
        $unitid           =  $this->uri->segment(5);
        $roleid           =  $this->uri->segment(6);
        // $jumlah_data = $this->SuratTugas->Jum($kdsatker);
        // $config['base_url'] = base_url().'Transaksi/SuratTugas/Page/'.$kdsatker;
		// $config['total_rows'] = $jumlah_data;
		// $config['per_page'] = 10;

        // $config['first_url'] = '1';

        // $config['full_tag_open'] = "<ul class='pagination' >";
        // $config['full_tag_close'] = '</ul>';
        // $config['num_tag_open'] = '<li >';
        // $config['num_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li><a class="active" >';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['prev_tag_open'] = '<li >';
        // $config['prev_tag_close'] = '</li>';
        // $config['first_tag_open'] = '<li >';
        // $config['first_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li >';
        // $config['last_tag_close'] = '</li>';



        // $config['prev_link'] = '<i style="font-size: 0px !important" ></i> Previous';
        // $config['prev_tag_open'] = '<li >';
        // $config['prev_tag_close'] = '</li>';


        // $config['next_link'] = 'Next <i style="font-size: 0px !important" ></i>';
        // $config['next_tag_open'] = '<li >';
        // $config['next_tag_close'] = '</li>';


		// $from =  $this->uri->segment(3);
		// $this->pagination->initialize($config);
        // $data['SuratTugas'] = $this->SuratTugas->getDataNew($config['per_page'], $from, $kdsatker);
        $data['SuratTugas'] = $this->SuratTugas->getDataNew($kdsatker, $unitid, $roleid);
        $this->load->view('Transaksi/SuratTugas/manage',$data);
	}

	public function tambah()
	{   
        $kdsatker = $this->uri->segment(4);
        $unitid =$this->uri->segment(5);
        $roleid =$this->uri->segment(6);
        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unitid, $roleid);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unitid, $roleid);
		$this->load->view('Transaksi/SuratTugas/tambah', $data);
	}

    public function ubah()
	{   
        $a = $this->uri->segment(8);
        $kdindex = str_replace("%20", " ", $a);
        $id =  $this->uri->segment(4);
        $data['ubah'] = $this->SuratTugas->getDataUbah($kdindex, $id, 'Ubah_ST');
        $kdsatker = $this->uri->segment(5);
        $unitid =$this->uri->segment(6);
        $roleid =$this->uri->segment(7);
        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unitid, $roleid);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unitid, $roleid);
        
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
            $idxskmpnenlabel = $this->input->post('idxskmpnenlabel');
			$id_unit = $this->input->post('id_unit');
			$ttd = $this->input->post('ttd');

            $kdsatker = $this->input->post('kdsatker');
            
            $kdindex = $this->input->post('kdindex');
            $thang = $this->input->post('thang');
            $kdgiat = $this->input->post('kdgiat');
            $kdoutput = $this->input->post('kdoutput');
            $kdsoutput = $this->input->post('kdsoutput');
            $kdkmpnen = $this->input->post('kdkmpnen');
            $kdskmpnen = $this->input->post('kdskmpnen');
            $kdakun = $this->input->post('kdakun');
            $kdbeban = $this->input->post('kdbeban');
            $ppk_id = $this->input->post('ppk_id');
            $alokasi = $this->input->post('alokasi');
            $kdtahapan = $this->input->post('kdtahapan');
            $kdapp = $this->input->post('kdapp');

            //$countTim = $this->input->post('countTim');


            

            $data_st = array(
                'kdindex' => $idxskmpnen,
                'thang' => $thang,
                'kdgiat' => $kdgiat,
                'kdoutput' => $kdoutput,
                'kdsoutput' => $kdsoutput,
                'kdkmpnen' => $kdkmpnen,
                'kdskmpnen' => $kdskmpnen,
                'kdakun' => $kdakun,
                'kdbeban' => $kdbeban,
                'ppk_id' => $ppk_id,

                'nost' => $nost,
                'kdsatker' => $kdsatker,
                'tglst' => date("Y-m-d",strtotime($tglst)),
                'uraianst' => $uraianst,
                'tglmulaist' => date("Y-m-d",strtotime($tglst_mulai)),
                'tglselesaist' => date("Y-m-d",strtotime($tglst_selesai)),
                'jumlah_uang' => $alokasi,
                'jumlah_realisasi' => 0,
                'idxskmpnen' => $idxskmpnen,
                'idx_temp' => $idxskmpnenlabel,
                'id_unit' => $id_unit,
                'id_ttd' => $ttd,
                'id_tahapan' => $kdtahapan,
                'id_app' => $kdapp,
                
                
                );

            $this->SuratTugas->CRUD($data_st,'d_surattugas', $Trigger);
            
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
            $data = array('is_aktif' => 0);
            $this->db->where($where);
            $this->db->update('d_surattugas',$data);
            // $where2 = array('id_st' => $id);
            // $where3 = array('no_st' => $id);
	        //$this->SuratTugas->CRUD($where,'d_surattugas', $Trigger);
            // $this->SuratTugas->CRUD($where2,'d_itemcs', $Trigger);
            // $this->SuratTugas->CRUD($where3,'d_costsheet', $Trigger);

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
			$id_unit = $this->input->post('id_unit');
			$ttd = $this->input->post('ttd');
            $countTim = $this->input->post('countTim');
            $idst = $this->input->post('id_st');
            $idxskmpnenlabel = $this->input->post('idxskmpnenlabel');

            $kdsatker = $this->input->post('kdsatker');
            
            $kdindex = $this->input->post('idxskmpnen');
            $thang = $this->input->post('thang');
            $kdgiat = $this->input->post('kdgiat');
            $kdoutput = $this->input->post('kdoutput');
            $kdsoutput = $this->input->post('kdsoutput');
            $kdkmpnen = $this->input->post('kdkmpnen');
            $kdskmpnen = $this->input->post('kdskmpnen');
            $kdakun = $this->input->post('kdakun');
            $kdbeban = $this->input->post('kdbeban');
            $alokasi = $this->input->post('alokasi');
            $kdtahapan = $this->input->post('kdtahapan');
            $kdapp = $this->input->post('kdapp');
            //$countTim = $this->input->post('countTim');

            

            $data_st = array(
                'kdindex' => $idxskmpnen,
                'thang' => $thang,
                'kdgiat' => $kdgiat,
                'kdoutput' => $kdoutput,
                'kdsoutput' => $kdsoutput,
                'kdkmpnen' => $kdkmpnen,
                'kdskmpnen' => $kdskmpnen,
                'kdakun' => $kdakun,
                'kdbeban' => $kdbeban,
                'nost' => $nost,
                'tglst' => date("Y-m-d",strtotime($tglst)),
                'uraianst' => $uraianst,
                'tglmulaist' => date("Y-m-d",strtotime($tglst_mulai)),
                'tglselesaist' => date("Y-m-d",strtotime($tglst_selesai)),
                'jumlah_uang' => $alokasi,
                'idxskmpnen' => $idxskmpnen,
                'id_unit' => $id_unit,
                'idx_temp' => $idxskmpnenlabel,
                'id_ttd' => $ttd,
                'cs_menyetujui' => $this->input->post('cs_menyetujui'),
                'cs_mengajukan' => $this->input->post('cs_mengajukan'),
                'id_tahapan' => $kdtahapan,
                'id_app' => $kdapp,
                
                
                );
            $where = array('id' => $idst);

            $this->SuratTugas->Update($data_st,'d_surattugas', $where);

            ///DETAIL TIM///

            if($countTim > 0){

                $data = array();    
                $j = 1;
                $ArrX = $this->input->post('ArrX');
                $urut = explode(",",$ArrX);
                $Nourut = []; 
                $total = [];
                $totaluangharian = 0;
                $totaluanginap = 0;
                $sum=0;
                $totalRealisasi=0;

                    $this->db->where("id_st", $idst);
                    $this->db->delete("d_itemcs");


                
                for($i = 0 ; $i < $countTim; $i++){

                       $data_ItemCS = array(
                        'nourut' => $this->input->post('urut'.$urut[$i].''),
                        'nospd' => $this->input->post('nospd'.$urut[$i].''),
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
                        'tarifrep'  => $this->pregChar($this->input->post('uangrep'.$urut[$i].'')),
                        'totalrep'  => $this->pregChar($this->input->post('uangrep'.$urut[$i].'')),
                        'taksiasal'  => $this->pregChar("0"),
                        'taksitujuan'  => $this->pregChar("0"),
                        'lain'  => $this->pregChar($this->input->post('uangdll'.$urut[$i].'')),
                        'transport'  => $this->pregChar($this->input->post('uangtransportasi'.$urut[$i].'')),
                        'totaltravel'  => $this->pregChar($this->input->post('gol'.$urut[$i].'')),

                        'tariftaxi'  => $this->pregChar($this->input->post('uangtaxi'.$urut[$i].'')),
                        'tariflaut'  => $this->pregChar($this->input->post('uanglaut'.$urut[$i].'')),
                        'tarifudara'  => $this->pregChar($this->input->post('uangudara'.$urut[$i].'')),
                        'tarifdarat'  => $this->pregChar($this->input->post('uangdarat'.$urut[$i].'')),

                        'jnstransportasi'  => $this->input->post('jnstransportasi'.$urut[$i].''),

                        'jumlah'  => $this->pregChar($this->input->post('total'.$urut[$i].'')),
                        'id_ttd_spd'  => $this->input->post('ttd_spd'.$urut[$i].''),
                        'id_st' => $idst
                        
                   );

                   $totaluangharian += $this->pregChar($this->input->post('uangharian'.$urut[$j].''));
                   $totaluanginap += $this->pregChar($this->input->post('uangpenginapan'.$urut[$j].''));
                   $sum += $this->pregChar($this->input->post('uangharian'.$urut[$j].'')) + $this->pregChar($this->input->post('uangpenginapan'.$urut[$j].''));
                       $this->db->insert('d_itemcs',$data_ItemCS);$j++;
               

                $totalRealisasi += $this->pregChar($this->input->post('total'.$urut[$i].'')); 
                }

                // $cekRealisasi = $this->db->query("SELECT SUM(jumlah_realisasi) as jumlah_realisasi, id FROM d_surattugas where id = ".$idst."")->result_array();
                // $jumRealisasilalu = $cekRealisasi[0]['jumlah_realisasi'] + $totalRealisasi; 
                    $data_st = array(
                        'jumlah_realisasi' => $totalRealisasi
                    );

                    $where = array('id' => $idst);
                    $this->SuratTugas->Update($data_st,'d_surattugas', $where);

				
            	$cekCS = $this->db->query("select nost from d_costsheet where nost = ".$idst."")->result_array();

				if($cekCS > 0){

					$data_cs = array(
						'tujuanst' =>  $this->input->post('kotatujuan1'),
						'totaluangharian' =>  $totaluangharian,
						'totaluanginap ' =>  $totaluanginap,
						'biaya' =>  $sum
						);
						$this->db->where("nost", $idst);
						$this->db->update("d_costsheet",$data_cs);

				}else{

					$data_cs = array(
						'nost' => $idst,
						'uraianst' => $uraianst,
						'tglst' => date("Y-m-d",strtotime($tglst)),
						'tujuanst' =>  $this->input->post('kotatujuan1'),
						'totaluangharian' =>  $totaluangharian,
						'totaluanginap ' =>  $totaluanginap,
						'biaya' =>  $sum
						);
	
						
						$this->db->insert('d_costsheet',$data_cs);

				}
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
        'default_font_size' => 12,
        'default_font' => 'Arial',
        'margin_left' => 26,
        'margin_right' => 26,
        'margin_top' => 16,
        'margin_bottom' => 26,
        ]);
        $Assets			= $this->config->item('assets_url');
        $path           = '<img src='.$Assets.'app-assets/images/logo/bpkp.jpg>';
        $a              = $this->uri->segment(5);
        $kdindex        = str_replace("%20", " ", $a);
        $id        =  $this->uri->segment(4);
        $trigger        = "export";
        $data['ubah']   = $this->SuratTugas->getDataUbah($kdindex, $id, $trigger);
        


        if(count($data['ubah']) > 0){
            $html = $this->load->view('Transaksi/SuratTugas/export.php',$data,true);
            $mpdf->WriteHTML($html);          
            $mpdf->Output('SuratTugas.pdf', 'I');
        }else{
           ?> <script type="text/javascript">
                    setTimeout(function() {
                        window.close();
                        window.history.back();
                    }, 100);
                    
                    
                </script>
                <?php 
            
        }
	
    }

}