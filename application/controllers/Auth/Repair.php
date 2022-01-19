<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {


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

            if(mysqli_affected_rows($mysqli) >0 ){
                echo "berhasil";
            }else{
                echo $update;
            }

        //$data = =
  
        // for($i= 0; $i < count($unit_id); $i++){
           
        //    $select = $this->db->query("SELECT nama_grup from t_unitkerja WHERE grup_id = ".$unit_id[$i]->namaunit_lengkap."")->result();
        //    echo $select[0]->nama_grup."<br>";
  
        //    $data = array(
        //       'namaunit_lengkap' => $select[0]->nama_grup,
        //       );
  
        //    $this->db->where("namaunit_lengkap",$unit_id[$i]->namaunit_lengkap);
        //    $this->db->update("t_pegawai",$data);
        // }
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

        $data = array(
        );

    }

}