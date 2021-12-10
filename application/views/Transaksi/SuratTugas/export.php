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
        vertical-align: top;
        }

        table {
            vertical-align: top;
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

?>


    <body>
    
    <div id="container">
        <table width="100%" id="header" >
                <tr>
                    <td width="20%" rowspan="2"><img src="<?= base_url().'assets'?>/app-assets/images/logo/BPKP_Logo_2_jpg.jpg" alt="materialize logo"></td>
                    <td style="text-align: center;" colspan="4"><b><h4>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN<br>BIRO KEUANGAN</h4></b></td>
                </tr>

                <tr>
                    <td style="text-align: center;" colspan="4" >
                    Gedung BPKP Lantai 4 Jalan Pramuka No 33 Jakarta Timur<br>
                    Telepon: (021) 85910512 , Faximile: (021) 85910512 <br>
                    Web: http://www.bpkp.go.id , Email: keuangan@bpkp.go.id
                    
                    </td>
                <tr>

                <tr>
                    <td colspan="5"><hr></td>
                </tr>
        </table>

        <table width="100%">
                <tr>
                    <td style="text-align: center" colspan="5">
                        SURAT TUGAS<br><?= $ubah[0]['nost']?>
                    </td>
                </tr>

                <tr><td><div style="padding-top: 10px"></div></td></tr>

                <tr>
                    <td style="text-align: justify" colspan="5">
                        Kepala Biro Keuangan BPKP dengan ini menugasi :
                    </td>
                </tr>

                <tr><td><div style="padding-top: 10px"></div></td></tr>

                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>NIP</td>
                    <td>Jabatan / Peran</td>
                </tr>

                <?php for($i = 0 ; $i < count($ubah); $i++){ ?>
                <tr>
                    <td width="5%"><?= $ubah[$i]['nourut']?></td>
                    <td width="30%"><?= $ubah[$i]['nama']?></td>
                    <td width="35%"><?= $ubah[$i]['nip']?></td>
                    <td width="30%" colspan="2"><?= $ubah[$i]['jabatan']?></td>
                </tr>
                <?php }?>
                
        </table>
        
        <p style="text-align: justify"> Untuk melaksanakan <?= $ubah[0]['uraianst']?>. <br>
						Penugasan ini dilaksanakan selama <?= $ubah[0]['jmlhari']?> hari kerja mulai tanggal <?= cek_tgl($ubah[0]['tglmulaist'])?> sampai dengan <?= cek_tgl($ubah[0]['tglselesaist'])?>. <br>
						Biaya kegiatan ini dibebankan pada anggaran <?= $ubah[0]['nama_unit']?>.<br>
						Demikian untuk dilaksanakan dengan penuh tanggung jawab.
                        
                        
        </p>

        <table width="100%">
                <tr>
                    <td width="60%" rowspan="5" colspan="5"></td>
                    <td style="text-align: left" width="40%">02 November 2021</td>
                </tr>

                <tr>
                    <td style="text-align: left">Kepala Biro</td>
                </tr>

                <tr>
                    <td style="text-align: left; padding-top: 10%"></td>
                </tr>

                <tr>
                    <td style="text-align: left">Setia Pria Husada</td>
                </tr>
                <tr>
                    <td style="text-align: left">NIP : 196610161988031002</td>
                </tr>
        </table>
    </div>
    
    </body>

   
</html>
