<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_Mappingapp extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("datatables");
		$this->load->model('Anggaran/M_Detail_Mappingapp','detail_Mappingapp');
	}

	public function index()
	{
		$this->load->view('Anggaran/Mappingapp/manage');
	}

    public function getMappingApp_detail()
    {
		$a = $this->input->post('kdindex');
        $kdindex = str_replace("%20", " ", $a);
        
        $data = array();
        $no = $_POST['start'];
        $list = $this->detail_Mappingapp->get_datatables($kdindex);
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row['id'] = $customers->id;
            $row['id_app'] = $customers->id_app;
            $row['nama_app'] = $customers->nama_app;
			$row['rupiah'] = $customers->rupiah;
            $row['nama_tahapan'] = $customers->nama_tahapan;
            $row['rupiah_tahapan'] = $customers->rupiah_tahapan;
			$row['kdindex'] = $customers->kdindex;
            $row['th_pkpt'] = $customers->th_pkpt;
            $row['jumlah'] = $customers->jumlah;
            $row['realisasi'] = $customers->realisasi;
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        // "recordsTotal" => $this->detail_Mappingapp->count_all($kdindex),
                        // "recordsFiltered" => $this->detail_Mappingapp->count_filtered($kdindex),
                        "data" => $list,
                );
        echo json_encode($output);
    }

    public function Action()
    {

        $Trigger = $this->input->post('Trigger');
        
        if($Trigger == "C"){
            
            $nilaiakun = $this->input->post('nilaiakun');
            $th_pkpt = $this->input->post('th_pkpt');
            $kodeindex = str_replace("%20", " ", $this->input->post('kdindex'));
            $app = $this->input->post('app');
            $countRupiah = $this->input->post('countRupiah');
            $kdkmpnen = $this->input->post('kdkmpnen');
            $kdskmpnen = str_replace("%20", " ", $this->input->post('kdskmpnen'));
            $where = array('id_app' => $app, 'kdindex' => $kodeindex);

            $cek = $this->detail_Mappingapp->cek($where,'d_detailapp')->result_array();

            
            

            //if(count($cek) == 0){

                if( $kdkmpnen == "051" && $kdskmpnen ==" A" || $kdkmpnen == "052" && $kdskmpnen ==" A" || $kdkmpnen == "052" && $kdskmpnen ==" C"){

                    $data = array();
                    $dataU = array();    
                    $j = 1;
                    for($i = 0 ; $i < $countRupiah; $i++){
                        $wheretahapan = array(  'kdindex'=>$kodeindex,
                                                'id_app'=>$app,
                                                'tahapan' => $this->input->post('tahapan'.$j.''));
                        $cektahapan = $this->db->get_where('d_detailapp',$wheretahapan)->result_array();


                        if($this->input->post('rupiah'.$j.'') != ""){

                            if(count($cektahapan)>0){
                                $whereU = array('id_app' => $app, 'kdindex' => $kodeindex, 'tahapan' => $this->input->post('tahapan'.$j.''),);
                                $dataU = array('rupiah_tahapan' => $this->input->post('rupiah'.$j.''));
                                $this->db->update('d_detailapp', $dataU, $whereU); 
                            }else{
                            $dataDetail =array(
                                'id_app' => $app,
                                'rupiah' => $nilaiakun,
                                'kdindex' => $kodeindex,
                                'th_pkpt' => $th_pkpt,
                                'tahapan' => $this->input->post('tahapan'.$j.''),
                                'rupiah_tahapan'  => $this->input->post('rupiah'.$j.'')
                                
                                );
                                $this->db->insert('d_detailapp', $dataDetail);
                            }
                        }
                        //     $where = array('id_app' => $app, 'kdindex' => $kodeindex, 'tahapan' => $this->input->post('tahapan'.$j.''),);
                        //     $dataU = array('rupiah_tahapan' => $this->input->post('rupiah'.$j.''));
                        //     $this->db->update('d_detailapp', $dataU, $where); 
                        // }
                        

                            //$rupiah_tahapan[$i] = $this->input->post('rupiah'.$j.'');
                            
                        $j++;
                    }
                    //$this->detail_Mappingapp->CRUD($data,'d_detailapp', $Trigger);
                    
                }else{
                    
                    $data = array(
                        'id_app' => $app,
                        'rupiah' => $nilaiakun,
                        'kdindex' => $kodeindex,
                        'th_pkpt' => $th_pkpt,
                        'tahapan' => 11,
                        'rupiah_tahapan'  => $this->input->post('rupiahAll')
                        
                        );
                    $this->detail_Mappingapp->CRUD($data,'d_detailapp', $Trigger);
                   
                }
               

            // }else{
            //     $data = array(
            //         'rupiah' => $nilai_app,
            //         'th_pkpt' => $th_pkpt
                    
            //         );
            //     $cekwhere = array('id'  => $cek[0]['id'] );
            //     $this->detail_Mappingapp->update($data,'d_detailapp', $cekwhere);
            // }
            
        }else if($Trigger == "D"){

            $id = $this->input->post('id');
            $where = array('id' => $id);
	        $this->detail_Mappingapp->CRUD($where,'d_detailapp', $Trigger);

        }else if($Trigger == "R-Ubah"){
            
            $id = $this->input->post('id');
            $kdindex = $this->input->post('kdindex');
            
           
            $output = $this->detail_Mappingapp->getUbah_detail($id,$kdindex);
            echo json_encode($output);
            
        }else if($Trigger == "U"){

            $rupiah_tahapan = $this->input->post('rupiah1');
            $th_pkpt = $this->input->post('th_pkpt');
            $app = $this->input->post('app');
            $tahapan = $this->input->post('tahapan1');
            $a = $this->input->post('kdindex');
            $kdindex = str_replace("%20", " ", $a);
            $nilaiakun = $this->input->post('nilaiakun');

            $data = array(
                'rupiah_tahapan' => $rupiah_tahapan,
                'th_pkpt' => $th_pkpt
                
                );

            $id = $this->input->post('Id_Edit');
            $where = array('id' => $id);

            $whereST = array('kdindex'=>$kdindex,'id_app'=>$app,'id_tahapan'=>$tahapan);
            $dataST = array('jumlah_uang'=> $rupiah_tahapan);

            $this->db->update('d_surattugas', $dataST, $whereST);
            $this->detail_Mappingapp->update($data,'d_detailapp', $where);

            

        }else if($Trigger == "getRupiahTahapan"){

            $kdindex = $this->input->post('kdindex');
            //$where = array('kdindex' => $kdindex);
            $output = $this->detail_Mappingapp->CRUD($kdindex,'d_detailapp', $Trigger);
            echo json_encode($output);

        }
        
    }

    public function Alokasi()
    {
            $a = $this->input->post('kdindex');
            $kdindex = str_replace("%20", " ", $a);

            $output = $this->db->query("SELECT a.*,b.alokasi 
            FROM (SELECT d_pagu.* FROM d_pagu WHERE d_pagu.kdindex='".$kdindex."') as a 
            left JOIN (SELECT d_detailapp.kdindex, SUM(d_detailapp.rupiah_tahapan) AS alokasi
            FROM d_detailapp  GROUP BY d_detailapp.kdindex) as b ON a.kdindex=b.kdindex")->result();
        echo json_encode($output);
            
    }

    public function Ubah()
		{

            $Trigger = $this->input->post('Trigger');
            if($Trigger == "Edit"){
                $a = $this->input->post('kdindex');
                $kdindex = str_replace("%20", " ", $a);
                $Id = $this->input->post('id');

                $output = $this->detail_Mappingapp->getUbah_detail($Id, $kdindex, 'Json');
                echo json_encode($output);

            }else{
                $Id = $this->uri->segment(4);
                $a = $this->uri->segment(5);
                $kdindex = str_replace("%20", " ", $a);
                $data['ubah']=  $this->detail_Mappingapp->getUbah_detail($Id, $kdindex, 'Php');
                $this->load->view('Anggaran/Mappingapp/ubah',$data);
            }
        
            
		}
}
