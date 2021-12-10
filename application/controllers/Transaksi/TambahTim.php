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
        $trigger = "Tambah_Tim";
        $data['ST'] = $this->SuratTugas->getDataUbah($id,$trigger);
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
                $sum=0;
                
                for($i = 0 ; $i < $countTim; $i++){
                    
                       $data = array(
                            'nourut' => $this->input->post('urut'.$urut[$i].''),
                            'nama' => $this->input->post('nama'.$urut[$i].''),
                            'nip' => $this->input->post('nip'.$urut[$i].''),
                            'peran'  => $this->input->post('perjab'.$urut[$i].''),
                            'id_st' => $idst
                            
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
                        
                        'id_st'  => $idst,
                        
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
                
              
                //$this->db->insert_batch('d_stdetail', $data);
             
            
        }
	}
}