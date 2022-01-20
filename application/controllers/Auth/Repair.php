<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repair extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Master/M_Master','Master');
	}

    function R_unitkerjapegawai(){
        $unit_id = $this->db->query("SELECT namaunit_lengkap FROM t_pegawai where namaunit_lengkap BETWEEN '00000' AND '605000' ")->result();
        
        $update = $this->db->query(" UPDATE t_pegawai
        SET unit_id = t_pegawai.namaunit_lengkap
        where namaunit_lengkap BETWEEN '00000' AND '605000' ");

            if($this->db->affected_rows() > 0 ){
                echo "berhasil<br>";
            }else{
                echo $update;
            }

  
        for($i= 0; $i < count($unit_id); $i++){
           
           $select = $this->db->query("SELECT nama_grup from t_unitkerja WHERE grup_id = ".$unit_id[$i]->namaunit_lengkap."")->result();
           echo $select[0]->nama_grup."<br>";
  
           $data = array(
              'namaunit_lengkap' => $select[0]->nama_grup,
              );
  
           $this->db->where("namaunit_lengkap",$unit_id[$i]->namaunit_lengkap);
           $this->db->update("t_pegawai",$data);
        }
     }

     function R_THL(){
        $kdsatker = 689266;
        $query = $this->db->query("SELECT id from t_pegawai 
        where niplama = '689266015' AND nipbaru ='689266015' AND nip ='689266015' AND satker_id =".$kdsatker."")->result();
        $where = array('niplama' =>"689266015",
                        'nipbaru' => "689266015",
                        'nip' => "689266015");
        //echo count($query);
        $j = 14;
        for($i = 0 ; $i < count($query); $i++){

            $data = array(
                'nipbaru' => $kdsatker."0".$j,
                'niplama' =>  $kdsatker."0".$j,
                'nip' =>  $kdsatker."0".$j,
                'unit_id' => "032000",
                'status' => 1,
                );
                
                
                $this->db->where($where);
                $this->db->update("t_pegawai",$data);
                $j++;
                echo $j."<br>";


        }

    }

    function R_idst(){

        $update = $this->db->query(" UPDATE d_surattugas
        SET id_st = d_surattugas.id
        where id_st = 0");

            if($this->db->affected_rows() > 0 ){
                echo "berhasil Update id ST<br>";
            }else{
                echo $update;
            }

        $updateCS = $this->db->query(" UPDATE d_costsheet
        SET id_cs = CONCAT(d_surattugas.id,'-1')
        where id_cs = 0 AND from_data = 'lcl'");

            if($this->db->affected_rows() > 0 ){
                echo "berhasil Update id ST<br>";
            }else{
                echo $updateCS;
            }

    }

}