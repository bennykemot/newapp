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

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");

        if($role_id == 5 || $role_id == 7 || $role_id == 3){
            $penjab_id = $this->session->userdata("penjab_id");
          }else{
            $penjab_id = $user_id;
            
          }


        $jumlah_data = $this->SuratTugas->Jum($unit_id, $role_id, $penjab_id);
        $config['base_url'] = base_url().'Transaksi/SuratTugas/Page';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 15;

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
        if($from == 1){
            $from = 0;
        }
		$this->pagination->initialize($config);
        //$data['SuratTugas'] = $this->SuratTugas->getDataNew($config['per_page'], $from, $kdsatker);
        $data['SuratTugas'] = $this->SuratTugas->getDataNew($config['per_page'], $from,$kdsatker, $unit_id, $role_id, $penjab_id);
        $this->load->view('Transaksi/SuratTugas/manage',$data);
	}

	public function tambah()
	{   
        // $kdsatker = $this->uri->segment(4);
        // $unitid =$this->uri->segment(5);
        // $roleid =$this->uri->segment(6);

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");


        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unit_id, $role_id);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unit_id, $role_id);
		$this->load->view('Transaksi/SuratTugas/tambah', $data);
	}

    public function ubah()
	{   
        $a = $this->uri->segment(8);
        $kdindex = str_replace("%20", " ", $a);
        $id =  $this->uri->segment(4);
        $data['ubah'] = $this->SuratTugas->getDataUbah($kdindex, $id, 'Ubah_ST');
        $kdsatker = $this->uri->segment(5);

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");


        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unit_id, $role_id);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unit_id, $role_id);
        
		$this->load->view('Transaksi/SuratTugas/ubah',$data);
	}

    public function approve()
	{   
        $a = $this->uri->segment(8);
        $kdindex = str_replace("%20", " ", $a);
        $id =  $this->uri->segment(4);
        $data['ubah'] = $this->SuratTugas->getDataUbah($kdindex, $id, 'Ubah_ST');

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");


        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unit_id, $role_id);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unit_id, $role_id);
        
		$this->load->view('Transaksi/SuratTugas/Approve/manage',$data);
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
            $user_id = $this->input->post('user_id');

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
                'user_id' => $user_id,
                
                
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

            $status_st = $this->input->post('status_id');
            $idst = $this->input->post('id_st');
            if($status_st == 3){
                $this->SuratTugas->history($idst);
                $status_st = 4;
            }

            $nost = $this->input->post('nost');
            $tglst = str_replace("/", "-",$this->input->post('tglst'));
            $uraianst = $this->input->post('uraianst');
            $tglst_mulai = str_replace("/", "-",$this->input->post('tglst_mulai'));
			$tglst_selesai = str_replace("/", "-",$this->input->post('tglst_selesai'));
			$idxskmpnen = $this->input->post('idxskmpnen');
			$id_unit = $this->input->post('id_unit');
            $countTim = $this->input->post('countTim');
           
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

            
            $ttd = $this->input->post('ttd');
            $menyetujui = $this->input->post('cs_menyetujui');
            $mengajukan = $this->input->post('cs_mengajukan');

            

            

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
                'status_id' => $status_st,
                'tglst' => date("Y-m-d",strtotime($tglst)),
                'uraianst' => $uraianst,
                'tglmulaist' => date("Y-m-d",strtotime($tglst_mulai)),
                'tglselesaist' => date("Y-m-d",strtotime($tglst_selesai)),
                'jumlah_uang' => $alokasi,
                'idxskmpnen' => $idxskmpnen,
                'id_unit' => $id_unit,
                'idx_temp' => $idxskmpnenlabel,
                'id_ttd' => $ttd,
                'cs_menyetujui' => $menyetujui,
                'cs_mengajukan' => $mengajukan,
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
                $totaluangtransport = 0;

                    $this->db->where("id_st", $idst);
                    $this->db->delete("d_itemcs");


                
                for($i = 0 ; $i < $countTim; $i++){

                    $nip = $this->input->post('nip'.$urut[$i].'');
                    $jabatan = $this->input->post('perjab'.$urut[$i].'');
                    $golongan = $this->input->post('gol'.$urut[$i].'');
                    if($nip == "" || $nip == "null" || $nip == null){
                        $nip = "0";
                        $jabatan = " ";
                        $golongan = " ";

                    }
                    $totaluangtransport +=  $this->pregChar($this->input->post('uangdll'.$urut[$i].'')) + 
                                            $this->pregChar($this->input->post('uangtaxi'.$urut[$i].'')) +
                                            $this->pregChar($this->input->post('uanglaut'.$urut[$i].''))+ 
                                            $this->pregChar($this->input->post('uangudara'.$urut[$i].'')) +
                                            $this->pregChar($this->input->post('uangdarat'.$urut[$i].''));

                       $data_ItemCS = array(
                        'nourut' => $this->input->post('urut'.$urut[$i].''),
                        // 'nospd' => $this->input->post('nospd'.$urut[$i].''),
                        'nama' => $this->input->post('nama'.$urut[$i].''),
                        'nip' => $nip,
                        'jabatan'  => $jabatan,
                        'golongan'  =>  $golongan,
                        'tglberangkat'  => date("Y-m-d",strtotime($this->input->post('tglberangkat'.$urut[$i].''))),
                        'tglkembali'  => date("Y-m-d",strtotime($this->input->post('tglkembali'.$urut[$i].''))),
                        'jmlhari'  => $this->input->post('jmlhari'.$urut[$i].''),
                        'kotaasal'  => $this->input->post('kotaasal'.$urut[$i].''),
                        'kotatujuan'  => $this->input->post('kotatujuan'.$urut[$i].''),

                        'tarifuangharian'  => $this->pregChar($this->input->post('satuan_uangharian'.$urut[$i].'')),
                        'totaluangharian'  => $this->pregChar($this->input->post('uangharian'.$urut[$i].'')),
                        'tarifinap'  => $this->pregChar($this->input->post('satuan_uangpenginapan'.$urut[$i].'')),
                        'totalinap'  => $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].'')),
                        'tarifrep'  => $this->pregChar($this->input->post('uangrep'.$urut[$i].'')),
                        'totalrep'  => $this->pregChar($this->input->post('uangrep'.$urut[$i].'')),
                        'taksiasal'  => $this->pregChar("0"),
                        'taksitujuan'  => $this->pregChar("0"),
                        'lain'  => $this->pregChar($this->input->post('uangdll'.$urut[$i].'')),
                        'transport'  => $totaluangtransport,
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

                   $totaluangharian += $this->pregChar($this->input->post('uangharian'.$urut[$i].''));
                   $totaluanginap += $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].''));
                   
                   $sum += $totaluangharian + $totaluanginap + $totaluangtransport;
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

        }else if($Trigger == "Approve"){
            $status_st = $this->input->post('id_status');
            $status_st = $status_st + 1;

            $data_st = array(
                'status_id' => $status_st
            );

            $where = array('id' => $this->input->post('idst'));
            $this->SuratTugas->Update($data_st,'d_surattugas', $where);


        }
        
    }

    public function Export(){
        $mpdf = new \Mpdf\Mpdf([
        'tempDir' => sys_get_temp_dir().DIRECTORY_SEPARATOR.'mpdf',
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
		$kdunit        	= $this->uri->segment(6);
        $id        		= $this->uri->segment(4);
        $trigger        = "export";
        $data['ubah']   = $this->SuratTugas->getDataUbah($kdindex, $id, $trigger);
        $data['kop'] = $this->db->query("
						SELECT t_kopsurat.* FROM t_kopsurat

						JOIN t_unitkerja ON t_unitkerja.grup_id = t_kopsurat.kdunit
						
						WHERE t_unitkerja.id = ".$kdunit." ")->result_array();

        if(count($data['ubah']) > 0){
            $html = $this->load->view('Transaksi/SuratTugas/export.php',$data,true);

            if($data['ubah'][0]['status_id'] < 3){
                $mpdf->SetWatermarkText('DRAFT'); // Will cope with UTF-8 encoded text
                $mpdf->showWatermarkText = true; // Uses default font if left blank
            }
            
            $mpdf->WriteHTML($html);         
            $mpdf->Output('SuratTugas.pdf', 'I'); 
            //$mpdf->Output('SuratTugas.pdf', 'I');
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
