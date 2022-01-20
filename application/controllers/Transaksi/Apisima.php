<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Apisima extends CI_Controller {
    var $API = 'https://apip.bpkp.go.id/apisimabisma/public/';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->library('pdf');
        $this->load->model('Transaksi/M_SuratTugas','SuratTugas');
		$this->load->model('Transaksi/M_TambahTim','TambahTim');
        $this->load->model('Transaksi/M_Costsheet','Costsheet');
        $this->load->model('Master/M_Master','Master');
	}

    public function pregChar($str){
        $res = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        return (int)preg_replace('/[Rp]/', '', $res);
    }

    function getData($url,$uri){

        $client = new Client([
            'base_uri' => $url,
            'timeout'  => 5,
        ]);

         
        $response = $client->request('GET', $uri);
        return $response->getBody()->getcontents();
        //$result = json_decode($body,true);

    }

    function getData_Post($url,$uri,$kdsatker,$unit_id,$role_id,$penjab_id,$mulai,$selesai){

        $client = new Client([
            'base_uri' => $url,
            'timeout'  => 5,
        ]);
        $unit_id="";
        // if($role_id == 99){
        //     $unit_id = "";
        //     $kdsatker ="";
        // }else{
        //     if($role_id == 1){
        //         $unit_id = "";
        //     }else{
        //         if($kdsatker == 450491){
        //             if($role_id == 3 || $role_id == 2 || $role_id == 4 || $role_id == 9 || $role_id == 10){
        //                 $unit_id = $unit_id;
        //                 }else{
        //                     $unit_id = "";
        //                 }
        //         }else{
        //             if($role_id == 5 || $role_id == 7 || $role_id == 3 ){
        //                 $unit_id="";
        //             }else{
        //                 $unit_id = $unit_id;
        //             }
        //         }
        //     }
        // }

        $response = $client->request('POST', $uri, [
            'form_params' => [
                'id_st' => "",
                'kd_satker' => $kdsatker,
                'id_unit_kerja' => $unit_id,
                'tanggal_awal' => $mulai,
                'tanggal_akhir' => $selesai
            ]
            ]);

         
        //$response = $client->request('GET', $uri);
        return $response->getBody()->getcontents();

    }

    function Data(){

        $kdsatker = $this->session->userdata("kdsatker");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $user_id = $this->session->userdata("user_id");

        $mulai =  $this->input->post('tglst_mulai');
        $selesai =  $this->input->post('tglst_selesai');

        if($role_id == 5 || $role_id == 7 || $role_id == 3){
            $penjab_id = $this->session->userdata("penjab_id");
          }else{
            $penjab_id = $user_id;
            
          }

        
        $data = json_decode($this->getData_Post($this->API,'getdatadetil',$kdsatker,$unit_id,$role_id,$penjab_id,$mulai,$selesai), true); 
        $this->load->view('Transaksi/apisurattugas/manage',$data);
        // echo $data['data'][0]['sumber_data'];
        // var_dump($data['data'][0]['sumber_data']); 
    }

    function filterrAPI(){
        $mulai =  $this->input->post('tglst_mulai');
        $selesai =  $this->input->post('tglst_selesai');
        $trigger =  $this->input->post('trigger');
        $data = json_decode($this->getData($this->API,'getdatatanggalst/'.$mulai.'/'.$selesai.''), true); 
        
        $this->load->view('Transaksi/apisurattugas/manage', $data);

    }


    function Getcostsheet(){
        $id = $this->uri->segment(4);
        $trigger = $this->uri->segment(5);
        $kdsatker = $this->session->userdata("kdsatker"); 
        
        $data['costsheet']= $this->Costsheet->getData($id,$trigger, $kdsatker);

        if($id == 0){
            $data['result']= "All";
        }else{
            $data['result']= "Detail";
        }

        if(count($data['costsheet']) > 0){
            
            $this->load->view('Transaksi/Costsheet/All/manage', $data);
        }else{
            ?> <script type="text/javascript">
                    alert("Data Tidak Ada !");
                    setTimeout(function() {
                        window.close();
                        window.history.back();
                    }, 100);
                    
                    
                </script>
                <?php 
        }



    }

    function Getcostsheetdetail(){
        $id = $this->uri->segment(4);
        $trigger = $this->uri->segment(5);
        $data['costsheet']= $this->Costsheet->getData($id,$trigger);
        

        //print_r ($data['costsheet'][0]->nost);

        
        $this->load->view('Transaksi/Costsheet/'.$trigger.'/manage', $data);

    }

    function tambahtimAPI(){
        $id = $this->uri->segment(4);

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");


        $data = json_decode($this->getData($this->API,'getdatast/'.$id.''), true); 
        //$ro = str_replace(".","",$data['data'][0]['ro_kode']);
        $text = explode(".",$data['data'][0]['ro_kode']);
        unset($text[7]);
        $res = implode("",$text);
        //var_dump($data);
        $data['subkomp'] = $this->Master->APIsubkomp($res, $kdsatker, $unit_id, $role_id);
        $data['subkomp_pagu'] = $this->Master->APISubkomp_pagu($res, $kdsatker, $unit_id, $role_id);
        $data['countST'] = $this->db->query("select id_st from d_itemcs where id_st = ".$id."")->result();
        $data['countdata'] = count($data['data']);
        $data['lok'] = $this->db->query("select kdkabkota, kdlokasi from t_satker where kdsatker = ".$kdsatker."")->result();

        // echo count($data['data']);
        
        //$data['subkomppagu'] = $this->Master->APIsubkomppagu($ro);
        $this->load->view('Transaksi/Costsheet/Add/manage', $data);

    }

    public function ubah()
	{   
        $a = $this->uri->segment(8);
        $kdindex = str_replace("%20", " ", $a);
        $id =  $this->uri->segment(4);
        $data['ubah'] = $this->Costsheet->getData_Ubah($kdindex, $id, 'Ubah_ST','');
        $kdsatker = $this->uri->segment(5);

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");

        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unit_id, $role_id);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unit_id, $role_id);

        //var_dump($data['ubah']);
        
		$this->load->view('Transaksi/Costsheet/Edit/manage',$data);
	}

    public function approve()
	{   
        $idcs = $this->uri->segment(8);
        $dataFrom = $this->uri->segment(10);
        // $kdindex = str_replace("%20", " ", $a);
        $id =  $this->uri->segment(4);
        $data['cTim'] = $this->db->query("SELECT id from d_itemcs where id_st = ".$id."")->result();
        if(Count($data['cTim']) > 0){
        $data['ubah'] = $this->Costsheet->getData_Approve($idcs, $id, 'Ubah_ST',$dataFrom);

        //if($kdsatker == 450491){
        //    echo count($data['ubah']);
        //}

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");


        $data['subkomp'] = $this->Master->getKomponenSub($kdsatker, $unit_id, $role_id);
        $data['subkomppagu'] = $this->Master->getKomponenSub_pagu($kdsatker, $unit_id, $role_id);
        
		$this->load->view('Transaksi/Costsheet/Approve/manage',$data);
        }else{
            ?> <script type="text/javascript">
                    alert("Belum Ada Tim !");
                    setTimeout(function() {
                        window.close();
                        window.history.back();
                    }, 100);
                    
                    
                </script>
                <?php 
        }
	}

    
    function ActionAPI()
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
            $user_id =$this->session->userdata("user_id");
            $status_penandatangan = 0;
            $idst = $this->input->post("id_st");

            $countTim = $this->input->post('countTim');

            $data_st = array(
                'id_st' => $idst,
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
                'status_penandatangan' => $status_penandatangan,
                'id_tahapan' => $kdtahapan,
                'id_app' => $kdapp,
                'user_id' => $user_id,
                'cs_menyetujui' => $this->input->post('cs_menyetujui'),
                'cs_mengajukan' => $this->input->post('cs_mengajukan')
                
                
                
                );

            $CekST = $this->db->query("SELECT count(id) as idcount from d_surattugas where id_st = ".$idst."")->result();
            //$this->SuratTugas->CRUD($data_st,'d_surattugas', $Trigger);

            if($CekST[0]->idcount > 0){
                //echo "lebih dr 1";
                $this->SuratTugas->history($idst);
                $whereST = array('id_st'=>$idst);
                $this->db->where($whereST);
                $this->db->update('d_surattugas',$data_st);
                // $this->SuratTugas->history($idst);
                // $this->SuratTugas->CRUD($data_st,'d_surattugas', "U");
            }else{
                //echo "halo";
                $this->SuratTugas->CRUD($data_st,'d_surattugas', $Trigger);
            }

            
            

            ///DETAIL TIM///

            if($countTim > 0){

                $data = array();    
                $j = 1;
                $totaluangharian = 0;
                $totaluanginap = 0;
                $sum=0;
                $totalRealisasi=0;
                $totaluangtransport = 0;

                    
                    for($i = 1 ; $i <= $countTim; $i++){

                        
                        $nip = $this->input->post('nip'.$i.'');
                        $jabatan = $this->input->post('perjab'.$i.'');
                        $golongan = $this->input->post('gol'.$i.'');
    
                           $totaluangtransport += $this->pregChar($this->input->post('uangdll'.$i.'')) + $this->pregChar($this->input->post('uangtaxi'.$i.''))
                                                + $this->pregChar($this->input->post('uanglaut'.$i.''))+ $this->pregChar($this->input->post('uangudara'.$i.''))
                                                + $this->pregChar($this->input->post('uangdarat'.$i.''));
                            $transport = $this->pregChar($this->input->post('uangdll'.$i.'')) + 
                                        $this->pregChar($this->input->post('uangtaxi'.$i.'')) +
                                        $this->pregChar($this->input->post('uanglaut'.$i.''))+ 
                                        $this->pregChar($this->input->post('uangudara'.$i.'')) +
                                        $this->pregChar($this->input->post('uangdarat'.$i.''));
    
                           $data_ItemCS = array(
                            'id_tim' => $this->input->post('idtim'.$i.''),
                            'nourut' => $this->input->post('urut'.$i.''),
                            'nospd' => $this->input->post('nospd'.$i.''),
                            'nama' => $this->input->post('nama'.$i.''),
                            'nip' => $nip,
                            'jabatan'  => $jabatan,
                            'golongan'  =>  $golongan,
                            'tglberangkat'  => date("Y-m-d",strtotime($this->input->post('tglberangkat'.$i.''))),
                            'tglkembali'  => date("Y-m-d",strtotime($this->input->post('tglkembali'.$i.''))),
                            'jmlhari'  => $this->input->post('jmlhari'.$i.''),
                            'kotaasal'  => $this->input->post('kotaasal'.$i.''),
                            'kotatujuan'  => $this->input->post('kotatujuan'.$i.''),
    
                            'tarifuangharian'  => $this->pregChar($this->input->post('satuan_uangharian'.$i.'')),
                            'totaluangharian'  => $this->pregChar($this->input->post('uangharian'.$i.'')),
                            'tarifinap'  => $this->pregChar($this->input->post('satuan_uangpenginapan'.$i.'')),
                            'totalinap'  => $this->pregChar($this->input->post('uangpenginapan'.$i.'')),
                            'tarifrep'  => $this->pregChar($this->input->post('uangrep'.$i.'')),
                            'totalrep'  => $this->pregChar($this->input->post('uangrep'.$i.'')),
                            'taksiasal'  => $this->pregChar("0"),
                            'taksitujuan'  => $this->pregChar("0"),
                            'lain'  => $this->pregChar($this->input->post('uangdll'.$i.'')),
                            'transport'  => $transport,
                            'totaltravel'  => $this->pregChar($this->input->post('gol'.$i.'')),
    
                            'tariftaxi'  => $this->pregChar($this->input->post('uangtaxi'.$i.'')),
                            'tariflaut'  => $this->pregChar($this->input->post('uanglaut'.$i.'')),
                            'tarifudara'  => $this->pregChar($this->input->post('uangudara'.$i.'')),
                            'tarifdarat'  => $this->pregChar($this->input->post('uangdarat'.$i.'')),
    
                            'pengeluaranrill'  => $this->pregChar($this->input->post('gol'.$i.'')),
    
                            'jnstransportasi'  => $this->input->post('jnstransportasi'.$i.''),
    
                            'jumlah'  => $this->pregChar($this->input->post('total'.$i.'')),
                            'id_ttd_spd'  => $this->input->post('ttd_spd'.$i.''),
                            
                            'id_st'  => $idst,
                            'id_cs'  => $idst.'-',
                            
                            );
    
                       $totaluangharian += $this->pregChar($this->input->post('uangharian'.$i.''));
                       $totaluanginap += $this->pregChar($this->input->post('uangpenginapan'.$i.''));
                       
                       $sum +=  $this->pregChar($this->input->post('uangharian'.$i.'')) + 
                                $this->pregChar($this->input->post('uangpenginapan'.$i.'')) +
                                $this->pregChar($this->input->post('uangdll'.$i.'')) + 
                                        $this->pregChar($this->input->post('uangtaxi'.$i.'')) +
                                        $this->pregChar($this->input->post('uanglaut'.$i.''))+ 
                                        $this->pregChar($this->input->post('uangudara'.$i.'')) +
                                        $this->pregChar($this->input->post('uangdarat'.$i.''));
    
    
                            $this->db->insert('d_itemcs',$data_ItemCS);
                            $j = $i;
                       $totalRealisasi += $this->pregChar($this->input->post('total'.$i.'')); 
                    }

                    $cekIdCS = $this->db->query("SELECT MAX(id_cs) as idcs FROM d_itemcs where id_st = ".$idst."")->result();
                    $a = explode("-",$cekIdCS[0]->idcs);
                    $IDCS = $a[1] + 1;

                    $data_ics = array(
                        'id_cs' => $idst.'-'.$IDCS
                    );
                    $whereICS = array('id_st' => $idst, 'id_cs' => $idst.'-');

                    $this->db->where($whereICS);
					$this->db->update("d_itemcs",$data_ics);

    
                    $cekRealisasi = $this->db->query("SELECT SUM(jumlah_realisasi) as jumlah_realisasi, id FROM d_surattugas where id_st = ".$idst."")->result_array();
                    $jumRealisasilalu = $cekRealisasi[0]['jumlah_realisasi'] + $totalRealisasi; 
                        $data_st = array(
                            'jumlah_realisasi' => $jumRealisasilalu
                        );
    
                        $where = array('id_st' => $idst);
                        $this->SuratTugas->Update($data_st,'d_surattugas', $where);
    
                        $alokasi = $this->input->post('alokasi');
                        $sisa = $alokasi - $jumRealisasilalu;
    
                        $data_tpagu = array('kdindex' => $this->input->post('idxskmpnen'),
                        'app' =>$this->input->post('kdapp'),
                        'tahapan' => $this->input->post('kdtahapan'),
                        'pagu' => $alokasi,
                        'realisasi' => $jumRealisasilalu,
                        'sisa' => $sisa
                        );
    
                        $this->db->insert('t_pagu',$data_tpagu);
    
                        $data_cs = array(
                            'nost' => $nost,
                            'id_cs' => $idst.'-'.$IDCS,
                            'id_st' => $idst,
                            'uraianst' => $uraianst,
                            'tglst' => date("Y-m-d",strtotime($tglst)),
                            'tujuanst' =>  $this->input->post('kotatujuan'.$j.''),
                            'totaluangharian' =>  $totaluangharian,
                            'totaluanginap ' =>  $totaluanginap,
                            'biaya' =>  $sum,
                            'from_data' =>  "api"
                            );
        
                            
                        $this->db->insert('d_costsheet',$data_cs);
    
                        $where = array('id_st' => $idst);
                        $this->SuratTugas->Update($data_st,'d_surattugas', $where);

            }

        }
            
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
		$id_st           =  $this->uri->segment(7);
        $id_cs           =  $this->uri->segment(6);
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
			$a              = $this->uri->segment(8);
        	$kdindex        = str_replace("%20", " ", $a);

			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);
			$data['cs']= $this->Costsheet->getData_costsheet($id_st, $kdindex,$id_cs);

            //echo $data['export'][0]->nost;
            //var_dump($data['export']);
			// if(count($data['export']) > 0){
			$html = $this->load->view('Transaksi/Costsheet/ExportViews/Costsheet.php',$data,true);
			$name = "Costsheet.pdf";
			// 	}else{
			// 	$this->Error_exp();
			// }

			
		}else if($trigger == "spd"){
			//$kdsatker = $this->session->userdata('kdsatker');
			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/SPD.php',$data,true);
			$name = "SPD.pdf";
				}else{
				$this->Error_exp();
			}
			

		}else if($trigger == "spd_back"){

			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/SPDBack.php',$data,true);
				$name = "SPD-Back.pdf";
				}else{
				$this->Error_exp();
			}

		}else if($trigger == "kwitansi"){
			$data['bendahara'] = $this->Costsheet->getBendahara_export($kdsatker,$unitId);

			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Kwitansi.php',$data,true);
				$name = "Kwitansi.pdf";
				}else{
				$this->Error_exp();
			}
		}else if($trigger == "rincian_biaya"){
			$data['bendahara'] = $this->Costsheet->getBendahara_export($kdsatker,$unitId);

			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);
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

			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);
			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Pengeluaranrill.php',$data,true);
			$name = "Pengeluaran-Rill.pdf";
				}else{
				$this->Error_exp();
			}
			
		}else if($trigger == "nominatif"){
			$data['bendahara'] = $this->Costsheet->getBendahara_export($kdsatker,$unitId);

			$data['export']= $this->Costsheet->getData_export($trigger,$id_st,$id_cs);

			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Nominatif.php',$data,true);
				$name = "Nominatif.pdf";
				}else{
				$this->Error_exp();
			}
			
		}else if($trigger == "perhitungan_rampung"){

			
			$data['export']= $this->NotaDinas->getData_export($trigger,$id_st,$id_cs);

			if(count($data['export']) > 0){
				$html = $this->load->view('Transaksi/ExportViews/Perhitunganrampung.php',$data,true);
				$name = "Perhitungan-Rampung.pdf";
				}else{
				$this->Error_exp();
			}
			
		}
		// if($data['export'][0]->status_id < 3){
		// 	$mpdf->SetWatermarkText('DRAFT'); // Will cope with UTF-8 encoded text
		// 	$mpdf->showWatermarkText = true; // Uses default font if left blank
		// }
        ini_set("pcre.backtrack_limit", "5000000");
        $mpdf->WriteHTML($html);          
        $mpdf->Output($name, 'I');
     
	
    }

}