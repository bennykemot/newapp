<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TambahTim extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array("url", "form"));
        $this->load->library('pagination');
        $this->load->library('pdf');
        $this->load->model('Transaksi/M_SuratTugas','SuratTugas');
		$this->load->model('Transaksi/M_TambahTim','TambahTim');
	}

	public function TambahTim()
	{
        $id = $this->uri->segment(4);
        $a = $this->uri->segment(5);
        $kdindex = str_replace("%20", " ", $a);
        $trigger = "Tambah_Tim";
        $data['ST'] = $this->SuratTugas->getDataUbah($kdindex, $id,$trigger);
        $data['countST'] = $this->db->query("select id_st from d_itemcs where id_st = ".$id."")->result();
		$this->load->view('Transaksi/SuratTugas/TambahTim/manage', $data);
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

                $data_st = array(
                    'id_ttd_spd' => $ttd_spd
                    );
                $where = array('id' => $idst);
    
                $this->SuratTugas->Update($data_st,'d_surattugas', $where);
    
                
                for($i = 0 ; $i < $countTim; $i++){
                    
                       $data = array(
                            'nourut' => $this->input->post('urut'.$urut[$i].''),
                            'nama' => $this->input->post('nama'.$urut[$i].''),
                            'nip' => $this->input->post('nip'.$urut[$i].''),
                            'peran'  => $this->input->post('perjab'.$urut[$i].''),
                            'id_st' => $idst
                            
                       );

                       $totaluangtransport += $this->pregChar($this->input->post('uangdll'.$urut[$i].'')) + $this->pregChar($this->input->post('uangtaxi'.$urut[$i].''))
                                            + $this->pregChar($this->input->post('uanglaut'.$urut[$i].''))+ $this->pregChar($this->input->post('uangudara'.$urut[$i].''))
                                            + $this->pregChar($this->input->post('uangdarat'.$urut[$i].''));

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
                        'transport'  => $totaluangtransport,
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
                   
                   $sum +=  $this->pregChar($this->input->post('uangharian'.$urut[$i].'')) + 
                            $this->pregChar($this->input->post('uangpenginapan'.$urut[$i].'')) 
                            + $this->pregChar($this->input->post('uangdll'.$urut[$i].'')) + $this->pregChar($this->input->post('uangtaxi'.$urut[$i].''))
                            + $this->pregChar($this->input->post('uanglaut'.$urut[$i].''))+ $this->pregChar($this->input->post('uangudara'.$urut[$i].''))
                            + $this->pregChar($this->input->post('uangdarat'.$urut[$i].''));

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
                        $j = $urut[$i];
                }

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