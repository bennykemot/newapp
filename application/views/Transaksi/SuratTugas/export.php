<!DOCTYPE html>
<html lang="en">
    <head>
    	<title>View PDF Surat Tugas - <?= $ubah[0]['nost']?></title>
    </head>
    <style>
        body{
            font-family: Arial;
        }

		table, td, th {
			vertical-align: center;
            /* border-collapse: collapse;
            border: 1px solid black; */
			
			}

        table {
            vertical-align: top;
            /* border: 1px solid black; */
        }

		

        
    </style>

<?php

function cek_tgl($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    function StatusPenandatangan($status,$jabatanST){
        $result="";
        if($status == 3){
            if($jabatanST == "Kepala Biro"){
                $result = "Plh. Sekretaris Utama";
            }else if($jabatanST == "Direktur"){
                $result = "Plh. Deputi";
            }
        }else{
            $result = $jabatanST;
        }
        return $result;

    }


?>


    <body>
    
    <div id="container">
        <?php if ($Pilihkop == "Kop"){?>
        <table width="100%" id="header" >
                <tr>
                    <td width="20%" rowspan="2">
						<img src="<?= base_url().'assets'?>/app-assets/images/logo/logo-bpkp-3-jpg.jpg" alt="materialize logo">
					</td>
                    <td style="text-align: center;" colspan="4">
						<h5>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN<br><?= strtoupper($kop[0]['nama_unit']) ?></h5>
					</td>
                </tr>

                <tr>
                    <td style="text-align: center;" colspan="4" >
						<p style="font-size: 11px;"><?= $kop[0]['alamat'] ?><br>
							<?= $kop[0]['notelp'] ?> , Faximile: <?= $kop[0]['nofax'] ?> <br>
							Web: <?= $kop[0]['web'] ?> , Email: <?= $kop[0]['email'] ?></p>
                    </td>
                <tr>

                <tr>
                    <td colspan="5"><hr></td>
                </tr>
        </table>
        <?php }else{
            echo "<div style='padding-bottom: 40%'></div>";
        }?>

        <table width="100%">
                <tr>
                    <td style="text-align: center" colspan="5">
                        SURAT TUGAS<br><?= $ubah[0]['nost']?>
                    </td>
                </tr>

                <tr><td><div style="padding-top: 10px"></div></td></tr>

                <tr>
                    <td style="text-align: justify" colspan="5">
					
						<?php
							if($ubah[0]['status_penandatangan'] == 3){
								$ket = Statuspenandatangan($ubah[0]['status_penandatangan'],$ubah[0]['jabatan_ttd']);
								echo substr($ket,4);
							}else{
								$unitId = $ubah[0]['kdunit'];
								$nama_grup = $ubah[0]['nama_grup'];
                                if($unitId < '605000' && $unitId > '900'){
                                    if($unitId < '106000'){
                                        echo "Kepala " .$nama_grup;
                                    }else{
                                        echo "Direktur " .$nama_grup;
                                    }
                                }else{
                                    echo "Kepala ";
                                }
							}
								

						?>
						BPKP dengan ini menugasi:
                    </td>
                </tr>

                <tr><td><div style="padding-top: 10px"></div></td></tr>

                <tr>
                    <td width="5%">No</td>
                    <td width="30%">Nama</td>
                    <td width="35%">NIP</td>
                    <td width="30%" colspan="2">Jabatan/Peran</td>
                </tr>

                <?php
                    $no=1;for($i = 0 ; $i < count($ubah); $i++){ ?>
                <tr>
                    <td width="5%"><?= $no++?></td>
                    <td width="30%"><?= $ubah[$i]['nama']?></td>
                    <td width="35%"><?= $ubah[$i]['nip']?></td>
                    <td width="30%" colspan="2" style="text-align: justify"><?= $ubah[$i]['jabatan']?></td>
                </tr>
                <?php }?>
                
        </table>
        
        <p style="text-align: justify"> Untuk melaksanakan <?= $ubah[0]['uraianst']?>. <br><br>
						Penugasan ini dilaksanakan selama <?= $ubah[0]['jmlhari']?> hari kerja mulai tanggal <?= cek_tgl($ubah[0]['tglmulaist'])?> sampai dengan <?= cek_tgl($ubah[0]['tglselesaist'])?>. <br>
						<br>Penugasan ini menjadi beban anggaran <?= $ubah[0]['nama_unit']?>.<br>
						<br>Demikian untuk dilaksanakan dengan penuh tanggung jawab.
                        
                        
        </p>

        <table width="100%">

                <tr>
                    <td width="50%" rowspan="3" colspan="5"></td>
                    <td></td>
                    <td style="text-align: left" width="50%"><?= cek_tgl($ubah[0]['tglst'])?></td>
                </tr>
                
                <tr>
                    <td rowspan="2" width="12%" style="text-align: center">
                        <br><img src="<?= base_url().'assets'?>/app-assets/images/logo/qrcode.jpg" alt="bpkp" width="80" height="80">
                    </td>
                    <td style="font-size:0.8em;color:blue;text-align: left"><i>Ditandatangani secara elektronik oleh</i></td>
                </tr>

                <tr>
                    
                    <td style="text-align: left;vertical-align: bottom;" width="38%">
                        <br><?=Statuspenandatangan($ubah[0]['status_penandatangan'],$ubah[0]['jabatan_ttd'])?>
                        <br> <?= $ubah[0]['nama_ttd']?>
                        <br> NIP <?= $ubah[0]['nip_ttd']?>
                    </td>
                </tr>
                
                <!-- <tr>
                    <td width="60%" rowspan="5" colspan="5"></td>
                    <td style="text-align: left" width="40%"><?= cek_tgl($ubah[0]['tglst'])?></td>
                </tr>

                <tr>
                    <td style="text-align: left"><?=Statuspenandatangan($ubah[0]['status_penandatangan'],$ubah[0]['jabatan_ttd'])?></td>
                </tr>

                <tr>
                    <td style="text-align: left; padding-top: 10%"></td>
                </tr>

                <tr>
					'
					'
                    <td style="text-align: left"> <?= $ubah[0]['nama_ttd']?></td>
                </tr>
                <tr>
                    <td style="text-align: left">NIP <?= $ubah[0]['nip_ttd']?></td>
                </tr> -->
        </table>
    </div>
        <!-- <footer>
                <table width="100%"><tr>
                    <td width="10%" rowspan="2">
                        <img src="<?= base_url().'assets'?>/app-assets/images/logo/qrcode.jpg" alt="bpkp" width="60" height="60">
                    </td>
                </tr>
                </table>
        </footer> -->
    </body>

   
</html>
