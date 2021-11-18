<!DOCTYPE html>
<html lang="en">
    <head>
    <title>View PDF SPD</title>
    </head>
    <style>
        body{
            font-family: Helvetica;
        }

        table#body, table#body td, table#body th {
        vertical-align: top;
        border-collapse: collapse;
        border: 1px solid black;
        }

        table#head,
        table#head td
        {
            border: none !important;
        }

        .ttd, .ttd-td, .ttd-th,
        {
            border: none !important;
        }

        /** Define the header rules **/
        header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
            }

        footer {
                position: fixed; 
                bottom: -10px; 
                left: 0px; 
                right: 0px;
                height: 230px; 
            }

            .body{
                padding-top: 10%;
                padding-bottom: 3%;
            }

        .page_break { page-break-before: always; }
        
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
    <?php for($i=0 ; $i < 3 ; $i++){?>

    <header>
        <table width="100%" id="head">
                <tr>
                    <td width="20%" rowspan="2"><img src="<?= base_url().'assets'?>/app-assets/images/logo/BPKP_Logo_2.png" alt="materialize logo"></td>
                    <td style="text-align: center"><b>BADAN PENGAWASAN KEUANGAN DAN PEMBANGUNAN<br>S U R A T   P E R J A L A N A N   D I N A S</b></td>
                </tr>

                <tr>
                    <td style="text-align: center">
                    Nomor : SPD-644/SU03/3/2021
                    </td>
                <tr>
            </table>
    </header>
    
    <div class="body">

        
        
        <div style="padding-top: 30px"></div>

        <table width="100%" style="border: 1px" id="body" cellpadding="6">

                <tbody>
                    <tr>
                        <td style="text-align: center;">1</td>
                        <td>Pejabat Pembuat Komitmen</td>
                        <td colspan="2">Sumardi</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">2</td>
                        <td>Nama /NIP Pegawai yang melaksanakan perjalanan dinas</td>
                        <td colspan="2">Nita Safitri <br> 198701122008012001</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">3</td>
                        <td>a. Pangkat dan golongan<br>
                            b. Jabatan / Instansi<br>
                            c. Tingkat Biaya Perjalanan Dinas</td>
                        <td colspan="2">III/b<br>
                            Auditor Muda selaku Subkoordinator Analisis dan Evaluasi<br>
                            C</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">4</td>
                        <td>Maksud perjalanan dinas</td>
                        <td colspan="2">Melaksanakan pendampingan Pemeriksaan BPK RI atas Laporan
                            Keuangan BPKP Tahun 2020 pada Perwakilan BPKP Provinsi Jawa
                            Barat</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">5</td>
                        <td>Alat angkutan yang dipergunakan</td>
                        <td colspan="2">Kendaraan Umum</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">6</td>
                        <td>a. Tempat berangka<br>
                            b. Tempat tujuan</td>
                        <td colspan="2">Jakarta<br>
                            Bandung</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">7</td>
                        <td>a. Lamanya perjalanan<br>
                            b. Tanggal<br>
                            c. Tanggal harus kembali / (tiba di tempat)</td>
                        <td colspan="2">5 hari<br>
                            01 Maret 2021<br>
                            05 Maret 2021</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" rowspan="2">8</td>
                        <td >Pengikut:       Nama</td>
                        <td >Tanggal Lahir</td>
                        <td >Keterangan</td>
                    </tr>

                    <tr>
                        <td>1.<br>2.<br>3.</td>
                        <td></td>
                        <td></td>
                    </tr>


                    <tr>
                        <td style="text-align: center;" rowspan="2">9</td>
                        <td style="border-bottom-style: none;">Pembebanan Anggaran</td>
                        <td style="border-bottom-style: none;" colspan="2"></td>
                    </tr>

                    <tr>
                        <td style="border-top-style: none;">a. Instansi<br> b. Akun</td>
                        <td style="border-top-style: none;" colspan="2">Biro Keuangan <br>089.01.01.3667.EAC.SU0.201.A.524111</td>
                    </tr>

                    <tr>
                        <td style="text-align: center;">10</td>
                        <td>Keterangan lain</td>
                        <td colspan="2">, tanggal : 24 Februari 2021</td>
                    </tr>
                    
                </tbody>

                    
            </table>
        
    </div>

            <table width="100%" id="ttd" >
                <tbody>
                    <tr>
                        <td rowspan="6" width="55%" style="vertical-align: text-top !important;" >Coret yang tidak perlu</td>
                        <td width="10%">Dikeluarkan di</td>
                        <td width="25%">Jakarta</td>
                    </tr>
                    <tr >
                        <td width="10%">Tanggal</td>
                        <td width="25%">15 Maret 2021</td>
                    </tr>
                    <tr >
                        <td></td>
                        <td width="10%" style="text-align: center;">Pejabat Pembuat Komitmen</td>
                    </tr>
                    <tr >
                        <td width="10%" colspan="2" style="padding-top: 50px"></td>
                    </tr>
                    <tr >
                        <td></td>
                        <td width="10%" style="text-align: center;">Sumardi</td>
                    </tr>
                    <tr >
                        <td></td>
                        <td width="10%" style="text-align: center;">NIP.197307251994021001</td>
                    </tr>
                </tbody>
            </table>
            <div class="page_break"></div>
            <?php }?>
            
    
    </body>

   

   
</html>
