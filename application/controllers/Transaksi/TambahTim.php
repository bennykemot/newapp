<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class TambahTim extends CI_Controller {
    var $API = 'https://apip.bpkp.go.id/apisimabisma/public/';

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->library('pdf');
        $this->load->model('Transaksi/M_SuratTugas','SuratTugas');
		$this->load->model('Transaksi/M_TambahTim','TambahTim');
        $this->load->model('Master/M_Master','Master');
	}

	public function TambahTim()
	{
        $id = $this->uri->segment(4);
        $a = $this->uri->segment(5);
        $kdindex = str_replace("%20", " ", $a);
        $trigger = "Tambah_Tim";
        $data['ST'] = $this->SuratTugas->getDataUbah($kdindex, $id,$trigger);
        //$data['ubah'] = $this->SuratTugas->getDataUbah($kdindex, $id, 'Ubah_ST');
        $data['countST'] = $this->db->query("select id_st from d_itemcs where id_st = ".$id."")->result();
		$this->load->view('Transaksi/SuratTugas/TambahTim/manage', $data);
	}

    function tambahtimAPI(){
        $id = $this->uri->segment(4);

        $kdsatker = $this->session->userdata("kdsatker");
        $thang = $this->session->userdata("thang");
        $user_id = $this->session->userdata("user_id");
        $role_id = $this->session->userdata("role_id");
        $unit_id = $this->session->userdata("unit_id");
        $username = $this->session->userdata("username");


        $data = json_decode($this->getId($this->API,'getdatast/'.$id.''), true); 
        $ro = str_replace(".","",$data['data'][0]['ro_kode']);
        //var_dump($data);
        $data['subkomp'] = $this->Master->APIsubkomp($ro, $kdsatker, $unit_id, $role_id);
        $data['subkomp_pagu'] = $this->Master->APISubkomp_pagu($ro, $kdsatker, $unit_id, $role_id);
        $data['countST'] = $this->db->query("select id_st from d_itemcs where id_st = ".$id."")->result();
        $data['countdata'] = count($data['data']);
        $data['lok'] = $this->db->query("select kdkabkota, kdlokasi from t_satker where kdsatker = ".$kdsatker."")->result();

        // echo count($data['data']);
        
        //$data['subkomppagu'] = $this->Master->APIsubkomppagu($ro);
        $this->load->view('Transaksi/Costsheet/manage', $data);

    }

    

    function getId($url,$uri){

        $client = new Client([
            'base_uri' => $url,
            'timeout'  => 5,
        ]);

         
        $response = $client->request('GET', $uri);
        return $response->getBody()->getcontents();
        //$result = json_decode($body,true);

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
                'jumlah_realisasi' => $jumRealisasilalu,
                'cs_menyetujui' => $this->input->post('cs_menyetujui'),
                'cs_mengajukan' => $this->input->post('cs_mengajukan')
                
                
                
                );

            $this->SuratTugas->CRUD($data_st,'d_surattugas', $Trigger);

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

                
                
                for($i = 1 ; $i <= $countTim; $i++){

                    $nip = $this->input->post('nip'.$i.'');
                    $jabatan = $this->input->post('perjab'.$i.'');
                    $golongan = $this->input->post('gol'.$i.'');
                    $totaluangtransport +=  $this->pregChar($this->input->post('uangdll'.$i.'')) + 
                                            $this->pregChar($this->input->post('uangtaxi'.$i.'')) +
                                            $this->pregChar($this->input->post('uanglaut'.$i.''))+ 
                                            $this->pregChar($this->input->post('uangudara'.$i.'')) +
                                            $this->pregChar($this->input->post('uangdarat'.$i.''));

                    $transport = $this->pregChar($this->input->post('uangdll'.$i.'')) + 
                                    $this->pregChar($this->input->post('uangtaxi'.$i.'')) +
                                    $this->pregChar($this->input->post('uanglaut'.$i.''))+ 
                                    $this->pregChar($this->input->post('uangudara'.$i.'')) +
                                    $this->pregChar($this->input->post('uangdarat'.$i.''));

                       $data_ItemCS = array(
                        'nourut' => $i,
                        'nospd' => $this->input->post('nospd'.$i.'') . $this->input->post('nospdST'.$i.''),
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

                        'jnstransportasi'  => $this->input->post('jnstransportasi'.$i.''),

                        'jumlah'  => $this->pregChar($this->input->post('total'.$i.'')),
                        'id_ttd_spd'  => $this->input->post('ttd_spd'.$i.''),
                        'id_st' => $idst
                        
                   );

                   $totaluangharian += $this->pregChar($this->input->post('uangharian'.$i.''));
                   $totaluanginap += $this->pregChar($this->input->post('uangpenginapan'.$i.''));
                   
                   $sum += $totaluangharian + $totaluanginap + $totaluangtransport;
                       $this->db->insert('d_itemcs',$data_ItemCS);
                    
               

                $totalRealisasi += $this->pregChar($this->input->post('total'.$i.'')); 
                $j++;
                }
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


        }
            
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
            $ttd_spd = $this->input->post('ttd_spd');
			$idst = $this->input->post('id_st');
			$uraianst = $this->input->post('uraianst');
			$countTim = $this->input->post('countTim');
			$tglst = str_replace("/", "-",$this->input->post('tglst'));

            
                $data = array();    
                $j = 1;
                $ArrX = $this->input->post('ArrX');
                $urut = explode(",",$ArrX);
                $Nourut = []; 
                $total = [];
                $totaluangharian = 0;
                $totaluanginap = 0;
                $totaluangtransport = 0;
                $sum=0;
                $totalRealisasi = 0;

                
                for($i = 0 ; $i < $countTim; $i++){
                    $nip = $this->input->post('nip'.$urut[$i].'');
                    $jabatan = $this->input->post('perjab'.$urut[$i].'');
                    $golongan = $this->input->post('gol'.$urut[$i].'');
                    if($nip == "" || $nip == "null" || $nip == null){
                        $nip = "0";
                        $jabatan = " ";
                        $golongan = " ";

                    }

                       $totaluangtransport += $this->pregChar($this->input->post('uangdll'.$urut[$i].'')) + $this->pregChar($this->input->post('uangtaxi'.$urut[$i].''))
                                            + $this->pregChar($this->input->post('uanglaut'.$urut[$i].''))+ $this->pregChar($this->input->post('uangudara'.$urut[$i].''))
                                            + $this->pregChar($this->input->post('uangdarat'.$urut[$i].''));
                        $transport = $this->pregChar($this->input->post('uangdll'.$urut[$i].'')) + 
                                    $this->pregChar($this->input->post('uangtaxi'.$urut[$i].'')) +
                                    $this->pregChar($this->input->post('uanglaut'.$urut[$i].''))+ 
                                    $this->pregChar($this->input->post('uangudara'.$urut[$i].'')) +
                                    $this->pregChar($this->input->post('uangdarat'.$urut[$i].''));

                       $data_ItemCS = array(
                        'nourut' => $this->input->post('urut'.$urut[$i].''),
                        'nospd' => $this->input->post('nospd'.$urut[$i].''),
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
                        'transport'  => $transport,
                        'totaltravel'  => $this->pregChar($this->input->post('gol'.$urut[$i].'')),

                        'tariftaxi'  => $this->pregChar($this->input->post('uangtaxi'.$urut[$i].'')),
                        'tariflaut'  => $this->pregChar($this->input->post('uanglaut'.$urut[$i].'')),
                        'tarifudara'  => $this->pregChar($this->input->post('uangudara'.$urut[$i].'')),
                        'tarifdarat'  => $this->pregChar($this->input->post('uangdarat'.$urut[$i].'')),

                        'pengeluaranrill'  => $this->pregChar($this->input->post('gol'.$urut[$i].'')),

                        'jnstransportasi'  => $this->input->post('jnstransportasi'.$urut[$i].''),

                        'jumlah'  => $this->pregChar($this->input->post('total'.$urut[$i].'')),
                        'id_ttd_spd'  => $this->input->post('ttd_spd'.$urut[$i].''),
                        
                        'id_st'  => $idst,
                        
                   );

                   $totaluangharian += $this->pregChar($this->input->post('uangharian'.$urut[$i].''));
                   $totaluanginap += $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].''));
                   
                   $sum +=  $totaluangharian + $totaluangharian + $totaluangtransport;

                        $this->db->insert('d_itemcs',$data_ItemCS);
                        $j = $urut[$i];
                   $totalRealisasi += $this->pregChar($this->input->post('total'.$urut[$i].'')); 
                }

                $cekRealisasi = $this->db->query("SELECT SUM(jumlah_realisasi) as jumlah_realisasi, id FROM d_surattugas where id = ".$idst."")->result_array();
                $jumRealisasilalu = $cekRealisasi[0]['jumlah_realisasi'] + $totalRealisasi; 
                    $data_st = array(
                        'jumlah_realisasi' => $jumRealisasilalu,
                        'cs_menyetujui' => $this->input->post('cs_menyetujui'),
                        'cs_mengajukan' => $this->input->post('cs_mengajukan')
                    );

                    $where = array('id' => $idst);
                    $this->SuratTugas->Update($data_st,'d_surattugas', $where);

                    $alokasi = $this->input->post('alokasi');

                    $sisa = $alokasi - $jumRealisasilalu;

                    $data_tpagu= array('kdindex' => $this->input->post('idxskmpnen'),
                    'app' =>$this->input->post('kdapp'),
                    'tahapan' => $this->input->post('kdtahapan'),
                    'pagu' => $alokasi,
                    'realisasi' => $jumRealisasilalu,
                    'sisa' => $sisa
                    );

                    $this->db->insert('t_pagu',$data_tpagu);

					$data_cs = array(
						'nost' => $idst,
						'uraianst' => $uraianst,
						'tglst' => date("Y-m-d",strtotime($tglst)),
						'tujuanst' =>  $this->input->post('kotatujuan'.$j.''),
						'totaluangharian' =>  $totaluangharian,
						'totaluanginap ' =>  $totaluanginap,
						'biaya' =>  $sum
						);
	
						
						$this->db->insert('d_costsheet',$data_cs);
                
              
                //$this->db->insert_batch('d_stdetail', $data);
             
            
        }
    }
}