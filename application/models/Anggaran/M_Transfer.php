<?php
class M_Transfer extends CI_Model{

    
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
	}


     function getPagu_Norevisi($kdsatker)
    {
       $this->db->distinct();
       $this->db->select('revisike');
       $this->db->from('d_pagu');
       $this->db->where('kdsatker', $kdsatker);
        $query = $this->db->get();
       return $query->result();

    }

    function d_pagu($kdsatker, $no_revisi, $revisiKe){

        $tglRevisi = date("Y-m-d");
        $this->db->where('kdsatker', $kdsatker);
        $this->db->delete('d_pagu');

        

        $this->db->query("
        INSERT INTO d_pagu
        SELECT 
        CONCAT(thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen,kdakun,kdbeban,kdib) AS kdindex, 
           
           thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen,kdakun,kdbeban,kdib, SUM(jumlah) AS jumlah, 
           register,".$no_revisi." as revisike, ".$tglRevisi." AS tgrevisi,CONCAT('DIPA-',kddept,'.',kdunit,'.',kddekon,'.',kdsatker,'/',thang,' Revisi ke ',".$no_revisi.") AS norevisi
           FROM d_item WHERE kdsatker = '".$kdsatker."' GROUP BY thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen,kdakun,kdbeban,kdib
        ");
    }

    function h_pagu($kdsatker, $no_revisi, $revisiKe){
        $tglRevisi = date("Y-m-d");

        $this->db->query("INSERT into h_pagu (kdindex,thang,kdsatker,kddept,kdunit,
        kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,
        kdskmpnen,kdakun,kdbeban,kdib,rupiah,
        register,revisike,tgrevisi,norevisi)
        
        (select 
        kdindex,thang,kdsatker,kddept,kdunit,
        kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,
        kdskmpnen,kdakun,kdbeban,kdib,rupiah,
        register,revisike,tgrevisi,norevisi
         from d_pagu where kdsatker = '".$kdsatker."')");

        $this->db->where('kdsatker', $kdsatker);
        $this->db->delete('d_pagu');

        $this->db->query("
        INSERT INTO d_pagu
        SELECT 
        CONCAT(thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen,kdakun,kdbeban,kdib) AS kdindex, 
           
           thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen,kdakun,kdbeban,kdib, SUM(jumlah) AS jumlah, 
           register,".$no_revisi." as revisike, ".$tglRevisi." AS tgrevisi,CONCAT('DIPA-',kddept,'.',kdunit,'.',kddekon,'.',kdsatker,'/',thang,' Revisi ke ',".$no_revisi.") AS norevisi
           FROM d_item WHERE kdsatker = '".$kdsatker."' GROUP BY thang,kdsatker,kddept,kdunit,kdprogram,kdgiat,kdoutput,kdsoutput,kdkmpnen,kdskmpnen,kdakun,kdbeban,kdib
        ");
    }

    function xml_d_item($kdsatker,$name){

        $this->db->where('kdsatker', $kdsatker);
        $this->db->delete('d_item');

        $dir = FCPATH.'assets/temp_folder/'.$kdsatker.'/';
        

        $tmp= substr($name,4,17);
        $file = str_replace("_","",$tmp);
        chmod($dir . "d_item".$file.".xml",0777);

        $my_xml = simplexml_load_file($dir . "d_item".$file.".xml");
        $jumlah2 = 0;
        $tgkontrak = date("Y-m-d", strtotime("0000-00-00"));

        foreach($my_xml->c_item as $item) {
           $this->db->query("INSERT INTO d_item(thang,kdjendok,kdsatker,kddept,
                                       kdunit,kdprogram,kdgiat,kdoutput,
                                       kdlokasi,kdkabkota,kddekon,kdsoutput,
                                       kdkmpnen,kdskmpnen,kdakun,kdkppn,
                                       kdbeban,kdjnsban,kdctarik,register,
                                       carahitung,header1,header2,kdheader,
                                       noitem,nmitem,vol1,sat1,
                                       vol2,sat2,vol3,sat3,
                                       vol4,sat4,volkeg,satkeg,
                                       hargasat,jumlah,jumlah2,paguphln,
                                       pagurmp,pagurkp,kdblokir,blokirphln,
                                       blokirrmp,blokirrkp,rphblokir,kdcopy,
                                       kdabt,kdsbu,volsbk,volrkakl,
                                       blnkontrak,nokontrak,tgkontrak,nilkontrak,
                                       januari,pebruari,maret,april,
                                       mei,juni,juli,agustus,
                                       september,oktober,nopember,desember,
                                       jmltunda,kdluncuran,jmlabt,norev,
                                       kdubah,kurs,indexkpjm,kdib)			
                         VALUES ('" . $item->thang . "','" . $item->kdjendok . "','" . $item->kdsatker . "','" . $item->kddept . "','" . 
                                       $item->kdunit."','".$item->kdprogram."','".$item->kdgiat."','".$item->kdoutput ."','".
                                       $item->kdlokasi."','".$item->kdkabkota."','".$item->kddekon."','".$item->kdsoutput ."','".
                                       $item->kdkmpnen."','".$item->kdskmpnen."','".$item->kdakun."','".$item->kdkppn ."','".
                                       $item->kdbeban."','".$item->kdjnsban."','".$item->kdctarik."','".$item->register ."','".
                                       $item->carahitung."','".$item->header1."','".$item->header2."','".$item->kdheader ."','".
                                       $item->noitem."','".$item->nmitem."','".$item->vol1."','".$item->sat1 ."','".
                                       $item->vol2."','".$item->sat2."','".$item->vol3."','".$item->sat3 ."','".
                                       $item->vol4."','".$item->sat4."','".$item->volkeg."','".$item->satkeg ."','".
                                       $item->hargasat."','".$item->jumlah ."','". $jumlah2 ."','". $item->paguphln ."','".
                                       $item->pagurmp."','".$item->pagurkp."','".$item->kdblokir."','".$item->blokirphln ."','".
                                       $item->blokirrmp."','".$item->blokirrkp."','".$item->rphblokir."','".$item->kdcopy ."','".
                                       $item->kdabt."','".$item->kdsbu."','".$item->volsbk."','".$item->volrkakl ."','".
                                       $item->blnkontrak."','".$item->nokontrak."','".$tgkontrak."','".$item->nilkontrak ."','".
                                       $item->januari."','".$item->pebruari."','".$item->maret."','".$item->april ."','".
                                       $item->mei."','".$item->juni."','".$item->juli."','".$item->agustus ."','".
                                       $item->september."','".$item->oktober."','".$item->nopember."','".$item->desember ."','".
                                       $item->jmltunda."','".$item->kdluncuran."','".$item->jmlabt."','".$item->norev ."','".
                                       $item->kdubah."','".$item->kurs."','".$item->indexkpjm."','".$item->kdib."')");
        }

       
    }

    function xml_d_soutput($kdsatker,$name){

        $this->db->where('kdsatker', $kdsatker);
        $this->db->delete('d_soutput');

        $dir = FCPATH.'assets/temp_folder/'.$kdsatker.'/';

        $tmp= substr($name,4,17);
        $file = str_replace("_","",$tmp);
        chmod($dir . "d_soutput".$file.".xml",0777);

        $my_xml = simplexml_load_file($dir . "d_soutput".$file.".xml");

        foreach($my_xml->c_soutput as $soutput) {
            $this->db->query("INSERT INTO d_soutput(thang,kdjendok,kdsatker,kddept,
                                       kdunit,kdprogram,kdgiat,kdoutput,
                                       kdlokasi,kdkabkota,kddekon,kdsoutput,
                                       ursoutput,sbmkvol,sbmksat,sbmkmin1,
                                       sbmkket,kdsb,volsout,volsbk,kdib)			
                                       VALUES ('" . $soutput->thang . "','" . $soutput->kdjendok . "','" . $soutput->kdsatker . "','" . $soutput->kddept . "','" . 
                                       $soutput->kdunit."','".$soutput->kdprogram."','".$soutput->kdgiat."','".$soutput->kdoutput ."','".
                                       $soutput->kdlokasi."','".$soutput->kdkabkota."','".$soutput->kddekon."','".$soutput->kdsoutput ."','".
                                       $soutput->ursoutput."','".$soutput->sbmkvol."','".$soutput->sbmksat."','".$soutput->sbmkmin1 ."','".
                                       $soutput->sbmket."','".$soutput->kdsb."','".$soutput->volsout."','".$soutput->volsbk ."','".
                                       $soutput->kdib."')");

    }
}

    function xml_d_kmpnen($kdsatker,$name){

        $this->db->where('kdsatker', $kdsatker);
        $this->db->delete('d_kmpnen');

        $dir = FCPATH.'assets/temp_folder/'.$kdsatker.'/';

        $tmp= substr($name,4,17);
        $file = str_replace("_","",$tmp);
        chmod($dir . "d_kmpnen".$file.".xml",0777);

        $my_xml = simplexml_load_file($dir . "d_kmpnen".$file.".xml");

            foreach($my_xml->c_kmpnen as $kmpnen) {
                $this->db->query("INSERT INTO d_kmpnen(thang,kdjendok,kdsatker,kddept,
                kdunit,kdprogram,kdgiat,kdoutput,
                kdlokasi,kdkabkota,kddekon,kdsoutput,
                kdkmpnen,kdbiaya,kdsbiaya,urkmpnen,kdtema,
                rphpls1,rphpls2,rphpls3,rphmin1,thangawal,
                thangakhir,indekskali,kdib,indeksout,n1,n2,n3,n4,
                rphn1,rphn2,rphn3,rphn4)			
                    VALUES ('" . $kmpnen->thang . "','" . $kmpnen->kdjendok . "','" . $kmpnen->kdsatker . "','" . $kmpnen->kddept . "','" . 
                            $kmpnen->kdunit."','".$kmpnen->kdprogram."','".$kmpnen->kdgiat."','".$kmpnen->kdoutput ."','".
                            $kmpnen->kdlokasi."','".$kmpnen->kdkabkota."','".$kmpnen->kddekon."','".$kmpnen->kdsoutput ."','".
                            $kmpnen->kdkmpnen."','".$kmpnen->kdbiaya."','".$kmpnen->kdsbiaya."','".$kmpnen->urkmpnen ."','".
                            $kmpnen->kdtema."','".$kmpnen->rphpls1."','".$kmpnen->rphpls2."','".$kmpnen->rphpls3 ."','".
                            $kmpnen->rphmin1."','".$kmpnen->thangawal."','".$kmpnen->thangakhir."','".$kmpnen->indekskali."','".
                            $kmpnen->kdib."','".$kmpnen->indeksout."','".$kmpnen->n1."','".$kmpnen->n2."','".
                            $kmpnen->n3."','".$kmpnen->n4."','".$kmpnen->rphn1."','".$kmpnen->rphn2."','".$kmpnen->rphn3."','".
                            $kmpnen->rphn4."')");

            }
    }

    function xml_d_skmpnen($kdsatker,$name){

        $this->db->where('kdsatker', $kdsatker);
        $this->db->delete('d_skmpnen');
    
        $dir = FCPATH.'assets/temp_folder/'.$kdsatker.'/';
    
        $tmp= substr($name,4,17);
        $file = str_replace("_","",$tmp);
        chmod($dir . "d_skmpnen".$file.".xml",0777);
    
        $my_xml = simplexml_load_file($dir . "d_skmpnen".$file.".xml");
    
        foreach($my_xml->c_skmpnen as $skmpnen) {
                $this->db->query("INSERT INTO d_skmpnen(thang,kdjendok,kdsatker,kddept,
                kdunit,kdprogram,kdgiat,kdoutput,
                kdlokasi,kdkabkota,kddekon,kdsoutput,
                kdkmpnen,kdskmpnen,urskmpnen,kdib)			
                    VALUES ('" . $skmpnen->thang . "','" . $skmpnen->kdjendok . "','" . $skmpnen->kdsatker . "','" . $skmpnen->kddept . "','" . 
								$skmpnen->kdunit."','".$skmpnen->kdprogram."','".$skmpnen->kdgiat."','".$skmpnen->kdoutput ."','".
								$skmpnen->kdlokasi."','".$skmpnen->kdkabkota."','".$skmpnen->kddekon."','".$skmpnen->kdsoutput ."','".
								$skmpnen->kdkmpnen."','".$skmpnen->kdskmpnen."','".$skmpnen->urskmpnen."','".$skmpnen->kdib."')");
    
            }

             //unlink semua file dr temp folder/session(kdsatker)

            $files = glob(FCPATH.'/assets/temp_folder/'.$kdsatker.'/*'); // get all file names
            foreach($files as $file){ // iterate files
            if(is_file($file)) {
                unlink($file); // delete file
                    }
                }
        }

}